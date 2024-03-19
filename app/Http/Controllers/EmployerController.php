<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Countries;
use App\Models\EmployerDetails;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use App\Models\{Plan, User, SubscriptionItem, Subscription, EmployerJob, SavedCandidate, JobInterview, JobApplication, EmployerBusinessLicense};
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rule;
use App\Rules\ValidateJobLink;
use App\Rules\BusinessLicenseRule;
use Notification;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;
use App\Notifications\{BusinessLicenseNotification, InterviewRequestNotification,InterviewRescheduleNotification};
class EmployerController extends Controller
{

    public function getEmployerDashboard()
    {
        $totalJobsPosted = EmployerJob::where('posted_by',Auth::id())->count();
        $totalShortlists = JobInterview::where('requested_from',Auth::id())->count();
        $totalSavedCandidate = User::find(Auth::id())->savedCandidates()->count();
        $totalEmployerJobApplications = JobApplication::where('employer_id',Auth::id())->count();
        return view('employer.dashboard',get_defined_vars());
    }
    public function getEmployerProfilePage()
    {
       $plans = Plan::get();
        $countries = Countries::all();
        $intent = auth()->user()->createSetupIntent();
        $employerDetails = EmployerDetails::where('user_id',Auth::id())->first();
        $employerLicenseDetails = EmployerBusinessLicense::where('employer_id',Auth::id())->first();
        return view('employer.employer-profile',compact('countries','employerDetails','plans','intent','employerLicenseDetails'));
    }
    public function getEmployerCandidate()
    {
        return view('employer.employer-dashboard-saved-candidate');
    }
    public function getEmployerSubscription()
    {
        // $user = User::find(Auth::id());
        // if ($user->subscribed('prod_Or5sOemrKGQMth')) { // Replace with the actual plan name
        //     dd('Subscribed');

        // } else {
        //    dd('Un Subscribed');
        // }
        // $subscription=User::find(Auth::id())->subscriptions('default')->first();
        // $subscription->swap('price_1O45OVIWh0YxdiV2lbhYthVN');
        $intent = auth()->user()->createSetupIntent();
        $allPlans = Plan::all();
        $userSubscription = User::find(Auth::id())->subscriptions('default')->first();
        
        $renewalTimestamp=null;
        $planDetails=null;
        // dd("Subscription renews on ". $formattedDate);
        if(isset($userSubscription) && $userSubscription->stripe_status !='canceled')
        {
            $planDetails =\App\Models\Plan::where('stripe_plan',$userSubscription->stripe_price)->first();
                $userSubscription->plan = $planDetails;

                // Get the renewal timestamp from the Stripe subscription
                $stripeSubscription = $userSubscription->asStripeSubscription();
                $renewalTimestamp = $stripeSubscription->current_period_end;
                // Convert the timestamp to a Carbon instance
                $carbonDate = Carbon::createFromTimestamp($renewalTimestamp);
                // Format the Carbon instance as a string (e.g., 'Y-m-d H:i:s')
                $formattedDate = $carbonDate->format('d M, Y');
                $userSubscription->renewal_date =  $formattedDate;
        }
        return view('employer.employer-dashboard-subscription-plan',compact('userSubscription','allPlans','intent'));
    }

    public function postAJob()
    {
        return view('employer.post-a-job');
    }
    public function scheduleInterview()
    {
        return view('schedule-interview');
    }
    public function JobListingCandidate($id)
    {
        $jobApplicants= EmployerJob::where('posted_by',Auth::id())->find($id)->jobApplicants()->paginate(10);
        return view('employer.job-candidates.index',compact('jobApplicants'));
    }
    
    public function saveProfile1(Request $request)
    {
        // dd($request->all());
        $updateEmployerDetails = EmployerDetails::where('user_id',Auth::id())->first();

          // save employer Company Logo  code
          $imagename = $updateEmployerDetails->institution_logo;
          if ($request->file('institution_logo')) {
              $file = $request->file('institution_logo');
              $filePath = employerInstitutionLogoPath();
              $imagename = saveFile($filePath, $file, $updateEmployerDetails->institution_logo);
          }
        $input = $request->except('_token','institution_logo');
        $updateEmployerDetails->update(array_merge($input,['institution_logo'=>$imagename]));
        return response()->json([
                        "status" => true, 
                        "message" => url("Employer Details Updated Successfully")
                    ]);
    }
    public function saveProfile2(Request $request)
    {
        $updateDetails = EmployerDetails::where('user_id',Auth::id())->first();

        //Save Certification File
        $imagename = $updateDetails->international_accredition_or_certification;
        if ($request->file('international_accredition_or_certification')) {
            $file = $request->file('international_accredition_or_certification');
            $filePath = employerCertificationtPath();
            $imagename = saveFile($filePath, $file, $updateDetails->international_accredition_or_certification);
        }
        //Update Profile Data
        $input = $request->except('_token','international_accredition_or_certification');
        $updateDetails = EmployerDetails::where('user_id',Auth::id());
        $updateDetails->update(array_merge($input,['international_accredition_or_certification'=>$imagename]));
        
        return response()->json([
                        "status" => true, 
                        "message" => url("Employer Details Updated Successfully")
                    ]);
    }
    public function saveProfile3(Request $request)
    {
        $input = $request->except('_token');
        $updateDetails = EmployerDetails::where('user_id',Auth::id());
        $updateDetails->update($input);
        return response()->json([
                        "status" => true, 
                        "message" => url("Employer Details Updated Successfully")
                    ]);
    }
    public function saveProfile4(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'license_number' => 'required',
            'license_file' => 'required',
        ],[
            'license_number.required'=>'Business License Number is required',
            'license_number.required'=>'Business License Certificate is required',
        ]);
        
       if($validator->fails())
       {
        return response()->json(['status'=>false,'errors'=>$validator->errors()->all()]);
       }
        $imagename = '';
        $checkDetails = EmployerBusinessLicense::where('employer_id',Auth::id())->first();
        if($checkDetails)
        {
            $updateDetails = $checkDetails;
            $imagename = $updateDetails->license_file;
        }
        else{
            $updateDetails = new EmployerBusinessLicense;
        }
        if ($request->file('license_file')) {
            $file = $request->file('license_file');
            $filePath = employerBusinessLicenseDocumentPath();
            $imagename = saveFile($filePath, $file, $imagename);
        }
        $input = $request->except('_token','license_file');
        $updateDetails->license_file = $imagename;
        $updateDetails->license_number = $request->license_number;
        $updateDetails->employer_id = Auth::id();
        $updateDetails->approval_status = 0;
        $updateDetails->save();
        $employerDetails = User::with('employerDetails')->find(Auth::id());
        Notification::route('mail','admin@admin.com')->notify(new BusinessLicenseNotification($employerDetails, $type=2,$status=1));

        return response()->json([
                        "status" => true, 
                        "message" => url("Employer Details Updated Successfully")
                    ]);
    }
    public function saveProfile5(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'terms_and_conditions_acceptance' => 'required|in:I Accept',
        ]);
  
        if ($validator->fails()){
            return response()->json([
                    "status" => false,
                    "errors" => $validator->errors()
                ]);
        }
        $updateEmployerDetails = EmployerDetails::where('user_id',Auth::id())->first();
        $video_url = $updateEmployerDetails->video_url;
        $thumbnailPath  = $updateEmployerDetails->video_thumbnail;
        if ($request->file('introductry_video')) {
            $file = $request->file('introductry_video');
            $filePath = employerIntroductryVideoPath();
            $video_url = saveFile($filePath, $file, $updateEmployerDetails->video_url);
        }
        if ($request->file('video_thumbnail')) {
            $file = $request->file('video_thumbnail');
            $filePath = employerIntroductryVideoThumbnailPath();
            $thumbnailPath = saveFile($filePath, $file, $updateEmployerDetails->video_thumbnail);
        }
        toastr('Profile Updated Successfully');
        $updateEmployerDetails->update(
            [
                'introductry_video'=>$video_url,
                'video_thumbnail'=>$thumbnailPath,
                'terms_and_conditions_acceptance'=>$request->terms_and_conditions_acceptance,
                'employer_details'=>$request->employer_details
            ]
        );

        
  
        // return view("subscription_success");
        // toastr()->success('Your have successfully Subscribed the Plan');
        // return redirect()->back();
        return response()->json([
            "status" => true, 
            "message" => "Subscribed Sucessfulyy",
            "redirect" => url("employer/employer-profile")
        ]);
        /*
        $input = $request->except('_token');
        $updateDetails = EmployerDetails::where('user_id',Auth::id());
        $updateDetails->update($input);
        return response()->json([
                        "status" => true, 
                        "message" => url("Employer Details Updated Successfully")
                    ]);
        */
    }
    public function saveProfile6(Request $request)
    {
        $input = $request->except('_token');
        $updateDetails = EmployerDetails::where('user_id',Auth::id());
        $updateDetails->update($input);
        return response()->json([
                        "status" => true, 
                        "message" => url("Employer Details Updated Successfully")
                    ]);
    }
    public function saveProfile7(Request $request)
    {
        $input = $request->except('_token');
        $updateDetails = EmployerDetails::where('user_id',Auth::id());
        $updateDetails->update($input);
        return response()->json([
                        "status" => true, 
                        "message" => url("Employer Details Updated Successfully")
                    ]);
    }
    public function saveProfile8(Request $request)
    {
        $input = $request->except('_token');
        $updateDetails = EmployerDetails::where('user_id',Auth::id());
        $updateDetails->update($input);
        return response()->json([
                        "status" => true, 
                        "message" => url("Employer Details Updated Successfully")
                    ]);
    }
    public function saveProfile9(Request $request)
    {
        $input = $request->except('_token');
        $updateDetails = EmployerDetails::where('user_id',Auth::id());
        $updateDetails->update($input);
        toastr()->success('Profile Update Successfully ');
        return response()->json([
            "status" => true, 
            "redirect" => url("employer/employer-profile")
        ]);
    }

    public function employerJobApplications()
    {
     
        $employerJobApplications = EmployerJob::with('jobApplicants')->where('posted_by',Auth::id())->get();
        return view('employer.job-applications.index',compact('employerJobApplications'));
    }
    
    public function employerSavedCandidates()
    {
        $employerSavedCandidates = User::find(Auth::id())->savedCandidates()->paginate(10);
        return view('employer.saved-candidates.index',compact('employerSavedCandidates'));
    }
    public function removeSavedCandidate($id)
    {
        $deleteSavedCandidate = SavedCandidate::where(['candidate_id'=>$id,'user_id'=>Auth::id()])->first();
        if($deleteSavedCandidate->delete())
        {
            toastr()->success('Candidate Successfully Removed');
            return redirect()->back();
        }
    }
    
    public function employerSubscriptions()
    {
        $user = User::find(Auth::id()); // Replace $userId with the actual user ID
        $subscriptions = $user->subscriptions;
        if(isset($subscriptions))
        {
            foreach($subscriptions as $subscription)
            {
                $planDetails =\App\Models\Plan::where('stripe_plan',$subscription->stripe_price)->first();
                $subscription->plan = $planDetails;
            }
        }
        return view('employer.subscription.index',compact('subscriptions'));
    }
    public function cancelSubscription(Request $request)
    {
        $user = User::find(Auth::id());
        // $subscriptionId =$request->subscription_id;
        // Find the subscription you want to cancel (replace $subscriptionId with the actual subscription ID)
        // $subscriptions = $user->subscriptions($subscriptionId)->first();        
        $subscriptions = User::find(Auth::id())->subscriptions('default')->first();        
        try {
            $subscriptions->cancelNow();
            toastr()->success('You have successfully canceled the subscription Subscribed');
        return redirect()->back();
            // Additional logic after canceling the subscription
        } catch (\Exception $e) {
            // Handle the exception (e.g., subscription not found, cancellation failed)
            dd($e->getMessage());
        }
    }

    public function jobInterviewRequest(Request $request)
    {
        if (\App::environment('local')) {
            $regexPattern = '/\b(?:(?:http?|ftp):\/\/|www\.)((localhost|\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3})|[-a-z0-9+&@#\/%?=~_|!:,.;])*[-a-z0-9+&@#\/%=~_|]/i';
        } else {
            $regexPattern = '/\b(?:(?:http?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i';
        }
        $validator = Validator::make($request->all(), [
            'meeting_media'=>'required',
            'interview_date'=>'required',
            'interview_time'=>'required',
            'job_link' => ['url', 'regex:'.$regexPattern],
            'job_link' => ['required', new ValidateJobLink($request->candidate_id)]
        ]);
        if ($validator->fails()){
            return response()->json([
                    "status" => false,
                    "errors" => $validator->errors()
                ]);
            }
           

        $urlParts = explode('/', $request->job_link);
        $jobId = end($urlParts);
        try {
            $jobId = Crypt::decryptString($jobId);
        } catch (DecryptException $e) {
            dd($e);
        }
        $candidateDetails = User::with('candidatePersonalDetails')->find($request->candidate_id);
        $employerDetails = User::with('employerDetails')->find(Auth::id());
        $jobDetails = EmployerJob::find($jobId);
        $createRequest = JobInterview::create([
            'job_link' => $request->job_link,
            'requested_to'=>$request->candidate_id,
            'requested_from'=>Auth::id(),
            'interview_date'=>$request->interview_date,
            'interview_time'=>$request->interview_time,
            'meeting_media'=>$request->meeting_media,
            'status'=>0,
            'employer_job_id'=>$jobId

        ]);
        Notification::route('mail',  $candidateDetails->email ?? '')->notify(new InterviewRequestNotification($candidateDetails,$employerDetails,$jobDetails));
        return response()->json([
            "status" => true, 
            "message" => 'Request Sent Successfully',
            "redirect" => url("candidates-marketplace")
        ]);
    }

    public function acceptRescheduleRequest($id)
    {
        $acceptRescheduleRequest = JobInterview::with('jobDetails')->find($id);
        $candidateDetails = User::with('candidatePersonalDetails')->find($acceptRescheduleRequest->requested_to);
        $employerDetails = User::with('employerDetails')->find($acceptRescheduleRequest->requested_from);
        $jobDetails = EmployerJob::find($acceptRescheduleRequest->employer_job_id);
        $acceptRescheduleRequest->interview_date = $acceptRescheduleRequest->reschedule_date;
        $acceptRescheduleRequest->interview_time = $acceptRescheduleRequest->reschedule_time;
        $acceptRescheduleRequest->meeting_media = $acceptRescheduleRequest->reschedule_meeting;
        $acceptRescheduleRequest->status = 1;
        $acceptRescheduleRequest->reschedule_status = 0;
        if($acceptRescheduleRequest->save())
        {
            Notification::route('mail',  $employerDetails->email ?? '')->notify(new InterviewRescheduleNotification($candidateDetails,$employerDetails,$jobDetails,$type=1,$interviewStatus=1));
            toastr()->success('Request Accepted Successfully');
            return redirect()->back();
        }
    }

    public function rejectRescheduleRequest($id)
    {
        $acceptRescheduleRequest = JobInterview::with('jobDetails')->find($id);
        $candidateDetails = User::with('candidatePersonalDetails')->find($acceptRescheduleRequest->requested_to);
        $employerDetails = User::with('employerDetails')->find($acceptRescheduleRequest->requested_from);
        $jobDetails = EmployerJob::find($acceptRescheduleRequest->employer_job_id);
        $acceptRescheduleRequest->status = 2;
        $acceptRescheduleRequest->reschedule_status = 0;
        if($acceptRescheduleRequest->save())
        {
            Notification::route('mail',  $employerDetails->email ?? '')->notify(new InterviewRescheduleNotification($candidateDetails,$employerDetails,$jobDetails,$type=1,$interviewStatus=2));
            toastr()->success('Request Rejected Successfully');
            return redirect()->back();
        }    
    }

    public function interviewConducted($id)
    {
        $acceptRescheduleRequest = JobInterview::with('jobDetails')->find($id);
        $candidateDetails = User::with('candidatePersonalDetails')->find($acceptRescheduleRequest->requested_to);
        $employerDetails = User::with('employerDetails')->find($acceptRescheduleRequest->requested_from);
        $jobDetails = EmployerJob::find($acceptRescheduleRequest->employer_job_id);
        $acceptRescheduleRequest->status = 3;
        $acceptRescheduleRequest->reschedule_status = 0;
        if($acceptRescheduleRequest->save())
        {
            Notification::route('mail',  $employerDetails->email ?? '')->notify(new InterviewRescheduleNotification($candidateDetails,$employerDetails,$jobDetails,$type=2));
            toastr()->success('Interview Marked as  Conducted');
            return redirect()->back();
        } 

    }
    
}
