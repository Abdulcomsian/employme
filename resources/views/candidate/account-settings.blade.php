@extends('candidate.layout.main')
@section('title')
Account Settings
@endsection
@section('content')
<div class="dashboard-body">
    <div class="position-relative">
        <!-- ************************ Header **************************** -->
        <header class="dashboard-header">
            <div class="d-flex align-items-center justify-content-end">
                <button class="dash-mobile-nav-toggler d-block d-md-none me-auto">
                    <span></span>
                </button>
                <form action="#" class="search-form">
                    <input type="text" placeholder="Search here..">
                    <button><img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/dashboard-icon/icon_10.svg')}}" alt="" class="lazy-img m-auto"></button>
                </form>
                <div class="profile-notification ms-2 ms-md-5 me-4">
                    <button class="noti-btn dropdown-toggle" type="button" id="notification-dropdown" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                        <img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/dashboard-icon/icon_11.svg')}}" alt="" class="lazy-img">
                        <div class="badge-pill"></div>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="notification-dropdown">
                        <li>
                            <h4>Notification</h4>
                            <ul class="style-none notify-list">
                                <li class="d-flex align-items-center unread">
                                    <img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/dashboard-icon/icon_36.svg')}}" alt="" class="lazy-img icon">
                                    <div class="flex-fill ps-2">
                                        <h6>You have 3 new mails</h6>
                                        <span class="time">3 hours ago</span>
                                    </div>
                                </li>
                                <li class="d-flex align-items-center">
                                    <img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/dashboard-icon/icon_37.svg')}}" alt="" class="lazy-img icon">
                                    <div class="flex-fill ps-2">
                                        <h6>Your job post has been approved</h6>
                                        <span class="time">1 day ago</span>
                                    </div>
                                </li>
                                <li class="d-flex align-items-center unread">
                                    <img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/dashboard-icon/icon_38.svg')}}" alt="" class="lazy-img icon">
                                    <div class="flex-fill ps-2">
                                        <h6>Your meeting is cancelled</h6>
                                        <span class="time">3 days ago</span>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div><a href="{{route('jobMarketplace')}}" class="job-post-btn tran3s">Job Marketplace</a></div>
            </div>
        </header>
        <!-- End Header -->

        <h2 class="main-title">Account Settings</h2>

        <div class="bg-white card-box border-20">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
            <h4 class="dash-title-three">Edit & Update</h4>
                <form action="{{route('candidate.updateAccountSettingpage')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="dash-input-wrapper mb-20">
                                <label for="">Name</label>
                                <input type="text" name="full_name" value="{{$candidateDetails->full_name}}" placeholder="Zubayer">
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
                        <!-- <div class="col-12">
                            <div class="dash-input-wrapper mb-20">
                                <label for="">Phone Number</label>
                                <input type="tel" name="phone_number"  value="" >
                            </div>
                        </div> -->
                        <div class="col-12">
                            <div class="dash-input-wrapper mb-20">
                                <label for="">Password</label>
                                <input type="password" name="password" class="@error('password') is-invalid @enderror" placeholder="Enter New Password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                <div class="info-text d-sm-flex align-items-center justify-content-between mt-5">
                                    <p class="m0">Want to change the password? <a href="employer-dashboard-settings(pass-change).html" class="fw-500">Click here</a></p>
                                    <a href="employer-dashboard-settings(pass-change).html" class="fw-500 chng-pass">Change Password</a>
                                </div>
                            </div>
                            <!-- /.dash-input-wrapper -->
                        </div>
                    </div>

                    <div class="button-group d-inline-flex align-items-center mt-30">
                        <button type="submit" class="dash-btn-two tran3s me-3 rounded-3">Save</button>
                        <a href="#" class="dash-cancel-btn tran3s">Cancel</a>
                    </div>
                </form>
        </div>
        <!-- /.card-box -->
    </div>
</div>
@endsection