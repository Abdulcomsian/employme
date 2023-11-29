<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Countries;
use App\Models\EmployerDetails;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use App\Models\Plan;
use App\Models\User;
use App\Models\SubscriptionItem;
use App\Models\Subscription;
use App\Models\EmployerJob;
use App\Models\SavedCandidate;
use Illuminate\Support\Carbon;
class EmployerController extends Controller
{

    public function getEmployerDashboard()
    {
        return view('employer.dashboard');
    }
    public function getEmployerProfilePage()
    {

       $plans = Plan::get();
        $countries = Countries::all();
        $intent = auth()->user()->createSetupIntent();
        $employerDetails = EmployerDetails::where('user_id',Auth::id())->first();
        return view('employer.employer-profile',compact('countries','employerDetails','plans','intent'));
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
        $userSubscription = User::find(Auth::id())->subscriptions('default')->first();
        
        $renewalTimestamp=null;
        $planDetails=null;
        // dd("Subscription renews on ". $formattedDate);
        if($userSubscription)
        {
            $planDetails =\App\Models\Plan::where('stripe_plan',$userSubscription->stripe_price)->first();
                $userSubscription->plan = $planDetails;
                $userSubscription->renewal_date =  $formattedDate;

                // Get the renewal timestamp from the Stripe subscription
                $renewalTimestamp = $stripeSubscription->current_period_end;
                $stripeSubscription = $userSubscription->asStripeSubscription();
                // Convert the timestamp to a Carbon instance
                $carbonDate = Carbon::createFromTimestamp($renewalTimestamp);
                // Format the Carbon instance as a string (e.g., 'Y-m-d H:i:s')
                $formattedDate = $carbonDate->format('d M, Y');
        }
        return view('employer.employer-dashboard-subscription-plan',compact('userSubscription'));
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
        $updateDetails = EmployerDetails::where('user_id',Auth::id())->first();
        $imagename = $updateDetails->legal_disputes_confirmation_document;
        if ($request->file('legal_disputes_confirmation_document')) {
            $file = $request->file('legal_disputes_confirmation_document');
            $filePath = employerConfirmationDocumentPath();
            $imagename = saveFile($filePath, $file, $updateDetails->legal_disputes_confirmation_document);
        }
        $input = $request->except('_token','legal_disputes_confirmation_document');
        $updateDetails = EmployerDetails::where('user_id',Auth::id());
        $updateDetails->update(array_merge($input,['legal_disputes_confirmation_document'=>$imagename]));
        return response()->json([
                        "status" => true, 
                        "message" => url("Employer Details Updated Successfully")
                    ]);
    }
    public function saveProfile5(Request $request)
    {
        $input = $request->except('_token');
        $updateDetails = EmployerDetails::where('user_id',Auth::id());
        $updateDetails->update($input);
        return response()->json([
                        "status" => true, 
                        "message" => url("Employer Details Updated Successfully")
                    ]);
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
    
}
