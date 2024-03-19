<!-- End of Module drop dwon Styles !-->
<aside class="dash-aside-navbar">
    <div class="position-relative">
        <div class="logo text-md-center d-md-block d-flex align-items-center justify-content-between">
            <a href="candidate-dashboard-index.html">
                
					<span style="font-size: 25px;font-weight: bold;">EmployMe</span>
            </a>
            <button class="close-btn d-block d-md-none"><i class="bi bi-x-lg"></i></button>
        </div>
        <div class="user-data">
            <div class="user-avatar online position-relative rounded-circle">
                @if(auth()->user()->avatar != '')
                <img src="{{ asset('assets/images/lazy.svg') }}" data-src="{{ asset(auth()->user()->avatar) }}"
                    alt="" class="lazy-img">
                @else
                <img src="{{ asset('assets/images/lazy.svg') }}" data-src="{{ asset('assets/images/avatar_03.jpg') }}"
                    alt="" class="lazy-img">
                @endif
            </div>
            <!-- /.user-avatar -->
            <div class="user-name-data">
                <button class="user-name dropdown-toggle" type="button" id="profile-dropdown" data-bs-toggle="dropdown"
                    data-bs-auto-close="outside" aria-expanded="false">
                    {{auth()->user()->name}}
                </button>
                <ul class="dropdown-menu" aria-labelledby="profile-dropdown">
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="{{ route('getEmployerProfile') }}"><img
                                src="{{ asset('assets/images/lazy.svg') }}"
                                data-src="{{ asset('assets/images/dashboard-icon/icon_23.svg') }}" alt=""
                                class="lazy-img"><span class="ms-2 ps-1">Profile</span></a>
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center"
                            href="{{ route('getEmployerDashboardSettings') }}"><img
                                src="{{ asset('assets/images/lazy.svg') }}"
                                data-src="{{ asset('assets/images/dashboard-icon/icon_24.svg') }}" alt=""
                                class="lazy-img"><span class="ms-2 ps-1">Account Settings</span></a>
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="#"><img
                                src="{{ asset('assets/images/lazy.svg') }}"
                                data-src="{{ asset('assets/images/dashboard-icon/icon_25.svg') }}" alt=""
                                class="lazy-img"><span class="ms-2 ps-1">Notification</span></a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /.user-data -->
        <nav class="dasboard-main-nav">
            <ul class="style-none">
                <li><a href="{{ route('getOwnerDashboard') }}"
                        class="d-flex w-100 align-items-center {{ request()->is('owner/dashboard') ? 'active' : '' }}">
                        <img src="{{ asset('assets/images/lazy.svg') }}"
                            data-src="{{ asset('assets/images/icon/icon_1.svg') }}" alt="" class="lazy-img">
                        <span>Dashboard</span>
                    </a></li>
                <li><a href="{{ route('getOwnerProfile') }}"
                        class="d-flex w-100 align-items-center {{ request()->is('owner/profile') ? 'active' : '' }}">
                        <img src="{{ asset('assets/images/lazy.svg') }}"
                            data-src="{{ request()->is('owner/profile') ? asset('assets/images/dashboard-icon/icon_2_active.svg') : asset('assets/images/dashboard-icon/icon_2.svg') }}"
                            alt="" class="lazy-img">
                        <span>My Profile</span>
                    </a>
                </li>
                <li><a href="{{ route('getCandidates') }}"
                        class="d-flex w-100 align-items-center {{ request()->is('owner/candidates') ? 'active' : '' }}">
                        <img src="{{ asset('assets/images/lazy.svg') }}"
                            data-src="{{ request()->is('owner/profile') ? asset('assets/images/dashboard-icon/icon_2_active.svg') : asset('assets/images/dashboard-icon/icon_2.svg') }}"
                            alt="" class="lazy-img">
                        <span>Candidates</span>
                    </a>
                </li>
                <li><a href="{{ route('getEmployers') }}"
                        class="d-flex w-100 align-items-center {{ request()->is('owner/employers') ? 'active' : '' }}">
                        <img src="{{ asset('assets/images/lazy.svg') }}"
                            data-src="{{ request()->is('owner/employers') ? asset('assets/images/dashboard-icon/icon_2_active.svg') : asset('assets/images/dashboard-icon/icon_2.svg') }}"
                            alt="" class="lazy-img">
                        <span>Employers</span>
                    </a>
                </li>
                <li><a href="{{ route('owner.employerBusinessLicenses') }}"
                        class="d-flex w-100 align-items-center {{ request()->is('owner/employer-business-licenses') ? 'active' : '' }}">
                        <img src="{{ asset('assets/images/lazy.svg') }}"
                            data-src="{{ request()->is('owner/employer-business-licenses') ? asset('assets/images/dashboard-icon/icon_2_active.svg') : asset('assets/images/dashboard-icon/icon_2.svg') }}"
                            alt="" class="lazy-img">
                        <span>Employers Licenses</span>
                    </a>
                </li>
                <li><a href="{{ route('admin.getEmployersJobs') }}"
                        class="d-flex w-100 align-items-center {{ request()->is('owner/employers-jobs') ? 'active' : '' }}">
                        <img src="{{ asset('assets/images/lazy.svg') }}"
                            data-src="{{ request()->is('owner/employers-jobs') ? asset('assets/images/dashboard-icon/icon_2_active.svg') : asset('assets/images/dashboard-icon/icon_2.svg') }}"
                            alt="" class="lazy-img">
                        <span>Jobs</span>
                    </a>
                </li>
                <!-- <li><a href="{{ route('admin.getJobApplications') }}"
                        class="d-flex w-100 align-items-center {{ request()->is('owner/job-applications') ? 'active' : '' }}">
                        <img src="{{ asset('assets/images/lazy.svg') }}"
                            data-src="{{ request()->is('owner/job-applications') ? asset('assets/images/dashboard-icon/icon_2_active.svg') : asset('assets/images/dashboard-icon/icon_2.svg') }}"
                            alt="" class="lazy-img">
                        <span>Job Applications</span>
                    </a>
                </li> -->
                
                <!--- Moduels Code -->
                <!-- <li class="dropdown-btn"><a>
                        <span>Selection Modules</span>
                    <i class="bi bi-caret-down"></i></a>    
                </li>
                <li>
                    <ul class="dropdown-container ">
                        <li>
                            <a href="#" class="d-flex w-100 align-items-center ">Manage</a>
                        </li>
                        <li>
                            <a href="" class="d-flex w-100 align-items-center">Manage Items</a>
                        </li>
                    </ul>
                </li> -->
                <!-- <li><a href="{{ route('getProfessionalSkills') }}"
                        class="d-flex w-100 align-items-center {{ request()->is('owner/professional-skills') ? 'active' : '' }}">
                        <img src="{{ asset('assets/images/lazy.svg') }}"
                            data-src="{{ request()->is('owner/profile') ? asset('assets/images/dashboard-icon/icon_2_active.svg') : asset('assets/images/dashboard-icon/icon_2.svg') }}"
                            alt="" class="lazy-img">
                        <span>Professional Skills</span>
                    </a>
                </li> -->

                 <!--- End of Moduels Code -->
                <li>
                    <a class="d-flex w-100 align-items-center" data-bs-toggle="collapse" href="#collapseJobType" role="button" aria-expanded="false">Manage Modules</a>
                    <div class="collapse " id="collapseJobType">
                        <div class="main-body">
                            <ul class="style-none filter-input">
                            <li><a href="{{route('job-categories.index')}}" class="d-flex w-100 align-items-center"> <img src="{{ asset('assets/images/lazy.svg') }}" data-src="" alt="" class="lazy-img"><span>Job Category</span></a></li>
                            </ul>
                        </div>
                    </div>
                </li> 
                <li><a href="{{ route('getPlans') }}"
                        class="d-flex w-100 align-items-center {{ request()->is('owner/plans') ? 'active' : '' }}">
                        <img src="{{ asset('assets/images/lazy.svg') }}"
                            data-src="{{ request()->is('owner/profile') ? asset('assets/images/dashboard-icon/icon_2_active.svg') : asset('assets/images/dashboard-icon/icon_2.svg') }}"
                            alt="" class="lazy-img">
                        <span>Plans</span>
                    </a>
                </li>

                {{--<li><a href="{{ route('getUserProfile') }}"
                        class="d-flex w-100 align-items-center {{ request()->is('owner/users') ? 'active' : '' }}">
                        <img src="{{ asset('assets/images/lazy.svg') }}"
                            data-src="{{ request()->is('owner/users') ? asset('assets/images/dashboard-icon/icon_2_active.svg') : asset('assets/images/dashboard-icon/icon_2.svg') }}"
                            alt="" class="lazy-img">
                        <span>Users</span>
                    </a></li>--}}

                {{-- <li><a href="{{ route('getJobListing') }}"
                        class="d-flex w-100 align-items-center {{ request()->is('employer/job-listing') ? 'active' : '' }}">
                        <img src="{{ asset('assets/images/lazy.svg') }}"
                            data-src="{{ request()->is('employer/job-listing') ? asset('assets/images/dashboard-icon/icon_3_active.svg') : asset('assets/images/dashboard-icon/icon_3.svg') }}"
                            alt="" class="lazy-img">
                        <span>Job Listings</span>
                    </a></li>

                <li><a href="{{ route('getEmployerInterviewRequest') }}"
                        class="d-flex w-100 align-items-center {{ request()->is('employer/employer-interview-request') ? 'active' : '' }}">
                        <img src="{{ asset('assets/images/lazy.svg') }}"
                            data-src="{{ request()->is('employer/employer-interview-request') ? asset('assets/images/dashboard-icon/icon_40_active.svg') : asset('assets/images/dashboard-icon/icon_40.svg') }}"
                            alt="" class="lazy-img">
                        <span>Interview Request</span>
                    </a></li>

                <li><a href="{{ route('getEmployerDashboardMessage') }}"
                        class="d-flex w-100 align-items-center {{ request()->is('employer/employer-dashboard-message') ? 'active' : '' }}">
                        <img src="{{ asset('assets/images/lazy.svg') }}"
                            data-src="{{ request()->is('employer/employer-dashboard-message') ? asset('assets/images/dashboard-icon/icon_4_active.svg') : asset('assets/images/dashboard-icon/icon_4.svg') }}"
                            alt="" class="lazy-img">
                        <span>Messages</span>
                    </a></li>

                <li><a href="{{ route('getEmployerDashboardSavedCandidate') }}"
                        class="d-flex w-100 align-items-center {{ request()->is('employer/employer-dashboard-saved-candidate') ? 'active' : '' }}">
                        <img src="{{ asset('assets/images/lazy.svg') }}"
                            data-src="{{ request()->is('employer/employer-dashboard-saved-candidate') ? asset('assets/images/dashboard-icon/icon_6_active.svg') : asset('assets/images/dashboard-icon/icon_6.svg') }}"
                            alt="" class="lazy-img">
                        <span>Saved Candidate</span>
                    </a></li>


                <li><a href="{{ route('getEmployerSubscriptionPlan') }}"
                        class="d-flex w-100 align-items-center {{ request()->is('employer/employer-dashboard-subscription-plan') ? 'active' : '' }}">
                        <img src="{{ asset('assets/images/lazy.svg') }}"
                            data-src="{{ request()->is('employer/employer-dashboard-subscription-plan') ? asset('assets/images/dashboard-icon/icon_39_active.svg') : asset('assets/images/dashboard-icon/icon_39.svg') }}"
                            alt="" class="lazy-img">
                        <span>Subscription Plan</span>
                    </a></li>


                <li><a href="{{ route('getEmployerDashboardSettings') }}"
                        class="d-flex w-100 align-items-center {{ request()->is('employer/employer-dashboard-settings') ? 'active' : '' }}">
                        <img src="{{ asset('assets/images/lazy.svg') }}"
                            data-src="{{ request()->is('employer/employer-dashboard-settings') ? asset('assets/images/dashboard-icon/icon_7_active.svg') : asset('assets/images/dashboard-icon/icon_7.svg') }}"
                            alt="" class="lazy-img">
                        <span>Account Settings</span>
                    </a></li> --}}

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
            <div class="progress-value fw-500">87%</div>
            <div class="progress-line position-relative">
                <div class="inner-line" style="width:80%;"></div>
            </div>
            <p>Profile Complete</p>
        </div>
        <!-- /.profile-complete-status -->

        <a href="{{route('authLogout')}}" class="d-flex w-100 align-items-center logout-btn">
            <img src="{{ asset('assets/images/lazy.svg') }}" data-src="{{ asset('assets/images/icon/icon_9.svg') }}"
                alt="" class="lazy-img">
            <span>Logout</span>
        </a>
    </div>
</aside>