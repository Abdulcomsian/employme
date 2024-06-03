<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProfessionalSkills;
use App\Models\{CandidateDocument, EmployerJob, User, JobInterview, EmployerBusinessLicense};
use Carbon\Carbon;
use Auth;
use Notification;
use App\Notifications\{BusinessLicenseNotification,InterviewRescheduleNotification};
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
class OwnerController extends Controller
{

    public function getOwnerDashboard()
    {
        $totalJobApplications = EmployerJob::with('jobApplicants')->count();
        $totalCandidates = User::role('candidate')->count();
        $totalEmployers = User::role('employer')->count();
        $totalShortlists = JobInterview::count();
        return view('owner.dashboard',get_defined_vars());
    }

    public function getOwnerProfile()
    {
        return view('owner.profile');
    }

    public function getUserProfile()
    {
        return view('owner.users');
    }
    public function getProfessionalSkills(Request $request)
    {
        if($request->ajax())
        {
            
            $professionalSkills = ProfessionalSkills::all();
            foreach ($professionalSkills as $professionalSkill) {
                $professionalSkill->Options = '<button class="btn btn-primary Edit-Skill-Button"   type="button" type="button" data-bs-toggle="modal" data-bs-target="#Edit-Skill-Modal"><i class="bi bi-pen"></i></button><button class="btn btn-danger Delete-Skill-Button"   type="button" type="button" ><i class="bi bi-trash"></i></button>';
            }
        $output = array(
                "recordsTotal" => count($professionalSkills),
                "recordsFiltered" => count($professionalSkills),
                "data" => $professionalSkills
        );
        return \Response::json($output);
    }
        return view('owner.professional-skills.index');
    }
    public function storeProfessionalSkill(Request $request)
    {
        $input = $request->all();
        $professionalSkill = ProfessionalSkills::create($input);

        return  \Response::json(['status' => 'success','msg' => __('Skill Added successfully')]);
    
    }
    public function editProfessionalSkill(Request $request,$id)
    {
        
    }

    public function updateProfessionalSkill(Request $request,$id)
    {
        $input = $request->except('id');
        $professionalSkill = ProfessionalSkills::where('id',$id)->update($input);
        return  \Response::json(['status' => 'success','msg' => __('Skill Updated successfully')]);

    }
    public function deleteProfessionalSkill($id)
    {
        $professionalSkill = ProfessionalSkills::where('id',$id)->delete();
        return  \Response::json(['status' => 'success','msg' => __('Skill Deleted successfully')]);
    }

    public function getCandidates()
    {

            $candidates = User::with('candidatePersonalDetails')
                                ->with('degree' , 'policeCertificate' , 'degreeApostilled' , 'policeApostilled' , 'passport', 'saqaLetter')
                                ->whereHas('roles' , function($query){
                                                        $query->where('name' , 'candidate');
                                                    })
                                ->where('is_eligible' , '!=' , 0 )
                                ->orderBy('id' , 'desc')
                                ->paginate(10);

           return view('owner.candidates',compact('candidates'));
    }
    public function getEmployers()
    {
        $employers =User::with('employerDetails' , 'license')->role('employer')->paginate(10);
        return view('owner.employers',compact('employers'));
    }
    public function getEmployerDetails()
    {
        return view('owner.employer-details');
    }
    public function getEmployersJobs()
    {
        $dt = Carbon::now();
        $dt2 = $dt->copy()->subWeek(); 
        $employerJobs = EmployerJob::with('employerDetails','employerInfo')->paginate(10);
        $latestJobs = EmployerJob::with('employerDetails','employerInfo')
        ->where('created_at', '>=', $dt2->copy()->startOfDay())
        ->where('created_at', '<=', $dt->copy()->endOfDay())
        ->paginate(5);
        return view('owner.jobs.index',get_defined_vars());
    }
    public function JobListingCandidate($id)
    {
        $jobApplicants= EmployerJob::find($id)->jobApplicants()->paginate(10);
        return view('owner.job-candidates.index',compact('jobApplicants'));
    }

    public function getJobApplications()
    {
        $employerJobApplications = EmployerJob::with('jobApplicants')->get();
        return view('owner.job-applications.index',compact('employerJobApplications'));
    }
    
    public function employerBusinessLicenses(){
        $employerLicenses = EmployerBusinessLicense::with('user.employerDetails')->paginate(10);
        return view('owner.employer-licenses.index',compact('employerLicenses'));
    }
    public function employerRejectLicense($id){
        $rejectLicense = EmployerBusinessLicense::find($id);
        $employerDetails = User::with('employerDetails')->find($rejectLicense->employer_id);
        $rejectLicense->approval_status	 = 2;
        $rejectLicense->approved_by = Auth::id();
        if($rejectLicense->save())
        {
            Notification::route('mail',  $employerDetails->email ?? '')->notify(new BusinessLicenseNotification($employerDetails, $type=1,$status=2));
            toastr()->success('License Rejected Successfully');
            return redirect()->back();
        }
    }
    public function employerApproveLicense($id){
        $rejectLicense = EmployerBusinessLicense::find($id);
        $employerDetails = User::with('employerDetails')->find($rejectLicense->employer_id);
        $rejectLicense->approval_status	 = 1;
        $rejectLicense->approved_by = Auth::id();
        if($rejectLicense->save())
        {
            Notification::route('mail',  $employerDetails->email ?? '')->notify(new BusinessLicenseNotification($employerDetails, $type=1,$status=1));
            toastr()->success('License Approved Successfully');
            return redirect()->back();
        }
    }
    public function interviewRequests()
    {
        $allInterviews = JobInterview::with('jobDetails','jobCandidate.candidatePersonalDetails','employer.employerDetails')->paginate(10);
        return view('owner.interview-requests.index',compact('allInterviews'));
    }

    public function changeCertificateStatus(Request $request)
    {
        $validator = Validator::make($request->all() , [
            'certificateType' => 'required|numeric',
            'candidateId' => 'required|numeric',
            'status' => 'required|string',
        ]);

        if($validator->fails()){
            return response()->json(['status' => false , 'error' => implode(' ,' , $validator->errors()->all())]);
        }

        try{
            $candidateDocument = CandidateDocument::where('user_id' , $request->candidateId)
                                                    ->where('document_type' , $request->certificateType)
                                                    ->first();
            $candidateDocument->status = $request->status;
            $candidateDocument->save();
            $this->verifyEligibility($request);
            return response()->json(['status' => true , 'msg' => 'Document status updated successfully']);

        }catch(\Exception $e){
            return response()->json(['status' => false , 'error' => $e->getMessage()]);
        }
    }

    public function verifyEligibility($request)
    {
        $candidateDocuments = CandidateDocument::where('user_id' , $request->candidateId)->where('status' , 'verified')->get();
        if($candidateDocuments->count() == 6){
            User::where('id' , $request->candidateId)->update(['is_eligible' =>  1]);
        }

        return true;
    }

    public function updateCandidateEligibily(Request $request)
    {
        $validator = Validator::make($request->all() , [
            'candidateId' => 'required|numeric',
            'status' => 'required|boolean',
        ]);

        if($validator->fails()){
            return response()->json(['status' => false , 'error' => implode(' ,' , $validator->errors()->all())]);
        }

        try{
            User::where('id' , $request->candidateId)->update(['is_eligible' => $request->status]);
            if(!$request->status)
            {  
                    $user = User::where('id' , $request->candidateId)->first();
                    Mail::to($user->email)->send(new \App\Mail\CandidateEligibilityMail());

            }

            return response()->json(['status' => true , 'msg' => 'Eligibilty updated successfully']);
        }catch(\Exception $e){
            return response()->json(['status' => false , 'error' => $e->getMessage()]);
        }
    }

}
