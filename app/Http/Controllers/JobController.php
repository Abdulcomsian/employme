<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\EmployerJob;
use App\Models\EmployerDetails;
use App\Models\CandidatePersonalDetails;
use App\Models\User;
use App\Models\JobApplication;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Notification;
use App\Notifications\JobApplicationNotification;
use App\Models\SavedJob;
class JobController extends Controller
{
    public function jobMarketplace(Request $request){
        $allJobs = EmployerJob::with('employerDetails');
        if(isset($request->SearchLocation) && $request->SearchLocation !='')
        {
            $allJobs = $allJobs->where('city_town',$request->SearchLocation);
        }
        if(isset($request->SearchJobType) && $request->SearchJobType !='')
        {
            $allJobs = $allJobs->where('job_type',$request->SearchJobType);
        }
        if(isset($request->SearchHousingIncluded) && $request->SearchHousingIncluded !='')
        {
            $allJobs = $allJobs->where('housing_included',$request->SearchHousingIncluded);
        }
        if(isset($request->SearchHousingIncluded) && $request->SearchHousingIncluded !='')
        {
            $allJobs = $allJobs->where('housing_included',$request->SearchHousingIncluded);
        }
        if(isset($request->SearchInsuranceIncluded) && $request->SearchInsuranceIncluded !='')
        {
            $allJobs = $allJobs->where('Insurance_included',$request->SearchInsuranceIncluded);
        }
        if(isset($request->SearchExperience) && $request->SearchExperience !='')
        {
            $allJobs = $allJobs->where('experience',$request->SearchExperience);
        }
        if(isset($request->SearchRangeMin) && $request->SearchRangeMin !='0')
        {
            $allJobs = $allJobs->where('monthly_salary', '>',$request->SearchRangeMin);
        }
        if(isset($request->SearchRangeMax) && $request->SearchRangeMax !='0')
        {
            $allJobs = $allJobs->where('monthly_salary', '<', $request->SearchRangeMax);
        }
        if(isset($request->SearchHousingIncluded) && $request->SearchHousingIncluded !='')
        {
            $allJobs = $allJobs->where('housing_details',$request->SearchHousingIncluded);
        }
        if(isset($request->SearchInsuranceIncluded) && $request->SearchInsuranceIncluded !='')
        {
            $allJobs = $allJobs->where('health_dental_insurance',$request->SearchInsuranceIncluded);
        }
        if(isset($request->SearchExperience1) && $request->SearchExperience1 !='')
        {
            $allJobs = $allJobs->where('experience_level',$request->SearchExperience1);
        }
        if(isset($request->SearchExperience2) && $request->SearchExperience2 !='')
        {
            $allJobs = $allJobs->where('experience_level',$request->SearchExperience2);
        }
        if(isset($request->SearchExperience3) && $request->SearchExperience3 !='')
        {
            $allJobs = $allJobs->where('experience_level',$request->SearchExperience3);
        }
        if(isset($request->SearchExperience4) && $request->SearchExperience4 !='')
        {
            $allJobs = $allJobs->where('experience_level',$request->SearchExperience4);
        }
        if(isset($request->SearchExperience5) && $request->SearchExperience5 !='')
        {
            $allJobs = $allJobs->where('experience_level',$request->SearchExperience5);
        }
        

        $allJobs = $allJobs->paginate(2);
        return view('jobs-marketplace',compact('allJobs'));
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
        return view('employer.employer-interview-request');
    }

    public function SearchjobMarketplace(Request $request)
    {
        dd('shakir');
    }

    public function jobApplicationRequest(Request $request)
    {
       $validator = Validator::make($request->all(), [
        'cover_letter' => 'required',
    ]);
    if ($validator->fails()){
        return response()->json([
                "status" => false,
                "errors" => $validator->errors()
            ]);
    }
        $checkExistingApplication = JobApplication::where('candidate_id',Auth::id())->where('employer_job_id',$request->job_id)->first();
        if($checkExistingApplication)
        {
            // toastr()->info('You have already Applied for this Job');
            // return redirect()->back();
            return response()->json([
                "status" => false,
                "errors" => ["You Already Applied for this Job"]
            ]);
          
        }
        else
        {
            if(auth()->user()->hasRole('admin'))
            {
                return response()->json([
                    "status" => false,
                    "errors" => ["Only Candidate can Apply for Job"]
                ]);
            }
            elseif(auth()->user()->hasRole('employer')){
                return response()->json([
                    "status" => false,
                    "errors" => ["Only Candidate can Apply for Job"]
                ]);
            }else{
                $applyForJob = JobApplication::create([
                    'candidate_id'=>Auth::id(),
                    'employer_job_id'=>$request->job_id,
                    'cover_letter'=>$request->cover_letter,
                    'application_status'=>0,
                    'application_date'=>date('ymdhis')
                ]);
                $jobDetails = EmployerJob::find($request->job_id);
                $candidateDetails = CandidatePersonalDetails::where('user_id',Auth::id())->first();
                $employerDetails = User::find($jobDetails->posted_by);
                $subject = 'Job Application';
                $text = '';
                $employer_notify_message = [
                    'greeting' => 'Job Appication Alert',
                    'subject' => $subject,
                    'body' => [
                        'text' => $text,
                        'links' =>  '',
                        'candidate_full_name'=>$candidateDetails->full_name,
                        'candidate_email'=>auth()->user()->email,
                        'job_title'=>$jobDetails->job_title,
                        'city_town'=>$jobDetails->city_town,
                    ],
                    'thanks_text' => 'Thanks For Using our site',
                    'action_text' => '',
                    'action_url' => '',
                ];
                Notification::route('mail',  $employerDetails->email ?? '')->notify(new JobApplicationNotification($employer_notify_message));
                toastr()->success('You have successfully Applied for this Job');
                // return redirect()->back();
                return response()->json([
                    "status" => true, 
                    "redirect" => url("job-details/". \Crypt::encryptString($request->job_id))
                ]);

            }
        }
 
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

}
