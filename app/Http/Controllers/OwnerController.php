<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProfessionalSkills;
use App\Models\User;
use App\Models\EmployerJob;
use Carbon\Carbon;
use Auth;
class OwnerController extends Controller
{

    public function getOwnerDashboard()
    {
        $totalJobApplications = EmployerJob::with('jobApplicants')->count();
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
           $candidates =User::with('candidatePersonalDetails')->role('candidate')->paginate(10);
           return view('owner.candidates',compact('candidates'));
    }
    public function getEmployers()
    {
        $employers =User::with('employerDetails')->role('employer')->paginate(10);
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
    

}
