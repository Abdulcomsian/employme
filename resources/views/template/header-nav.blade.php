<header class="theme-main-menu menu-overlay menu-style-one sticky-menu">
    <div class="inner-content position-relative">
        <div class="top-header">
            <div class="d-flex align-items-center">
                <div class="logo order-lg-0">
                    <a href="/" class="d-flex align-items-center">
                        <img src="{{asset('assets/images/logo/logo_01.png')}}" alt="">
                    </a>
                </div>
                <!-- logo -->
                
                <div class="right-widget ms-auto order-lg-3">
                    <ul class="d-flex align-items-center style-none">
                         @auth
                            @role('employer')
                            <li class="d-none d-md-block"><a href="{{route('employer-jobs.create')}}" class="job-post-btn tran3s">Post Job</a></li>
                            @endrole
                         @endauth
                        @guest
                        <li class="d-none d-md-block ms-4"><a href="#" class="btn-one" data-bs-toggle="modal" data-bs-target="#loginModal">Login</a></li>
                        @endguest
                        @auth
                            @role('employer')
                            <li class="d-none d-md-block ms-4"><a href="{{route('candidatesMarketplace')}}" class="btn-one">Hire Top Talents</a></li>
                            @endrole
                        @endauth
                        @auth
                        <li class="d-none d-md-block ms-4"><a href="{{route('authLogout')}}" class="btn-one">Sign Out</a></li>
                        @endauth
                    </ul>
                </div> <!--/.right-widget-->
              
                <nav class="navbar navbar-expand-lg p0 ms-lg-5 ms-3 order-lg-2">
                    <button class="navbar-toggler d-block d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav align-items-lg-center">
                            <li class="d-block d-lg-none">
                                <div class="logo"><a href="/" class="d-block"><img src="images/logo/logo_01.png" alt="" width="100"></a></div>
                            </li>
                            <li class="nav-item dropdown category-btn mega-dropdown-sm">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false"><i class="bi bi-grid-fill"></i> Category</a>
                                <ul class="dropdown-menu category-dropdown">
                                    <li class="row gx-0">
                                        <div class="col-lg-6">
                                            <a href="{{route('jobMarketplace')}}" class="item d-flex align-items-center">
                                                <div class="icon d-flex align-items-center justify-content-center rounded-circle tran3s"><img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/icon/icon_63.svg')}}" alt="" class="lazy-img"></div>
                                                <div class="ps-3 flex-fill">
                                                    <div class="fw-500 text-dark">UI/UX Design</div>
                                                    <div class="job-count">12k+ Jobs</div>
                                                </div>
                                            </a>
                                            <!-- /.item -->
                                            <a href="{{route('jobMarketplace')}}" class="item d-flex align-items-center">
                                                <div class="icon d-flex align-items-center justify-content-center rounded-circle tran3s"><img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/icon/icon_64.svg')}}" alt="" class="lazy-img"></div>
                                                <div class="ps-3 flex-fill">
                                                    <div class="fw-500 text-dark">Development</div>
                                                    <div class="job-count">7k+ Jobs</div>
                                                </div>
                                            </a>
                                            <!-- /.item -->
                                            <a href="{{route('jobMarketplace')}}" class="item d-flex align-items-center">
                                                <div class="icon d-flex align-items-center justify-content-center rounded-circle tran3s"><img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/icon/icon_65.svg')}}" alt="" class="lazy-img"></div>
                                                <div class="ps-3 flex-fill">
                                                    <div class="fw-500 text-dark">Telemarketing</div>
                                                    <div class="job-count">310+ Jobs</div>
                                                </div>
                                            </a>
                                            <!-- /.item -->
                                        </div>
                                        <div class="col-lg-6">
                                            <a href="{{route('jobMarketplace')}}" class="item d-flex align-items-center">
                                                <div class="icon d-flex align-items-center justify-content-center rounded-circle tran3s"><img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/icon/icon_68.svg')}}" alt="" class="lazy-img"></div>
                                                <div class="ps-3 flex-fill">
                                                    <div class="fw-500 text-dark">Marketing</div>
                                                    <div class="job-count">420+ Jobs</div>
                                                </div>
                                            </a>
                                            <!-- /.item -->
                                            <a href="{{route('jobMarketplace')}}" class="item d-flex align-items-center">
                                                <div class="icon d-flex align-items-center justify-content-center rounded-circle tran3s"><img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/icon/icon_66.svg')}}" alt="" class="lazy-img"></div>
                                                <div class="ps-3 flex-fill">
                                                    <div class="fw-500 text-dark">Editing</div>
                                                    <div class="job-count">3k+ Jobs</div>
                                                </div>
                                            </a>
                                            <!-- /.item -->
                                            <a href="{{route('jobMarketplace')}}" class="item d-flex align-items-center">
                                                <div class="icon d-flex align-items-center justify-content-center rounded-circle tran3s"><img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/icon/icon_67.svg')}}" alt="" class="lazy-img"></div>
                                                <div class="ps-3 flex-fill">
                                                    <div class="fw-500 text-dark">Finance Accounting</div>
                                                    <div class="job-count">150+ Jobs</div>
                                                </div>
                                            </a>
                                            <!-- /.item -->
                                        </div>
                                    </li>
                                    <li>
                                        <a href="{{route('jobMarketplace')}}" class="explore-all-btn d-flex align-items-center justify-content-between tran3s">
                                            <span class="fw-500">Explore all fields</span>
                                            <span class="icon"><i class="bi bi-chevron-right"></i></span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            @auth
                            @role('candidate')
                            <li class="nav-item dropdown dashboard-menu">
                                <a class="nav-link" href="{{route('getCandidateDashboard')}}" role="button"  aria-expanded="false">Dashboard
                                </a>
                            </li>
                            @endrole
                            @role('employer')
                            <li class="nav-item dropdown dashboard-menu">
                                <a class="nav-link" href="{{route('getEmployerDashboard')}}" role="button"  aria-expanded="false">Dashboard
                                </a>
                            </li>
                            @endrole
                            @role('admin')
                            <li class="nav-item dropdown dashboard-menu">
                                <a class="nav-link" href="{{route('getOwnerDashboard')}}" role="button"  aria-expanded="false">Dashboard
                                </a>
                            </li>
                            @endrole
                            <!-- <li class="nav-item dropdown dashboard-menu">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">Dashboard
                                </a>
                                <ul class="dropdown-menu">
                                    @role('candidate')
                                    <li><a href="{{route('getCandidateDashboard')}}" class="dropdown-item" ><span>Candidate Dashboard</span></a></li>
                                    @endrole
                                    @role('employer')
                                    <li><a href="{{route('getEmployerDashboard')}}" class="dropdown-item" ><span>Employer Dashboard</span></a></li>
                                    @endrole
                                    @role('admin')
                                    <li><a href="{{route('getOwnerDashboard')}}" class="dropdown-item" ><span>Owner Dashboard</span></a></li>
                                    @endrole
                                </ul>
                            </li> -->
                            @endauth
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="/" role="button">Home
                                </a>
                                <!-- <ul class="dropdown-menu">
                                    <li><a href="index.html" class="dropdown-item"><span>Home 01</span></a></li>
                                    <li><a href="index-2.html" class="dropdown-item"><span>Home 02</span></a></li>
                                    <li><a href="index-3.html" class="dropdown-item"><span>Home 03</span></a></li>
                                    <li><a href="index-4.html" class="dropdown-item"><span>Home 04</span></a></li>
                                    <li><a href="index-5.html" class="dropdown-item"><span>Home 05</span></a></li>
                                    <li><a href="index-6.html" class="dropdown-item"><span>Home 06</span></a></li>
                                    <li><a href="index-7.html" class="dropdown-item"><span>Home 07</span></a></li>
                                </ul> -->
                            </li>
                            <!-- <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">Job
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="job-list-v1.html" class="dropdown-item"><span>Job List style -1</span></a></li>
                                    <li><a href="job-list-v2.html" class="dropdown-item"><span>Job List style -2</span></a></li>
                                    <li><a href="job-list-v3.html" class="dropdown-item"><span>Job List style -3</span></a></li>
                                    <li><a href="job-grid-v1.html" class="dropdown-item"><span>Job Grid style -1</span></a></li>
                                    <li><a href="job-grid-v2.html" class="dropdown-item"><span>Job Grid style -2</span></a></li>
                                    <li><a href="job-grid-v3.html" class="dropdown-item"><span>Job Grid style -3</span></a></li>
                                    <li><a href="job-details-v1.html" class="dropdown-item"><span>Job Details v-1</span></a></li>
                                    <li><a href="job-details-v2.html" class="dropdown-item"><span>Job Details v-2</span></a></li>
                                </ul>
                            </li> -->
                            <li class="nav-item dropdown mega-dropdown-sm">
                                <a class="nav-link" href="{{route('jobMarketplace')}}" role="button">Explore
                                </a>
                                <!-- <ul class="dropdown-menu">
                                    <li class="row gx-1">
                                        <div class="col-md-4">
                                            <div class="menu-column">
                                                <h6 class="mega-menu-title">Candidates</h6>
                                                <ul class="style-none mega-dropdown-list">
                                                    <li><a href="candidates-v1.html" class="dropdown-item"><span>Candidates V-1</span></a></li>
                                                    <li><a href="candidates-v2.html" class="dropdown-item"><span>Candidates V-2</span></a></li>
                                                    <li><a href="candidates-v3.html" class="dropdown-item"><span>Candidates V-3</span></a></li>
                                                    <li><a href="candidates-v4.html" class="dropdown-item"><span>Candidates V-4</span></a></li>
                                                    <li><a href="candidate-profile-v1.html" class="dropdown-item"><span>Candidates Details v-1</span></a></li>
                                                    <li><a href="candidate-profile-v2.html" class="dropdown-item"><span>Candidates Details v-2</span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="menu-column">
                                                <h6 class="mega-menu-title">Company</h6>
                                                <ul class="style-none mega-dropdown-list">
                                                    <li><a href="company-v1.html" class="dropdown-item"><span>Company V-1</span></a></li>
                                                    <li><a href="company-v2.html" class="dropdown-item"><span>Company V-2</span></a></li>
                                                    <li><a href="company-v3.html" class="dropdown-item"><span>Company V-3</span></a></li>
                                                    <li><a href="company-v4.html" class="dropdown-item"><span>Company V-4</span></a></li>
                                                    <li><a href="company-details.html" class="dropdown-item"><span>Company Details</span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="menu-column">
                                                <h6 class="mega-menu-title">Essential</h6>
                                                <ul class="style-none mega-dropdown-list">
                                                    <li><a href="about-us.html" class="dropdown-item"><span>About Us</span></a></li>
                                                    <li><a href="pricing.html" class="dropdown-item"><span>Pricing</span></a></li>
                                                    <li><a href="faq.html" class="dropdown-item"><span>Faq's</span></a></li>
                                                    <li><a href="signup.html" class="dropdown-item"><span>Register</span></a></li>
                                                    <li><a href="404.html" class="dropdown-item"><span>404 Error</span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                </ul> -->
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="{{route('blog')}}" role="button">Blog
                                </a>
                                <!-- <ul class="dropdown-menu">
                                    <li><a href="blog-v1.html" class="dropdown-item"><span>Blog Standard</span></a></li>
                                    <li><a href="blog-v2.html" class="dropdown-item"><span>Blog Grid</span></a></li>
                                    <li><a href="blog-v3.html" class="dropdown-item"><span>Blog Full width</span></a></li>
                                    <li><a href="blog-details.html" class="dropdown-item"><span>Blog Details</span></a></li>
                                </ul> -->
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('contact')}}" role="button">Contact</a>
                            </li>
                            @auth
                            @role('employer')
                            <li class="d-md-none"><a href="{{route('employer-jobs.create')}}" class="job-post-btn tran3s">Post Job</a></li>
                            <li class="d-md-none"><a href="{{route('candidatesMarketplace')}}" class="btn-one w-100">Hire Top Talents</a></li>
                            @endrole
                            @endauth
                        </ul>
                    </div>
                </nav>
            </div>
        </div> <!--/.top-header-->
    </div> <!-- /.inner-content -->
</header> <!-- /.theme-main-menu -->