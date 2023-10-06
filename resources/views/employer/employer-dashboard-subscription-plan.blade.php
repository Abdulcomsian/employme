@extends('employer.layout.main')

@section('title')
Employer Subscription Plan
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
                        <img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/icon/icon_11.svg')}}" alt="" class="lazy-img">
                        <div class="badge-pill"></div>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="notification-dropdown">
                        <li>
                            <h4>Notification</h4>
                            <ul class="style-none notify-list">
                                <li class="d-flex align-items-center unread">
                                    <img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/icon/icon_36.svg')}}" alt="" class="lazy-img icon">
                                    <div class="flex-fill ps-2">
                                        <h6>You have 3 new mails</h6>
                                        <span class="time">3 hours ago</span>
                                    </div>
                                </li>
                                <li class="d-flex align-items-center">
                                    <img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/icon/icon_37.svg')}}" alt="" class="lazy-img icon">
                                    <div class="flex-fill ps-2">
                                        <h6>Your job post has been approved</h6>
                                        <span class="time">1 day ago</span>
                                    </div>
                                </li>
                                <li class="d-flex align-items-center unread">
                                    <img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/icon/icon_38.svg')}}" alt="" class="lazy-img icon">
                                    <div class="flex-fill ps-2">
                                        <h6>Your meeting is cancelled</h6>
                                        <span class="time">3 days ago</span>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div><a href="{{route('postJobs')}}" class="job-post-btn tran3s">Post a Job</a></div>
            </div>
        </header>
        <!-- End Header -->

        <h2 class="main-title">Membership</h2>

        <div class="membership-plan-wrapper mb-20">
            <div class="row gx-0">
                <div class="col-xxl-7 col-lg-6 d-flex flex-column">
                    <div class="column w-100 h-100">
                        <h4>Current Plan (Gold)</h4>
                        <p>Unlimited access to our legal document library and online rental application tool, billed monthly.</p>
                    </div>
                </div>
                <div class="col-xxl-5 col-lg-6 d-flex flex-column">
                    <div class="column border-left w-100 h-100">
                        <div class="d-flex">
                            <h3 class="price m0">$29</h3>
                            <div class="ps-4 flex-fill">
                                <h6>Monthly Plan</h6>
                                <span class="text1 d-block">Your subscription renews <span class="fw-500">July 12th, 2023</span></span>
                                <a href="#" class="cancel-plan tran3s">Cancel Current Plan</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.membership-plan-wrapper -->

        <section class="pricing-section">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6">
                    <div class="pricing-card-one border-0 mt-25">
                        <div class="pack-name">Standard</div>
                        <div class="price fw-500">0</div>
                        <ul class="style-none">
                            <li>15 job posting </li>
                            <li>7 featured job </li>
                            <li>Job post live for 30 days </li>
                        </ul>
                        <a href="#" class="get-plan-btn tran3s w-100 mt-30">Choose Plan</a>
                    </div>
                    <!-- /.pricing-card-one -->
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="pricing-card-one popular-two mt-25">
                        <div class="popular-badge">popular</div>
                        <div class="pack-name">Gold</div>
                        <div class="price fw-500"><sub>$</sub> 27.<sup>99</sup></div>
                        <ul class="style-none">
                            <li>30 job posting </li>
                            <li>15 featured job </li>
                            <li>Job post live for 60 days </li>
                        </ul>
                        <a href="#" class="get-plan-btn tran3s w-100 mt-30">Choose Plan</a>
                    </div>
                    <!-- /.pricing-card-one -->
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="pricing-card-one border-0 mt-25">
                        <div class="pack-name">Diamond</div>
                        <div class="price fw-500"><sub>$</sub> 39.<sup>99</sup></div>
                        <ul class="style-none">
                            <li>60 job posting </li>
                            <li>30 featured job </li>
                            <li>Job post live for 130 days </li>
                        </ul>
                        <a href="#" class="get-plan-btn tran3s w-100 mt-30">Choose Plan</a>
                    </div>
                    <!-- /.pricing-card-one -->
                </div>
            </div>
        </section>
        <!-- ./pricing-section -->
    </div>
</div>
@endsection