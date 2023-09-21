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
}
