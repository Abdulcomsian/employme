<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Staff;
use Illuminate\Support\Facades\Validator;
class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $staffMembers = Staff::where('employer_id',\Auth::id())->paginate(10);
        return view('employer.staff.index',compact('staffMembers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employer.staff.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'title'=>'required',
            'year_started'=>'required',
            'staff_image' => 'required',        
        ];
        $validator = Validator::make($request->all(),$rules);
        $validator->validated();
        $imageName = '';
        if ($request->file('staff_image')) {
            $file = $request->file('staff_image');
            $filePath = employerStaffPicturePath();
            $imageName = saveFile($filePath, $file,null);
        }
        $create = new Staff;
        $create->title = $request->title;
        $create->year_started = $request->year_started;
        $create->staff_image = $imageName;
        $create->employer_id = \Auth::id();
        if($create->save())
        {
            toastr('Member Added Successfully');
            return redirect()->route('staff.index');
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
    public function edit($id)
    {
        $memberDetails = Staff::find($id);
        return view('employer.staff.edit',compact('memberDetails'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $update = Staff::find($id);
        $rules = [
            'title'=>'required',
            'year_started'=>'required',
            'staff_image' => 'required',        
        ];
        $validator = Validator::make($request->all(),$rules);
        $validator->validated();
        $imageName = $update->staff_image;
        if ($request->file('staff_image')) {
            $file = $request->file('staff_image');
            $filePath = employerStaffPicturePath();
            $imageName = saveFile($filePath, $file,$update->staff_image);
        }
        
        $update->title = $request->title;
        $update->year_started = $request->year_started;
        $update->staff_image = $imageName;
        $update->employer_id = \Auth::id();
        if($update->save())
        {
            toastr('Member Updated Successfully');
            return redirect()->route('staff.index');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $staffMember = Staff::find($id);
        if($staffMember->staff_image)
        {
            @unlink(public_path($staffMember->staff_image));
        }
        if($staffMember->delete())
        {
            toastr('Member Deleted Successfully');
            return redirect()->route('staff.index');
        }
    }
}
