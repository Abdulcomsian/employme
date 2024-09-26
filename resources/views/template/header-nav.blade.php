<header class="theme-main-menu menu-overlay menu-style-one sticky-menu">
    <div class="inner-content position-relative">
        <div class="top-header">
            <div class="d-flex align-items-center">
                <div class="logo order-lg-0">
                    <a href="/" class="d-flex align-items-center">
                        
					<span style="font-size: 25px;font-weight: bold;color:#000;">employme</span>
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
                            <!-- <li class="d-none d-md-block ms-4"><a href="{{route('candidatesMarketplace')}}" class="btn-one">Hire Top Talents</a></li> -->
                            @endrole
                        @endauth
                        @auth
                        <li class="d-none d-md-block ms-4"><a href="{{route('authLogout')}}" class="btn-one">Sign Out</a></li>
                        @endauth
                    </ul>
                </div> <!--/.right-widget-->
              @php $jobCatgegories = \DB::table('job_categories')->limit(6)->get(); @endphp
                <nav class="navbar navbar-expand-lg p0 ms-lg-5 ms-3 order-lg-2">
                    <button class="navbar-toggler d-block d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav align-items-lg-center">
                            <li class="d-block d-lg-none">
                                <div class="logo"><a href="/" class="d-block">
					<span style="font-size: 25px;font-weight: bold;color:#000;">employme</span></a></div>
                            </li>
                            @auth
                            @role('candidate')
                            <li class="nav-item dropdown category-btn mega-dropdown-sm">
                            <a class="nav-link" href="{{route('getCandidateDashboard')}}" role="button"  aria-expanded="false" style="background-color: #ff715b;color: #fff;padding: 10px 21px;border-radius: 50px;"> <i class="bi bi-grid-fill" style="    margin-right: 7px;"></i>Dashboard</a> 
                            </li>
                            @endrole
                           
                            @role('employer')
                            <li class="nav-item dropdown dashboard-menu">
                                <a class="nav-link" href="{{route('getEmployerDashboard')}}" role="button"  aria-expanded="false" style="background-color: #ff715b;color: #fff;padding: 10px 21px;border-radius: 50px;"> <i class="bi bi-grid-fill" style="    margin-right: 7px;"></i>Dashboard
                                </a>
                            </li>
                            @endrole
                            @role('admin')
                            <li class="nav-item dropdown dashboard-menu">
                            <a class="nav-link" href="{{route('getOwnerDashboard')}}" role="button"  aria-expanded="false" style="background-color: #ff715b;color: #fff;padding: 10px 21px;border-radius: 50px;"> <i class="bi bi-grid-fill" style="    margin-right: 7px;"></i>Dashboard
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
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="/" role="button">Marketplaces
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{url('job-marketplace')}}" class="dropdown-item"><span>Jobs</span></a></li>
                                    <li><a href="{{url('candidates-marketplace')}}" class="dropdown-item"><span>Candidates</span></a></li>
                                </ul>
                            </li>
                            <!-- <li class="nav-item dropdown">
                                <a class="nav-link" href="{{route('blog')}}" role="button">Blog
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="blog-v1.html" class="dropdown-item"><span>Blog Standard</span></a></li>
                                    <li><a href="blog-v2.html" class="dropdown-item"><span>Blog Grid</span></a></li>
                                    <li><a href="blog-v3.html" class="dropdown-item"><span>Blog Full width</span></a></li>
                                    <li><a href="blog-details.html" class="dropdown-item"><span>Blog Details</span></a></li>
                                </ul> 
                            </li> -->
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('contact')}}" role="button">Contact</a>
                            </li>
                            @auth
                            @role('employer')
                            <li class="d-md-none"><a href="{{route('postAJob')}}" class="job-post-btn tran3s">Post Job</a></li>
                            <li class="d-md-none"><a href="{{route('candidatesMarketplace')}}" class="btn-one w-100">Candidate Market Place</a></li>
                            @endrole
                            @endauth
                        </ul>
                    </div>
                </nav>
            </div>
        </div> <!--/.top-header-->
    </div> <!-- /.inner-content -->
</header> <!-- /.theme-main-menu -->