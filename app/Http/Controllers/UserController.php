<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use App\Models\EmployerJob;
use App\Models\EmployerDetails;
use App\Models\SavedCandidate;
use Illuminate\Support\Facades\Auth;
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
        $candidates = User::role('candidate')->with('candidatePreferences','candidatePersonalDetails','candidatePersonalDetails.getNationality','candidatePersonalDetails.getPassport')->get();
        return view('candidates-marketplace',compact('candidates'));
    }

    public function getEmployerAccountSettingpage()
    {
        return view('employer.employer-dashboard-settings');
    }

    public function jobDetails($id)
    {
        $jobId = Crypt::decryptString($id);
        $jobDetails = EmployerJob::with('employerDetails')->find($jobId);
        return view('job-details',compact('jobDetails'));
    }
    // public function employerjobListing()
    // {
    //     return view('employer-job-Listing');
    // }

    public function candidateProfileNew($id)
    {
        $candidateId = Crypt::decryptString($id);
        $candidateDetails = User::role('candidate')->with('candidatePreferences','candidateEducation','candidatePersonalDetails','candidatePersonalDetails.getNationality','candidatePersonalDetails.getPassport')->find($candidateId);
        return view('candidate-profile-new',compact('candidateDetails'));
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

    public function companyAboutUs($id)
    {
        $id = Crypt::decryptString($id);
        $employerDetails = EmployerDetails::with('employerCountry')->find($id);
        return view('company-about-us',compact('employerDetails'));
    }
    public function companyFacilities($id)
    {
        $id = Crypt::decryptString($id);
        $employerDetails = EmployerDetails::with('employerCountry')->find($id);
        return view('company-facilities',compact('employerDetails'));
    }
    public function companyStaff($id)
    {
        $id = Crypt::decryptString($id);
        $employerDetails = EmployerDetails::with('employerCountry')->find($id);
        return view('company-staff',compact('employerDetails'));
    }
    public function companyPrograms($id)
    {
        $id = Crypt::decryptString($id);
        $employerDetails = EmployerDetails::with('employerCountry')->find($id);
        return view('company-programs',compact('employerDetails'));
    }
    public function companyReviews($id)
    {
        $id = Crypt::decryptString($id);
        $employerDetails = EmployerDetails::with('employerCountry')->find($id);
        return view('company-reviews',compact('employerDetails'));
    }
    public function companyGallery($id)
    {
        $id = Crypt::decryptString($id);
        $employerDetails = EmployerDetails::with('employerCountry')->find($id);
        return view('company-gallery',compact('employerDetails'));
    }
    public function companyLocation($id)
    {
        $id = Crypt::decryptString($id);
        $employerDetails = EmployerDetails::with('employerCountry')->find($id);
        return view('company-location',compact('employerDetails'));
    }
    public function companyStaffInfo($id)
    {
        $id = Crypt::decryptString($id);
        $employerDetails = EmployerDetails::with('employerCountry')->find($id);
        return view('company-staff-information',compact('employerDetails'));
    }
    
    public function saveCandidate()
    {
        if(isset($_POST['candidate_id'])){
            $candidate_id = base64_decode($_POST['candidate_id']);
                 $saved_already = SavedCandidate::where('user_id', Auth::id())->where('candidate_id', $candidate_id)->get();
                 if($saved_already->count() > 0){
                    if(SavedCandidate::where('user_id', Auth::id())->where('candidate_id', $candidate_id)->delete()){
                        $response = array("status"=>"removed","message"=>"Canidate removed");
                    }else{
                        $response = array("status"=>"error");
                    }
                    
                 }else{
                    // add into saved_jobs table
                    $add = new SavedCandidate;
                    $add->candidate_id = $candidate_id;
                    $add->user_id = Auth::id();
                    if($add->save()){
                        $response = array("status"=>"added","message"=>"Canidate Saved");
                    }else{
                        $response = array("status"=>"error");
                    }
                 }
                 echo json_encode($response); die;
        }
    }
}
