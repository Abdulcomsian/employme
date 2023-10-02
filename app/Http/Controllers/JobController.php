<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JobController extends Controller
{
    public function jobMarketplace(){
        return view('jobs-marketplace');
    }

    public function getJobAlertPage(){
        return view('candidate.job-alert');
    }

    public function getSaveJobsPage(){
        return view('candidate.save-job');
    }

    public function getJobpage(){
        return view('employer.job-listing');
    }

    public function getInterviewpage(){
        return view('employer.employer-interview-request');
    }

}
