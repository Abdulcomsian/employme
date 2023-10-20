<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Countries;
use App\Models\EmployerDetails;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
class EmployerController extends Controller
{

    public function getEmployerDashboard()
    {
        return view('employer.dashboard');
    }
    public function getEmployerProfilePage()
    {
        $countries = Countries::all();
        $employerDetails = EmployerDetails::where('user_id',Auth::id())->first();
        return view('employer.employer-profile',compact('countries','employerDetails'));
    }
    public function getEmployerCandidate()
    {
        return view('employer.employer-dashboard-saved-candidate');
    }
    public function getEmployerSubscription()
    {
        return view('employer.employer-dashboard-subscription-plan');
    }

    public function postAJob()
    {
        return view('employer.post-a-job');
    }
    public function scheduleInterview()
    {
        return view('schedule-interview');
    }
    public function JobListingCandidate()
    {
        return view('JobListingCandidate');
    }
    
    public function saveProfile1(Request $request)
    {
        $input = $request->except('_token');
        $updateDetails = EmployerDetails::where('user_id',Auth::id());
        $updateDetails->update($input);
        return response()->json([
                        "status" => true, 
                        "message" => url("Employer Details Updated Successfully")
                    ]);
    }
    public function saveProfile2(Request $request)
    {
        $updateDetails = EmployerDetails::where('user_id',Auth::id())->first();

        //Save Certification File
        $imagename = $updateDetails->international_accredition_or_certification;
        if ($request->file('international_accredition_or_certification')) {
            $file = $request->file('international_accredition_or_certification');
            $filePath = employerCertificationtPath();
            $imagename = saveFile($filePath, $file, $updateDetails->international_accredition_or_certification);
        }
        //Update Profile Data
        $input = $request->except('_token','international_accredition_or_certification');
        $updateDetails = EmployerDetails::where('user_id',Auth::id());
        $updateDetails->update(array_merge($input,['international_accredition_or_certification'=>$imagename]));
        
        return response()->json([
                        "status" => true, 
                        "message" => url("Employer Details Updated Successfully")
                    ]);
    }
    public function saveProfile3(Request $request)
    {
        $input = $request->except('_token');
        $updateDetails = EmployerDetails::where('user_id',Auth::id());
        $updateDetails->update($input);
        return response()->json([
                        "status" => true, 
                        "message" => url("Employer Details Updated Successfully")
                    ]);
    }
    public function saveProfile4(Request $request)
    {
        $updateDetails = EmployerDetails::where('user_id',Auth::id())->first();
        $imagename = $updateDetails->legal_disputes_confirmation_document;
        if ($request->file('legal_disputes_confirmation_document')) {
            $file = $request->file('legal_disputes_confirmation_document');
            $filePath = employerConfirmationDocumentPath();
            $imagename = saveFile($filePath, $file, $updateDetails->legal_disputes_confirmation_document);
        }
        $input = $request->except('_token','legal_disputes_confirmation_document');
        $updateDetails = EmployerDetails::where('user_id',Auth::id());
        $updateDetails->update(array_merge($input,['legal_disputes_confirmation_document'=>$imagename]));
        return response()->json([
                        "status" => true, 
                        "message" => url("Employer Details Updated Successfully")
                    ]);
    }
    public function saveProfile5(Request $request)
    {
        $input = $request->except('_token');
        $updateDetails = EmployerDetails::where('user_id',Auth::id());
        $updateDetails->update($input);
        return response()->json([
                        "status" => true, 
                        "message" => url("Employer Details Updated Successfully")
                    ]);
    }
    public function saveProfile6(Request $request)
    {
        $input = $request->except('_token');
        $updateDetails = EmployerDetails::where('user_id',Auth::id());
        $updateDetails->update($input);
        return response()->json([
                        "status" => true, 
                        "message" => url("Employer Details Updated Successfully")
                    ]);
    }
    public function saveProfile7(Request $request)
    {
        $input = $request->except('_token');
        $updateDetails = EmployerDetails::where('user_id',Auth::id());
        $updateDetails->update($input);
        return response()->json([
                        "status" => true, 
                        "message" => url("Employer Details Updated Successfully")
                    ]);
    }
    public function saveProfile8(Request $request)
    {
        $input = $request->except('_token');
        $updateDetails = EmployerDetails::where('user_id',Auth::id());
        $updateDetails->update($input);
        return response()->json([
                        "status" => true, 
                        "message" => url("Employer Details Updated Successfully")
                    ]);
    }
    public function saveProfile9(Request $request)
    {
        $input = $request->except('_token');
        $updateDetails = EmployerDetails::where('user_id',Auth::id());
        $updateDetails->update($input);
        toastr()->success('Profile Update Successfully ');
        return response()->json([
            "status" => true, 
            "redirect" => url("employer/employer-profile")
        ]);
    }
}
