<?php
  
function changeDateFormate($date,$date_format){
    return \Carbon\Carbon::createFromFormat('Y-m-d', $date)->format($date_format);    
}
   
function productImagePath($image_name)
{
    return public_path('images/products/'.$image_name);
}

// saving candidate profile picture 
function saveCandidateProfilePicture($oldFile = null, $newFile, $filePath)
{
    try {
        $public_path = public_path($filePath);
        File::isDirectory($public_path) or File::makeDirectory($public_path, 0777, true, true);
        if ($oldFile) {
            @unlink($oldFile);
        }
        $filename = time() . rand(10000, 99999) . '.' .$newFile->getClientOriginalExtension();
        $newFile->move($public_path, $filename);
        return $filePath . $filename;
    } catch (\Exception $exception) {
        return null;
    }
}

// candidate profile picture path
function  candidateProfilePicturePath($user = null)
{
    if ($user) {
        $path = 'uploads/candidate/' . strtolower(str_replace(' ', '_', trim($user->name))) . '-id-' . $user->id . '/profile_images/';
    } else {
        $path  = 'uploads/candidate/profile_images/';
    }
    return $path;
}

function  getPath($image=null)
{
        $path  = public_path().'/'.$image;
        return $path;
}