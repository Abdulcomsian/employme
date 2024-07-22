<?php

namespace App\Http\Controllers;

use App\Events\BusinessLicense;
use Illuminate\Http\Request;
use App\Models\EmployerJob;
use App\Models\{JobCategory, JobApplication,User, JobInterview, Conversation , EmployerBusinessLicense, Plan};
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
        ->orderBy('id' , 'desc')
        ->paginate(5);
        return view('employer.jobs.index',get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employerLicenseDetails =  EmployerBusinessLicense::where('employer_id',auth()->user()->id)->first();
        if($employerLicenseDetails && $employerLicenseDetails->approval_status == 1 && (!auth()->user()->lastSubscription || !is_null(auth()->user()->lastSubscription->ends_at)))
        {
            return redirect()->route('getEmployerSubscriptionPlan');    
        }

        $jobCategories = JobCategory::all();
        $userSubscription = User::find(Auth::id())->subscriptions('default')->first();

        $employerSubscriptionPlan = Plan::where('stripe_plan' , $userSubscription->stripe_price)->first();
        $userActiveJobsCount = EmployerJob::where('posted_by' , auth()->user()->id)->count();
        $isSubscriptionJobCountCompleted  = $userActiveJobsCount == $employerSubscriptionPlan->allowed_jobs ? true : false; 
        return view('employer.jobs.create',get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {

        $filename = null;
        if($request->file('company_introduction'))
        {
            $file = $request->file('company_introduction');
            $filename = strtotime(now()).'-'.str_replace(" ","-",$file->getClientOriginalName()) ;
            $path = public_path('uploads/employer/introduction-video');
            $file->move($path , $filename);
        }

        $input = $request->except('_token' , 'company_introduction');

        EmployerJob::create(array_merge($input,['posted_by'=>Auth::id(),'job_status' =>1 , 'company_introduction' => $filename ]));
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
            $filename = null;
            if($request->file('company_introduction'))
            {
                $file = $request->file('company_introduction');
                $filename = strtotime(now()).'-'.str_replace(" ","-",$file->getClientOriginalName()) ;
                $path = public_path('uploads/employer/introduction-video');
                $file->move($path , $filename);
            }
            $input = $request->except('_token', 'company_introduction');
            $updateJob = EmployerJob::find($id)->update(array_merge($input,[ 'posted_by' => Auth::id(), 'job_status' => 1 , 'company_introduction' => $filename]));
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
        $jobApplicationDetails = JobApplication::where('id',$request->employer_job_application_id)->first();

        $candidateDetails = User::with('candidatePersonalDetails')->find($jobApplicationDetails->candidate_id);
        $employerDetails = User::with('employerDetails')->find(Auth::id());
        $jobDetails = EmployerJob::find($jobApplicationDetails->employer_job_id);
        $interviewRequestExists = JobInterview::where(['employer_job_id'=>$jobApplicationDetails->employer_job_id,'requested_from'=>$jobApplicationDetails->employer_id,'requested_to'=>$jobApplicationDetails->candidate_id]);

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
                'meeting_media'=>$request->reschedule_meeting,
                'status'=> 1,
                'employer_job_id'=>$jobApplicationDetails->employer_job_id
    
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

    public function cantactCandidate($id , Request $request)
    {
        
        $checkConversation = Conversation::where(['employer_id'=>Auth::id(),'candidate_id'=>$id])->first();
        if($checkConversation)
        {
            if($request->ajax()){
                return response()->json(["status" => false , 'error' => "User already added to chat"]);
            }
            return redirect()->route('getEmployerDashboardMessage');
        }else{
            $create =  new Conversation;
            $create->employer_id = Auth::id();
            $create->candidate_id = $id;
            if($create->save())
            {
                if($request->ajax()){
                    return response()->json(["status" => true , 'msg' => "User added to chat"]);
                }
                return redirect()->route('getEmployerDashboardMessage');
            }
        }

    }


   


    public function getSubscriptionPlan(Request $request)
    {
        $validator = Validator::make($request->all() , [ 'plan_id' => 'nullable|numeric'] );

        if($validator->fails())
        {
            return response()->json(['status' => false , 'msg' => implode(',' , $validator->errors()->all())]);
        }

        try{
           $plan = Plan::where('id' , $request->plan_id)->first();
           $html = view('employer.subscription.plan' , ['plan' => $plan])->render();
           return response()->json(['status' => true , 'html' => $html]);
        }catch(\Exception $e){
            return response()->json(['status' => false , 'msg' => $e->getMessage()]);
        }
    }

    public function updateCertificateApprovalStatus(Request $request)
    {
        try{
            $businessLicense = EmployerBusinessLicense::where('employer_id' , $request->employerId)->first();
            $businessLicense->approval_status = $request->status;
            $businessLicense->save();
            return response()->json(['status' => true , 'message' => 'Employer approval status changed successfully']);
        }catch(\Exception $e){
            return response()->json(['status' => true , 'error' => $e->getMessage()]);
        }

    }

    public function updateInterviewStatus(Request $request)
    {
        $validator = Validator::make($request->all() , [
            'interviewId' => 'required|numeric',
            'status' => 'required|numeric', 
        ]);

        if($validator->fails())
        {
            return response()->json(['status' => false , 'error' => implode(',' , $validator->errors()->all())]);
        }

        try{
            $interview = JobInterview::where('id' , $request->interviewId)->first();
            $interview->status = $request->status;
            $interview->save();
            return response()->json(['status' => true , 'message' => 'Interview status changed successfully']);
        }catch(\Exception $e){
            return response()->json(['status' => false , 'error' => $e->getMessage()]);
        }
    }

   
}
