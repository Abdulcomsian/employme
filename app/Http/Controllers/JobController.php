<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\{ EmployerJob, EmployerDetails, CandidatePersonalDetails, User, JobCategory, JobApplication, JobInterview };
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Notification;
use App\Notifications\JobApplicationNotification;
use App\Models\SavedJob;
use Carbon\Carbon;
class JobController extends Controller
{

    public function jobMarketplace(Request $request){
        $allJobs = EmployerJob::where('job_status',1)
                                ->whereHas('employerInfo' , function($query){
                                    $query->whereHas('license', function($query){
                                        $query->where('approval_status' , \App\Http\AppConst::LICENSE_APPROVED);
                                    });
                                })
                                ->with('employerDetails');
        $jobCategories = JobCategory::all();
       
        if(auth()->check())
        {
            $allJobs->with(['interview' => function($query){
                $query->where('requested_from' , auth()->user()->id);
            }])->with(['applications' => function($query){
                $query->where('candidate_id' , auth()->user()->id);
            }]);
        }

        if(isset($request->SearchJobTitle) && $request->SearchJobTitle !='')
        {
            $allJobs = $allJobs->where('job_title','like','%'.$request->SearchJobTitle.'%');
        }
        if(isset($request->SearchJobCategory) && $request->SearchJobCategory !='')
        {
            $allJobs = $allJobs->where('job_category_id', $request->SearchJobCategory);
        }
        if(isset($request->SearchLocation) && $request->SearchLocation !='')
        {
            $allJobs = $allJobs->where('city_town','like','%'.$request->SearchLocation.'%');
        }

         /* Search Job on Type Based */
         $jobTypes = [];
        //  if(isset($request->SearchFixedPriceJob) && $request->SearchFixedPriceJob !='') {
        //      $jobTypes[] = $request->SearchFixedPriceJob;
        //  }
         if(isset($request->SearchFullTimeJob) && $request->SearchFullTimeJob !='') {
             $jobTypes[] = $request->SearchFullTimeJob;
         }
         if(isset($request->SearchPartTimeJob) && $request->SearchPartTimeJob !='') {
             $jobTypes[] = $request->SearchPartTimeJob;
         }
         if(isset($request->SearchFixedTermContract) && $request->SearchFixedTermContract !='') {
             $jobTypes[] = $request->SearchFixedTermContract;
         }
      
        if (!empty($jobTypes)) {
            $allJobs = $allJobs->whereIn('job_type', $jobTypes);
        }

        /* Search Job on Accomodation Based */
        if(isset($request->SearchHousingIncluded) && $request->SearchHousingIncluded !='')
        {
            $allJobs = $allJobs->where('housing_included',$request->SearchHousingIncluded);
        }

        /* Search Job on insurance Based */
        if(isset($request->SearchInsuranceIncluded) && $request->SearchInsuranceIncluded !='')
        {
            $allJobs = $allJobs->where('Insurance_included',$request->SearchInsuranceIncluded);
        }

        /* Search Jobs on Fresher, Intermediate, Intership, No Experience and Expert Based */
        $jobExperiences = [];
         if(isset($request->Search0To1Year) && $request->Search0To1Year !='') {
             $jobExperiences[] = $request->Search0To1Year;
         }
         if(isset($request->Search1To3Years) && $request->Search1To3Years !='') {
             $jobExperiences[] = $request->Search1To3Years;
         }
         if(isset($request->Search3To5Years) && $request->Search3To5Years !='') {
             $jobExperiences[] = $request->Search3To5Years;
         }
         if(isset($request->Search5To7Years) && $request->Search5To7Years !='') {
             $jobExperiences[] = $request->Search5To7Years;
         }
         if(isset($request->Search7To10Years) && $request->Search7To10Years !='') {
            $jobExperiences[] = $request->Search7To10Years;
            }
        if(isset($request->Search10PlusYears) && $request->Search10PlusYears !='') {
            $jobExperiences[] = $request->Search10PlusYears;
            }
        if (!empty($jobExperiences))
        {
            $allJobs = $allJobs->whereIn('experience_level',$jobExperiences);
        }
   
         
        /* Search Jobs on Salary Range Based */
        if(isset($request->SearchRangeMin) && $request->SearchRangeMin !='')
        {
            $allJobs = $allJobs->where('monthly_salary', '>=',$request->SearchRangeMin);
        }
        if(isset($request->SearchRangeMax) && $request->SearchRangeMax !='')
        {
            $allJobs = $allJobs->where('monthly_salary', '<=', $request->SearchRangeMax);
        }
        
        $allJobs = $allJobs->paginate(10);
        return view('jobs-marketplace',compact('allJobs','jobCategories'));
    }

    public function getJobAlertPage(){
        return view('candidate.job-alert');
    }

    public function getSaveJobsPage(){
        return view('candidate.save-job');
    }

    public function getJobListing(){
        return view('employer.job-listing');
    }

    public function getInterviewpage(){
        $dt = Carbon::now();
        $dt2 = $dt->copy()->subWeek(); 
        $allInterviews = JobInterview::with('jobDetails','jobCandidate.candidatePersonalDetails' , 'requestFrom' , 'requestTo')
                                        ->where(function($query){
                                            $query->where('requested_from',Auth::id())
                                                  ->orWhere('requested_to' , Auth::id());
                                        })
                                        ->latest()
                                        ->paginate(10);
        // $latestInterviews = JobInterview::with('jobDetails','jobCandidate.candidatePersonalDetails')->where('requested_from',Auth::id())
        // ->where('created_at', '>=', $dt2->copy()->startOfDay())
        // ->where('created_at', '<=', $dt->copy()->endOfDay())
        // ->paginate(10);

        $latestInterviews = JobInterview::with('jobDetails','jobCandidate.candidatePersonalDetails' , 'requestFrom' , 'requestTo')
                                        ->where( function($query){
                                            $query->where('requested_from',Auth::id())
                                                ->orWhere('requested_to' , Auth::id());
                                        })
                                        ->where('created_at', '>=', $dt2->copy()->startOfDay())
                                        ->where('created_at', '<=', $dt->copy()->endOfDay())
                                        ->latest()
                                        ->paginate(10);
                      
        return view('employer.employer-interview-request',compact('allInterviews','latestInterviews'));
    }


    public function jobInterviewRequest(Request $request)
    {
       
        // $checkExistingApplication = JobApplication::where('candidate_id',Auth::id())->where('employer_job_id',$request->job_id)->first();
        // exiting request interview
        $jobEmployerDetail = EmployerJob::find($request->job_id);
        $candidateProfileUrl = route('candidateProfileNew' , \Crypt::encryptString(auth()->user()->id));
        $jobLink = route('jobDetails' , \Crypt::encryptString($request->job_id));
        $existingInterviewRequest = JobInterview::where([
                                                            'employer_job_id' => $request->job_id,
                                                            'requested_to' => $jobEmployerDetail->posted_by,
                                                            'requested_from' => auth()->user()->id,
                                                        ])->count();
            
        if($existingInterviewRequest){
            return response()->json(['status' => false , 'errors' => 'You have already requested an interview for the job']);
        }


        JobInterview::create([
                    'job_link' => $jobLink,
                    'requested_to'=>$jobEmployerDetail->posted_by,
                    'requested_from'=> auth()->user()->id,
                    'interview_date'=>$request->interview_date,
                    'interview_time'=>$request->interview_time,
                    'meeting_media'=>$request->meeting_media,
                    'status' => 0,
                    'employer_job_id'=>$request->job_id,
                    'candidate_profile_url' => $candidateProfileUrl
        ]);


        $subject = 'Job Application';
        $text = '';
        $employer_notify_message = [
            'greeting' => 'Job Appication Alert',
            'subject' => $subject,
            'body' => [
                'text' => $text,
                'links' =>  '',
                'candidate_full_name'=>auth()->user()->full_name,
                'candidate_email'=>auth()->user()->email,
                'job_title'=>$jobEmployerDetail->job_title,
                'city_town'=>$jobEmployerDetail->city_town,
            ],
            'thanks_text' => 'Thanks For Using our site',
            'action_text' => '',
            'action_url' => '',
        ];


        Notification::route('mail',  $jobEmployerDetail->email ?? '')->notify(new JobApplicationNotification($employer_notify_message));
        toastr()->success('Interview has been requested from employer ');
        // return redirect()->back();
        return response()->json([
            "status" => true, 
            "redirect" => url("job-details/". \Crypt::encryptString($request->job_id))
        ]);


        

        // if($checkExistingApplication)
        // {
            // toastr()->info('You have already Applied for this Job');
            // return redirect()->back();
        //     return response()->json([
        //         "status" => false,
        //         "errors" => ["You Already Applied for this Job"]
        //     ]);
          
        // }
        // else
        // {
        //     if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('employer'))
        //     {
        //         return response()->json([
        //             "status" => false,
        //             "errors" => ["Only Candidate can Apply for Job"]
        //         ]);
        //     }else{

                // JobInterview::create([
                //     'job_link' => $request->job_link,
                //     'requested_to'=>$request->candidate_id,
                //     'requested_from'=>Auth::id(),
                //     'interview_date'=>$request->interview_date,
                //     'interview_time'=>$request->interview_time,
                //     'meeting_media'=>$request->meeting_media,
                //     'status'=>0,
                //     'employer_job_id'=>$jobId
        
                // ]);

                // $jobDetails = EmployerJob::find($request->job_id);
                // $applyForJob = JobApplication::create([
                //     'candidate_id'=>Auth::id(),
                //     'employer_id'=>$jobDetails->posted_by,
                //     'employer_job_id'=>$request->job_id,
                //     'application_status'=>0,
                //     'application_date'=>$request->application_date
                // ]);
                // $jobDetails = EmployerJob::find($request->job_id);
                // $candidateDetails = CandidatePersonalDetails::where('user_id',Auth::id())->first();
                // $employerDetails = User::find($jobDetails->posted_by);
                // // JobInterview::create(['requested_from' =>  $jobDetails->posted_by , 'requested_to' =>auth()->user()->id , 'employer_job_id' => $request->job_id  , 'interview_date' => $request->application_date]);
                // $subject = 'Job Application';
                // $text = '';
                // $employer_notify_message = [
                //     'greeting' => 'Job Appication Alert',
                //     'subject' => $subject,
                //     'body' => [
                //         'text' => $text,
                //         'links' =>  '',
                //         'candidate_full_name'=>$candidateDetails->full_name,
                //         'candidate_email'=>auth()->user()->email,
                //         'job_title'=>$jobDetails->job_title,
                //         'city_town'=>$jobDetails->city_town,
                //     ],
                //     'thanks_text' => 'Thanks For Using our site',
                //     'action_text' => '',
                //     'action_url' => '',
                // ];
                // Notification::route('mail',  $employerDetails->email ?? '')->notify(new JobApplicationNotification($employer_notify_message));
                // toastr()->success('You have successfully Applied for this Job');
                // // return redirect()->back();
                // return response()->json([
                //     "status" => true, 
                //     "redirect" => url("job-details/". \Crypt::encryptString($request->job_id))
                // ]);

            //}
        // }
 
    }

    public function saveJob()
    {
        if(isset($_POST['job_id'])){
            $job_id = base64_decode($_POST['job_id']);
                 $saved_already = SavedJob::where('user_id', Auth::id())->where('employer_job_id', $job_id)->get();
                 if($saved_already->count() > 0){
                    if(SavedJob::where('user_id', Auth::id())->where('employer_job_id', $job_id)->delete()){
                        $response = array("status"=>"removed","message"=>"Job removed");
                    }else{
                        $response = array("status"=>"error");
                    }
                    
                 }else{
                    // add into saved_jobs table
                    $add = new SavedJob;
                    $add->employer_job_id = $job_id;
                    $add->user_id = Auth::id();
                    if($add->save()){
                        $response = array("status"=>"added","message"=>"Job Saved");
                    }else{
                        $response = array("status"=>"error");
                    }
                 }
                 echo json_encode($response); die;
        }
    }

    public function activateJob($id){
        $activatateJob = EmployerJob::find($id);
        $activatateJob->job_status = 1;
        if($activatateJob->save())
        {
            toastr('Job Activated Successfully');
            return redirect()->back();
        }
    }
    public function deactivateJob($id){
        $deactivateJob = EmployerJob::find($id);
        $deactivateJob->job_status = 0;
        if($deactivateJob->save())
        {
            toastr('Job Deactivated Successfully');
            return redirect()->back();
        }
    }

}
