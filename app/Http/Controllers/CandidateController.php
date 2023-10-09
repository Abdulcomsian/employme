<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CandidateController extends Controller
{
    public function getCandidateDashboard()
    {
        return view('candidate.dashboard');
    }

    public function getProfilePage()
    {
        return view('candidate.profile');
    }

    public function getResumePage()
    {
        return view('candidate.resume');
    }
}
