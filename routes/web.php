<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{ AuthenticationController, FrontendController};

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
Route::get('job-marketplace' , [FrontendController::class , 'jobMarketplace'])->name('jobMarketplace');
Route::get('candidate-profile' , [FrontendController::class , 'candidateProfile'])->name('candidateProfile');
Route::get('company' , [FrontendController::class , 'company'])->name('company');
Route::get('/{any}' , [FrontendController::class , 'error'])->where('any','.*');

//frontend routes ends here

