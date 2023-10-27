@extends('layout.main')


@section('content')
<style>
	.company-details .details-post-data .container p {
		margin-bottom: 21px;
		padding-left: 10px;
	}

	.company-details .details-post-data .container h2 {
		font-size: 67px;
	}
</style>
<div class="inner-banner-one position-relative">
	<div class="container">
		<div class="position-relative">
			<div class="row">
				<div class="col-xl-6 m-auto text-center">
					<div class="title-two">
						<h2 class="text-white"> {{$employerDetails->institution ?? ''}}</h2>
					</div>
					<div class="logo mt-10">
						<img src="images/logo_01.png" data-src="images/logo/logo_01.png" alt="" class="lazy-img m-auto">
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
	<li><a href="{{route('companyAboutUs', \Crypt::encryptString($employerDetails->id))}}"> About Us</a></li>
		<li>	<a href="{{route('companyFacilities', \Crypt::encryptString($employerDetails->id))}}"  class="active"> School Facilities</a></li>
		<li><a href="{{route('companyStaff', \Crypt::encryptString($employerDetails->id))}}">Staff and Community</a></li>
		<li><a href="{{route('companyPrograms', \Crypt::encryptString($employerDetails->id))}}">Programs and Curriculum</a></li>
		<li>	<a href="{{route('companyReviews', \Crypt::encryptString($employerDetails->id))}}">Reviews and Testimonials</a></li>
		<li><a href="{{route('companyGallery', \Crypt::encryptString($employerDetails->id))}}">Gallery</a></li>
		<li><a href="{{route('companyLocation', \Crypt::encryptString($employerDetails->id))}}">Location and Accessibility</a></li>
		<li><a href="{{route('companyStaffInfo', \Crypt::encryptString($employerDetails->id))}}" > Current Staff Information</a></li>
		<li><a href="#menu-closed">&#215; </a></li>
		<li><a href="#menu">&#9776; more</a></li>
	</ul>
</nav>
<section class="company-details pt-110 lg-pt-80 pb-160 xl-pb-150 lg-pb-80">
	<div class="container">
		<div class="row">
			<div class="col-xxl-3 col-xl-4 order-xl-last">
				<div class="job-company-info ms-xl-5 ms-xxl-0 lg-mb-50">
					<!-- <img src="images/lazy.svg" data-src="images/logo/media_37.png" alt="" class="lazy-img m-auto logo"> -->
					<div class="text-md text-dark text-center mt-15 mb-20 lg-mb-10">{{$employerDetails->institution ?? ''}}</div>
					<div class="text-center"><a href="#" class="website-btn-two tran3s" target="_blank">Visit
							our website</a></div>

					<div class="border-top mt-35 lg-mt-20 pt-25">
						<ul class="job-meta-data row style-none">
							<li class="col-12">
								<span>Establishment Year:</span>
								<div>{{date('d M, Y',strtotime($employerDetails->established_date)) ?? ''}}</div>
							</li>
							<li class="col-12">
								<span>Number of Students:</span>
								<div>{{$employerDetails->number_of_students ?? ''}}</div>
							</li>
							<li class="col-12">
								<span>Number of Faculty:</span>
								<div>{{$employerDetails->number_of_administrative_staff ?? ''}}</div>
							</li>

							<!-- <li class="col-12">
										<span>Size:</span>
										<div>7000-8000, Worldwide</div>
									</li> -->
							<li class="col-12">
								<span>Email: </span>
								<div><a href="#">{{$employerDetails->email ?? ''}}</a></div>
							</li>
							<li class="col-12">
								<span>Location: </span>
								<div>{{$employerDetails->city ?? ''}} {{$employerDetails->state ?? ''}}, {{$employerDetails->employerCountry->name ?? ''}} </div>
							</li>
							<!-- <li class="col-12">
										<span>Founded: </span>
										<div>13 Jan, 1997</div>
									</li> -->
							<!-- <li class="col-12">
										<span>Phone:</span>
										<div><a href="#">(990) 234 112 779,</a> <a href="#">+770 723801870</a></div>
									</li> -->
							<!-- <li class="col-12">
										<span>Category: </span>
										<div>Technology, Product,  Agency</div>
									</li> -->
							<li class="col-12">
								<span>Social: </span>
								<div>
									<a href="#" class="me-3"><i class="bi bi-facebook"></i></a>
									<a href="#" class="me-3"><i class="bi bi-instagram"></i></a>
									<a href="#" class="me-3"><i class="bi bi-twitter"></i></a>
									<a href="#" class="me-3"><i class="bi bi-linkedin"></i></a>
									<a href="#" class="me-3"> Blog</a>

								</div>
							</li>
						</ul>

						<a href="#" class="btn-ten fw-500 text-white w-100 text-center tran3s mt-25">Send
							Message</a>
					</div>
				</div>
				<!-- /.job-company-info -->
				<div class="job-company-info mt-100 ms-xl-5 ms-xxl-0 lg-mb-50">
					<!-- <img src="images/lazy.svg" data-src="images/logo/media_37.png" alt="" class="lazy-img m-auto logo"> -->
					<div class="text-md text-dark text-center mt-15 mb-20 lg-mb-10">Location</div>
					<!-- <div class="text-center"><a href="#" class="website-btn-two tran3s" target="_blank">Visit our website</a></div> -->

					<div class="border-top mt-35 lg-mt-20 pt-25">
						<ul class="job-meta-data row style-none">
							<li>
								<div class="map">
									<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13287.201679616686!2d73.0740548!3d33.6364165!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38df95f7c0118bb1%3A0x773c0f0856728b7!2sSilk%20Center%20Plaza!5e0!3m2!1sen!2s!4v1693389113300!5m2!1sen!2s" width="270" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
								</div>

							</li>
							<li>
								<p>silk center, Murree Rd, B-Block Block B Satellite Town, Rawalpindi, Punjab 44000</p>
							</li>
						</ul>

					</div>
				</div>
			</div>
			<div class="col-xxl-9 col-xl-8 order-xl-first">
				<div class="details-post-data me-xxl-5 pe-xxl-4">
					<!-- <h3>Overview</h3> -->
					<!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Mauris vitae ultricies leo integer malesuada nunc vel risus commodo. Vulputate odio ut enim blandit. Nibh ipsum consequat nisl vel pretium lectus quam.</p> -->
					<!-- <p> Nulla at volutpat diam ut. Lobortis feugiat vivamus at augue eget arcu. Urna condimentum mattis pellentesque id nibh tortor id aliquet. Dignissim cras tincidunt lobortis feugiat. Est sit amet facilisis magna etiam tempor. Eu augue ut lectus arcu bibendum at varius vel pharetra. Vel facilisis volutpat est velit egestas dui id. Ut pharetra sit amet aliquam. Elit at imperdiet dui accumsan sit amet nulla facilisi morbi. Tellus in metus vulputate eu scelerisque felis imperdiet proin. Magna fringilla urna porttitor rhoncus. Et odio pellentesque diam volutpat. Congue eu consequat ac felis donec et odio pellentesque diam. Accumsan in nisl nisi scelerisque eu ultrices vitae auctor eu. </p> -->
					<!-- <p>Felis eget velit aliquet sagittis id. Massa placerat duis ultricies lacus sed turpis tincidunt id. Vel eros donec ac odio tempor orci dapibus ultrices. Ipsum consequat nisl vel pretium lectus quam. Dignissim sodales ut eu sem. </p> -->


					<div class="container">
						<h2>About Us</h2>
						<p>School's Mission & Vision: (Brief overview of the school's guiding principles and aspirations)</p>
						<p>History: (A short description of the hagwon's history and evolution)</p>
						<p>Teaching Philosophy: (Details about the school's pedagogic beliefs and methods)</p>
					</div>
				</div>
			</div>
		</div>
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
					<ul class="btn-group style-none d-flex flex-wrap justify-content-center justify-content-lg-end">
						<li class="me-2"><a href="job-list-v1.html" class="btn-three">Looking for job?</a></li>
						<li class="ms-2"><a href="signup.html" class="btn-four">Post a job</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>

@endsection