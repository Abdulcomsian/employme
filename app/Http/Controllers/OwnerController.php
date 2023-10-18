<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProfessionalSkills;
class OwnerController extends Controller
{

    public function getOwnerDashboard()
    {
        return view('owner.dashboard');
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

}
