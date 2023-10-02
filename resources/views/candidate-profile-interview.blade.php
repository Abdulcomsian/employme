@extends('layout.main')


@section('content')


      <!-- 
		=============================================
			Inner Banner
		============================================== 
		-->
        <div class="inner-banner-one position-relative">
            <div class="container">
                <div class="candidate-profile-card list-layout">
                    <div class="d-flex align-items-start align-items-xl-center">
                        <div class="cadidate-avatar position-relative d-block me-auto ms-auto"><a href="#"
                                class="rounded-circle"><img src="images/lazy.svg"
                                    data-src="images/candidates/img_01.jpg" alt="" class="lazy-img rounded-circle"></a>
                        </div>
                        <div class="right-side">
                            <div class="row gx-1 align-items-center">
                                <div class="col-xl-2 order-xl-0">
                                    <div class="position-relative">
                                        <h4 class="candidate-name text-white mb-0">Rashed Kabir</h4>
                                        <div class="candidate-post">UI Designer</div>
                                    </div>
                                </div>
                                <div class="col-xl-3 order-xl-3">
                                    <ul class="cadidate-skills style-none d-flex flex-wrap align-items-center">
                                        <li>Design</li>
                                        <li>UI</li>
                                        <li>Digital</li>
                                        <li class="more">2+</li>
                                    </ul>
                                    <!-- /.cadidate-skills -->
                                </div>
                                <div class="col-xl-2 col-md-4 order-xl-1">
                                    <div class="candidate-info">
                                        <span>Location</span>
                                        <div>New York, US</div>
                                    </div>
                                    <!-- /.candidate-info -->
                                </div>
                                <div class="col-xl-2 col-md-4 order-xl-2">
                                    <div class="candidate-info">
                                        <span>Salary</span>
                                        <div>$30k-$50k/yr</div>
                                    </div>
                                    <!-- /.candidate-info -->
                                </div>
                                <div class="col-xl-3 col-md-4 order-xl-4">
                                    <div class="d-flex justify-content-md-end">
                                        <a href="#" class="save-btn text-center rounded-circle tran3s"><i
                                                class="bi bi-heart"></i></a>
                                        <a href="#" class="cv-download-btn fw-500 tran3s ms-md-3 sm-mt-20">Download
                                            CV</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <img src="images/lazy.svg" data-src="images/shape/shape_02.svg" alt="" class="lazy-img shapes shape_01">
            <img src="images/lazy.svg" data-src="images/shape/shape_03.svg" alt="" class="lazy-img shapes shape_02">
        </div> <!-- /.inner-banner-one -->
        <nav class="nav-2" id="menu">
            <ul id="menu-closed">
                <li><a href="{{route('candidateProfileNew')}}" >Overview</a></li>
                <li><a href="{{route('candidateProfileDocument')}}" >Documents</a></li>
                <li> <a href="{{route('candidateProfileInterview')}}" class="active">Interview</a></li>
                <li><a href="{{route('candidateProfileAlbum')}}"> Album</a></li>
                <li><a href="{{route('candidateProfileComment')}}">Comment box</a></li>
                <li><a href="#menu-closed">&#215; </a></li>
                <li><a href="#menu">&#9776; more</a></li>
            </ul>
        </nav>


        <!-- 
		=============================================
			Candidates Profile Details
		============================================== 
		-->
        <section class="candidates-profile bg-color pt-100 lg-pt-70 pb-150 lg-pb-80">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-9 col-lg-8">
                            <h4> Interview (VideoAsk interview should be completed by candidates and automatically uploaded to the intro video) 
                            </h4>
                    </div>
                    <!-- /.candidates-profile-details -->
                    <div class="col-xxl-3 col-lg-4">
                        <div class="cadidate-profile-sidebar ms-xl-5 ms-xxl-0 md-mt-60">
                            <div class="cadidate-bio bg-wrapper mb-60 md-mb-40">
                                <ul class="style-none">
                                    <!-- <li class="border-0">
                                        <span>Location: </span>
                                        <div>Spain, Barcelona </div>
                                    </li> -->
									         <li class="border-0">
                                        <span>Name: </span>
                                        <div>Muhammad</div>
                                    </li>
                                    <li>
                                        <span>Age: </span>
                                        <div>28</div>
                                    </li>
									         <li >
                                        <span>Location: </span>
                                        <div>Spain, Barcelona </div>
                                    </li>
									<li>
                                        <span>Expected Salary: </span>
                                        <div>$3k-$4k/month</div>
                                    </li>
									<li>
                                        <span>Intended Start Date: </span>
                                        <div>14 August 2024</div>
                                    </li>
									<li>
                                        <span>Country of Origin: </span>
                                        <div>Pakistan</div>
                                    </li>
									<li>
                                        <span>Apostille Status: </span>
                                        <div>Verified</div>
                                    </li>
									<li>
                                        <span> Teaching Experience: </span>
                                        <div>2 Years</div>
                                    </li>
                                    <!-- <li>
                                        <span>Email: </span>
                                        <div><a href="mailto:me@support.com">me@support.com</a></div>
                                    </li>
                                    <li>
                                        <span>Qualification: </span>
                                        <div>Master Degree</div>
                                    </li>
                                    <li>
                                        <span>Gender: </span>
                                        <div>Male</div>
                                    </li>
                                
                                    <li>
                                        <span>Social:</span>
                                        <div>
                                            <a href="#" class="me-3"><i class="bi bi-facebook"></i></a>
                                            <a href="#" class="me-3"><i class="bi bi-instagram"></i></a>
                                            <a href="#" class="me-3"><i class="bi bi-twitter"></i></a>
                                            <a href="#"><i class="bi bi-linkedin"></i></a>
                                        </div>
                                    </li> -->
                                </ul>
                                <a href="#" class="btn-ten fw-500 text-white w-100 text-center tran3s mt-15">Download CV</a>
                            </div>
                            <!-- /.cadidate-bio -->
                            <h4 class="sidebar-title">Location</h4>
                            <div class="map-area mb-60 md-mb-40">
                                <div class="gmap_canvas h-100 w-100">
                                    <iframe class="gmap_iframe h-100 w-100" src="https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&amp;q=dhaka collage&amp;t=&amp;z=12&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                                </div>
                            </div>
                            <h4 class="sidebar-title">Email Rashed Kabir.</h4>
                            <div class="email-form bg-wrapper">
                                <p>Your email address & profile will be shown to the recipient.</p>
                                <form action="#">
                                    <div class="d-sm-flex mb-25">
                                        <label for="">Name</label>
                                        <input type="text">
                                    </div>
                                    <div class="d-sm-flex mb-25">
                                        <label for="">Email</label>
                                        <input type="email">
                                    </div>
                                    <div class="d-sm-flex mb-25 xs-mb-10">
                                        <label for="">Message</label>
                                        <textarea></textarea>
                                    </div>
                                    <div class="d-sm-flex">
                                        <label for=""></label>
                                        <button class="btn-ten fw-500 text-white flex-fill text-center tran3s">Send </button>
                                    </div>
                                </form>
                            </div>
                        </div> 
                        <!-- /.cadidate-profile-sidebar -->
                    </div>
                </div>

            </div>
        </section>


@endsection