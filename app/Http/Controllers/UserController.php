<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Crypt;
use App\Models\{User, EmployerJob, EmployerDetails, CandidatePersonalDetails,
     SavedCandidate, JobCategory, Staff, Gallery, BusinessOperation };
use Illuminate\Support\Facades\Auth;
use File;
use Response;
use Illuminate\Validation\Rule;
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
        $candidateDetails = CandidatePersonalDetails::where('user_id',Auth::id())->first();
        return view('candidate.account-settings',compact('candidateDetails'));
    }
   public function updateCandidateAccountSettingpage(Request $request)
   {
    $request->validate([
        'email' => [
            'required',
            'email',
            Rule::unique('users')->ignore(Auth::id()),
        ],
        'password' => 'nullable|min:8', // Allow nullable for password field
    ]);
    $user = User::find(Auth::id());

    // Update email
    $user->update([
        'email' => $request->email,
    ]);
    
    // Update password only if it's not empty
    if (!empty($request->password)) {
        $user->update([
            'password' => $request->password,
        ]);
    }
    
    // Update EmployerDetails
    CandidatePersonalDetails::where('user_id', Auth::id())->update([
        'full_name' => $request->full_name,
    ]);
    
    return redirect()->back()->with('status','Account Settings Updated Successfully');
   }
    public function candidatesMarketplace(Request $request)
    {
        // dd($request->all());
        $candidates = User::where('account_status',1)->role('candidate')->with('candidatePreferences','candidateEducation','candidatePersonalDetails','candidatePersonalDetails.getNationality','candidatePersonalDetails.getPassport');
        $jobCategories = JobCategory::all();
        //Search Candidate on  Location Based
        if(isset($request->SearchCandidateLocation) && $request->SearchCandidateLocation !='')
        {
            $candidates = $candidates->whereHas('candidatePersonalDetails',function (Builder $query) use ($request){
                $query->where('current_location','like','%'.$request->SearchCandidateLocation.'%');
            });
        }
        if(isset($request->SearchProfileTitle) && $request->SearchProfileTitle !='')
        {
            $candidates = $candidates->whereHas('candidatePersonalDetails',function (Builder $query) use ($request){
                $query->where('full_name','like','%'.$request->SearchProfileTitle.'%');
            });
        }
        if(isset($request->SearchJobCategory) && $request->SearchJobCategory !='')
        {
            $candidates = $candidates->whereHas('candidatePersonalDetails',function (Builder $query) use ($request){
                $query->where('job_category_id',$request->SearchJobCategory);
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

          //Search Job Experience
          $jobExperience = [];

        //Search Fresh Candidate
        if(isset($request->SearchFresher) && $request->SearchFresher !='') 
            $jobExperience[] = $request->SearchFresher;
        //Search Candidate on  Intermediate Experience Based
        if(isset($request->SearchIntermediateExperience) && $request->SearchIntermediateExperience !='')
            $jobExperience[] = $request->SearchIntermediateExperience;

        //Search Candidate with No Experience
        if(isset($request->SearchNoExperience) && $request->SearchNoExperience !='') 
           $jobExperience[] = $request->SearchNoExperience;

        //Search Candidate on  Intership Experience Based
        if(isset($request->SearcInternship) && $request->SearcInternship !='')
            $jobExperience[] = $request->SearcInternship;

        //Search Candidate on  Expert Experience Based
        if(isset($request->SearchExpert) && $request->SearchExpert !='')
            $jobExperience[] = $request->SearcInternship;

        if(!empty($jobExperience))
        {
            $candidates = $candidates->whereHas('candidatePreferences',function (Builder $query) use ($request){
                $query->whereIn('experience_level',$jobExperience);
            });   
        }

        //Searching Candidate with Different Visas Based
        $searchVisas = [];

        //Search Candidate on No Visa Based
        if(isset($request->SearchNoVisa) && $request->SearchNoVisa !='')
            $searchVisas[] = $request->SearchNoVisa;

        //Search Candidate on Student Visa Based
        if(isset($request->SearchStudentVisa) && $request->SearchStudentVisa !='')
            $searchVisas[] = $request->SearchStudentVisa;

        //Search Candidate on Tourist Visa Based
        if(isset($request->SearchTouristVisa) && $request->SearchTouristVisa !='')
            $searchVisas[] = $request->SearchTouristVisa;

        //Search Candidate on E2 Teaching Visa Based
        if(isset($request->SearchE2TeachingVisa) && $request->SearchE2TeachingVisa !='')
            $searchVisas[] = $request->SearchE2TeachingVisa;

        if(!empty($searchVisas))
        {
            $candidates = $candidates->whereHas('candidatePersonalDetails',function (Builder $query) use ($request){
                $query->whereIn('current_visa_status',$searchVisas);
            });         
        }
        
        //Search Candidate on Male Gender Based
        $searchGender=[];
         if(isset($request->SearchMaleGender) && $request->SearchMaleGender !='')
            $searchGender[] = $request->SearchMaleGender;

         //Search Canidate on Female Gender Based
         if(isset($request->SearchFemaleGender) && $request->SearchFemaleGender !='')
            $searchGender[] = $request->SearchFemaleGender;

        if(!empty($searchGender))
         {
            $candidates = $candidates->whereHas('candidatePersonalDetails',function (Builder $query) use ($request){
                $query->whereIn('gender',$searchGender);
            }); 
        }

        //Search Canidate on Bachelor Degree Based
        $searchQualifications = [];
        if(isset($request->SearchBachelorQualification) && $request->SearchBachelorQualification !='')
            $searchQualifications[] = $request->SearchBachelorQualification;

        //Search Canidate on Master Degree Based
        if(isset($request->SearchMasterQualification) && $request->SearchMasterQualification !='')
            $searchQualifications[] = $request->SearchMasterQualification;

        //Search Canidate on Doctorate Degree Based
        if(isset($request->SearchDoctorateQualification) && $request->SearchDoctorateQualification !='')
            $searchQualifications[] = $request->SearchDoctorateQualification;

        if(!empty($searchQualifications))
        {
            $candidates = $candidates->whereHas('candidateEducation',function (Builder $query) use ($request){
                $query->whereIn('highest_degree',$request->SearchDoctorateQualification);
            });         
        }

        $candidates = $candidates->paginate(10);

        return view('candidates-marketplace',compact('candidates','jobCategories'));
    }

    public function getEmployerAccountSettingpage()
    {
        $employerDetails = EmployerDetails::where('user_id',Auth::id())->first();
        return view('employer.employer-dashboard-settings',compact('employerDetails'));
    }
    public function updateEmployerAccountSettingpage(Request $request)
    {
        $request->validate([
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore(Auth::id()),
            ],
        ]);
        $user = User::find(Auth::id());

        // Update email
        $user->update([
            'email' => $request->email,
        ]);
        
      
        
        // Update EmployerDetails
        EmployerDetails::where('user_id', Auth::id())->update([
            'institution' => $request->institution,
            'phone_number' => $request->phone_number,
        ]);
        
        return redirect()->back()->with('status','Account Settings Updated Successfully');
    }
    public function employerUpdatePassword(Request $request)
    {
        $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);
        $user = User::find(Auth::id());

        // Update password only if it's not empty
        if (!empty($request->password)) {
            $user->update([
                'password' => $request->password,
            ]);
        }
        
        return redirect()->back()->with('status','Password Change Successfully');
    }
    public function candidateUpdatePassword(Request $request)
    {
        $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);
        $user = User::find(Auth::id());

        // Update password only if it's not empty
        if (!empty($request->password)) {
            $user->update([
                'password' => $request->password,
            ]);
        }
        
        return redirect()->back()->with('status','Password Change Successfully');
    }
    public function udpateOwnerAccountDetails(Request $request){
        $request->validate([
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore(Auth::id()),
            ],
            'name'=>'required'
        ]);
        $user = User::find(Auth::id());
        $imagename = $user->avatar;
        if ($request->file('avatar')) {
            $file = $request->file('avatar');
            $filePath = employerInstitutionLogoPath();
            $imagename = saveFile($filePath, $file, $user->avatar);
        }
        // Update email
        $user->update([
            'email' => $request->email,
            'avatar' => $imagename,
            'phone_number' => $request->phone_number,
        ]);
        
        
        return redirect()->back()->with('status','Account Settings Updated Successfully');
    } 
    public function ownerUpdatePassword(Request $request){
        $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);
        $user = User::find(Auth::id());

        // Update password only if it's not empty
        if (!empty($request->password)) {
            $user->update([
                'password' => $request->password,
            ]);
        }
        
        return redirect()->back()->with('status','Password Change Successfully');
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
        $employerDetails = EmployerDetails::with('employerCountry')->where('user_id',$id)->first();
        return view('company-about-us',compact('employerDetails'));
    }
    public function companyBusinessOperation($id)
    {
        $id = Crypt::decryptString($id);
        $employerDetails = EmployerDetails::with('employerCountry')->where('user_id',$id)->first();
        $businessOperationDetails  = BusinessOperation::where('employer_id',$id)->first();
        return view('company-business-operation',compact('employerDetails','businessOperationDetails'));
    }
    public function companyHousings($id)
    {
        $id = Crypt::decryptString($id);
        $employerDetails = EmployerDetails::with('employerCountry')->where('user_id',$id)->first();
        $companyHousingsImages = Gallery::where('employer_id',$id)->get();
        return view('company-housings',compact('employerDetails','companyHousingsImages'));
    }
    public function companyJobs($id)
    {
        $id = Crypt::decryptString($id);
        $employerDetails = EmployerDetails::with('employerCountry')->where('user_id',$id)->first();
        $allJobs = EmployerJob::with('employerDetails')->where('posted_by',$id)->get();
        return view('company-jobs',compact('employerDetails','allJobs'));
    }
    public function companyFacilities($id)
    {
        $id = Crypt::decryptString($id);
        $employerDetails = EmployerDetails::with('employerCountry')->where('user_id',$id)->first();
        
        return view('company-facilities',compact('employerDetails'));
    }
    public function companyStaff($id)
    {
        $id = Crypt::decryptString($id);
        $employerDetails = EmployerDetails::with('employerCountry')->where('user_id',$id)->first();
        $employerStaff = Staff::where('employer_id',$id)->get();
        return view('company-staff',compact('employerDetails','employerStaff'));
    }
    public function companyPrograms($id)
    {
        $id = Crypt::decryptString($id);
        $employerDetails = EmployerDetails::with('employerCountry')->where('user_id',$id)->first();
        return view('company-programs',compact('employerDetails'));
    }
    public function companyReviews($id)
    {
        $id = Crypt::decryptString($id);
        $employerDetails = EmployerDetails::with('employerCountry')->where('user_id',$id)->first();
        return view('company-reviews',compact('employerDetails'));
    }
    public function companyGallery($id)
    {
        $id = Crypt::decryptString($id);
        $employerDetails = EmployerDetails::with('employerCountry')->where('user_id',$id)->first();
        $galleryFiles = Gallery::where('employer_id',$id)->get();
        return view('company-gallery',compact('employerDetails','galleryFiles'));
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
                 if(isset($candidateDetails->candidatePersonalDetails->candidate_resume) && !empty($candidateDetails->candidatePersonalDetails->candidate_resume) && file_exists($filepath))
                 {
                    return response()->download($filepath,$filename);
                 }else
                 {
                    toastr()->error('No Resume Found');
                    return redirect()->back();

                 }
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
    public function candidateDeactivateAccount(){
        $deActivateUser = User::find(Auth::id());
        $deActivateUser->account_status = 0;
        if($deActivateUser->save())
        {
            toastr('You account have deactivated successfully');
            return redirect()->back();
        }
    }
    public function candidateActivateAccount(){
        $activateUser = User::find(Auth::id());
        $activateUser->account_status = 1;
        if($activateUser->save())
        {
            toastr('You account have activated successfully');
            return redirect()->back();
        }
    }
}
