<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobCategory;
use Illuminate\Support\Facades\Auth;
class JobCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->ajax())
        {
            
            $jobCategories = JobCategory::all();
            foreach ($jobCategories as $jobCategory) {
                $jobCategory->Options = '<button class="btn btn-primary Edit-Job-Category-Button m-1"   type="button" type="button" data-bs-toggle="modal" data-bs-target="#Edit-Job-Category-Modal"><i class="bi bi-pen"></i></button><button class="btn btn-danger Delete-Job-Category-Button"   type="button" type="button" ><i class="bi bi-trash"></i></button>';
            }
            $output = array(
                    "recordsTotal" => count($jobCategories),
                    "recordsFiltered" => count($jobCategories),
                    "data" => $jobCategories
            );
             return \Response::json($output);
        }
        return view('owner.job-categories.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $createJobCategory = JobCategory::create(array_merge($input,['user_id'=>Auth::id()]));

        return  \Response::json(['status' => 'success','msg' => __('Job Category Added successfully')]);
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $input = $request->except('id');
        $updateJobCategory = JobCategory::where('id',$id)->update($input);
        return  \Response::json(['status' => 'success','msg' => __('Job Category Updated successfully')]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deleteJobCategory = JobCategory::where('id',$id)->delete();
        return  \Response::json(['status' => 'success','msg' => __('Job Category Deleted successfully')]);
    }
}
