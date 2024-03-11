<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{User,
    CandidatePersonalDetails, CandidateEducation, ProfessionalSkills, CandidatePreferences, Cities, Countries, SavedJob, EmployerJob, JobCategory, JobInterview};
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Notification;
use App\Notifications\{InterviewRequestNotification, InterviewRescheduleNotification};
use Carbon\Carbon;
class CandidateController extends Controller
{
    public function getCandidateDashboard()
    {
        $dt = Carbon::now();
        $dt2 = $dt->copy()->subWeek();                          // 7

        $totalJobApplications = User::find(Auth::id())->jobsApplied()->count();
        $shortlistsCount = JobInterview::with('jobDetails','employer','employer.employerDetails')->where('requested_to',Auth::id())->count();
        $totalSavedJobs = User::find(Auth::id())->savedJobs()->count();
        $candidateJobApplications = User::find(Auth::id())
        ->jobsApplied()
        ->where('job_applications.created_at', '>=', $dt2->copy()->startOfDay())
        ->where('job_applications.created_at', '<=', $dt->copy()->endOfDay())
        ->limit(6)
        ->get();
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
        if ($request->file('video_thumbnail')) {
            $file = $request->file('video_thumbnail');
            $filePath = candidateTeachingVideoThumbnailPath();
            $thumbnailPath = saveFile($filePath, $file, $updatePreferencesDetails->video_thumbnail);
        }
        // End of saving candidate profile code

        $input = $request->except('_token','video_url');
        $updatePreferencesDetails->update(array_merge($input,['video_url'=>$video_url,'video_thumbnail'=>$thumbnailPath]));
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
        $dt = Carbon::now();
        $dt2 = $dt->copy()->subWeek();   
        $candidateJobApplications = User::find(Auth::id())->jobsApplied()->paginate(10);
        $latestApplications = User::find(Auth::id())
        ->jobsApplied()
        ->where('job_applications.created_at', '>=', $dt2->copy()->startOfDay())
        ->where('job_applications.created_at', '<=', $dt->copy()->endOfDay())
        ->paginate(10);
        return view('candidate.job-applications.index',compact('candidateJobApplications','latestApplications'));
    }
    public function deleteApplication($id)
    {
        $deleteJobApplication = User::find(Auth::id())->jobsApplied()->detach($id);
        toastr()->success('Application Deleted Successfully ');
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
        $dt = Carbon::now();
        $dt2 = $dt->copy()->subWeek();   // or whatever you're using to set it
        $allInterviews = JobInterview::with('jobDetails','employer','employer.employerDetails')->where('requested_to',Auth::id())->paginate(5);
        $latestInterviews = JobInterview::with('jobDetails','employer','employer.employerDetails')->where('requested_to',Auth::id())
        ->where('created_at','>=',$dt2->copy()->startOfDay())
        ->where('created_at','<=',$dt->copy()->endOfDay())
        ->paginate(5);
        return view('candidate.interview.index',compact('allInterviews','latestInterviews'));
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

   public function rescheduleInterview(Request $request)
   {
        $rescheduleInterview = JobInterview::find($request->reschedule_interview_id);
        $candidateDetails = User::with('candidatePersonalDetails')->find($rescheduleInterview->requested_to);
        $employerDetails = User::with('employerDetails')->find($rescheduleInterview->requested_from);
        $jobDetails = EmployerJob::find($rescheduleInterview->employer_job_id);

        $rescheduleInterview->reschedule_date = $request->reschedule_date;
        $rescheduleInterview->reschedule_time = $request->reschedule_time;
        $rescheduleInterview->reschedule_meeting = $request->reschedule_meeting;
        $rescheduleInterview->status = 0;
        $rescheduleInterview->reschedule_status = 1;
        if($rescheduleInterview->save())
        {
            Notification::route('mail',  $employerDetails->email ?? '')->notify(new InterviewRescheduleNotification($candidateDetails,$employerDetails,$jobDetails,$type=1,$interviewStatus=2));
            toastr()->success('Request Sent Successfully');
            return redirect()->back();

        }
        
   }


   public function deleteVideo(Request $request)
   {
       $candidatePreferencesDetails = CandidatePreferences::where('user_id',Auth::id())->first();
       if($candidatePreferencesDetails->video_url !='')
       {
         @unlink(public_path($candidatePreferencesDetails->video_url));
         $candidatePreferencesDetails->video_url = '';
         $candidatePreferencesDetails->save();
         $message = "Video Deleted Successfully";
         $status = true;
       }else
       {
         $message = "No Video Found";
         $status = false;
       }

       return response()->json([
            "status" => $status, 
            "message" => $message
        ]);

   }
   public function deleteThumbnail(Request $request)
   {
       $candidatePreferencesDetails = CandidatePreferences::where('user_id',Auth::id())->first();
       if($candidatePreferencesDetails->video_thumbnail !='')
       {
         @unlink(public_path($candidatePreferencesDetails->video_thumbnail));
         $candidatePreferencesDetails->video_thumbnail = '';
         $candidatePreferencesDetails->save();
         $message = "Thumbnail Image Deleted Successfully";
         $status = true;
       }else
       {
         $message = "No Thumbnail Found";
         $status = false;
       }

       return response()->json([
            "status" => $status, 
            "message" => $message
        ]);

   }
   public function deleteFile(Request $request)
   {
        $candidatePreferencesDetails = CandidatePreferences::where('user_id',Auth::id())->first();
        $candidatePersonalDetails = CandidatePersonalDetails::where('user_id',Auth::id())->first();
       if($request->file_type == 'thumbnail-image')
       {
            if($candidatePreferencesDetails->video_thumbnail !='')
            {
            @unlink(public_path($candidatePreferencesDetails->video_thumbnail));
            $candidatePreferencesDetails->video_thumbnail = '';
            $candidatePreferencesDetails->save();
            $message = "Thumbnail Image Deleted Successfully";
            $status = true;
            }else
            {
            $message = "No Thumbnail Found";
            $status = false;
            }
       }elseif($request->file_type == 'video-url')
       {
            $candidatePreferencesDetails = CandidatePreferences::where('user_id',Auth::id())->first();
            if($candidatePreferencesDetails->video_url !='')
            {
                @unlink(public_path($candidatePreferencesDetails->video_url));
                $candidatePreferencesDetails->video_url = '';
                $candidatePreferencesDetails->save();
                $message = "Video Deleted Successfully";
                $status = true;
            }else
            {
                $message = "No Video Found";
                $status = false;
            }
       }elseif($request->file_type == 'profile-photo')
       {
            $candidatePersonalDetails = CandidatePersonalDetails::where('user_id',Auth::id())->first();
            if($candidatePersonalDetails->profile_picture !='')
            {
                @unlink(public_path($candidatePersonalDetails->profile_picture));
                $candidatePersonalDetails->profile_picture = '';
                $candidatePersonalDetails->save();
                $message = "Profile Image Deleted Successfully";
                $status = true;
            }else
            {
                $message = "No Image Found";
                $status = false;
            }
       }elseif($request->file_type == 'resume-file')
       {
            if($candidatePersonalDetails->candidate_resume !='')
            {
                @unlink(public_path($candidatePersonalDetails->candidate_resume));
                $candidatePersonalDetails->candidate_resume = '';
                $candidatePersonalDetails->save();
                $message = "Resume Deleted Successfully";
                $status = true;
            }else
            {
                $message = "No Resume Found";
                $status = false;
            }
       }
       

       return response()->json([
            "status" => $status, 
            "message" => $message
        ]);

   }

}
