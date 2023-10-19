<?php
  
function changeDateFormate($date,$date_format){
    return \Carbon\Carbon::createFromFormat('Y-m-d', $date)->format($date_format);    
}
   
function productImagePath($image_name)
{
    return public_path('images/products/'.$image_name);
}

// saving candidate profile picture 
function saveFile( $newFile, $filePath, $oldFile = null)
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

function  candidateTeachingVideoPath($user = null)
{
    if ($user) {
        $path = 'uploads/candidate/' . strtolower(str_replace(' ', '_', trim($user->name))) . '-id-' . $user->id . '/videos/';
    } else {
        $path  = 'uploads/candidate/videos/';
    }
    return $path;
}

function  getPath($image=null)
{
        $path  = public_path().'/'.$image;
        return $path;
}


function deleteAllCandidateProfileImages()
{
    // Define the directory path (in this case, 'public/images')
    $directory = public_path(candidateProfilePicturePath());

    if (File::isDirectory($directory)) {
        // Get a list of all files in the directory
        $files = File::files($directory);

        foreach ($files as $file) {
            // Check if the file is an image (you can add more checks here)
            if (str_contains($file->getMimeType(), 'image')) {
                // Unlink (delete) the image file
                File::delete($file);
            }
        }

        return "All images in the 'images' directory have been deleted.";
    } else {
        return "The specified directory does not exist.";
    }
}

function deleteAllCandidateVideo()
{
    // Define the directory path (in this case, 'public/images')
    $directory = public_path(candidateProfilePicturePath());

    if (File::isDirectory($directory)) {
        // Get a list of all files in the directory
        $files = File::files($directory);

        foreach ($files as $file) {
            // Check if the file is an image (you can add more checks here)
            if (str_contains($file->getMimeType(), 'image')) {
                // Unlink (delete) the image file
                File::delete($file);
            }
        }

        return "All images in the 'images' directory have been deleted.";
    } else {
        return "The specified directory does not exist.";
    }
    
}
