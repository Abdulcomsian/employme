<aside class="dash-aside-navbar">
	<div class="position-relative">
		<div class="logo text-md-center d-md-block d-flex align-items-center justify-content-between">
			<a href="candidate-dashboard-index.html">
				<img src="images/logo_01.png" alt="">
			</a>
			<button class="close-btn d-block d-md-none"><i class="bi bi-x-lg"></i></button>
		</div>
		<div class="user-data">
			<div class="user-avatar online position-relative rounded-circle">
				<img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/avatar_03.jpg')}}" alt="" class="lazy-img">
			</div>
			<!-- /.user-avatar -->
			<div class="user-name-data">
				<button class="user-name dropdown-toggle" type="button" id="profile-dropdown" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
				{{auth()->user()->name}}
				</button>
				<ul class="dropdown-menu" aria-labelledby="profile-dropdown">
					<li>
						<a class="dropdown-item d-flex align-items-center" href="{{route('getEmployerProfile')}}"><img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/dashboard-icon/icon_23.svg')}}" alt="" class="lazy-img"><span class="ms-2 ps-1">Profile</span></a>
					</li>
					<li>
						<a class="dropdown-item d-flex align-items-center" href="{{route('getEmployerDashboardSettings')}}"><img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/dashboard-icon/icon_24.svg')}}" alt="" class="lazy-img"><span class="ms-2 ps-1">Account Settings</span></a>
					</li>
					<li>
						<a class="dropdown-item d-flex align-items-center" href="#"><img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/dashboard-icon/icon_25.svg')}}" alt="" class="lazy-img"><span class="ms-2 ps-1">Notification</span></a>
					</li>
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
				<li><a href="{{route('getEmployerProfile')}}" class="d-flex w-100 align-items-center {{request()->is('employer/employer-profile') ? 'active' : ''}}">
						<img src="{{asset('assets/images/lazy.svg')}}" data-src="{{request()->is('employer/employer-profile') ? asset('assets/images/dashboard-icon/icon_2_active.svg') : asset('assets/images/dashboard-icon/icon_2.svg')}}" alt="" class="lazy-img">
						<span>My Profile</span>
					</a></li>
					@if(!session('email_verification') && !session('profile_completion'))
				<li><a href="{{route('employer-jobs.index')}}" class="d-flex w-100 align-items-center {{request()->is('employer/employer-jobs*') ? 'active' : ''}}">
						<img src="{{asset('assets/images/lazy.svg')}}" data-src="{{request()->is('employer/job-listing') ? asset('assets/images/dashboard-icon/icon_3_active.svg') : asset('assets/images/dashboard-icon/icon_3.svg')}}" alt="" class="lazy-img">
						<span>Job Listings</span>
					</a></li>

				<li><a href="{{route('getEmployerInterviewRequest')}}" class="d-flex w-100 align-items-center {{request()->is('employer/employer-interview-request') ? 'active' : ''}}">
						<img src="{{asset('assets/images/lazy.svg')}}" data-src="{{request()->is('employer/employer-interview-request') ? asset('assets/images/dashboard-icon/icon_40_active.svg') : asset('assets/images/dashboard-icon/icon_40.svg')}}" alt="" class="lazy-img">
						<span>Interview Request</span>
					</a></li>

				<li><a href="{{route('getEmployerDashboardMessage')}}" class="d-flex w-100 align-items-center {{request()->is('employer/employer-dashboard-message') ? 'active' : ''}}">
						<img src="{{asset('assets/images/lazy.svg')}}" data-src="{{request()->is('employer/employer-dashboard-message') ? asset('assets/images/dashboard-icon/icon_4_active.svg') : asset('assets/images/dashboard-icon/icon_4.svg')}}" alt="" class="lazy-img">
						<span>Messages</span>
					</a></li>

				<li><a href="{{route('getEmployerDashboardSavedCandidate')}}" class="d-flex w-100 align-items-center {{request()->is('employer/employer-dashboard-saved-candidate') ? 'active' : ''}}">
						<img src="{{asset('assets/images/lazy.svg')}}" data-src="{{request()->is('employer/employer-dashboard-saved-candidate') ? asset('assets/images/dashboard-icon/icon_6_active.svg') : asset('assets/images/dashboard-icon/icon_6.svg')}}" alt="" class="lazy-img">
						<span>Saved Candidate</span>
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
							<img src="../images/lazy.svg" data-src="images/icon/icon_8.svg" alt="" class="lazy-img">
							<span>Delete Account</span>
						</a></li>
						<li><a href="employer-dashboard-company-page.html" class="d-flex w-100 align-items-center">
							<img src="../images/lazy.svg" data-src="images/icon/icon_40.svg" alt="" class="lazy-img">
							<span>Company Page</span>
						</a></li> -->
			</ul>
		</nav>
		<!-- /.dasboard-main-nav -->
		<div class="profile-complete-status">
			<div class="progress-value fw-500">{{employeeProfilePercentage()}}%</div>
			<div class="progress-line position-relative">
				<div class="inner-line" style="width:{{employeeProfilePercentage()}}%;"></div>
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