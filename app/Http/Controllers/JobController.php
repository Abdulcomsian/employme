<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\EmployerJob;
class JobController extends Controller
{
    public function jobMarketplace(){
        $allJobs = EmployerJob::all();
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

}
