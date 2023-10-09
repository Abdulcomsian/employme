@extends('layout.main')
@section('title')
Sign Up
@endsection
@section('content')
<div class="inner-banner-one position-relative">
    <div class="container">
        <div class="position-relative">
            <div class="row">
                <div class="col-xl-6 m-auto text-center">
                    <div class="title-two">
                        <h2 class="text-white">Candidate Sign Up</h2>
                    </div>
                    <p class="text-lg text-white mt-30 lg-mt-20">Create an account & Start posting or hiring talents</p>
                </div>
            </div>
        </div>
    </div>
    <img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/shape/shape_02.svg')}}" alt="" class="lazy-img shapes shape_01">
    <img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/shape/shape_03.svg')}}" alt="" class="lazy-img shapes shape_02">
</div> <!-- /.inner-banner-one -->



<section class="registration-section position-relative pt-100 lg-pt-80 pb-150 lg-pb-80">
    <div class="container">
        <div class="user-data-form">
            <div class="text-center">
                <h2>Create Account</h2>
            </div>
            <div class="form-wrapper m-auto">
                <ul class="nav nav-tabs border-0 w-100 mt-30" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#fc1" role="tab">Candidates</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#fc2" role="tab">Employer</button>
                    </li>
                </ul>
                <div class="tab-content mt-40">
                    <div class="tab-pane fade show active" role="tabpanel" id="fc1">
                        <form action="#">
                            <div class="row">
                                <div class="col-12">
                                    <div class="input-group-meta position-relative mb-25">
                                        <label>Name*</label>
                                        <input type="text" placeholder="Name" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="input-group-meta position-relative mb-25">
                                        <label>Email*</label>
                                        <input type="email" placeholder="example@example.com" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="input-group-meta position-relative mb-20">
                                        <label>Password*</label>
                                        <input type="password" placeholder="Enter Password" class="pass_log_id" required>
                                        <span class="placeholder_icon"><span class="passVicon"><img src="{{asset('assets/images/icon/icon_60.svg')}}" alt=""></span></span>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="input-group-meta position-relative mb-20">
                                        <label>Conform Password*</label>
                                        <input type="password" placeholder="Enter Password" class="pass_log_id" required>
                                        <span class="placeholder_icon"><span class="passVicon"><img src="{{asset('assets/images/icon/icon_60.svg')}}" alt=""></span></span>
                                    </div>
                                </div>
                

                                <div class="col-12">
                                    <div class="agreement-checkbox d-flex justify-content-between align-items-center">
                                        <div>
                                            <input type="checkbox" id="remember">
                                            <label for="remember">These checks are essential for E2 visa requirements and obtaining teaching positions in South Korea</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn-eleven fw-500 tran3s d-block mt-20">Register</button>
                                </div>
                            </div>
                        </form>
                    </div>
             
                    <div class="tab-pane fade" role="tabpanel" id="fc2">
                        <form action="#">
                            <div class="row">
                                <div class="col-12">
                                    <div class="input-group-meta position-relative mb-25">
                                        <label>Name*</label>
                                        <input type="text" placeholder="Name" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="input-group-meta position-relative mb-25">
                                        <label>Email*</label>
                                        <input type="email" placeholder="example@example.com" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="input-group-meta position-relative mb-20">
                                        <label>Password*</label>
                                        <input type="password" placeholder="Enter Password" class="pass_log_id" required>
                                        <span class="placeholder_icon"><span class="passVicon"><img src="{{asset('assets/images/icon/icon_60.svg')}}" alt=""></span></span>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="agreement-checkbox d-flex justify-content-between align-items-center">
                                        <div>
                                            <input type="checkbox" id="remember">
                                            <label for="remember">By hitting the "Register" button, you agree to the <a href="#">Terms conditions</a> & <a href="#">Privacy Policy</a></label>
                                        </div>
                               
                                </div>
                                <div class="col-12">
                                    <button class="btn-eleven fw-500 tran3s d-block mt-20">Register</button>
                                </div>
                            </div>
                        </form>
                    </div>
                 
                </div>
                
                <div class="d-flex align-items-center mt-30 mb-10">
                    <div class="line"></div>
                    <span class="pe-3 ps-3">OR</span>
                    <div class="line"></div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <a href="#" class="social-use-btn d-flex align-items-center justify-content-center tran3s w-100 mt-10">
                            <img src="{{asset('assets/images/icon/google.png')}}" alt="">
                            <span class="ps-2">Signup with Google</span>
                        </a>
                    </div>
                    <div class="col-sm-6">
                        <a href="#" class="social-use-btn d-flex align-items-center justify-content-center tran3s w-100 mt-10">
                            <img src="{{asset('assets/images/icon/facebook.png')}}" alt="">
                            <span class="ps-2">Signup with Facebook</span>
                        </a>
                    </div>
                </div>
                <p class="text-center mt-10">Have an account? <a href="#" class="fw-500" data-bs-toggle="modal" data-bs-target="#loginModal">Sign In</a></p>
            </div>
         
        </div>
    </div>
</section>

<!-- <section >
    <iframe src="https://d115so8bpca.typeform.com/to/mqoLnrLt" width="100%" height="500px" frameborder="0">
    </iframe>
</section> -->
<!-- <div class="sign-up">
    <div class="form1">
        <div class="header">
            <span>
                1. Basic Registration
            </span>
        </div>
        <div class="form">
        </div>
    </div>
</div> -->

<!-- <form id="stepper-form">
    <div class="step-container active" id="step1">
        <h2>Step 1</h2>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        <button onclick="nextStep()">Next</button>
    </div>

    <div class="step-container" id="step2">
        <h2>Step 2</h2>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <button onclick="prevStep()">Previous</button>
        <button onclick="nextStep()">Next</button>
    </div>

    <div class="step-container" id="step3">
        <h2>Step 3</h2>
        <label for="message">Message:</label>
        <textarea id="message" name="message" required></textarea>
        <button onclick="prevStep()">Previous</button>
        <button type="submit">Submit</button>
    </div>
</form> -->

<script>
    let currentStep = 0;
    const stepContainers = document.querySelectorAll('.step-container');

    function nextStep() {
        if (currentStep < stepContainers.length - 1) {
            stepContainers[currentStep].classList.remove('active');
            currentStep++;
            stepContainers[currentStep].classList.add('active');
        }
    }

    function prevStep() {
        if (currentStep > 0) {
            stepContainers[currentStep].classList.remove('active');
            currentStep--;
            stepContainers[currentStep].classList.add('active');
        }
    }
</script>

@endsection