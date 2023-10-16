<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\CandidatePersonalDetails;
use Illuminate\Support\Facades\Auth;
class CandidateController extends Controller
{
    public function getCandidateDashboard()
    {
        // if(auth()->user()->hasRole('candidate'))
        // dd('candidate');
        //  else
        //  dd('not candidate');
        return view('candidate.dashboard');
    }

    public function getProfilePage()
    {
        return view('candidate.profile');
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
    }
    public function saveProfile3(Request $request)
    {
        dd($request->all());
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
