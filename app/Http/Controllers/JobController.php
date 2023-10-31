<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\EmployerJob;
use App\Models\JobApplication;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
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
        

        $allJobs = $allJobs->get();
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
                toastr()->success('You have successfully Applied for this Job');
                // return redirect()->back();
                return response()->json([
                    "status" => true, 
                    "redirect" => url("job-details/". \Crypt::encryptString($request->job_id))
                ]);

            }
        }
 
    }

}
