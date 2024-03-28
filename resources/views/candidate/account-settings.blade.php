@extends('candidate.layout.main')
@section('title')
Account Settings
@endsection
@section('content')
<div class="dashboard-body">
    <div class="position-relative">
        <!-- ************************ Header **************************** -->
		 	@include('candidate.layout.header_menu')
        <!-- End Header -->

        <h2 class="main-title">Account Settings</h2>

        <div class="bg-white card-box border-20">
            <h4 class="dash-title-three">Update Account Details</h4>
                @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(auth()->user()->account_status == 1)
                    <div class="row align-items-end">
                        <div class="col-md-6 offset-md-10"> <!-- Adjust the column width based on your layout -->
                            <div class="button-group mt-20 mb-20 text-end"> <!-- Align content to the end (right) -->
                                <button type="button" class="dash-btn-two tran3s me-3 rounded-3" data-bs-toggle="modal" data-bs-target="#deactivateModal">Deactivate Account</button>
                                {{--<a href="#" class="dash-cancel-btn tran3s">Cancel</a>--}}
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="row align-items-end">
                        <div class="col-md-6 offset-md-10"> <!-- Adjust the column width based on your layout -->
                            <div class="button-group mt-20 mb-20 text-end"> <!-- Align content to the end (right) -->
                                <button type="button" class="dash-btn-two tran3s me-3 rounded-3" data-bs-toggle="modal" data-bs-target="#activateModal">Activate Account</button>
                                {{--<a href="#" class="dash-cancel-btn tran3s">Cancel</a>--}}
                            </div>
                        </div>
                    </div>
                    @endif
            <form action="{{route('candidate.updateAccountSettingpage')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-6">
                        <div class="dash-input-wrapper mb-20">
                            <label for="">Name</label>
                            <input type="text" name="institution" value="{{$candidateDetails->full_name}}" placeholder="Zubayer">
                        </div>
                        <!-- /.dash-input-wrapper -->
                    </div>
                    <!-- <div class="col-lg-6">
                        <div class="dash-input-wrapper mb-20">
                            <label for="">Last Name</label>
                            <input type="text" placeholder="Hasan">
                        </div>
                        /.dash-input-wrapper
                    </div> -->
                    <div class="col-6">
                        <div class="dash-input-wrapper mb-20">
                            <label for="">Email</label>
                            <input type="email" name="email" class="@error('email') is-invalid @enderror" value="{{auth()->user()->email}}">
                                 @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <!-- /.dash-input-wrapper -->
                    </div>
                 
                </div>

                <div class="button-group d-inline-flex align-items-center mt-20 mb-20">
                    <button type="submit" class="dash-btn-two tran3s me-3 rounded-3">Save</button>
                    {{--<a href="#" class="dash-cancel-btn tran3s">Cancel</a>--}}
                </div>
            </form>
        </div>
        <div class="bg-white card-box border-20 mt-4">
             
            <h4 class="dash-title-three">Change Password</h4>
             <form method = "POST" action  = "{{route('candidate.updatePassword')}}">
                    @csrf
                    <div class = "row">
                        <div class="col-6">
                            <div class="dash-input-wrapper mb-20">
                                <label for="">Password</label>
                                <input type="password" name="password" class="@error('password') is-invalid @enderror" placeholder="Enter New Password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                            </div>
                        </div>
                        <div class="col-6">
                            <div class="dash-input-wrapper mb-20">
                                <label for="">Confirm Password</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password">
                                
                            </div>
                            <!-- /.dash-input-wrapper -->
                        </div>
                    </div>
                    <div class="button-group d-inline-flex align-items-center mt-20 mb-20">
                        <button type="submit" class="dash-btn-two tran3s me-3 rounded-3">Update Password</button>
                        {{--<a href="#" class="dash-cancel-btn tran3s">Cancel</a>--}}
                    </div>
             </form>
        </div>
        
        <!-- /.card-box -->
    </div>
</div>
<!-- /.dashboard-body -->
<div class="modal fade" id="deactivateModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen modal-dialog-centered">
        <div class="container">
            <form action = "{{route('candidate.deactivateAccount')}}" method = "post">
                @csrf
                <div class="remove-account-popup text-center modal-content">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <img src="../images/lazy.svg" data-src="{{asset('assets/images/dashboard-icon/icon_22.svg')}}" alt="" class="lazy-img m-auto">
                    <h2>Are you sure?</h2>
                    <p>Your profile will not show on candidate marketplace.</p>
                    <div class="button-group d-inline-flex justify-content-center align-items-center pt-15">
                        <button type = "submit" class="confirm-btn fw-500 tran3s me-3">Yes</button>
                        <button type="button" class="btn-close fw-500 ms-3" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                    </div>
                </div>
            </form>
            <!-- /.remove-account-popup -->
        </div>
    </div>
</div>
<div class="modal fade" id="activateModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen modal-dialog-centered">
        <div class="container">
            <form action = "{{route('candidate.activateAccount')}}" method = "post">
                @csrf
                <div class="remove-account-popup text-center modal-content">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <img src="../images/lazy.svg" data-src="{{asset('assets/images/dashboard-icon/icon_22.svg')}}" alt="" class="lazy-img m-auto">
                    <h2>Are you sure?</h2>
                    <p>Your profile will  show on candidate marketplace.</p>
                    <div class="button-group d-inline-flex justify-content-center align-items-center pt-15">
                        <button type = "submit" class="confirm-btn fw-500 tran3s me-3">Yes</button>
                        <button type="button" class="btn-close fw-500 ms-3" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                    </div>
                </div>
            </form>
            <!-- /.remove-account-popup -->
        </div>
    </div>
</div>
@endsection