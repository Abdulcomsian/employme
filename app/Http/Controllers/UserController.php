<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use App\Models\EmployerJob;
use App\Models\EmployerDetails;
use App\Models\SavedCandidate;
use Illuminate\Support\Facades\Auth;
use File;
use Response;
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

    public function candidatesMarketplace(Request $request)
    {
        // dd($request->all());
        $candidates = User::role('candidate')->with('candidatePreferences','candidateEducation','candidatePersonalDetails','candidatePersonalDetails.getNationality','candidatePersonalDetails.getPassport');

        //Search Candidate on  Location Based
        if(isset($request->SearchCandidateLocation) && $request->SearchCandidateLocation !='')
        {
            $candidates = $candidates->whereHas('candidatePersonalDetails',function (Builder $query) use ($request){
                $query->where('current_location',$request->SearchCandidateLocation);
            });
        }

        //Search Candidate on  Minimum Salary Based
        if(isset($request->SearchCanidateMinSalary) && $request->SearchCanidateMinSalary !='')
        {
            $candidates = $candidates->whereHas('candidatePreferences',function (Builder $query) use ($request){
                $query->where('minimum_salary','<=',$request->SearchCanidateMinSalary);
            });
        }

        //Search Candidate on  Maixmum Salary Based
        if(isset($request->SearchCanidateMaxSalary) && $request->SearchCanidateMaxSalary !='')
        {
            $candidates = $candidates->whereHas('candidatePreferences',function (Builder $query) use ($request){
                $query->where('maximum_salary','>=',$request->SearchCanidateMaxSalary);
            });      
         }

          //Search Fresh Candidate
        if(isset($request->SearchFresher) && $request->SearchFresher !='')
        {
            $candidates = $candidates->whereHas('candidatePreferences',function (Builder $query) use ($request){
                $query->where('experience_level',$request->SearchFresher);
            });      
         }

        //Search Candidate on  Intermediate Experience Based
        if(isset($request->SearchIntermediateExperience) && $request->SearchIntermediateExperience !='')
        {
            $candidates = $candidates->whereHas('candidatePreferences',function (Builder $query) use ($request){
                $query->where('experience_level',$request->SearchIntermediateExperience);
            });      
         }

          //Search Candidate with No Experience
          if(isset($request->SearchNoExperience) && $request->SearchNoExperience !='')
        {
            $candidates = $candidates->whereHas('candidatePreferences',function (Builder $query) use ($request){
                $query->where('experience_level',$request->SearchNoExperience);
            });      
         }

          //Search Candidate on  Intership Experience Based
          if(isset($request->SearcInternship) && $request->SearcInternship !='')
        {
            $candidates = $candidates->whereHas('candidatePreferences',function (Builder $query) use ($request){
                $query->where('experience_level',$request->SearcInternship);
            });      
         }

          //Search Candidate on  Expert Experience Based
          if(isset($request->SearchExpert) && $request->SearchExpert !='')
        {
            $candidates = $candidates->whereHas('candidatePreferences',function (Builder $query) use ($request){
                $query->where('experience_level',$request->SearchExpert);
            });      
         }

        //Search Canidate on No Visa Based
        if(isset($request->SearchNoVisa) && $request->SearchNoVisa !='')
        {
            $candidates = $candidates->whereHas('candidatePersonalDetails',function (Builder $query) use ($request){
                $query->where('current_visa_status',$request->SearchNoVisa);
            });         
        }

        //Search Canidate on Student Visa Based
        if(isset($request->SearchStudentVisa) && $request->SearchStudentVisa !='')
        {
            $candidates = $candidates->whereHas('candidatePersonalDetails',function (Builder $query) use ($request){
                $query->where('current_visa_status',$request->SearchStudentVisa);
            });         
        }

        //Search Canidate on Tourist Visa Based
        if(isset($request->SearchTouristVisa) && $request->SearchTouristVisa !='')
        {
            $candidates = $candidates->whereHas('candidatePersonalDetails',function (Builder $query) use ($request){
                $query->where('current_visa_status',$request->SearchTouristVisa);
            });          
        }

        //Search Canidate on E2 Teaching Visa Based
        if(isset($request->SearchE2TeachingVisa) && $request->SearchE2TeachingVisa !='')
        {
            $candidates = $candidates->whereHas('candidatePersonalDetails',function (Builder $query) use ($request){
                $query->where('current_visa_status',$request->SearchE2TeachingVisa);
            });         
        }
        
        //Search Canidate on Male Gender Based
         if(isset($request->SearchMaleGender) && $request->SearchMaleGender !='')
         {
             $candidates = $candidates->whereHas('candidatePersonalDetails',function (Builder $query) use ($request){
                $query->where('gender',$request->SearchMaleGender);
            }); 
         }

         //Search Canidate on Female Gender Based
         if(isset($request->SearchFemaleGender) && $request->SearchFemaleGender !='')
         {
            $candidates = $candidates->whereHas('candidatePersonalDetails',function (Builder $query) use ($request){
                $query->where('gender',$request->SearchFemaleGender);
            }); 
        }

        //Search Canidate on Bachelor Degree Based
        if(isset($request->SearchBachelorQualification) && $request->SearchBachelorQualification !='')
        {
            $candidates = $candidates->whereHas('candidateEducation',function (Builder $query) use ($request){
                $query->where('highest_degree',$request->SearchBachelorQualification);
            }); 
        }

        //Search Canidate on Master Degree Based
        if(isset($request->SearchMasterQualification) && $request->SearchMasterQualification !='')
        {
            $candidates = $candidates->whereHas('candidateEducation',function (Builder $query) use ($request){
                $query->where('highest_degree',$request->SearchMasterQualification);
            }); 
                
        }

        //Search Canidate on Doctorate Degree Based
        if(isset($request->SearchDoctorateQualification) && $request->SearchDoctorateQualification !='')
        {
            $candidates = $candidates->whereHas('candidateEducation',function (Builder $query) use ($request){
                $query->where('highest_degree',$request->SearchDoctorateQualification);
            });         
        }

        $candidates = $candidates->paginate(2);

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

    public function downloadResume()
    {
        if (isset($_POST['candidate_id'])) {
            $candidate_id = base64_decode($_POST['candidate_id']);
            $candidateDetails = User::with('candidatePersonalDetails')->find($candidate_id);
            $filepath = public_path($candidateDetails->candidatePersonalDetails->candidate_resume);
            $filename = $candidateDetails->candidatePersonalDetails->full_name;
            // Get the original file name without the extension
            $originalFileName = pathinfo($filepath, PATHINFO_FILENAME);
            // Sanitize the name by replacing special characters with hyphens
            $filename = preg_replace('/[^A-Za-z0-9\-]/', '-', $filename);
            // Specify the desired file name and extension
            $filename = $filename . '.' . pathinfo($filepath, PATHINFO_EXTENSION);
            if(\Auth::check())
            {
               if(auth()->user()->hasRole('employer'))
               {
                 return response()->download($filepath,$filename);
               }
               else{
                 toastr()->warning('Only Employer Can Download Resume');
                 return redirect()->back();
               }
            }
            else{
                toastr()->warning('You are not Logged In, Please Login');
                return redirect()->back();
              }
        }
    }
}
