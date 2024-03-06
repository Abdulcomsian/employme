<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmployerJob;
use App\Models\{JobCategory, JobApplication,User, JobInterview};
use Illuminate\Support\Facades\Auth;
use Notification;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;
use App\Notifications\{InterviewRequestNotification,InterviewRescheduleNotification};
use Carbon\Carbon;
class EmployerJobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dt = Carbon::now();
        $dt2 = $dt->copy()->subWeek(); 
        $employerJobs = EmployerJob::where('posted_by',Auth::id())->paginate(5);
        $latestJobs = EmployerJob::where('posted_by',Auth::id())
        ->where('created_at', '>=', $dt2->copy()->startOfDay())
        ->where('created_at', '<=', $dt->copy()->endOfDay())
        ->paginate(5);
        return view('employer.jobs.index',get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jobCategories = JobCategory::all();
        return view('employer.jobs.create',get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {

        $input = $request->except('_token');
        $createJob = EmployerJob::create(array_merge($input,['posted_by'=>Auth::id(),'job_status'=>1]));
        toastr()->success('Job Created Successfully');
        return redirect()->route('employer-jobs.index');
          
        } 
        catch (\Exception $e) {
        
            return $e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $jobCategories = JobCategory::all();
        $employerJob = EmployerJob::find($id);
        return view('employer.jobs.edit',get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
      
        try {

        $input = $request->except('_token');
        $updateJob = EmployerJob::find($id)->update(array_merge($input,['posted_by'=>Auth::id(),'job_status'=>1]));
        if($updateJob)
        {
            toastr()->success('Job Updated Successfully');
        }
        return redirect()->route('employer-jobs.index');
              
        } 
        catch (\Exception $e) {
        
            return $e->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {

            $deleteEmployerJob = EmployerJob::find($id); 

            if($deleteEmployerJob->delete())
            {
                toastr()->success('Job Deleted Successfully');
            }
            return redirect()->route('employer-jobs.index');
                    
        } 
        catch (\Exception $e) {
        
             dd($e->getMessage());
        }  
        
    }

    public function interviewInvitation(Request $request)
    {
        $jobApplicationDetails = JobApplication::where('employer_job_id',$request->employer_job_id)->first();

        $candidateDetails = User::with('candidatePersonalDetails')->find($jobApplicationDetails->candidate_id);
        $employerDetails = User::with('employerDetails')->find(Auth::id());
        $jobDetails = EmployerJob::find($request->employer_job_id);
        $interviewRequestExists = JobInterview::where(['employer_job_id'=>$request->employer_job_id,'requested_from'=>$jobApplicationDetails->employer_id,'requested_to'=>$jobApplicationDetails->candidate_id]);

        if($interviewRequestExists->exists())
        {
            toastr()->warning('Already Interviewed');
            return redirect()->back();        
        }
        else
        {
            $createRequest = JobInterview::create([
                'job_link' => $request->job_link,
                'requested_to'=>$jobApplicationDetails->candidate_id,
                'requested_from'=>$jobApplicationDetails->employer_id,
                'interview_date'=>$request->interview_date,
                'interview_time'=>$request->interview_time,
                'meeting_media'=>$request->meeting_media,
                'status'=>0,
                'employer_job_id'=>$request->employer_job_id
    
            ]);    
            if($createRequest)
            {
                $jobApplicationDetails->application_status = 1;
                $jobApplicationDetails->save();
                Notification::route('mail',  $candidateDetails->email ?? '')->notify(new InterviewRequestNotification($candidateDetails,$employerDetails,$jobDetails));
                toastr('Interview Request Sent Successfully');
                return redirect()->back();
            }
        }
    }

    public function rejectApplication($id)
    {
        $jobApplicationDetails = JobApplication::find($id);
        $candidateDetails = User::with('candidatePersonalDetails')->find($jobApplicationDetails->candidate_id);
        $employerDetails = User::with('employerDetails')->find(Auth::id());
        $jobDetails = EmployerJob::find($jobApplicationDetails->employer_job_id);
        $jobApplicationDetails= $jobApplicationDetails->update(['application_status'=>2]);
        if($jobApplicationDetails){
            Notification::route('mail',  $candidateDetails->email ?? '')->notify(new InterviewRequestNotification($candidateDetails,$employerDetails,$jobDetails,$type=2));
            toastr('Application Rejected Successfully');
            return redirect()->back();
        }


    }
}
