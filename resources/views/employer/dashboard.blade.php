@extends('employer.layout.main')

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
                <div><a href="{{route('postAJob')}}" class="job-post-btn tran3s">Post a Job</a></div>
            </div>
        </header>
        <!-- End Header -->

        <h2 class="main-title">Dashboard</h2>
        <div class="row">
            <div class="col-lg-3 col-6">
                <div class="dash-card-one bg-white border-30 position-relative mb-15">
                    <div class="d-sm-flex align-items-center justify-content-between">
                        <div class="icon rounded-circle d-flex align-items-center justify-content-center order-sm-1"><img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/icon/icon_12.svg')}}" alt="" class="lazy-img"></div>
                        <div class="order-sm-0">
                            <div class="value fw-500">07</div>
                            <span>Posted Job</span>
                        </div>
                    </div>
                </div>
                <!-- /.dash-card-one -->
            </div>
            <div class="col-lg-3 col-6">
                <div class="dash-card-one bg-white border-30 position-relative mb-15">
                    <div class="d-sm-flex align-items-center justify-content-between">
                        <div class="icon rounded-circle d-flex align-items-center justify-content-center order-sm-1"><img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/icon/icon_13.svg')}}" alt="" class="lazy-img"></div>
                        <div class="order-sm-0">
                            <div class="value fw-500">03</div>
                            <span>Shortlisted</span>
                        </div>
                    </div>
                </div>
                <!-- /.dash-card-one -->
            </div>
            <div class="col-lg-3 col-6">
                <div class="dash-card-one bg-white border-30 position-relative mb-15">
                    <div class="d-sm-flex align-items-center justify-content-between">
                        <div class="icon rounded-circle d-flex align-items-center justify-content-center order-sm-1"><img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/icon/icon_14.svg')}}" alt="" class="lazy-img"></div>
                        <div class="order-sm-0">
                            <div class="value fw-500">1.7k</div>
                            <span>Application</span>
                        </div>
                    </div>
                </div>
                <!-- /.dash-card-one -->
            </div>
            <div class="col-lg-3 col-6">
                <div class="dash-card-one bg-white border-30 position-relative mb-15">
                    <div class="d-sm-flex align-items-center justify-content-between">
                        <div class="icon rounded-circle d-flex align-items-center justify-content-center order-sm-1"><img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/icon/icon_15.svg')}}" alt="" class="lazy-img"></div>
                        <div class="order-sm-0">
                            <div class="value fw-500">04</div>
                            <span>Save Candidate</span>
                        </div>
                    </div>
                </div>
                <!-- /.dash-card-one -->
            </div>
        </div>

        <div class="row d-flex pt-50 lg-pt-10">
            <div class="col-xl-7 col-lg-6 d-flex flex-column">
                <div class="user-activity-chart bg-white border-20 mt-30 h-100">
                    <h4 class="dash-title-two">Job Views</h4>
                    <div class="d-sm-flex align-items-center job-list">
                        <div class="fw-500 pe-3">Jobs:</div>
                        <div class="flex-fill xs-mt-10">
                            <select class="nice-select">
                                <option>Web & Mobile Prototype designer....</option>
                                <option>Document Writer</option>
                                <option>Outbound Call Service</option>
                                <option>Product Designer</option>
                            </select>
                        </div>
                    </div>
                    <div class="ps-5 pe-5 mt-50"><img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/main-graph.png')}}" alt="" class="lazy-img m-auto"></div>
                </div>
            </div>
            <div class="col-xl-5 col-lg-6 d-flex">
                <div class="recent-job-tab bg-white border-20 mt-30 w-100">
                    <h4 class="dash-title-two">Pending Interview Request</h4>
                    <div class="wrapper">
                        <div class="job-item-list d-flex align-items-center">
                            <div><img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/logo/media_22.png')}}" alt="" class="lazy-img logo"></div>
                            <div class="job-title">
                                <h6 class="mb-5"><a href="#">Web & Mobile Prototype</a></h6>
                                <div class="meta"><span>Fulltime</span> . <span>Spain</span></div>
                            </div>
                            <div class="job-action">
                                <button class="action-btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <span></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">View Job</a></li>
                                    <li><a class="dropdown-item" href="#">Archive</a></li>
                                    <li><a class="dropdown-item" href="#">Delete</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- /.job-item-list -->
                        <div class="job-item-list d-flex align-items-center">
                            <div><img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/logo/media_23.png')}}" alt="" class="lazy-img logo"></div>
                            <div class="job-title">
                                <h6 class="mb-5"><a href="#">Document Writer</a></h6>
                                <div class="meta"><span>Part-time</span> . <span>Italy</span></div>
                            </div>
                            <div class="job-action">
                                <button class="action-btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <span></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">View Job</a></li>
                                    <li><a class="dropdown-item" href="#">Archive</a></li>
                                    <li><a class="dropdown-item" href="#">Delete</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- /.job-item-list -->
                        <div class="job-item-list d-flex align-items-center">
                            <div><img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/logo/media_24.png')}}" alt="" class="lazy-img logo"></div>
                            <div class="job-title">
                                <h6 class="mb-5"><a href="#">Outbound Call Service</a></h6>
                                <div class="meta"><span>Fulltime</span> . <span>USA</span></div>
                            </div>
                            <div class="job-action">
                                <button class="action-btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <span></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">View Job</a></li>
                                    <li><a class="dropdown-item" href="#">Archive</a></li>
                                    <li><a class="dropdown-item" href="#">Delete</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- /.job-item-list -->
                        <div class="job-item-list d-flex align-items-center">
                            <div><img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/logo/media_25.png')}}" alt="" class="lazy-img logo"></div>
                            <div class="job-title">
                                <h6 class="mb-5"><a href="#">Product Designer</a></h6>
                                <div class="meta"><span>Part-time</span> . <span>Dubai</span></div>
                            </div>
                            <div class="job-action">
                                <button class="action-btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <span></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">View Job</a></li>
                                    <li><a class="dropdown-item" href="#">Archive</a></li>
                                    <li><a class="dropdown-item" href="#">Delete</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- /.job-item-list -->
                        <div class="job-item-list d-flex align-items-center">
                            <div><img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/logo/media_26.png')}}" alt="" class="lazy-img logo"></div>
                            <div class="job-title">
                                <h6 class="mb-5"><a href="#">Marketing Specialist</a></h6>
                                <div class="meta"><span>Part-time</span> . <span>UK</span></div>
                            </div>
                            <div class="job-action">
                                <button class="action-btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <span></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">View Job</a></li>
                                    <li><a class="dropdown-item" href="#">Archive</a></li>
                                    <li><a class="dropdown-item" href="#">Delete</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- /.job-item-list -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection