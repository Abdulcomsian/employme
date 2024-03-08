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
    SubscriptionController,
    EmployerJobController,
    JobCategoryController,
    StripeWebhookController
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
Route::get('signup', [AuthenticationController::class, 'signup'])->name('signup')->middleware('guest');
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
Route::get('get-states/{id}', [HomeController::class, 'getStates'])->name('getStates');
Route::get('get-cities/{id}', [HomeController::class, 'getCities'])->name('getCities');
//frontend routes ends here

// dashboard routes starts here/////////////////////////////////////////////////////////////////////////////////////////////////////////////
Route::get('job-marketplace', [JobController::class, 'jobMarketplace'])->name('jobMarketplace');
Route::get('search/job-marketplace', [JobController::class, 'SearchjobMarketplace'])->name('SearchjobMarketplace');
Route::post('job/apply', [JobController::class, 'jobApplicationRequest'])->name('jobApplicationRequest')->middleware('auth');
Route::post('save-job', [JobController::class, 'saveJob'])->name('saveJob')->middleware(['auth','role:candidate']);
// Route::get('candidate-profile' , [UserController::class , 'candidateProfile'])->name('candidateProfile');
Route::get('company', [UserController::class, 'company'])->name('company');
Route::get('candidates-marketplace', [UserController::class, 'candidatesMarketplace'])->name('candidatesMarketplace');
Route::get('job-details/{id}', [UserController::class, 'jobDetails'])->name('jobDetails');
Route::post('save-candidate', [UserController::class, 'saveCandidate'])->name('saveCandidate')->middleware(['auth','role:employer']);
Route::post('download-resume', [UserController::class, 'downloadResume'])->name('downloadResume');
// Route::get('employer-job-listing' , [UserController::class , 'employerjobListing'])->name('employerjobListing');
Route::get('candidate-profile-new/{id}', [UserController::class, 'candidateProfileNew'])->name('candidateProfileNew');
Route::get('candidate-profile-document', [UserController::class, 'candidateProfileDocument'])->name('candidateProfileDocument');
Route::get('candidate-profile-interview', [UserController::class, 'candidateProfileInterview'])->name('candidateProfileInterview');
Route::get('candidate-profile-album', [UserController::class, 'candidateProfileAlbum'])->name('candidateProfileAlbum');
Route::get('candidate-profile-comment', [UserController::class, 'candidateProfileComment'])->name('candidateProfileComment');

Route::get('company-about-us/{id}', [UserController::class, 'companyAboutUs'])->name('companyAboutUs');
Route::get('company-facilities/{id}', [UserController::class, 'companyFacilities'])->name('companyFacilities');
Route::get('company-staff/{id}', [UserController::class, 'companyStaff'])->name('companyStaff');
Route::get('company-programs/{id}', [UserController::class, 'companyPrograms'])->name('companyPrograms');
Route::get('company-reviews/{id}', [UserController::class, 'companyReviews'])->name('companyReviews');
Route::get('company-gallery/{id}', [UserController::class, 'companyGallery'])->name('companyGallery');
Route::get('company-location/{id}', [UserController::class, 'companyLocation'])->name('companyLocation');
Route::get('company-staff-information/{id}', [UserController::class, 'companyStaffInfo'])->name('companyStaffInfo');

//candidate dashboard route starts here
Route::group(['prefix'=>'candidate','middleware' => ['auth','role:candidate','email_verfication','profile_completion']], function() {
    Route::get('dashboard', [CandidateController::class, 'getCandidateDashboard'])->name('getCandidateDashboard');
    Route::get('profile', [CandidateController::class, 'getProfilePage'])->name('getCandidateProfile');
    Route::get('resume', [CandidateController::class, 'getResumePage'])->name('getResumePage');
    Route::get('messages', [MessageController::class, 'getCandidateMessagePage'])->name('getCandidateMessages');
    Route::get('job-alert', [JobController::class, 'getJobAlertPage'])->name('getJobAlert');
    // Route::get('save-job', [JobController::class, 'getSaveJobsPage'])->name('getSaveJob');
    Route::get('account-settings', [UserController::class, 'getAccountSettingsPage'])->name('getAccountSetting');
    Route::get('job-applications', [CandidateController::class, 'candidateJobApplications'])->name('candidateJobApplications');
    Route::get('interview-requests', [CandidateController::class, 'candidateInterviewRequests'])->name('candidateInterviewRequests');
    Route::post('accept-interview/{id}',[CandidateController::class,'acceptInterview'])->name('candidate.acceptInterview');
    Route::post('reject-interview/{id}',[CandidateController::class,'rejectInterview'])->name('candidate.rejectInterview');
    Route::post('reschedule-interview',[CandidateController::class,'rescheduleInterview'])->name('candidate.reschedule_interview');
    Route::delete('job-applications/delete/{id}', [CandidateController::class, 'deleteApplication'])->name('candidate.delete-application');
  
});
Route::group(['prefix'=>'candidate','middleware' => ['auth','role:candidate']], function() {
    Route::post('save-profile-1',[CandidateController::class,'saveProfile1'])->name('candidate.profile-1.save');
    Route::post('save-profile-2',[CandidateController::class,'saveProfile2'])->name('candidate.profile-2.save');
    Route::post('save-profile-3',[CandidateController::class,'saveProfile3'])->name('candidate.profile-3.save');
    Route::post('save-profile-4',[CandidateController::class,'saveProfile4'])->name('candidate.profile-4.save');
    Route::post('save-profile-5',[CandidateController::class,'saveProfile5'])->name('candidate.profile-5.save');
    Route::post('save-profile-6',[CandidateController::class,'saveProfile6'])->name('candidate.profile-6.save');
    Route::post('save-profile-7',[CandidateController::class,'saveProfile7'])->name('candidate.profile-7.save');
    Route::get('saved-jobs', [CandidateController::class, 'candidateSavedJobs'])->name('candidateSavedJobs');
    Route::post('update-account-settings', [UserController::class, 'updateCandidateAccountSettingpage'])->name('candidate.updateAccountSettingpage');
    Route::post('update-password', [UserController::class, 'candidateUpdatePassword'])->name('candidate.updatePassword');
    Route::delete('removed-job/{id}', [CandidateController::class, 'removeSavedJob'])->name('removeSavedJob');
});
//candidate dashboard route ends here

//employer dashboard route starts here
Route::group(['prefix'=>'employer','middleware' => ['auth','role:employer','email_verfication','profile_completion']], function () {
    Route::get('dashboard', [EmployerController::class, 'getEmployerDashboard'])->name('getEmployerDashboard');
    Route::get('employer-profile', [EmployerController::class, 'getEmployerProfilePage'])->name('getEmployerProfile');
    Route::get('job-listing', [JobController::class, 'getJobListing'])->name('getJobListing');
    Route::get('interview-requests', [JobController::class, 'getInterviewpage'])->name('getEmployerInterviewRequest');
    Route::get('employer-dashboard-message', [MessageController::class, 'getEmployerMessage'])->name('getEmployerDashboardMessage');
    Route::get('employer-dashboard-saved-candidate', [EmployerController::class, 'getEmployerCandidate'])->name('getEmployerDashboardSavedCandidate');
    Route::get('subscriptions', [EmployerController::class, 'employerSubscriptions'])->name('employerSubscriptions');
    Route::post('cancel-subscription', [EmployerController::class, 'cancelSubscription'])->name('cancelSubscription');
    Route::get('employer-dashboard-subscription-plan', [EmployerController::class, 'getEmployerSubscription'])->name('getEmployerSubscriptionPlan');
    Route::get('employer-account-settings', [UserController::class, 'getEmployerAccountSettingpage'])->name('getEmployerDashboardSettings');
    Route::get('post-a-job', [EmployerController::class, 'postAJob'])->name('postAJob');
    Route::get('employer-jobs/Job-listing-candidate/{id}', [EmployerController::class, 'JobListingCandidate'])->name('employer.JobListingCandidate');
    Route::put('employer-jobs/activate-job/{id}', [JobController::class, 'activateJob'])->name('employer.activate-job');
    Route::put('employer-jobs/de-activate-job/{id}', [JobController::class, 'deactivateJob'])->name('employer.deactivate-job');
    Route::resource('employer-jobs', EmployerJobController::class);

    /*Routes regarding Job Applications Actions */
    Route::post('interview-invitation', [EmployerJobController::class, 'interviewInvitation'])->name('employer.interviewInvitation');
    Route::put('reject-application/{id}', [EmployerJobController::class, 'rejectApplication'])->name('employer.rejectApplication');

    Route::get('schedule-interview', [EmployerController::class, 'scheduleInterview'])->name('scheduleInterview');
    Route::get('job-applications', [EmployerController::class, 'employerJobApplications'])->name('employerJobApplications');
    Route::post('accept-reschedule-request/{id}',[EmployerController::class,'acceptRescheduleRequest'])->name('employer.accept_reschedule_request');
    Route::post('reject-reschedule-request/{id}',[EmployerController::class,'rejectRescheduleRequest'])->name('employer.reject_reschedule_request');

});
Route::group(['prefix'=>'employer','middleware' => ['auth','role:employer']], function () {
    Route::post('employer/save-profile-1',[EmployerController::class,'saveProfile1'])->name('employer.profile-1.save');
    Route::post('employer/save-profile-2',[EmployerController::class,'saveProfile2'])->name('employer.profile-2.save');
    Route::post('employer/save-profile-3',[EmployerController::class,'saveProfile3'])->name('employer.profile-3.save');
    Route::post('employer/save-profile-4',[EmployerController::class,'saveProfile4'])->name('employer.profile-4.save');
    Route::post('employer/save-profile-5',[EmployerController::class,'saveProfile5'])->name('employer.profile-5.save');
    Route::post('employer/save-profile-6',[EmployerController::class,'saveProfile6'])->name('employer.profile-6.save');
    Route::post('employer/save-profile-7',[EmployerController::class,'saveProfile7'])->name('employer.profile-7.save');
    Route::post('employer/save-profile-8',[EmployerController::class,'saveProfile8'])->name('employer.profile-8.save');
    Route::post('employer/save-profile-9',[EmployerController::class,'saveProfile9'])->name('employer.profile-9.save');
    Route::post('subscription', [SubscriptionController::class, 'subscription'])->name("subscription.create");
    Route::post('update-account-settings', [UserController::class, 'updateEmployerAccountSettingpage'])->name('employer.updateAccountSettingpage');
    Route::post('employer-update-password', [UserController::class, 'employerUpdatePassword'])->name('employer.employerUpdatePassword');
    Route::get('saved-candidates', [EmployerController::class, 'employerSavedCandidates'])->name('employerSavedCandidates');
    Route::delete('removed-candidate/{id}', [EmployerController::class, 'removeSavedCandidate'])->name('removeSavedCandidate');
    Route::post('request-job-interview',[EmployerController::class,'jobInterviewRequest'])->name('employer.job_interview_request');


});
//employer dashboard route ends here

//owner dashboard route starts here
Route::group(['prefix'=>'owner','middleware' => ['auth','role:admin']], function () {
    Route::get('dashboard', [OwnerController::class, 'getOwnerDashboard'])->name('getOwnerDashboard');
    Route::get('profile', [OwnerController::class, 'getOwnerProfile'])->name('getOwnerProfile');
    Route::get('users', [OwnerController::class, 'getUserProfile'])->name('getUserProfile');
    Route::get('candidates', [OwnerController::class, 'getCandidates'])->name('getCandidates');
    Route::get('employers', [OwnerController::class, 'getEmployers'])->name('getEmployers');
    Route::get('employers/employer-details', [OwnerController::class, 'getEmployerDetails'])->name('getEmployerDetails');
    Route::get('employer-jobs', [OwnerController::class, 'getEmployersJobs'])->name('admin.getEmployersJobs');
    Route::get('job-applications', [OwnerController::class, 'getJobApplications'])->name('admin.getJobApplications');
    Route::get('professional-skills', [OwnerController::class, 'getProfessionalSkills'])->name('getProfessionalSkills');
    Route::post('save-professional-skill', [OwnerController::class, 'storeProfessionalSkill'])->name('saveProfessionalSkill');
    Route::get('edit-professional-skill/{id}', [OwnerController::class, 'editProfessionalSkill'])->name('editProfessionalSkill');
    Route::put('update-professional-skill/{id}', [OwnerController::class, 'updateProfessionalSkill'])->name('updateProfessionalSkill');
    Route::get('employer-jobs/Job-listing-candidate/{id}', [OwnerController::class, 'JobListingCandidate'])->name('owner.JobListingCandidate');
    Route::get('delete-professional-skill/{id}', [OwnerController::class, 'deleteProfessionalSkill'])->name('deleteProfessionalSkill');
    Route::get('plans', [SubscriptionController::class, 'index'])->name('getPlans');
    Route::post('update-account-details',[UserController::class,'udpateOwnerAccountDetails'])->name('owner.updateOwnerAccount');
    Route::post('update-password',[UserController::class,'ownerUpdatePassword'])->name('owner.updatePassword');
    Route::get('plans/{plan}', [SubscriptionController::class, 'show'])->name("plans.show");
    Route::resource('job-categories', JobCategoryController::class);
});
//owner dashboard route ends here
// Auth::routes();
Route::get('logout', [AuthenticationController::class,'logout'])->name('authLogout');
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

Route::get('/forgot-password', [AuthenticationController::class,'forgotPassword'])->middleware('guest')->name('password.request');
Route::post('/forgot-password', [AuthenticationController::class,'sendResetPasswordLInk'])->middleware('guest')->name('password.email');
Route::get('/reset-password/{token}', [AuthenticationController::class,'resetPassword'])->middleware('guest')->name('password.reset');
Route::post('/reset-password', [AuthenticationController::class,'udpateResetPassword'])->middleware('guest')->name('password.update');
Route::post(
    'stripe/webhook',
    '\Laravel\Cashier\Http\Controllers\WebhookController@handleWebhook'
);
// Route::post('/stripe/webhook', [StripeWebhookController::class, 'handleWebhook']);
