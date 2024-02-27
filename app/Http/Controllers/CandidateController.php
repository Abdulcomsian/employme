<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{User,
    CandidatePersonalDetails, CandidateEducation, ProfessionalSkills, CandidatePreferences, Cities, Countries, SavedJob, EmployerJob, JobCategory, JobInterview};
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Notification;
use App\Notifications\InterviewRequestNotification;
class CandidateController extends Controller
{
    public function getCandidateDashboard()
    {
        $totalJobApplications = User::find(Auth::id())->jobsApplied()->count();
        return view('candidate.dashboard',get_defined_vars());
    }

    public function getProfilePage()
    {
        $candidatePersonalDetails = CandidatePersonalDetails::where('user_id',Auth::id())->first();
        $candidateEducationalDetails = CandidateEducation::where('user_id',Auth::id())->first();
        $candidatePreferencesDetails = CandidatePreferences::where('user_id',Auth::id())->first();
        $professionalSkills = ProfessionalSkills::all();
        $southKoreaCities = Cities::where('country_id',116)->get();
        $countries = Countries::all();
        $jobCategories = JobCategory::all();
        // dd($candidatePreferencesDetails->skills);
        return view('candidate.profile',compact('countries','candidatePersonalDetails','candidateEducationalDetails','professionalSkills','southKoreaCities','candidatePreferencesDetails','jobCategories'));
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
        $updatePreferencesDetails = CandidatePreferences::where('user_id',Auth::id())->first();

        // save candidate profile code
        $imagename = $updatePersonalDetails->profile_picture;
        if ($request->file('profile_picture')) {
            $file = $request->file('profile_picture');
            $filePath = candidateProfilePicturePath();
            $imagename = saveFile($filePath, $file, $updatePersonalDetails->profile_picture);
        }
        // save candidate resume code
        $imagename1 = $updatePersonalDetails->candidate_resume;
        if ($request->file('candidate_resume')) {
            $file = $request->file('candidate_resume');
            $filePath = candidateResumeFilePath();
            $imagename1 = saveFile($filePath, $file, $updatePersonalDetails->candidate_resume);
        }
        // End of saving candidate profile code

        $input = $request->except('_token','profile_picture','candidate_resume','experience_level');
        $updatePersonalDetails->update(array_merge($input,['profile_picture'=>$imagename,'candidate_resume'=>$imagename1]));

        //Saving Candidate Experience Level to Candidate Preferences Table
        $updatePreferencesDetails->update(['experience_level'=>$request->experience_level]);

         return response()->json([
                        "status" => true, 
                        "message" => url("Personal Details Updated Successfully")
                    ]);
    }
    public function saveProfile3(Request $request)
    {
        // dd($request->all());
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
        // $skills = implode(',', $request->skills);
        // $skills = json_decode($request->skills);
        // $skills = implode(',', $request->skills);
        $input = $request->except('_token');
        // dd($request->skills);
        // dd($commaSeparatedString);
        $data = salaryRanges($request->expected_salary);
        $updatePreferencesDetails = CandidatePreferences::where('user_id',Auth::id());
        $updatePreferencesDetails->update(array_merge($input,$data));
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
            $video_url = saveFile($filePath, $file, $updatePreferencesDetails->video_url);
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

    public function candidateJobApplications()
    {
        $candidateJobApplications = User::find(Auth::id())->jobsApplied()->paginate(10);
        return view('candidate.job-applications.index',compact('candidateJobApplications'));
    }
    public function deleteApplication($id)
    {
        $deleteJobApplication = User::find(Auth::id())->jobsApplied()->detach(2);
        toastr()->warning('Application Deleted Successfully ');
        return redirect()->back();

    } 
    public function candidateSavedJobs()
    {
        $candidateSavedJobs = User::find(Auth::id())->savedJobs()->paginate(10);
        return view('candidate.saved-jobs.index',compact('candidateSavedJobs'));
    }

    public function removeSavedJob($id)
    {
        $deleteSavedJob = SavedJob::where(['employer_job_id'=>$id,'user_id'=>Auth::id()])->first();
        if($deleteSavedJob->delete())
        {
            toastr()->success('Job Successfully Removed');
            return redirect()->back();
        }
    }

    public function candidateInterviewRequests()
    {
        $allInterviews = JobInterview::with('jobDetails','employer','employer.employerDetails')->where('requested_to',Auth::id())->get();
        return view('candidate.interview.index',compact('allInterviews'));
    }

    public function acceptInterview($id)
    {
        $updateInterview = JobInterview::where('id',$id)->first();
          $candidateDetails = User::with('candidatePersonalDetails')->find($updateInterview->requested_to);
          $employerDetails = User::with('employerDetails')->find($updateInterview->requested_from);
            $jobDetails = EmployerJob::find($updateInterview->employer_job_id);
            $updateInterview->status = 1;
          if($updateInterview->save())
          {
            toastr()->success('Interview Accepted Successfully');
            Notification::route('mail',  $employerDetails->email ?? '')->notify(new InterviewRequestNotification($candidateDetails,$employerDetails,$jobDetails,$type=1,$interviewStatus=1));
            return redirect()->back();
          }
    }
    public function rejectInterview($id)
    {
        $updateInterview = JobInterview::where('id',$id)->first();
        $candidateDetails = User::with('candidatePersonalDetails')->find($updateInterview->requested_to);
        $employerDetails = User::with('employerDetails')->find($updateInterview->requested_from);
          $jobDetails = EmployerJob::find($updateInterview->employer_job_id);
          $updateInterview->status = 2;
        if($updateInterview->save())
        {
          toastr()->success('Interview Rejected Successfully');
          Notification::route('mail',  $employerDetails->email ?? '')->notify(new InterviewRequestNotification($candidateDetails,$employerDetails,$jobDetails,$type=1,$interviewStatus=2));
          return redirect()->back();
        }
    }

}
