<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\CandidatePersonalDetails;
use App\Models\CandidateEducation;
use App\Models\ProfessionalSkills;
use App\Models\CandidatePreferences;
use App\Models\Cities;
use App\Models\Countries;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
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
        $candidatePreferencesDetails = CandidatePreferences::where('user_id',Auth::id())->first();
        $professionalSkills = ProfessionalSkills::all();
        $southKoreaCities = Cities::where('country_id',116)->get();
        return view('candidate.profile',compact('candidatePersonalDetails','candidateEducationalDetails','professionalSkills','southKoreaCities','candidatePreferencesDetails'));
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
                        "message" => url("Profile Updated Successfully")
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
            $imagename = saveFile($filePath, $file, $updatePersonalDetails->profile_picture);
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
        $input = $request->except('_token');
        $updatePreferencesDetails = CandidatePreferences::where('user_id',Auth::id());
        $updatePreferencesDetails->update($input);
         return response()->json([
                        "status" => true, 
                        "message" => url("Profile Updade Successfully")
                    ]);
    }
    public function saveProfile5(Request $request)
    {
        $input = $request->except('_token');
        $updatePersonalDetails = CandidatePersonalDetails::where('user_id',Auth::id());
        $updatePersonalDetails->update($input);
         return response()->json([
                        "status" => true, 
                        "message" => url("Profile Updaded Successfully")
                    ]);
    }
    public function saveProfile6(Request $request)
    {
        $updatePreferencesDetails = CandidatePreferences::where('user_id',Auth::id())->first();
        // save candidate profile code
        $video_url = $updatePreferencesDetails->video_url;
        if ($request->file('video_url')) {
            $file = $request->file('video_url');
            $filePath = candidateTeachingVideoPath();
            $video_url = saveFile($file, $filePath , $updatePreferencesDetails->video_url);
        }
        // End of saving candidate profile code

        $input = $request->except('_token','video_url');
        $updatePreferencesDetails->update(array_merge($input,['video_url'=>$video_url]));
         return response()->json([
                        "status" => true, 
                        "message" => url("Personal Details Updated Successfully")
                    ]);
    }
    public function saveProfile7(Request $request)
    {
        $input = $request->except('_token');
        $updatePersonalDetails = CandidatePersonalDetails::where('user_id',Auth::id());
        $updatePersonalDetails->update($input);
        toastr()->success('Profile Updated Successfully ');
        return response()->json([
            "status" => true, 
            "redirect" => url("candidate/profile")
        ]);
    }

}
