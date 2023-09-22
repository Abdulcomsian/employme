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

//frontend routes ends here


// dashboard routes starts here/////////////////////////////////////////////////////////////////////////////////////////////////////////////
Route::get('job-marketplace' , [JobController::class , 'jobMarketplace'])->name('jobMarketplace');
Route::get('candidate-profile' , [UserController::class , 'candidateProfile'])->name('candidateProfile');
Route::get('company' , [UserController::class , 'company'])->name('company');
Route::get('candidates-marketplace' , [UserController::class , 'candidatesMarketplace'])->name('candidatesMarketplace');
Route::get('job-listing' , [UserController::class , 'jobListing'])->name('jobListing');


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
    Route::get('employer-profile' , [EmployerController::class , 'getEmployerProfilePage'])->name('getEmployerProfile');
    Route::get('job-listing' , [JobController::class , 'getJobpage'])->name('getJobListing');
    Route::get('employer-interview-request' , [JobController::class , 'getInterviewpage'])->name('getEmployerInterviewRequest');
    Route::get('employer-dashboard-message' , [MessageController::class , 'getEmployerMessage'])->name('getEmployerDashboardMessage');
    Route::get('employer-dashboard-saved-candidate' , [EmployerController::class , 'getEmployerCandidate'])->name('getEmployerDashboardSavedCandidate');
    Route::get('employer-dashboard-subscription-plan' , [EmployerController::class , 'getEmployerSubscription'])->name('getEmployerSubscriptionPlan');
    Route::get('employer-dashboard-settings' , [UserController::class , 'getEmployerAccountSettingpage'])->name('getEmployerDashboardSettings');
});
//employer dashboard route ends here


//employer dashboard route starts here 
Route::prefix("employer")->group(function(){

});
//employer dashboard route ends here

//dashborad routes ends here////////////////////////////////////////////////////////////////////////////////////////////////////////////////
Route::get('/{any}' , [FrontendController::class , 'error'])->where('any','.*');

