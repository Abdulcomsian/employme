<?php

namespace App\Http\Controllers;

use App\Events\BusinessLicense;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Crypt;

use App\Models\{User, CandidateDocument, EmployerJob, EmployerDetails, CandidatePersonalDetails,
     SavedCandidate, JobCategory, Staff, Gallery, BusinessOperation, EmployerBusinessLicense, IntroductionVideo, JobApplication, JobInterview, Review, Housing };

use Illuminate\Support\Facades\Auth;
use File;
use Response;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use ZipArchive;
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
        'first_name'=>'required',
        'last_name'=>'required',
        'middle_name'=>'required',
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
    CandidatePersonalDetails::where('user_id', Auth::id())->update([
        'first_name' => $request->first_name,
        'middle_name' => $request->middle_name,
        'last_name' => $request->last_name,
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

          //Search Teaching  Experience
          $teachingExperiences = [];
          if(isset($request->SearchNoExperience) && $request->SearchNoExperience !='') {
              $teachingExperiences[] = $request->SearchNoExperience;
          }
          if(isset($request->Search0To1Year) && $request->Search0To1Year !='') {
            $teachingExperiences[] = $request->Search0To1Year;
        }
          if(isset($request->Search1To3Years) && $request->Search1To3Years !='') {
              $teachingExperiences[] = $request->Search1To3Years;
          }
          if(isset($request->Search3To5Years) && $request->Search3To5Years !='') {
              $teachingExperiences[] = $request->Search3To5Years;
          }
          if(isset($request->Search5To7Years) && $request->Search5To7Years !='') {
              $teachingExperiences[] = $request->Search5To7Years;
          }
          if(isset($request->Search7To10Years) && $request->Search7To10Years !='') {
             $teachingExperiences[] = $request->Search7To10Years;
             }
         if(isset($request->Search10PlusYears) && $request->Search10PlusYears !='') {
             $teachingExperiences[] = $request->Search10PlusYears;
             }
         
        if(!empty($teachingExperiences))
        {
            $candidates = $candidates->whereHas('candidatePreferences',function (Builder $query) use ($teachingExperiences){
                $query->whereIn('experience_level',$teachingExperiences);
            });   
        }

        //Searching Candidate with Different Visas Based
        $searchVisas = [];
        //Search Candidate on New To Apply Visa Based
        if(isset($request->SearchNewToApply) && $request->SearchNewToApply !='')
            $searchVisas[] = $request->SearchNewToApply;

        //Search Candidate on E2 Teaching Visa Based
        if(isset($request->SearchE2TeachingVisa) && $request->SearchE2TeachingVisa !='')
            $searchVisas[] = $request->SearchE2TeachingVisa;

        //Search Candidate on E7 Special Occupation Visa Based
        if(isset($request->SearchE7SpecialOccupation) && $request->SearchE7SpecialOccupation !='')
            $searchVisas[] = $request->SearchE7SpecialOccupation;

        //Search Candidate on  F2 Resident Visa Based
        if(isset($request->SearchF2Resident) && $request->SearchF2Resident !='')
            $searchVisas[] = $request->SearchF2Resident;

         //Search Candidate on  F5 Permanent Resident Visa Based
         if(isset($request->SearchF5PermanentResident) && $request->SearchF5PermanentResident !='')
         $searchVisas[] = $request->SearchF5PermanentResident;
        
          //Search Candidate on F6 Marriage Migrant Visa Based
        if(isset($request->SearchF6MarriageMigrant) && $request->SearchF6MarriageMigrant !='')
        $searchVisas[] = $request->SearchF6MarriageMigrant;

         //Search Candidate D8 Corporate Investment Visa Based
         if(isset($request->SearchD8CorporateInvestment) && $request->SearchD8CorporateInvestment !='')
         $searchVisas[] = $request->SearchD8CorporateInvestment;

         //Search Candidate D9 Trade Management Visa Based
         if(isset($request->SearchD9TradeManagement) && $request->SearchD9TradeManagement !='')
         $searchVisas[] = $request->SearchD9TradeManagement;

         //Search Candidate H1 Working Holiday Visa Based
         if(isset($request->SearchH1WorkingHoliday) && $request->SearchH1WorkingHoliday !='')
         $searchVisas[] = $request->SearchH1WorkingHoliday;

        if(!empty($searchVisas))
        {
            $candidates = $candidates->whereHas('candidatePersonalDetails',function (Builder $query) use ($searchVisas){
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
            $candidates = $candidates->whereHas('candidatePersonalDetails',function (Builder $query) use ($searchGender){
                $query->whereIn('gender',$searchGender);
            }); 
        }

        //Search Canidate on Bachelor Degree Based
        $searchQualifications = [];
        if(isset($request->SearchSchoolDiploma) && $request->SearchSchoolDiploma !='')
            $searchQualifications[] = $request->SearchSchoolDiploma;

        //Search Canidate on Associate Degree Based
        if(isset($request->SearchAssociate) && $request->SearchAssociate !='')
            $searchQualifications[] = $request->SearchAssociate;

        //Search Canidate on Bachelor Degree Based
        if(isset($request->SearchBachelor) && $request->SearchBachelor !='')
            $searchQualifications[] = $request->SearchBachelor;
        //Search Canidate on Master Degree Based
        if(isset($request->SearchMaster) && $request->SearchMaster !='')
            $searchQualifications[] = $request->SearchMaster;

        //Search Canidate on Master Degree Based
        if(isset($request->SearchDoctorate) && $request->SearchDoctorate !='')
            $searchQualifications[] = $request->SearchDoctorate;

        //Search Canidate on Professional Certification Degree Based
        if(isset($request->SearchProfessionalCertification) && $request->SearchProfessionalCertification !='')
            $searchQualifications[] = $request->SearchProfessionalCertification;

        //Search Canidate on Vocational Training Degree Based
        if(isset($request->SearchVocationalTraining) && $request->SearchVocationalTraining !='')
        $searchQualifications[] = $request->SearchVocationalTraining;

        if(!empty($searchQualifications))
        {
            $candidates = $candidates->whereHas('candidateEducationalDetails',function (Builder $query) use ($searchQualifications){
                $query->whereIn('degree',$searchQualifications);
            });         
        }

        $candidates = $candidates->paginate(10);

        $verifiedCertificate = auth()->check() && auth()->user()->hasRole('employer') ? EmployerBusinessLicense::where('employer_id' , auth()->user()->id)->where('approval_status' , 1)->count() : 0;
        $employerIsSubscribed = auth()->check() &&  auth()->user()->lastSubscription && is_null(auth()->user()->lastSubscription->ends_at) ? true : false;
        return view('candidates-marketplace',compact('candidates','jobCategories','verifiedCertificate' , 'employerIsSubscribed'));
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
        $appliedInterview = auth()->check() ? JobApplication::where(['employer_job_id' => $jobId , 'candidate_id' => auth()->user()->id])->first() : null;
        return view('job-details',compact('jobDetails' , 'appliedInterview'));
    }
    // public function employerjobListing()
    // {
    //     return view('employer-job-Listing');
    // }

    public function candidateProfileNew($id)
    {
        $candidateId = Crypt::decryptString($id);
        $candidateDetails = User::role('candidate')->with('documents','candidateHighestQualification','candidateEducationalDetails','candidatePreferences','candidateEducation','candidatePersonalDetails','candidatePersonalDetails.getNationality','candidatePersonalDetails.getPassport')->find($candidateId);
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
        $candidateReviews = Review::with('candidateDetails.candidatePersonalDetails')->where('employer_id',$id)->get();
        //new code starts here
        $businessOperationDetails  = BusinessOperation::where('employer_id',$id)->first();
        $companyHousingsImages = Housing::where('employer_id',$id)->get();
        $employerStaff = Staff::where('employer_id',$id)->get();
        $allJobs = EmployerJob::with('employerDetails')->where('posted_by',$id)->get();
        $galleryFiles = Gallery::where('employer_id',$id)->get();
        $introductionVideo = IntroductionVideo::where('employer_id' , $id)->first();
        $employerLicenseDetails = EmployerBusinessLicense::where('employer_id',$id)->first();
        return view('company-about-us',compact( 
                                            'employerDetails', 
                                            'candidateReviews' ,
                                            'businessOperationDetails',
                                            'companyHousingsImages',
                                            'employerStaff',
                                            'allJobs',
                                            'galleryFiles',
                                            'introductionVideo',
                                            'employerLicenseDetails'
                                        ));
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
            $filename = $candidateDetails->candidatePersonalDetails->first_name.' '.$candidateDetails->candidatePersonalDetails->middle_name.' '.$candidateDetails->candidatePersonalDetails->last_name;
            if($filename == '')
            {
                $filename = $candidateDetails->username;
            }
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
    public function downloadCandidateDocs()
    {
        if (isset($_POST['candidate_id'])) {
            $candidate_id = base64_decode($_POST['candidate_id']);
            $candidateDetails = User::with('candidatePersonalDetails')->find($candidate_id);
            $filepath = public_path($candidateDetails->candidatePersonalDetails->candidate_resume);
            $filename = $candidateDetails->candidatePersonalDetails->first_name.' '.$candidateDetails->candidatePersonalDetails->middle_name.' '.$candidateDetails->candidatePersonalDetails->last_name;
            if($filename == '')
            {
                $filename = $candidateDetails->username;
            }
            $zip = new ZipArchive;
            $zipFileName = $filename.'.zip';
            $candidateDocuments  = CandidateDocument::where('user_id',$candidate_id)->get();
            if(!$candidateDocuments->isEmpty())
            {
                foreach($candidateDocuments as $document)
                {
                    switch ($document->document_type) {
                        case 1:
                        $filename = "Copy-of-Degree";
                          break;
                        case 2:
                        $filename = "Copy-of-Police-Certificate";
                          break;
                        case 3:
                        $filename = "Copy-of-Degree-Apostille";
                          break;
                        case 4:
                        $filename = "Copy-of-Police-Certificate-Apostille";
                          break;
                        case 5:
                        $filename = "Copy-of-Saqa-Letter";
                          break;
                        case 6:
                        $filename = "Copy-of-Passport";
                          break;
                        default:
                          //code block
                      }
                        $filepath = public_path($document->url);
                        // Get the original file name without the extension
                        $originalFileName = pathinfo($filepath, PATHINFO_FILENAME);
                        // Sanitize the name by replacing special characters with hyphens
                        $filename = preg_replace('/[^A-Za-z0-9\-]/', '-', $filename);
                        // Specify the desired file name and extension
                        $filename = $filename . '.' . pathinfo($filepath, PATHINFO_EXTENSION);
                    
                  
                        $filesToZip[] = [
                            "file_path"=>$filepath,
                            "file_name"=>$filename
                        ];
                }
                
                if ($zip->open(public_path($zipFileName), ZipArchive::CREATE) === TRUE) {
                   
        
                    foreach ($filesToZip as $file) {
                        $zip->addFile($file["file_path"], $file["file_name"]);
                    }
        
                    $zip->close();
                    if(\Auth::check())
                        {
                           if(auth()->user()->hasRole('employer'))
                           {
                            return response()->download(public_path($zipFileName))->deleteFileAfterSend(true);
    
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
                } else {
                    toastr()->warning('Failed to create the zip file');
                    return redirect()->back();
                }
            }else{
                toastr()->warning('Failed to create the zip file');
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
    public function getVideoDuration($file)
    {

    }
    public function updateIntroVideo(Request $request)
    {
        $validator = Validator::make($request->all() , 
            [ 'file' => 'required|mimes:mp4,webm|max:10240'] , 
            ['file.max' => "File must be less then 10MB"]
        );
        if($validator->fails())
        {
            return response()->json(['status' => false , 'msg' => 'Something Went Wrong' , 'error' => implode( ", " , $validator->errors()->all())]);
        }

        try{
            $file = $request->file;
            $filename = strtotime(date('Y-m-d')).'-'.str_replace( ' ' ,'-',$file->getClientOriginalName());
            $path = public_path('uploads/employer/introduction-video');
            $file->move($path , $filename);
            
            IntroductionVideo::updateOrCreate(
                ['employer_id' => auth()->user()->id]
                ,
                ['file_path' => $filename,'employer_id' => auth()->user()->id]
            );
            
            return response()->json(['status' => true , 'msg' => 'Introduction video updated successfully']);

        }catch(\Exception $e){
            return response()->json(['status' => false , 'msg' => 'Something Went Wrong' , 'error' => $e->getMessage()]);
        }
    }

}
