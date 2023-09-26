<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function home(){
        return view('home');
    }
    
    
    public function howItWorks(){
        return view('how-it-works');
    }
    
    
    public function visa(){
        return view('find-your-visa');
    }
    

    public function about(){
        return view('about-us');
    }
    
    
    public function blog(){
        return view('blog');
    }
    
    
    public function faq(){
        return view('faq');
    }
    
    
    public function howItWorksEmployer(){
        return view('how-it-works-Employer');
    }
    
  
    public function pricing(){
        return view('pricing');
    }

    
    public function aboutUsEmployer(){
        return view('about-us-employer');
    }
    
   
    public function blogEmployer(){
        return view('blog-employer');
    }
    
    
    public function visaSupport(){
        return view('visa-support');
    }
    
    
    public function contact(){
        return view('contact');
    }
    
    
    public function termsOfServices(){
        return view('terms-of-services');
    }
    
    
    public function Services(){
        return view('services');
    }


    public function error(){
        return view('layout.404');
    }
}
