<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery;
class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galleryImages = Gallery::where('employer_id',\Auth::id())->paginate(10);
        return view('employer.gallery.index',compact('galleryImages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employer.gallery.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(isset($request->gallery_files))
        {
            foreach($request->gallery_files as $index=>$galleryFile)
            {
                $imageName = '';
                $imageExt = '';
                $file = $galleryFile;
                $imageExt = $file->getClientOriginalExtension();
                $filePath = employerGalleryPath();
                $imageName = saveFile($filePath, $file,null);
                $create = new Gallery;
                $create->file_name = $imageName;
                $create->file_extension = $imageExt;
                $create->employer_id = \Auth::id();
                $create->save();
            }
        }
        
        toastr('File Added Successfully to Gallery');
        return redirect()->route('gallery.index');


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
        $memberDetails = Gallery::find($id);
        return view('employer.gallery.edit',compact('memberDetails'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $update = Gallery::find($id);
        $rules = [
            'title'=>'required',
            'year_started'=>'required',
            'staff_image' => 'required',        
        ];
        $validator = Validator::make($request->all(),$rules);
        $validator->validated();
        $imageName = $update->staff_image;
        $imageExt =  $update->file_extension;
        if ($request->file('staff_image')) {
            $file = $request->file('staff_image');
            $imageExt = $file->getClientOriginalExtension();
            $filePath = employerStaffPicturePath();
            $imageExt = $file->getClientOriginalExtension();
            $imageName = saveFile($filePath, $file,$update->file_name);
        }
        
        $update->file_name = $imageName;
        $update->file_extension = $imageExt;
        $update->employer_id = \Auth::id();
        if($update->save())
        {
            toastr('File Updated Successfully');
            return redirect()->route('staff.index');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deleteData = Gallery::find($id);
        if($deleteData->staff_image)
        {
            @unlink(public_path($deleteData->staff_image));
        }
        if($deleteData->delete())
        {
            toastr('File Deleted Successfully');
            return redirect()->route('gallery.index');
        }
    }
}
