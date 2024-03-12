<aside class="dash-aside-navbar">
    <div class="position-relative">
        <div class="logo text-md-center d-md-block d-flex align-items-center justify-content-between">
            <a href="{{route('getCandidateDashboard')}}">
               
					<span style="font-size: 25px;font-weight: bold;">EmployMe</span>
            </a>
            <button class="close-btn d-block d-md-none"><i class="bi bi-x-lg"></i></button>
        </div>
        <div class="user-data">
            @if(isset(auth()->user()->candidatePersonalDetails->profile_picture))
			<div class="user-avatar online position-relative rounded-circle">
				<img src="{{asset(auth()->user()->candidatePersonalDetails->profile_picture)}}" data-src="{{asset(auth()->user()->candidatePersonalDetails->profile_picture)}}" alt="" class="lazy-img">
			</div>
            @else
            <div class="user-avatar online position-relative rounded-circle">
				<img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/avatar_03.jpg')}}" alt="" class="lazy-img">
			</div>
            @endif
            <!-- /.user-avatar -->
            <div class="user-name-data">
                <button class="user-name dropdown-toggle" type="button" id="profile-dropdown" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                @if(isset(auth()->user()->candidatePersonalDetails->full_name))
                 {{auth()->user()->candidatePersonalDetails->full_name}}
                 @else
                 {{auth()->user()->name}}
                 @endif
                </button>
                <ul class="dropdown-menu" aria-labelledby="profile-dropdown">
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="{{route('getCandidateProfile')}}"><img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/dashboard-icon/icon_23.svg')}}" alt="" class="lazy-img"><span class="ms-2 ps-1">Profile</span></a>
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="{{route('getAccountSetting')}}"><img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/dashboard-icon/icon_24.svg')}}" alt="" class="lazy-img"><span class="ms-2 ps-1">Account Settings</span></a>
                    </li>
                    {{--<li>
                        <a class="dropdown-item d-flex align-items-center" href="#"><img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/dashboard-icon/icon_25.svg')}}" alt="" class="lazy-img"><span class="ms-2 ps-1">Notification</span></a>
                    </li>--}}
                </ul>
            </div>
        </div>
        <!-- /.user-data -->
        <nav class="dasboard-main-nav">
            <ul class="style-none">
                <li><a href="{{route('getCandidateDashboard')}}" class="d-flex w-100 align-items-center {{request()->is('candidate/dashboard') ? 'active' : ''}}">
                        <img src="{{asset('assets/images/lazy.svg')}}" data-src="{{request()->is('candidate/dashboard') ? asset('assets/images/dashboard-icon/icon_1_active.svg') : asset('assets/images/dashboard-icon/icon_1.svg')}}" alt="" class="lazy-img">
                        <span>Dashboard</span>
                    </a></li>
                @if(!session('email_verification') && !session('profile_completion'))
                
                <li>
                    <a class="d-flex w-100 align-items-center" data-bs-toggle="collapse" href="#collapseJobType" role="button" aria-expanded="false">Manage Modules</a>
                    <div class="collapse" id="collapseJobType">
                        <div class="main-body">
                            <ul class="style-none filter-input">
                                <li><a href="{{route('getCandidateProfile')}}" class="d-flex w-100 align-items-center {{request()->is('candidate/profile') ? 'active' : ''}}">
                                    <img src="{{asset('assets/images/lazy.svg')}}" data-src="{{request()->is('candidate/profile') ? asset('assets/images/dashboard-icon/icon_2_active.svg') : asset('assets/images/dashboard-icon/icon_2.svg')}}" alt="" class="lazy-img">
                                        <span>My Profile</span>
                                    </a>
                                </li> 
                                <li><a href="{{route('staff.index')}}" class="d-flex w-100 align-items-center {{request()->is('candidate/staff') ? 'active' : ''}}">
                                    <img src="{{asset('assets/images/lazy.svg')}}" data-src="{{request()->is('candidate/staff') ? asset('assets/images/dashboard-icon/icon_2_active.svg') : asset('assets/images/dashboard-icon/icon_2.svg')}}" alt="" class="lazy-img">
                                        <span>Staff</span>
                                    </a>
                                </li> 
                                <li><a href="{{route('gallery.index')}}" class="d-flex w-100 align-items-center {{(request()->is('candidate/gallery') || request()->is('candidate/gallery/*')) ? 'active' : ''}}">
                                    <img src="{{asset('assets/images/lazy.svg')}}" data-src="{{request()->is('candidate/profile') ? asset('assets/images/dashboard-icon/icon_2_active.svg') : asset('assets/images/dashboard-icon/icon_2.svg')}}" alt="" class="lazy-img">
                                        <span>Media Gallery</span>
                                    </a>
                                </li> 
                                <li><a href="#" class="d-flex w-100 align-items-center ">
                                    <img src="{{asset('assets/images/lazy.svg')}}" data-src="{{request()->is('candidate/profile') ? asset('assets/images/dashboard-icon/icon_2_active.svg') : asset('assets/images/dashboard-icon/icon_2.svg')}}" alt="" class="lazy-img">
                                        <span>Business Operation</span>
                                    </a>
                                </li> 
                                <li><a href="#" class="d-flex w-100 align-items-center ">
                                    <img src="{{asset('assets/images/lazy.svg')}}" data-src="{{request()->is('candidate/profile') ? asset('assets/images/dashboard-icon/icon_2_active.svg') : asset('assets/images/dashboard-icon/icon_2.svg')}}" alt="" class="lazy-img">
                                        <span>Housing</span>
                                    </a>
                                </li>                            
                            </ul>
                        </div>
                    </div>
                </li> 
                <li><a href="{{route('candidateJobApplications')}}" class="d-flex w-100 align-items-center {{request()->is('candidate/job-applications') ? 'active' : ''}}">
                    <img src="{{asset('assets/images/lazy.svg')}}" data-src="{{request()->is('candidate/job-applications') ? asset('assets/images/dashboard-icon/icon_2_active.svg') : asset('assets/images/dashboard-icon/icon_2.svg')}}" alt="" class="lazy-img">
                    <span>My Applications</span>
                </a></li>
                <li><a href="{{route('candidateInterviewRequests')}}" class="d-flex w-100 align-items-center {{request()->is('candidate/interview-requests') ? 'active' : ''}}">
                    <img src="{{asset('assets/images/lazy.svg')}}" data-src="{{request()->is('candidate/interview-requests') ? asset('assets/images/dashboard-icon/icon_2_active.svg') : asset('assets/images/dashboard-icon/icon_2.svg')}}" alt="" class="lazy-img">
                    <span>Interview Request</span>
                </a></li>
                <li><a href="{{route('candidateSavedJobs')}}" class="d-flex w-100 align-items-center {{request()->is('candidate/saved-jobs') ? 'active' : ''}}">
                        <img src="{{asset('assets/images/lazy.svg')}}" data-src="{{request()->is('candidate/saved-jobs') ? asset('assets/images/dashboard-icon/icon_6_active.svg') : asset('assets/images/dashboard-icon/icon_6.svg')}}" alt="" class="lazy-img">
                        <span>Saved Job</span> 
                    </a></li>
                <li><a href="{{route('getResumePage')}}" class="d-flex w-100 align-items-center {{request()->is('candidate/resume') ? 'active' : ''}}">
                        <img src="{{asset('assets/images/lazy.svg')}}" data-src="{{request()->is('candidate/resume') ? asset('assets/images/dashboard-icon/icon_3_active.svg') : asset('assets/images/dashboard-icon/icon_3.svg')}}" alt="" class="lazy-img">
                        <span>Resume</span>
                    </a></li>
                <li><a href="{{route('getCandidateMessages')}}" class="d-flex w-100 align-items-center {{request()->is('candidate/messages') ? 'active' : ''}}">
                        <img src="{{asset('assets/images/lazy.svg')}}" data-src="{{request()->is('candidate/messages') ? asset('assets/images/dashboard-icon/icon_4_active.svg') : asset('assets/images/dashboard-icon/icon_4.svg')}}" alt="" class="lazy-img">
                        <span>Messages</span>
                    </a></li>
                <li><a href="{{route('getJobAlert')}}" class="d-flex w-100 align-items-center {{request()->is('candidate/job-alert') ? 'active' : ''}}">
                        <img src="{{asset('assets/images/lazy.svg')}}" data-src="{{request()->is('candidate/job-alert') ? asset('assets/images/dashboard-icon/icon_5_active.svg') : asset('assets/images/dashboard-icon/icon_5.svg')}}" alt="" class="lazy-img">
                        <span>Job Alert</span>
                    </a></li> 
               
                <li><a href="{{route('getAccountSetting')}}" class="d-flex w-100 align-items-center {{request()->is('candidate/account-settings') ? 'active' : ''}}">
                        <img src="{{asset('assets/images/lazy.svg')}}" data-src="{{request()->is('candidate/account-settings') ? asset('assets/images/dashboard-icon/icon_7_active.svg') : asset('assets/images/dashboard-icon/icon_7.svg')}}" alt="" class="lazy-img">
                        <span>Account Settings</span>
                    </a></li>
                <li><a href="#" class="d-flex w-100 align-items-center" data-bs-toggle="modal" data-bs-target="#deleteModal">
                        <img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/dashboard-icon/icon_8.svg')}}" alt="" class="lazy-img">
                        <span>Delete Account</span>
                    </a></li>
                @endif
            </ul>
        </nav>
        <!-- /.dasboard-main-nav -->
        <div class="profile-complete-status">
            <div class="progress-value fw-500">{{candidateProfilePercentage()}}%</div>
            <div class="progress-line position-relative">
                <div class="inner-line" style="width:{{candidateProfilePercentage()}}%;"></div>
            </div>
            <p>Profile Complete</p>
        </div>
        <!-- /.profile-complete-status -->

        <a href="{{route('authLogout')}}" class="d-flex w-100 align-items-center logout-btn">
            <img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/dashboard-icon/icon_9.svg')}}" alt="" class="lazy-img">
            <span>Logout</span>
        </a>
    </div>
</aside>