<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployerController extends Controller
{

    public function getDashboardPage()
    {
        return view('employer.dashboard');
    }
    public function getEmployerProfilePage()
    {
        return view('employer.employer-profile');
    }
    public function getEmployerCandidate()
    {
        return view('employer.employer-dashboard-saved-candidate');
    }
    public function getEmployerSubscription()
    {
        return view('employer.employer-dashboard-subscription-plan');
    }

    public function postAJob()
    {
        return view('employer.post-a-job');
    }
    // public function ListYourJob()
    // {
    //     return view('ListYourJob');
    // }
    // public function JobListingCandidate(){
    //     return view('JobListingCandidate');
    // }

}
