<?php
function changeDateFormate($date,$date_format){
    return \Carbon\Carbon::createFromFormat('Y-m-d', $date)->format($date_format);    
}
   
function productImagePath($image_name)
{
    return public_path('images/products/'.$image_name);
}

// saving candidate profile picture 
function saveFile($filePath, $newFile, $oldFile = null)
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

function  employerConfirmationDocumentPath($user = null)
{
    if ($user) {
        $path = 'uploads/employer/' . strtolower(str_replace(' ', '_', trim($user->name))) . '-id-' . $user->id . '/confirmation_documents/';
    } else {
        $path  = 'uploads/employer/confirmation_documents/';
    }
    return $path;
}
function  employerCertificationtPath($user = null)
{
    if ($user) {
        $path = 'uploads/employer/' . strtolower(str_replace(' ', '_', trim($user->name))) . '-id-' . $user->id . '/certifications/';
    } else {
        $path  = 'uploads/employer/certifications/';
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

function employeProfilePercentage()
{
    $attributes = collect(\Schema::getColumnListing('employer_details'))->count();
    // dd($attributes);

    $employerDetails = \App\Models\EmployerDetails::where('user_id', Auth::id())->first();
    $recordArray = $employerDetails->toArray(); // Convert the record to an array
    
    // Filter out non-null values
    $filtered = collect($recordArray)->filter(function ($value) {
        return !is_null($value);
    })->count();
    // return ($complete / count($attributes)) * 100;
    $percentage = ($filtered / $attributes) * 100;
    $percentage = round($percentage,0);
    $percentage = number_format($percentage,0);
    return $percentage;
}

function employeeProfilePercentage()
{
    $attributes = collect(\Schema::getColumnListing('employer_details'))->count();
    // dd($attributes);

    $employerDetails = \App\Models\EmployerDetails::where('user_id', Auth::id())->first();
    $recordArray = $employerDetails->toArray(); // Convert the record to an array
    
    // Filter out non-null values
    $filtered = collect($recordArray)->filter(function ($value) {
        return !is_null($value);
    })->count();
    // return ($complete / count($attributes)) * 100;
    $percentage = ($filtered / $attributes) * 100;
    $percentage = round($percentage,0);
    $percentage = number_format($percentage,0);
    return $percentage;
}
function candidateProfilePercentage()
{
    $candidatePersonalDetailsAttributes = collect(\Schema::getColumnListing('candidate_personal_details'))->count();
    $candidatePreferencesAttributes = collect(\Schema::getColumnListing('candidate_preferences'))->count();
    $candidateEducationAttributes = collect(\Schema::getColumnListing('candidate_education'))->count();

    $candidatePersonalDetails = \App\Models\CandidatePersonalDetails::where('user_id', Auth::id())->first();
    $candidatePersonalDetails = $candidatePersonalDetails->toArray();

    $candidatePreferences = \App\Models\CandidatePreferences::where('user_id', Auth::id())->first();
    $candidatePreferences = $candidatePreferences->toArray();

    $candidateEducation = \App\Models\CandidateEducation::where('user_id', Auth::id())->first();
    $candidateEducation = $candidateEducation->toArray();
    
    $totalAttributes = $candidatePersonalDetailsAttributes +  $candidatePreferencesAttributes + $candidateEducationAttributes;
    $filledPersonalDetails = collect($candidatePersonalDetails)->filter(function ($value) {
        return !is_null($value);
    })->count();
    $filledPreferences = collect($candidatePreferences)->filter(function ($value) {
        return !is_null($value);
    })->count();
    $filledEducation = collect($candidateEducation)->filter(function ($value) {
        return !is_null($value);
    })->count();
    $totalFilledAttributes = $filledPersonalDetails + $filledEducation + $filledEducation;
    $percentage = ($totalFilledAttributes / $totalAttributes) * 100;
    $percentage = round($percentage,0);
    $percentage = number_format($percentage,0);
    return $percentage;
}