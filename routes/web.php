<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\{
    AuthenticationController,
    FrontendController,
    MessageController,
    JobController,
    UserController,
    CandidateController,
    EmployerController,
    OwnerController,
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
Route::get('signup', [AuthenticationController::class, 'signup'])->name('signup');
Route::post('candidate-signup-save', [AuthenticationController::class, 'candidate_signup_save'])->name('candidate_signup.save');
Route::post('employer-signup-save', [AuthenticationController::class, 'employer_signup_save'])->name('employer_signup.save');
// Route::get('employer-signup' , [AuthenticationController::class , 'employersignup'])->name('employersignup');
Route::get('/', [FrontendController::class, 'home'])->name('home');
Route::get('how-it-works', [FrontendController::class, 'howItWorks'])->name('howItWorks');
Route::get('find-your-visa', [FrontendController::class, 'visa'])->name('visa');
Route::get('about-us', [FrontendController::class, 'about'])->name('about');
Route::get('blog', [FrontendController::class, 'blog'])->name('blog');
Route::get('faq', [FrontendController::class, 'faq'])->name('faq');
Route::get('how-it-works-employer', [FrontendController::class, 'howItWorksEmployer'])->name('howItWorksEmployer');
Route::get('pricing', [FrontendController::class, 'pricing'])->name('pricing');
Route::get('about-us-employer', [FrontendController::class, 'aboutUsEmployer'])->name('aboutUsEmployer');
Route::get('blog-employer', [FrontendController::class, 'blogEmployer'])->name('blogEmployer');
Route::get('visa-support', [FrontendController::class, 'visaSupport'])->name('visaSupport');
Route::get('contact', [FrontendController::class, 'contact'])->name('contact');
Route::get('terms-of-services', [FrontendController::class, 'termsOfServices'])->name('termsOfServices');
Route::get('services', [FrontendController::class, 'Services'])->name('Services');
//frontend routes ends here

// dashboard routes starts here/////////////////////////////////////////////////////////////////////////////////////////////////////////////
Route::get('job-marketplace', [JobController::class, 'jobMarketplace'])->name('jobMarketplace');
// Route::get('candidate-profile' , [UserController::class , 'candidateProfile'])->name('candidateProfile');
Route::get('company', [UserController::class, 'company'])->name('company');
Route::get('candidates-marketplace', [UserController::class, 'candidatesMarketplace'])->name('candidatesMarketplace');
Route::get('job-details', [UserController::class, 'jobDetails'])->name('jobDetails');
// Route::get('employer-job-listing' , [UserController::class , 'employerjobListing'])->name('employerjobListing');
Route::get('candidate-profile-new', [UserController::class, 'candidateProfileNew'])->name('candidateProfileNew');
Route::get('candidate-profile-document', [UserController::class, 'candidateProfileDocument'])->name('candidateProfileDocument');
Route::get('candidate-profile-interview', [UserController::class, 'candidateProfileInterview'])->name('candidateProfileInterview');
Route::get('candidate-profile-album', [UserController::class, 'candidateProfileAlbum'])->name('candidateProfileAlbum');
Route::get('candidate-profile-comment', [UserController::class, 'candidateProfileComment'])->name('candidateProfileComment');

Route::get('company-about-us', [UserController::class, 'companyAboutUs'])->name('companyAboutUs');
Route::get('company-facilities', [UserController::class, 'companyFacilities'])->name('companyFacilities');
Route::get('company-staff', [UserController::class, 'companyStaff'])->name('companyStaff');
Route::get('company-programs', [UserController::class, 'companyPrograms'])->name('companyPrograms');
Route::get('company-reviews', [UserController::class, 'companyReviews'])->name('companyReviews');
Route::get('company-gallery', [UserController::class, 'companyGallery'])->name('companyGallery');
Route::get('company-location', [UserController::class, 'companyLocation'])->name('companyLocation');
Route::get('company-staff-information', [UserController::class, 'companyStaffInfo'])->name('companyStaffInfo');

//candidate dashboard route starts here
Route::group(['prefix'=>'candidate','middleware' => ['auth','role:candidate']], function() {
    Route::get('dashboard', [CandidateController::class, 'getCandidateDashboard'])->name('getCandidateDashboard');
    Route::get('profile', [CandidateController::class, 'getProfilePage'])->name('getCandidateProfile');
    Route::get('resume', [CandidateController::class, 'getResumePage'])->name('getResumePage');
    Route::get('messages', [MessageController::class, 'getCandidateMessagePage'])->name('getCandidateMessages');
    Route::get('job-alert', [JobController::class, 'getJobAlertPage'])->name('getJobAlert');
    Route::get('save-job', [JobController::class, 'getSaveJobsPage'])->name('getSaveJob');
    Route::post('candidate/save-profile-1',[CandidateController::class,'saveProfile1'])->name('candidate.profile-1.save');
    Route::post('candidate/save-profile-2',[CandidateController::class,'saveProfile2'])->name('candidate.profile-2.save');
    Route::post('candidate/save-profile-3',[CandidateController::class,'saveProfile3'])->name('candidate.profile-3.save');
    Route::post('candidate/save-profile-4',[CandidateController::class,'saveProfile4'])->name('candidate.profile-4.save');
    Route::post('candidate/save-profile-5',[CandidateController::class,'saveProfile5'])->name('candidate.profile-5.save');
    Route::post('candidate/save-profile-6',[CandidateController::class,'saveProfile6'])->name('candidate.profile-6.save');
    Route::post('candidate/save-profile-7',[CandidateController::class,'saveProfile7'])->name('candidate.profile-7.save');
    Route::get('account-settings', [UserController::class, 'getAccountSettingsPage'])->name('getAccountSetting');
});
//candidate dashboard route ends here

//employer dashboard route starts here
Route::group(['prefix'=>'employer','middleware' => ['auth','role:employer']], function () {
    Route::get('dashboard', [EmployerController::class, 'getEmployerDashboard'])->name('getEmployerDashboard');
    Route::get('employer-profile', [EmployerController::class, 'getEmployerProfilePage'])->name('getEmployerProfile');
    Route::get('job-listing', [JobController::class, 'getJobListing'])->name('getJobListing');
    Route::get('employer-interview-request', [JobController::class, 'getInterviewpage'])->name('getEmployerInterviewRequest');
    Route::get('employer-dashboard-message', [MessageController::class, 'getEmployerMessage'])->name('getEmployerDashboardMessage');
    Route::get('employer-dashboard-saved-candidate', [EmployerController::class, 'getEmployerCandidate'])->name('getEmployerDashboardSavedCandidate');
    Route::get('employer-dashboard-subscription-plan', [EmployerController::class, 'getEmployerSubscription'])->name('getEmployerSubscriptionPlan');
    Route::get('employer-dashboard-settings', [UserController::class, 'getEmployerAccountSettingpage'])->name('getEmployerDashboardSettings');
    Route::get('post-a-job', [EmployerController::class, 'postAJob'])->name('postAJob');
    Route::get('Job-listing-candidate', [EmployerController::class, 'JobListingCandidate'])->name('JobListingCandidate');
    Route::get('schedule-interview', [EmployerController::class, 'scheduleInterview'])->name('scheduleInterview');
});
//employer dashboard route ends here

//owner dashboard route starts here
Route::group(['prefix'=>'owner','middleware' => ['auth','role:admin']], function () {
    Route::get('dashboard', [OwnerController::class, 'getOwnerDashboard'])->name('getOwnerDashboard');
    Route::get('profile', [OwnerController::class, 'getOwnerProfile'])->name('getOwnerProfile');
    Route::get('users', [OwnerController::class, 'getUserProfile'])->name('getUserProfile');
});
//owner dashboard route ends here
Auth::routes();
Route::get('logout', [AuthenticationController::class,'logout']);
Route::post('authLogin', [AuthenticationController::class,'authLogin'])->name('authLogin');

Route::get('/email/verify', function () {
    return view('auth.verify');
})->name('verification.notice');
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/email/verify/{id}/{hash}',[AuthenticationController::class,'verify_email'])->name('verification.verify');
//dashborad routes ends here////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Route::get('/{any}', [FrontendController::class, 'error'])->where('any', '.*');
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
 
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

