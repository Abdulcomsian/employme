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
function  ownerProfilePicturePath($user = null)
{
    if ($user) {
        $path = 'uploads/owner/' . strtolower(str_replace(' ', '_', trim($user->name))) . '-id-' . $user->id . '/profile_images/';
    } else {
        $path  = 'uploads/owner/profile_images/';
    }
    return $path;
}
function  employerStaffPicturePath($user = null)
{
    if ($user) {
        $path = 'uploads/employer/' . strtolower(str_replace(' ', '_', trim($user->name))) . '-id-' . $user->id . '/staff_images/';
    } else {
        $path  = 'uploads/employer/staff_images/';
    }
    return $path;
}
function  employerGalleryPath($user = null)
{
    if ($user) {
        $path = 'uploads/employer/' . strtolower(str_replace(' ', '_', trim($user->name))) . '-id-' . $user->id . '/gallery_images/';
    } else {
        $path  = 'uploads/employer/gallery_images/';
    }
    return $path;
}
function  employerHousingImagePath($user = null)
{
    if ($user) {
        $path = 'uploads/employer/' . strtolower(str_replace(' ', '_', trim($user->name))) . '-id-' . $user->id . '/housing_images/';
    } else {
        $path  = 'uploads/employer/housing_images/';
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
function  employerInstitutionLogoPath($user = null)
{
    if ($user) {
        $path = 'uploads/employer/' . strtolower(str_replace(' ', '_', trim($user->name))) . '-id-' . $user->id . '/instituion-logo/';
    } else {
        $path  = 'uploads/employer/instituion-logo/';
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
function  employerIntroductryVideoPath($user = null)
{
    if ($user) {
        $path = 'uploads/employer/' . strtolower(str_replace(' ', '_', trim($user->name))) . '-id-' . $user->id . '/videos/';
    } else {
        $path  = 'uploads/employer/videos/';
    }
    return $path;
}
function  categoryIconPath($user = null)
{
    if ($user) {
        $path = 'uploads/owner/' . strtolower(str_replace(' ', '_', trim($user->name))) . '-id-' . $user->id . '/category-icons/';
    } else {
        $path  = 'uploads/owner/category-icons/';
    }
    return $path;
}
function  candidateTeachingVideoThumbnailPath($user = null)
{
    if ($user) {
        $path = 'uploads/candidate/' . strtolower(str_replace(' ', '_', trim($user->name))) . '-id-' . $user->id . '/thumbnails/';
    } else {
        $path  = 'uploads/candidate/thumbnails/';
    }
    return $path;
}
function  employerIntroductryVideoThumbnailPath($user = null)
{
    if ($user) {
        $path = 'uploads/employer/' . strtolower(str_replace(' ', '_', trim($user->name))) . '-id-' . $user->id . '/thumbnails/';
    } else {
        $path  = 'uploads/employer/thumbnails/';
    }
    return $path;
}
function  candidateResumeFilePath($user = null)
{
    if ($user) {
        $path = 'uploads/candidate/' . strtolower(str_replace(' ', '_', trim($user->name))) . '-id-' . $user->id . '/resume/';
    } else {
        $path  = 'uploads/candidate/resume/';
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

// function deleteAllCandidateVideo()
// {
//     // Define the directory path (in this case, 'public/images')
//     $directory = public_path(candidateTeachingVideoPath());

//     if (File::isDirectory($directory)) {
//         // Get a list of all files in the directory
//         $files = File::files($directory);

//         foreach ($files as $file) {
//             // Check if the file is an image (you can add more checks here)
//             if (str_contains($file->getMimeType(), 'video')) {
//                 // Unlink (delete) the image file
//                 File::delete($file);
//             }
//         }

//         return "All images in the 'images' directory have been deleted.";
//     } else {
//         return "The specified directory does not exist.";
//     }
    
// }

function employerProfilePercentage()
{
   $excludedColumns = ['sk_cultural_programs',
    'languages_resources_foreign_staff',
    'past_ongoing_training_program',
    'institution_development_opportunities',
    'new_hiree_orientation',
    'current_past_teacher_references',
    'teaching_management_recognition_award',
    'foreign_teachers_in_3_years',
    'foreign_teachers_retention_rate',
    'reason_contract_termination',
    'employer_details',
    'number_of_administrative_staff',
    'established_date',
    'instruction_languages_used',
    'international_accredition_or_certification',
    'accredition_or_certification',
    'available_technical_resources',
    'ability_willingness_assurance',
    'financial_health'
];

$filteredColumns = collect(\Schema::getColumnListing('employer_details'))->filter(function ($column) use ($excludedColumns) {
    return !in_array($column, $excludedColumns);
});
$attributes = $filteredColumns->count();
    // dd($attributes);

    $employerDetails = \App\Models\EmployerDetails::select(
        array_diff(\Schema::getColumnListing('employer_details'), $excludedColumns)
    )->where('user_id', Auth::id())->first();   
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

function getActiveJobStatus($status=null)
{
    $active_status = '';
    if($status==0)
    $active_status = 'expired';
    elseif($status == 1)
    $active_status = 'active';
     else
     $active_status = 'pending';

     return $active_status;
}

function employerSubscription()
{
    $getSubscription = \App\Models\Subscription::with('employerSubscriptionItems')->where('user_id',Auth::id())->first();
    return isset($getSubscription->employerSubscriptionItems) ? 1 : 0;
}

function jobApplicationStatus($employer_job_id=null)
{
    $checkApplication = \App\Models\JobApplication::where('candidate_id',\Auth::id())->where('employer_job_id',$employer_job_id)->first();
    return !empty($checkApplication) ? 1 : 0;
}
function jobInterviewStatus($candidate_id=null,$employer_job_id=null)
{
    $checkInterviewStatus = \App\Models\JobInterview::where(['requested_to'=>$candidate_id,'employer_job_id'=>$employer_job_id,'requested_from'=>\Auth::id()])->first();
    return !empty($checkInterviewStatus) ? 1 : 0;
}
function savedJob($employer_job_id=null)
{
    $checkApplication = \App\Models\SavedJob::where('user_id',\Auth::id())->where('employer_job_id',$employer_job_id)->first();
    return !empty($checkApplication) ? 1 : 0;
}
function savedCandidate($candidate_id=null)
{
    $checkCandidate = \App\Models\SavedCandidate::where('user_id',\Auth::id())->where('candidate_id',$candidate_id)->first();
    return !empty($checkCandidate) ? 1 : 0;
}

function totalApplicants($job_id)
{
    return \DB::table('job_applications')->where('employer_job_id',$job_id)->count();
}

function jobTypeCount($jot_type=null)
{
    $countTypeBasedJob = \DB::table('employer_jobs')->where('job_type',$jot_type)->count();
    return isset($countTypeBasedJob) ? $countTypeBasedJob : 0;
}
function jobExperienceCount($experience_level=null)
{
    $countEpxerienceBasedJob= \DB::table('employer_jobs')->where('experience_level',$experience_level)->count();
    return isset($countEpxerienceBasedJob) ? $countEpxerienceBasedJob : 0;

}
function salaryRanges($range=null)
{
    $numericRange = preg_replace('/[^0-9-]/', '', $range);

    // Split the numeric range into an array
    list($min, $max) = array_map('intval', explode('-', $numericRange));

    // Validate the range
    // if ($min > $max) {
        // Swap values if necessary
        list($min, $max) = array($max, $min);
    // }

    $data['minimum_salary'] = $min * 1000;
    $data['maximum_salary'] = $max * 1000;

    return $data;
}
function employerSpentAmount()
{
        $user = \App\Models\User::find(Auth::id()); // Replace $userId with the actual user ID
        $subscriptions = $user->subscriptions;
        $totalAmountSpent = 0;
        foreach ($subscriptions as $subscription) {
            if($subscription->stripe_status !='canceled')
            {
                foreach ($subscription->invoices() as $invoice) {
                    $totalAmountSpent += $invoice->total;
                }
            }
            
        }
        $totalAmountSpent = number_format($totalAmountSpent/100, 2);
        return $totalAmountSpent;
}
