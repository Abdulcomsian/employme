<aside class="dash-aside-navbar">
	<div class="position-relative">
		<div class="logo text-md-center d-md-block d-flex align-items-center justify-content-between">
			<a href="candidate-dashboard-index.html">
				
			<span style="font-size: 25px;font-weight: bold;">EmployMe</span>
			</a>
			<button class="close-btn d-block d-md-none"><i class="bi bi-x-lg"></i></button>
		</div>
		<div class="user-data">
			@if(isset(auth()->user()->employerDetails->institution_logo))
			<div class="user-avatar online position-relative rounded-circle">
				<img src="{{asset(auth()->user()->employerDetails->institution_logo)}}" data-src="{{asset(auth()->user()->employerDetails->institution_logo)}}"" alt="" class="lazy-img">
			</div>
            @else
            <div class="user-avatar online position-relative rounded-circle">
				<img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/avatar_03.jpg')}}" alt="" class="lazy-img">
			</div>
            @endif
			
			<!-- /.user-avatar -->
			<div class="user-name-data">
				<button class="user-name dropdown-toggle" type="button" id="profile-dropdown" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
				@if(isset(auth()->user()->employerDetails->institution))
                 {{auth()->user()->employerDetails->institution}}
                 @else
                 {{auth()->user()->name}}
                 @endif				</button>
				<ul class="dropdown-menu" aria-labelledby="profile-dropdown">
					<li>
						<a class="dropdown-item d-flex align-items-center" href="{{route('getEmployerProfile')}}"><img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/dashboard-icon/icon_23.svg')}}" alt="" class="lazy-img"><span class="ms-2 ps-1">Profile</span></a>
					</li>
					<li>
						<a class="dropdown-item d-flex align-items-center" href="{{route('getEmployerDashboardSettings')}}"><img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/dashboard-icon/icon_24.svg')}}" alt="" class="lazy-img"><span class="ms-2 ps-1">Account Settings</span></a>
					</li>
				{{--
					<li>
						<a class="dropdown-item d-flex align-items-center" href="#"><img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/dashboard-icon/icon_25.svg')}}" alt="" class="lazy-img"><span class="ms-2 ps-1">Notification</span></a>
					</li>--}}
				</ul>
			</div>
		</div>
		<!-- /.user-data -->
		<nav class="dasboard-main-nav">
			<ul class="style-none">
				<li><a href="{{route('getEmployerDashboard')}}" class="d-flex w-100 align-items-center {{request()->is('employer/dashboard') ? 'active' : ''}}">
						<img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/icon/icon_1.svg')}}" alt="" class="lazy-img">
						<span>Dashboard</span>
					</a></li>
		
					<li>
                    <a class="d-flex w-100 align-items-center" data-bs-toggle="collapse" href="#collapseJobType" role="button" aria-expanded="false">Manage Modules</a>
                    <div class="collapse" id="collapseJobType">
                        <div class="main-body">
                            <ul class="style-none filter-input">
                                <li><a href="{{route('getEmployerProfile')}}" class="d-flex w-100 align-items-center {{request()->is('employer/employer-profile') ? 'active' : ''}}">
                                    <img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/dashboard-icon/icon_2_active.svg')}}" alt="" class="lazy-img">
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
					@if(!session('email_verification') && !session('profile_completion'))
				<li><a href="{{route('employer-jobs.index')}}" class="d-flex w-100 align-items-center {{request()->is('employer/employer-jobs*') ? 'active' : ''}}">
						<img src="{{asset('assets/images/lazy.svg')}}" data-src="{{request()->is('employer/job-listing') ? asset('assets/images/dashboard-icon/icon_3_active.svg') : asset('assets/images/dashboard-icon/icon_3.svg')}}" alt="" class="lazy-img">
						<span>Job Listings</span>
					</a></li>
					<li><a href="{{route('employerSavedCandidates')}}" class="d-flex w-100 align-items-center {{request()->is('employer/saved-candidates') ? 'active' : ''}}">
						<img src="{{asset('assets/images/lazy.svg')}}" data-src="{{request()->is('employer/employer-dashboard-saved-candidate') ? asset('assets/images/dashboard-icon/icon_6_active.svg') : asset('assets/images/dashboard-icon/icon_6.svg')}}" alt="" class="lazy-img">
						<span>Saved Candidate</span>
					</a></li>
					<!-- <li><a href="{{route('employerSubscriptions')}}" class="d-flex w-100 align-items-center {{request()->is('employer/subscriptions') ? 'active' : ''}}">
						<img src="{{asset('assets/images/lazy.svg')}}" data-src="{{request()->is('employer/subscriptions') ? asset('assets/images/dashboard-icon/icon_6_active.svg') : asset('assets/images/dashboard-icon/icon_6.svg')}}" alt="" class="lazy-img">
						<span>Subscription</span>
					</a></li> -->
				<!-- <li><a href="{{route('employerJobApplications')}}" class="d-flex w-100 align-items-center {{request()->is('employer/job-applications') ? 'active' : ''}}">
						<img src="{{asset('assets/images/lazy.svg')}}" data-src="{{request()->is('employer/job-applications') ? asset('assets/images/dashboard-icon/icon_2_active.svg') : asset('assets/images/dashboard-icon/icon_2.svg')}}" alt="" class="lazy-img">
						<span>Job Applications</span>
					</a></li> -->
				<li><a href="{{route('getEmployerInterviewRequest')}}" class="d-flex w-100 align-items-center {{request()->is('employer/interview-requests') ? 'active' : ''}}">
						<img src="{{asset('assets/images/lazy.svg')}}" data-src="{{request()->is('employer/interview-requests') ? asset('assets/images/dashboard-icon/icon_40_active.svg') : asset('assets/images/dashboard-icon/icon_40.svg')}}" alt="" class="lazy-img">
						<span>Interview Request</span>
					</a></li>
			
				<li><a href="{{route('getEmployerDashboardMessage')}}" class="d-flex w-100 align-items-center {{request()->is('employer/employer-dashboard-message') ? 'active' : ''}}">
						<img src="{{asset('assets/images/lazy.svg')}}" data-src="{{request()->is('employer/employer-dashboard-message') ? asset('assets/images/dashboard-icon/icon_4_active.svg') : asset('assets/images/dashboard-icon/icon_4.svg')}}" alt="" class="lazy-img">
						<span>Messages</span>
					</a></li>

			


				<li><a href="{{route('getEmployerSubscriptionPlan')}}" class="d-flex w-100 align-items-center {{request()->is('employer/employer-dashboard-subscription-plan') ? 'active' : ''}}">
						<img src="{{asset('assets/images/lazy.svg')}}" data-src="{{request()->is('employer/employer-dashboard-subscription-plan') ? asset('assets/images/dashboard-icon/icon_39_active.svg') : asset('assets/images/dashboard-icon/icon_39.svg')}}" alt="" class="lazy-img">
						<span>Subscription Plan</span>
					</a></li>


				<li><a href="{{route('getEmployerDashboardSettings')}}" class="d-flex w-100 align-items-center {{request()->is('employer/employer-dashboard-settings') ? 'active' : ''}}">
						<img src="{{asset('assets/images/lazy.svg')}}" data-src="{{request()->is('employer/employer-dashboard-settings') ? asset('assets/images/dashboard-icon/icon_7_active.svg') : asset('assets/images/dashboard-icon/icon_7.svg')}}" alt="" class="lazy-img">
						<span>Account Settings</span>
					</a></li>
					  @endif

				
					<!-- <li><a href="#" class="d-flex w-100 align-items-center" data-bs-toggle="modal" data-bs-target="#deleteModal">
							<img src="{{asset('assets/images/lazy.svg')}}" data-src="images/icon/icon_8.svg" alt="" class="lazy-img">
							<span>Delete Account</span>
						</a></li>
						<li><a href="employer-dashboard-company-page.html" class="d-flex w-100 align-items-center">
							<img src="{{asset('assets/images/lazy.svg')}}" data-src="images/icon/icon_40.svg" alt="" class="lazy-img">
							<span>Company Page</span>
						</a></li> -->
			</ul>
		</nav>
		<!-- /.dasboard-main-nav -->
		<div class="profile-complete-status">
			<div class="progress-value fw-500">{{employerProfilePercentage()}}%</div>
			<div class="progress-line position-relative">
				<div class="inner-line" style="width:{{employerProfilePercentage()}}%;"></div>
			</div>
			<p>Profile Complete</p>
		</div>
		<!-- /.profile-complete-status -->

		<a href="{{route('authLogout')}}" class="d-flex w-100 align-items-center logout-btn">
			<img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/icon/icon_9.svg')}}" alt="" class="lazy-img">
			<span>Logout</span>
		</a>
	</div>
</aside>