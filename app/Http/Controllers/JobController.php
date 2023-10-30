<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\EmployerJob;
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

}
