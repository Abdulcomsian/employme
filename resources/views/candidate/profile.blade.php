@extends('candidate.layout.main')

@section('title') 
    Candidate Profile
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
                <div><a href="employer-dashboard-submit-job.html" class="job-post-btn tran3s">Post a Job</a></div>
            </div>
        </header>
        <!-- End Header -->

        <h2 class="main-title">My Profile</h2>

        <div class="bg-white card-box border-20">
            <div class="user-avatar-setting d-flex align-items-center mb-30">
                <img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/avatar_02.jpg')}}" alt="" class="lazy-img user-img">
                <div class="upload-btn position-relative tran3s ms-4 me-3">
                    Upload new photo
                    <input type="file" id="uploadImg" name="uploadImg" placeholder="">
                </div>
                <button class="delete-btn tran3s">Delete</button>
            </div>
            <!-- /.user-avatar-setting -->
            <div class="dash-input-wrapper mb-30">
                <label for="">Full Name*</label>
                <input type="text" placeholder="Md Rashed Kabir">
            </div>
            <!-- /.dash-input-wrapper -->
            <div class="dash-input-wrapper">
                <label for="">Bio*</label>
                <textarea class="size-lg" placeholder="Write something interesting about you...."></textarea>
                <div class="alert-text">Brief description for your profile. URLs are hyperlinked.</div>
            </div>
            <!-- /.dash-input-wrapper -->
        </div>
        <!-- /.card-box -->

        <div class="bg-white card-box border-20 mt-40">
            <h4 class="dash-title-three">Social Media</h4>

            <div class="dash-input-wrapper mb-20">
                <label for="">Network 1</label>
                <input type="text" placeholder="https://www.facebook.com/zubayer0145">
            </div>
            <!-- /.dash-input-wrapper -->
            <div class="dash-input-wrapper mb-20">
                <label for="">Network 2</label>
                <input type="text" placeholder="https://twitter.com/FIFAcom">
            </div>
            <!-- /.dash-input-wrapper -->
            <a href="#" class="dash-btn-one"><i class="bi bi-plus"></i> Add more link</a>
        </div>
        <!-- /.card-box -->

        <div class="bg-white card-box border-20 mt-40">
            <h4 class="dash-title-three">Address & Location</h4>
            <div class="row">
                <div class="col-12">
                    <div class="dash-input-wrapper mb-25">
                        <label for="">Address*</label>
                        <input type="text" placeholder="Cowrasta, Chandana, Gazipur Sadar">
                    </div>
                    <!-- /.dash-input-wrapper -->
                </div>
                <div class="col-lg-3">
                    <div class="dash-input-wrapper mb-25">
                        <label for="">Country*</label>
                        <select class="nice-select">
                            <option>Afghanistan</option>
                            <option>Albania</option>
                            <option>Algeria</option>
                            <option>Andorra</option>
                            <option>Angola</option>
                            <option>Antigua and Barbuda</option>
                            <option>Argentina</option>
                            <option>Armenia</option>
                            <option>Australia</option>
                            <option>Austria</option>
                            <option>Azerbaijan</option>
                            <option>Bahamas</option>
                            <option>Bahrain</option>
                            <option>Bangladesh</option>
                            <option>Barbados</option>
                            <option>Belarus</option>
                            <option>Belgium</option>
                            <option>Belize</option>
                            <option>Benin</option>
                            <option>Bhutan</option>
                        </select>
                    </div>
                    <!-- /.dash-input-wrapper -->
                </div>
                <div class="col-lg-3">
                    <div class="dash-input-wrapper mb-25">
                        <label for="">City*</label>
                        <select class="nice-select">
                            <option>Dhaka</option>
                            <option>Tokyo</option>
                            <option>Delhi</option>
                            <option>Shanghai</option>
                            <option>Mumbai</option>
                            <option>Bangalore</option>
                        </select>
                    </div>
                    <!-- /.dash-input-wrapper -->
                </div>
                <div class="col-lg-3">
                    <div class="dash-input-wrapper mb-25">
                        <label for="">Zip Code*</label>
                        <input type="number" placeholder="1708">
                    </div>
                    <!-- /.dash-input-wrapper -->
                </div>
                <div class="col-lg-3">
                    <div class="dash-input-wrapper mb-25">
                        <label for="">State*</label>
                        <select class="nice-select">
                            <option>Dhaka</option>
                            <option>Tokyo</option>
                            <option>Delhi</option>
                            <option>Shanghai</option>
                            <option>Mumbai</option>
                            <option>Bangalore</option>
                        </select>
                    </div>
                    <!-- /.dash-input-wrapper -->
                </div>
                <div class="col-12">
                    <div class="dash-input-wrapper mb-25">
                        <label for="">Map Location*</label>
                        <div class="position-relative">
                            <input type="text" placeholder="XC23+6XC, Moiran, N105">
                            <button class="location-pin tran3s"><img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/dashboard-icon/icon_16.svg')}}" alt="" class="lazy-img m-auto"></button>
                        </div>
                        <div class="map-frame mt-30">
                            <div class="gmap_canvas h-100 w-100">
                                <iframe class="gmap_iframe h-100 w-100" src="https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&amp;q=dhaka collage&amp;t=&amp;z=12&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                            </div>
                        </div>
                    </div>
                    <!-- /.dash-input-wrapper -->
                </div>
            </div>
        </div>
        <!-- /.card-box -->

        <div class="button-group d-inline-flex align-items-center mt-30">
            <a href="#" class="dash-btn-two tran3s me-3">Save</a>
            <a href="#" class="dash-cancel-btn tran3s">Cancel</a>
        </div>				
    </div>
</div>
@endsection




