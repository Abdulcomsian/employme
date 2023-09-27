@extends('layout.main')


@section('content')

<div class="inner-banner-one position-relative">
			<div class="container">
				<div class="position-relative">
					<div class="row">
						<div class="col-xl-6 m-auto text-center">
							<div class="title-two">
								<h2 class="text-white"> School Name</h2>
							</div>
							<div class="logo mt-10">
								<img src="images/logo_01.png" data-src="images/logo/logo_01.png" alt=""
									class="lazy-img m-auto">
							</div>
							<!-- <p class="text-lg text-white mt-10 lg-mt-20">Find company details here</p> -->
						</div>
					</div>

				</div>
			</div>






			<img src="images/lazy.svg" data-src="images/shape/shape_02.svg" alt="" class="lazy-img shapes shape_01">
			<img src="images/lazy.svg" data-src="images/shape/shape_03.svg" alt="" class="lazy-img shapes shape_02">
			

		</div> <!-- /.inner-banner-one -->



		  <nav class="nav-2" id="menu">
			<ul id="menu-closed">
			  <li><a href="{{route('companyAboutUs')}}" class="active"> About Us</a></li>
			  <li>	<a href="{{route('companyFacilities')}}"> School Facilities</a></li>
			  <li><a href="{{route('companyStaff')}}">Staff and Community</a></li>
			  <li><a href="{{route('companyPrograms')}}">Programs and Curriculum</a></li>
			  <li>	<a href="{{route('companyReviews')}}">Reviews and Testimonials</a></li>
			  <li><a href="{{route('companyGallery')}}">Gallery</a></li>
			  <li><a href="{{route('companyLocation')}}">Location and Accessibility</a></li>
			  <li><a href="{{route('companyStaffInfo')}}" > Current Staff Information</a></li>
			  <li><a href="#menu-closed">&#215; </a></li>
			  <li><a href="#menu">&#9776; more</a></li>
			</ul>
		  </nav>


		<section class="company-details pt-110 lg-pt-80 pb-160 xl-pb-150 lg-pb-80">
			<div class="container">
						<h1>About Us</h1>
						<p>School's Mission & Vision: (Brief overview of the school's guiding principles and aspirations)</p>
						<p>History: (A short description of the hagwon's history and evolution)</p>
						<p>Teaching Philosophy: (Details about the school's pedagogic beliefs and methods)</p>
			</div>
		</section>






		<!--
		=====================================================
			Job Portal Intro
		=====================================================
		-->
		<section class="job-portal-intro">
			<div class="container">
				<div class="wrapper bottom-border pt-65 md-pt-50 pb-65 md-pb-50">
					<div class="row align-items-center">
						<div class="col-lg-7">
							<div class="text-center text-lg-start">
								<h2>Most complete job portal.</h2>
								<p class="text-md m0 md-pb-20">Signup and start find your job or talents.</p>
							</div>
						</div>
						<div class="col-lg-5">
							<ul
								class="btn-group style-none d-flex flex-wrap justify-content-center justify-content-lg-end">
								<li class="me-2"><a href="job-list-v1.html" class="btn-three">Looking for job?</a></li>
								<li class="ms-2"><a href="signup.html" class="btn-four">Post a job</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</section>

@endsection