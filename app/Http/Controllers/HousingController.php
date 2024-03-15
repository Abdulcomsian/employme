<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Housing;
class HousingController extends Controller
{
    public function index()
    {
        $housingImages = Housing::where('employer_id',\Auth::id())->paginate(10);
        return view('employer.housings.index',compact('housingImages'));
    }
    public function store(Request $request)
    {
        if(isset($request->housing_images))
        {
            foreach($request->housing_images as $index=>$galleryFile)
            {
                $imageName = '';
                $file = $galleryFile;
                $filePath = employerHousingImagePath();
                $imageName = saveFile($filePath, $file,null);
                $create = new Housing;
                $create->file_name = $imageName;
                $create->employer_id = \Auth::id();
                $create->save();
            }
        }
        
        toastr('Files Saved Successfully');
        return redirect()->route('employer.housing.index');


    }
    public function destroy(string $id)
    {
        $deleteData = Housing::find($id);
        if($deleteData->staff_image)
        {
            @unlink(public_path($deleteData->file_name));
        }
        if($deleteData->delete())
        {
            toastr('File Deleted Successfully');
            return redirect()->route('employer.housing.index');
        }
    }
}
