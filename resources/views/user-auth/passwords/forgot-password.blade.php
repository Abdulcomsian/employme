@extends('layout.auth-main')
@section('title')
Forgot Password
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
            <div class="form-wrapper m-auto">
                <div class="d-flex justify-content-center mb-4">
                    <a href="/" class="">
                        <img src="{{asset('assets/images/logo/logo_02.png')}}" alt="">
                    </a>
                </div>
                <div class="text-center">
                    <h3>Forgot Password</h3>
                </div>
                <div class="tab-content mt-40">
                    <div class="tab-pane fade  @if(count($errors->employer) > 0)  @else show active @endif" role="tabpanel" id="fc1">
                        {!! Form::open(array('route' => 'password.email','method'=>'POST')) !!}
                        <form action="#">
                            <div class="row">
                           
                                <div class="col-12">
                                    <div class="input-group-meta position-relative mb-25">
                                        <label>Email*</label>
                                        <input type="email" name="email" class="@error('email') is-invalid @enderror" placeholder="example@example.com" value = "{{ old('email') }}" required>
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                    </div>
                                </div>
                               
                                <div class="col-12">
                                    <button type="submit" class="btn-eleven fw-500 tran3s d-block mt-20"> {{ __('Send Password Reset Link') }}</button>
                                </div>
                            </div>
                        </form>
                            {!! Form::close() !!}
                    </div>
                </div>
                <p class="text-center mt-10">Have an account? <a href="#" class="fw-500" data-bs-toggle="modal" data-bs-target="#loginModal">Sign In</a></p>
            </div>
         
        </div>
    </div>
</section>



@endsection