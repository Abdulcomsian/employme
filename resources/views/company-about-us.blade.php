@extends('layout.main')


@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
<style>
	.company-details .details-post-data .container p {
		margin-bottom: 21px;
		padding-left: 10px;
	}

	.company-details .details-post-data .container h2 {
		font-size: 67px;
	}
	.company-details .details-post-data .video-post {
		background: url("{{asset('/'.$employerDetails->video_thumbnail)}}") no-repeat center;
		background-size: cover;
		height: 440px;
		border-radius: 10px;
	}
	.active{
		color: #D2F34C !important;
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
					<span style="
    font-size: 25px;
    font-weight: bold;
">EmployMe

</span>
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
	<li><a href="{{route('companyAboutUs', \Crypt::encryptString($employerDetails->user_id))}}" class="active"> About Us</a></li>
	<li><a href="{{route('companyStaff', \Crypt::encryptString($employerDetails->user_id))}}">Current Staff</a></li>
	<li><a href="{{route('companyGallery', \Crypt::encryptString($employerDetails->user_id))}}">Media Gallery</a></li>
	<li><a href="{{route('companyBusinessOperation', \Crypt::encryptString($employerDetails->user_id))}}">Business Operation</a></li>
	<li><a href="{{route('companyJobs', \Crypt::encryptString($employerDetails->user_id))}}" >Jobs</a></li>
	<li><a href="{{route('companyHousings', \Crypt::encryptString($employerDetails->user_id))}}">Housings</a></li>

	{{--	 <li>	<a href="{{route('companyFacilities', \Crypt::encryptString($employerDetails->user_id))}}"  class="active"> School Facilities</a></li>
		<li><a href="{{route('companyPrograms', \Crypt::encryptString($employerDetails->user_id))}}">Programs and Curriculum</a></li>
		<li>	<a href="{{route('companyReviews', \Crypt::encryptString($employerDetails->user_id))}}">Reviews and Testimonials</a></li>
		<li><a href="{{route('companyLocation', \Crypt::encryptString($employerDetails->user_id))}}">Location and Accessibility</a></li>
		<li><a href="{{route('companyStaffInfo', \Crypt::encryptString($employerDetails->user_id))}}" > Current Staff Information</a></li> --}}
		<li><a href="#menu-closed">&#215; </a></li>
		<li><a href="#menu">&#9776; more</a></li>
	</ul>
</nav>
<section class="company-details pt-110 lg-pt-80 pb-160 xl-pb-150 lg-pb-80">
	<div class="container">
		<div class="row">
			<div class="col-xxl-3 col-xl-4 order-xl-last">
				<div class="job-company-info ms-xl-5 ms-xxl-0 lg-mb-50">
					@if(isset($employerDetails->institution_logo))
					<img src="{{asset($employerDetails->institution_logo)}}" data-src="{{asset($employerDetails->institution_logo)}}" alt="" class="lazy-img m-auto logo">
					@else
					<img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/logo/media_37.png')}}" alt="" class="lazy-img m-auto logo">
					@endif
					<!-- <img src="images/lazy.svg" data-src="images/logo/media_37.png" alt="" class="lazy-img m-auto logo"> -->
					<div class="text-md text-dark text-center mt-15 mb-20 lg-mb-10">{{$employerDetails->institution ?? ''}}</div>
					<div class="text-center"><a href="#" class="website-btn-two tran3s" target="_blank">Visit
							our website</a></div>

					<div class="border-top mt-35 lg-mt-20 pt-25">
						<ul class="job-meta-data row style-none">
							<li class="col-12">
								<span>Business Hours:</span>
								<div>{{$employerDetails->business_hours ?? ''}}</div>
							</li>
							<li class="col-12">
								<span>Number of Students:</span>
								<div>{{$employerDetails->number_of_students ?? ''}}</div>
							</li>
							<li class="col-12">
								<span>Number of Teachers:</span>
								<div>{{$employerDetails->number_of_teachers ?? ''}}</div>
							</li>

							<!-- <li class="col-12">
										<span>Size:</span>
										<div>7000-8000, Worldwide</div>
									</li> -->
							{{--<li class="col-12">
								<span>Email: </span>
								<div><a href="#">{{$employerDetails->email ?? ''}}</a></div>
							</li>--}}
							<li class="col-12">
								<span>Business Address: </span>
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
							{{--<li class="col-12">
								<span>Social: </span>
								<div>
									<a href="#" class="me-3"><i class="bi bi-facebook"></i></a>
									<a href="#" class="me-3"><i class="bi bi-instagram"></i></a>
									<a href="#" class="me-3"><i class="bi bi-twitter"></i></a>
									<a href="#" class="me-3"><i class="bi bi-linkedin"></i></a>
									<a href="#" class="me-3"> Blog</a>

								</div>
							</li>--}}
						</ul>

						{{--<a href="#" class="btn-ten fw-500 text-white w-100 text-center tran3s mt-25">Send
							Message</a>--}}
					</div>
				</div>
				<!-- /.job-company-info -->
				<!-- <div class="job-company-info mt-100 ms-xl-5 ms-xxl-0 lg-mb-50">
					{{-- <img src="images/lazy.svg" data-src="images/logo/media_37.png" alt="" class="lazy-img m-auto logo"> --}}
					<div class="text-md text-dark text-center mt-15 mb-20 lg-mb-10">Location</div>
					{{-- <div class="text-center"><a href="#" class="website-btn-two tran3s" target="_blank">Visit our website</a></div> --}}

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
				</div> -->
			</div>
			<div class="col-xxl-9 col-xl-8 order-xl-first">
				<div class="details-post-data me-xxl-5 pe-xxl-4">
					<!-- <h3>Overview</h3> -->
					<!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Mauris vitae ultricies leo integer malesuada nunc vel risus commodo. Vulputate odio ut enim blandit. Nibh ipsum consequat nisl vel pretium lectus quam.</p> -->
					<!-- <p> Nulla at volutpat diam ut. Lobortis feugiat vivamus at augue eget arcu. Urna condimentum mattis pellentesque id nibh tortor id aliquet. Dignissim cras tincidunt lobortis feugiat. Est sit amet facilisis magna etiam tempor. Eu augue ut lectus arcu bibendum at varius vel pharetra. Vel facilisis volutpat est velit egestas dui id. Ut pharetra sit amet aliquam. Elit at imperdiet dui accumsan sit amet nulla facilisi morbi. Tellus in metus vulputate eu scelerisque felis imperdiet proin. Magna fringilla urna porttitor rhoncus. Et odio pellentesque diam volutpat. Congue eu consequat ac felis donec et odio pellentesque diam. Accumsan in nisl nisi scelerisque eu ultrices vitae auctor eu. </p> -->
					<!-- <p>Felis eget velit aliquet sagittis id. Massa placerat duis ultricies lacus sed turpis tincidunt id. Vel eros donec ac odio tempor orci dapibus ultrices. Ipsum consequat nisl vel pretium lectus quam. Dignissim sodales ut eu sem. </p> -->


					<div class="container">
						<h3>Overview</h3>
						{{--<p><b>School's Mission & Vision:</b> {{$employerDetails->school_vision_and_mission}}</p>--}}
						<p>{!! $employerDetails->employer_details ?? '' !!}</p>
						<h3>Intro</h3>
					
						@if(!empty($employerDetails->introductry_video))
						<div
							class="video-post d-flex align-items-center justify-content-center mt-25 lg-mt-20 mb-50 lg-mb-50">
							<a class="fancybox rounded-circle video-icon tran3s text-center" data-fancybox=""
								href="{{asset($employerDetails->introductry_video)}}">
								<i class="bi bi-play"></i>
							</a>
						</div>
						@endif
						

						<!-- <p><b>Teaching Philosophy:</b> (Details about the school's pedagogic beliefs and methods)</p> -->
					</div>
					<div class="details">
					<h3>Company Reviews</h3>

							<div class="company-review-slider">
								@isset($candidateReviews)
								@foreach($candidateReviews as $candidateReview)
								<div class="item">
									<div class="feedback-block-four">
										<ul class="list-unstyled d-flex justify-content-start text-warning mb-0">
											@for($i=1;$i < 6; $i++)
											<li><i class="{{$candidateReview->ratings >= $i ? 'fas' : 'far'}} fa-star fa-sm"></i></li>
											@endfor											
											{{--<li><i class="fas fa-star fa-sm"></i></li>
											<li><i class="fas fa-star fa-sm"></i></li>
											<li><i class="fas fa-star fa-sm"></i></li>
											<li><i class="far fa-star fa-sm"></i></li>--}}
										</ul>										
										<p>{{$candidateReview->comment}}</p>
										<div class = "d-flex">
											<img class="rounded-circle shadow-1-strong"
												src="{{asset($candidateReview->candidateDetails->candidatePersonalDetails->profile_picture)}}" alt="avatar"
												style="width: 50px;margin-right:7px;" />
											<h5>{{$candidateReview->candidateDetails->candidatePersonalDetails->full_name ?? ''}}</h5>
										</div>
									</div>
								</div>
								@endforeach
								@endisset
								{{--<div class="item">
									<div class="feedback-block-four">
										<ul class="list-unstyled d-flex justify-content-start text-warning mb-0">
											<li><i class="fas fa-star fa-sm"></i></li>
											<li><i class="fas fa-star fa-sm"></i></li>
											<li><i class="fas fa-star fa-sm"></i></li>
											<li><i class="fas fa-star fa-sm"></i></li>
											<li><i class="far fa-star fa-sm"></i></li>
										</ul>										
										<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum
											perspiciatis atque consequuntur reiciendis sunt magnam.</p>
										<div class = "d-flex">
											<img class="rounded-circle shadow-1-strong"
												src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(10).webp" alt="avatar"
												style="width: 50px;margin-right:7px;" />
											<h5>Maria Katie</h5>
										</div>
									</div>
								</div>
								<div class="item">
									<div class="feedback-block-four">
										<ul class="list-unstyled d-flex justify-content-start text-warning mb-0">
											<li><i class="fas fa-star fa-sm"></i></li>
											<li><i class="fas fa-star fa-sm"></i></li>
											<li><i class="fas fa-star fa-sm"></i></li>
											<li><i class="fas fa-star fa-sm"></i></li>
											<li><i class="far fa-star fa-sm"></i></li>
										</ul>										
										<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum
											perspiciatis atque consequuntur reiciendis sunt magnam.</p>
										<div class = "d-flex">
											<img class="rounded-circle shadow-1-strong"
												src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(10).webp" alt="avatar"
												style="width: 50px;margin-right:7px;" />
											<h5>Maria Katie</h5>
										</div>
									</div>
								</div>
								<div class="item">
									<div class="feedback-block-four">
										<ul class="list-unstyled d-flex justify-content-start text-warning mb-0">
											<li><i class="fas fa-star fa-sm"></i></li>
											<li><i class="fas fa-star fa-sm"></i></li>
											<li><i class="fas fa-star fa-sm"></i></li>
											<li><i class="fas fa-star fa-sm"></i></li>
											<li><i class="far fa-star fa-sm"></i></li>
										</ul>										
										<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum
											perspiciatis atque consequuntur reiciendis sunt magnam.</p>
										<div class = "d-flex">
											<img class="rounded-circle shadow-1-strong"
												src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(10).webp" alt="avatar"
												style="width: 50px;margin-right:7px;" />
											<h5>Maria Katie</h5>
										</div>
									</div>
								</div>--}}
							</div>
							{{--<p>
							<h5>Extra-Curricular Activities: </h5>(Details about clubs, sports, arts, and other
							non-academic activities)</p>--}}
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
						@auth
						@role('employer')
						<li class="me-2"><a href="{{route('candidatesMarketplace')}}" class="btn-three">Looking for job?</a></li>
						<li class="ms-2"><a href="{{route('employer-jobs.create')}}" class="btn-four">Post a job</a></li>
						@endrole
						@endauth
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>

@endsection