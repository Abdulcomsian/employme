@extends('layout.auth-main')
@section('title')
Reset Password
@endsection
@section('content')
<section class="registration-section position-relative pt-100 lg-pt-80 pb-150 lg-pb-80">
    <div class="container">
       
        <div class="user-data-form">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <!-- @if($errors->candidate->any('email'))
                        <div class="alert alert-danger" >
                            <strong>{{ $errors->candidate->first('email') }}</strong>
                        </div>
                    @endif -->
            <!-- <div class="text-center">
                <h2>Forgot Password</h2>
            </div> -->
            <div class="form-wrapper m-auto">
                <!-- <div class="inner-banner-one position-relative">
                    <div class="container">
                        <div class="position-relative">
                            <div class="row">
                                <div class="col-xl-6 m-auto text-center">
                                    <div class="title-two">
                                        <h2 class="text-white">Forgot Password</h2>
                                    </div>
                                    <p class="text-lg text-white mt-30 lg-mt-20">Create an account & Start posting or hiring talents</p>
                                </div>
                            </div>
                        </div>
                    </div>
                        <img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/shape/shape_02.svg')}}" alt="" class="lazy-img shapes shape_01">
                        <img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/shape/shape_03.svg')}}" alt="" class="lazy-img shapes shape_02">
                </div> -->
                <div class="d-flex justify-content-center mb-4">
                    <a href="/" class="">
                        <img src="{{asset('assets/images/logo/logo_02.png')}}" alt="">
                    </a>
                </div>
                <div class="text-center">
                    <h3>Reset Password</h3>
                </div>
                <!-- <ul class="nav nav-tabs border-0 w-100 mt-30" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link @if(count($errors->employer) > 0) @else active @endif" data-bs-toggle="tab" data-bs-target="#fc1" role="tab">Candidates</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link @if(count($errors->employer) > 0) active @else  @endif" data-bs-toggle="tab" data-bs-target="#fc2" role="tab">Employer</button>
                    </li>
                </ul> -->
                <div class="tab-content mt-40">
                    <div class="tab-pane fade  @if(count($errors->employer) > 0)  @else show active @endif" role="tabpanel" id="fc1">
                        {!! Form::open(array('route' => 'password.update','method'=>'POST')) !!}
                        <form action="#">
                            <div class="row">
                                <!-- <div class="col-12">
                                    <div class="input-group-meta position-relative mb-25">
                                        <label>Name*</label>
                                        <input type="text" name="name" class="@if($errors->candidate->has('name')) is-invalid @endif"  placeholder="Name" value = "{{ old('name') }}" required>
                                            @if($errors->candidate->has('name'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->candidate->first('name') }}</strong>
                                                </span>
                                            @endif
                                    </div>
                                </div> -->
                                <input type="hidden" name="token" value="{{ $token }}">
                                <div class="col-12">
                                    <div class="input-group-meta position-relative mb-25">
                                        <label>{{ __('Email Address') }}</label>
                                        <input type="email" name="email" class="@error('email') is-invalid @enderror" placeholder="Email Address" required autocomplete="email" autofocus>
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="input-group-meta position-relative mb-25">
                                        <label>{{ __('Password') }}</label>
                                        <input id="password" type="password" name="password" class="@error('password') is-invalid @enderror" placeholder="Password" required autocomplete="new-password">
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="input-group-meta position-relative mb-25">
                                        <label>{{ __('Confirm Password') }}</label>
                                        <input id="password-confirm" type="password" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password">
                                    </div>
                                </div>
                                
                

                                <!-- <div class="col-12">
                                    <div class="agreement-checkbox d-flex justify-content-between align-items-center">
                                        <div>
                                            <input type="checkbox" name= "terms_and_conditions" class="@if($errors->candidate->has('terms_and_conditions')) is-invalid @endif"  id="remember_candidate">
                                            <label for="remember_candidate">These checks are essential for E2 visa requirements and obtaining teaching positions in South Korea</label>
                                                @if($errors->candidate->has('terms_and_conditions'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->candidate->first('terms_and_conditions') }}</strong>
                                                    </span>
                                                @endif
                                        </div>
                                    </div>
                                </div> -->
                                <div class="col-12">
                                    <button type="submit" class="btn-eleven fw-500 tran3s d-block mt-20"> {{ __('Reset Password') }}</button>
                                </div>
                            </div>
                        </form>
                            {!! Form::close() !!}
                    </div>
             
                 
                </div>
                
                <!-- <div class="d-flex align-items-center mt-30 mb-10">
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
                </div> -->
                <p class="text-center mt-10">Have an account? <a href="#" class="fw-500" data-bs-toggle="modal" data-bs-target="#loginModal">Sign In</a></p>
            </div>
         
        </div>
    </div>
</section>



@endsection