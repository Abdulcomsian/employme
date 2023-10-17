<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\CandidatePersonalDetails;
use App\Models\CandidateEducation;
use Illuminate\Support\Facades\Auth;
class CandidateController extends Controller
{
    public function getCandidateDashboard()
    {
       
        return view('candidate.dashboard');
    }

    public function getProfilePage()
    {
        $candidatePersonalDetails = CandidatePersonalDetails::where('user_id',Auth::id())->first();
        $candidateEducationalDetails = CandidateEducation::where('user_id',Auth::id())->first();
        return view('candidate.profile',compact('candidatePersonalDetails','candidateEducationalDetails'));
    }

    public function getResumePage()
    {
        return view('candidate.resume');
    }

    public function saveProfile1(Request $request)
    {
        $input = $request->except('_token');
        $updatePersonalDetails = CandidatePersonalDetails::where('user_id',Auth::id());
        $updatePersonalDetails->update($input);
         return response()->json([
                        "status" => true, 
                        "message" => url("Profile Updade Successfully")
                    ]);
               
    }
    public function saveProfile2(Request $request)
    {
        $updatePersonalDetails = CandidatePersonalDetails::where('user_id',Auth::id())->first();

        // save candidate profile code
        $imagename = $updatePersonalDetails->profile_picture;
        if ($request->file('profile_picture')) {
            $file = $request->file('profile_picture');
            $filePath = candidateProfilePicturePath();
            $imagename = saveCandidateProfilePicture($updatePersonalDetails->profile_picture, $file, $filePath);
        }
        // End of saving candidate profile code

        $input = $request->except('_token','profile_picture');
        $updatePersonalDetails->update(array_merge($input,['profile_picture'=>$imagename]));
         return response()->json([
                        "status" => true, 
                        "message" => url("Personal Details Updated Successfully")
                    ]);
    }
    public function saveProfile3(Request $request)
    {
        $input = $request->except('_token');
        $updateEducationalDetails = CandidateEducation::where('user_id',Auth::id());
        $updateEducationalDetails->update($input);
         return response()->json([
                        "status" => true, 
                        "message" => url("Profile Updade Successfully")
                    ]);
    }
    public function saveProfile4(Request $request)
    {
        dd($request->all());
    }
    public function saveProfile5(Request $request)
    {
        dd($request->all());
    }
    public function saveProfile6(Request $request)
    {
        dd($request->all());
    }

}
