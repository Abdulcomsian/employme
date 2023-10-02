<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function getCandidateMessagePage(){
        return view('candidate.message');
    }
    public function getEmployerMessage(){
        return view('employer.employer-dashboard-message');
    }
}
