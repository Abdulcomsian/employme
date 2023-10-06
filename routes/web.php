<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{ 
    AuthenticationController, 
    FrontendController,
    MessageController,
    JobController,
    UserController,
    CandidateController,
    EmployerController,
};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


//frontend routes starts here
Route::get('signup' , [AuthenticationController::class , 'signup'])->name('signup');
// Route::get('employer-signup' , [AuthenticationController::class , 'employersignup'])->name('employersignup');
Route::get('/', [FrontendController::class , 'home'])->name('home');
Route::get('how-it-works', [FrontendController::class , 'howItWorks'])->name('howItWorks');
Route::get('find-your-visa', [FrontendController::class , 'visa'])->name('visa');
Route::get('about-us', [FrontendController::class , 'about'])->name('about');
Route::get('blog', [FrontendController::class , 'blog'])->name('blog');
Route::get('faq', [FrontendController::class , 'faq'])->name('faq');
Route::get('how-it-works-employer', [FrontendController::class , 'howItWorksEmployer'])->name('howItWorksEmployer');
Route::get('pricing', [FrontendController::class , 'pricing'])->name('pricing');
Route::get('about-us-employer', [FrontendController::class , 'aboutUsEmployer'])->name('aboutUsEmployer');
Route::get('blog-employer', [FrontendController::class , 'blogEmployer'])->name('blogEmployer');
Route::get('visa-support', [FrontendController::class , 'visaSupport'])->name('visaSupport');
Route::get('contact', [FrontendController::class , 'contact'])->name('contact');
Route::get('terms-of-services', [FrontendController::class , 'termsOfServices'])->name('termsOfServices');
Route::get('services', [FrontendController::class , 'Services'])->name('Services');
//frontend routes ends here

// dashboard routes starts here/////////////////////////////////////////////////////////////////////////////////////////////////////////////
Route::get('job-marketplace' , [JobController::class , 'jobMarketplace'])->name('jobMarketplace');
// Route::get('candidate-profile' , [UserController::class , 'candidateProfile'])->name('candidateProfile');
Route::get('company' , [UserController::class , 'company'])->name('company');
Route::get('candidates-marketplace' , [UserController::class , 'candidatesMarketplace'])->name('candidatesMarketplace');
Route::get('job-listing' , [UserController::class , 'jobListing'])->name('jobListing');
Route::get('employer-job-listing' , [UserController::class , 'employerjobListing'])->name('employerjobListing');
Route::get('candidate-profile-new' , [UserController::class , 'candidateProfileNew'])->name('candidateProfileNew');
Route::get('candidate-profile-document' , [UserController::class , 'candidateProfileDocument'])->name('candidateProfileDocument');
Route::get('candidate-profile-interview' , [UserController::class , 'candidateProfileInterview'])->name('candidateProfileInterview');
Route::get('candidate-profile-album' , [UserController::class , 'candidateProfileAlbum'])->name('candidateProfileAlbum');
Route::get('candidate-profile-comment' , [UserController::class , 'candidateProfileComment'])->name('candidateProfileComment');

Route::get('company-about-us' , [UserController::class , 'companyAboutUs'])->name('companyAboutUs');
Route::get('company-facilities' , [UserController::class , 'companyFacilities'])->name('companyFacilities');
Route::get('company-staff' , [UserController::class , 'companyStaff'])->name('companyStaff');
Route::get('company-programs' , [UserController::class , 'companyPrograms'])->name('companyPrograms');
Route::get('company-reviews' , [UserController::class , 'companyReviews'])->name('companyReviews');
Route::get('company-gallery' , [UserController::class , 'companyGallery'])->name('companyGallery');
Route::get('company-location' , [UserController::class , 'companyLocation'])->name('companyLocation');
Route::get('company-staff-information' , [UserController::class , 'companyStaffInfo'])->name('companyStaffInfo');

//candidate dashboard route starts here
Route::prefix("candidate")->group(function(){
    Route::get('dashboard' , [CandidateController::class , 'getDashboardPage'])->name('getCandidateDashboard');
    Route::get('profile' , [CandidateController::class , 'getProfilePage'])->name('getCandidateProfile');
    Route::get('resume' , [CandidateController::class , 'getResumePage'])->name('getResumePage');
    Route::get('messages' , [MessageController::class, 'getCandidateMessagePage'])->name('getCandidateMessages');
    Route::get('job-alert' , [JobController::class , 'getJobAlertPage'])->name('getJobAlert');
    Route::get('save-job' , [JobController::class ,'getSaveJobsPage'])->name('getSaveJob');
    Route::get('account-settings' , [UserController::class , 'getAccountSettingsPage'])->name('getAccountSetting');
});
//candidate dashboard route ends here

//employer dashboard route starts here
Route::prefix("employer")->group(function(){
    Route::get('dashboard' , [EmployerController::class , 'getDashboardPage'])->name('getEmployerDashboard');
    Route::get('employer-profile' , [EmployerController::class , 'getEmployerProfilePage'])->name('getEmployerProfile');
    Route::get('job-listing' , [JobController::class , 'getJobpage'])->name('getJobListing');
    Route::get('employer-interview-request' , [JobController::class , 'getInterviewpage'])->name('getEmployerInterviewRequest');
    Route::get('employer-dashboard-message' , [MessageController::class , 'getEmployerMessage'])->name('getEmployerDashboardMessage');
    Route::get('employer-dashboard-saved-candidate' , [EmployerController::class , 'getEmployerCandidate'])->name('getEmployerDashboardSavedCandidate');
    Route::get('employer-dashboard-subscription-plan' , [EmployerController::class , 'getEmployerSubscription'])->name('getEmployerSubscriptionPlan');
    Route::get('employer-dashboard-settings' , [UserController::class , 'getEmployerAccountSettingpage'])->name('getEmployerDashboardSettings');
    Route::get('post-job-listing', [EmployerController::class, 'getPostJob'])->name('postJobs');
    Route::get('List-Your-Job', [EmployerController::class, 'ListYourJob'])->name('List_Your_Job');
});
//employer dashboard route ends here

//employer dashboard route starts here 
Route::prefix("employer")->group(function(){

});
//employer dashboard route ends here

//dashborad routes ends here////////////////////////////////////////////////////////////////////////////////////////////////////////////////
Route::get('/{any}' , [FrontendController::class , 'error'])->where('any','.*');



