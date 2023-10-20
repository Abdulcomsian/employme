<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\CandidatePersonalDetails;
use App\Models\CandidateEducation;
use App\Models\EmployerDetails;
use App\Models\CandidatePreferences;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    function __construct()
    {
        // $this->middleware('permission:employee-me');
    }
    public function signup()
    {
        return view('signup');
    }

    public function employersignup(){
        return view('employer-signup');
    }
    
    public function candidate_signup_save(Request $request)
    {
       
        $validator = Validator::make($request->all(),[
                'terms_and_conditions' => 'required',
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:8|confirmed',
            ])->validateWithBag('candidate');
            // if ($validator->fails()) {
            //     return redirect()->route('signup');
            // }
            $input = $request->except('_token','terms_and_conditions');
            // $input['password'] = Hash::make($input['password']);

            $user = User::create($input);
            CandidatePersonalDetails::create(['user_id'=>$user->id]);
            CandidateEducation::create(['user_id'=>$user->id]);
            CandidatePreferences::create(['user_id'=>$user->id]);

            $user->assignRole('candidate');
            event(new Registered($user));

            toastr()->success('Dear Candidate, You have successfully registered, A verification link has been sent to your account. kindly verify your account');
            return redirect()->route('signup');
                            // ->with('success','Dear Candidate, You have successfully registered, A verification link has been sent to your account. kindly verify your account');
       
    
    }
    public function employer_signup_save(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'terms_and_conditions' => 'required',
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
        ])->validateWithBag('employer');

        $input = $request->except('_token','terms_and_conditions');
    // $input['password'] = Hash::make($input['password']);

        $user = User::create($input);
        EmployerDetails::create(['user_id'=>$user->id]);
        $user->assignRole('employer');
        event(new Registered($user));
        toastr()->success('Dear Employer, You have successfully registered, A verification link has been sent to your account. kindly verify your account');
        return redirect()->route('signup');
        // ->with('success','Dear Employer, You have successfully registered, A verification link has been sent to your account. kindly verify your account');
    }

    public function authLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);
  
        if ($validator->fails()){
            return response()->json([
                    "status" => false,
                    "errors" => $validator->errors()
                ]);
        } else {
            if (Auth::attempt($request->only(["email", "password"]))) {
                toastr()->success('Logged In Successfully');

                 if(auth()->user()->hasRole('candidate'))
                 {
                    return response()->json([
                        "status" => true, 
                        "redirect" => url("candidate/dashboard")
                    ]);
                 }elseif(auth()->user()->hasRole('employer'))
                 {
                    return response()->json([
                        "status" => true, 
                        "redirect" => url("employer/dashboard")
                    ]);
                 }elseif(auth()->user()->hasRole('admin'))
                 {
                    return response()->json([
                        "status" => true, 
                        "redirect" => url("owner/dashboard")
                    ]);
                 }
            } else {
                return response()->json([
                    "status" => false,
                    "errors" => ["Invalid credentials"]
                ]);
            }
        }
    }
    
    public function verify_email(Request $request,$id)
    {
        $user = User::find($id);
        $user->email_verified_at=date('Y-m-d H:i:s');
        $user->save();
        Auth::login($user);
        // $request->fulfill();
        if(auth()->user()->hasRole('candidate'))
        {
            toastr()->success('Dear Candidate, You account has been verified successfully ');
            return redirect('/candidate/dashboard');
        }elseif(auth()->user()->hasRole('employer'))
        {
            toastr()->success('Dear Employer, You account has been verified successfully ');
            return redirect('/employer/dashboard');
        }
        elseif(auth()->user()->hasRole('owner'))
        {
            return redirect('/owner/dashboard');
        }
 
    }

    public function logout(Request $request) {
        Auth::logout();
        toastr()->success('Logged Out Successfully');
        return redirect()->route('home');
      }
}
