<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmployerJob;
use Illuminate\Support\Facades\Auth;
class EmployerJobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employerJobs = EmployerJob::all();
        return view('employer.jobs.index',get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employer.jobs.create',get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {

        $input = $request->except('_token');
        $createJob = EmployerJob::create(array_merge($input.['posted_by'=>Auth::id(),'job_status'=>1]));
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
}
