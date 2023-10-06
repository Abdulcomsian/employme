<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{

    // public function candidateProfile(){
    //     return view('candidate-profile');
    // }

    // public function company(){
    //     return view('company');
    // }

    public function getAccountSettingsPage()
    {
        return view('candidate.account-settings');
    }

    public function candidatesMarketplace()
    {
        return view('candidates-marketplace');
    }

    public function getEmployerAccountSettingpage()
    {
        return view('employer.employer-dashboard-settings');
    }

    public function jobListing()
    {
        return view('job-Listing');
    }
    public function employerjobListing()
    {
        return view('employer-job-Listing');
    }

    public function candidateProfileNew()
    {
        return view('candidate-profile-new');
    }
    public function candidateProfileDocument()
    {
        return view('candidate-profile-document');
    }
    public function candidateProfileInterview()
    {
        return view('candidate-profile-interview');
    }
    public function candidateProfileAlbum()
    {
        return view('candidate-profile-album');
    }
    public function candidateProfileComment()
    {
        return view('candidate-profile-comment');
    }

    public function companyAboutUs()
    {
        return view('company-about-us');
    }
    public function companyFacilities()
    {
        return view('company-facilities');
    }
    public function companyStaff()
    {
        return view('company-staff');
    }
    public function companyPrograms()
    {
        return view('company-programs');
    }
    public function companyReviews()
    {
        return view('company-reviews');
    }
    public function companyGallery()
    {
        return view('company-gallery');
    }
    public function companyLocation()
    {
        return view('company-location');
    }
    public function companyStaffInfo()
    {
        return view('company-staff-information');
    }
}
