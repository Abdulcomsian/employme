<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    
    public function candidateProfile(){
        return view('candidate-profile');
    }

    public function company(){
        return view('company');
    }

    public function getAccountSettingsPage(){
        return view('candidate.account-settings');
    }

    public function candidatesMarketplace(){
        return view('candidates-marketplace');
    }
    public function jobListing(){
        return view('job-listing');
    }
    
}
