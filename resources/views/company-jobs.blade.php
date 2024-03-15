@extends('layout.main')


@section('content')
<style>
.company-details .details-post-data .container p {
    margin-bottom: 21px;
	padding-left:10px;
}
.company-details .details-post-data .container h2 {
	font-size:67px;
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
								
					<span style="font-size: 25px;font-weight: bold;">EmployMe</span>
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
			<li><a href="{{route('companyAboutUs', \Crypt::encryptString($employerDetails->user_id))}}" > About Us</a></li>
			<li><a href="{{route('companyStaff', \Crypt::encryptString($employerDetails->user_id))}}">Current Staff</a></li>
			<li><a href="{{route('companyGallery', \Crypt::encryptString($employerDetails->user_id))}}" >Media Gallery</a></li>
			<li><a href="{{route('companyBusinessOperation', \Crypt::encryptString($employerDetails->user_id))}}">Business Operation</a></li>
            <li><a href="{{route('companyJobs', \Crypt::encryptString($employerDetails->user_id))}}" class="active">Jobs</a></li>
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
					{{--<div class="job-company-info mt-100 ms-xl-5 ms-xxl-0 lg-mb-50">
						<!-- <img src="images/lazy.svg" data-src="images/logo/media_37.png" alt="" class="lazy-img m-auto logo"> -->
						<div class="text-md text-dark text-center mt-15 mb-20 lg-mb-10">Location</div>
						<!-- <div class="text-center"><a href="#" class="website-btn-two tran3s" target="_blank">Visit our website</a></div> -->

						<div class="border-top mt-35 lg-mt-20 pt-25">
							<ul class="job-meta-data row style-none">
								<li>
									<div class="map">
										<iframe
										src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13287.201679616686!2d73.0740548!3d33.6364165!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38df95f7c0118bb1%3A0x773c0f0856728b7!2sSilk%20Center%20Plaza!5e0!3m2!1sen!2s!4v1693389113300!5m2!1sen!2s"
										width="270" height="300" style="border:0;" allowfullscreen="" loading="lazy"
										referrerpolicy="no-referrer-when-downgrade"></iframe>
									</div>

								</li>
								<li>
										<p>silk center, Murree Rd, B-Block Block B Satellite Town, Rawalpindi, Punjab 44000</p>
								</li>
							</ul>

						</div>
					</div>--}}
				</div>
				<div class="col-xxl-9 col-xl-8 order-xl-first">
					<div class="details-post-data me-xxl-5 pe-xxl-4">
						<!-- <h3>Overview</h3> -->
						<!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Mauris vitae ultricies leo integer malesuada nunc vel risus commodo. Vulputate odio ut enim blandit. Nibh ipsum consequat nisl vel pretium lectus quam.</p> -->
						<!-- <p> Nulla at volutpat diam ut. Lobortis feugiat vivamus at augue eget arcu. Urna condimentum mattis pellentesque id nibh tortor id aliquet. Dignissim cras tincidunt lobortis feugiat. Est sit amet facilisis magna etiam tempor. Eu augue ut lectus arcu bibendum at varius vel pharetra. Vel facilisis volutpat est velit egestas dui id. Ut pharetra sit amet aliquam. Elit at imperdiet dui accumsan sit amet nulla facilisi morbi. Tellus in metus vulputate eu scelerisque felis imperdiet proin. Magna fringilla urna porttitor rhoncus. Et odio pellentesque diam volutpat. Congue eu consequat ac felis donec et odio pellentesque diam. Accumsan in nisl nisi scelerisque eu ultrices vitae auctor eu. </p> -->
						<!-- <p>Felis eget velit aliquet sagittis id. Massa placerat duis ultricies lacus sed turpis tincidunt id. Vel eros donec ac odio tempor orci dapibus ultrices. Ipsum consequat nisl vel pretium lectus quam. Dignissim sodales ut eu sem. </p> -->


						<div class="container">
							<h3>Jobs</h3>
							{{--<p>Photos: (Images of classrooms, events, staff, and students, housing)</p>
							<p>Videos: (Short clips or promotional videos showcasing the school environment, events, or teaching methods)</p>--}}
                            <div class="accordion-box list-style show">
						
						<!-- /Grid Job Listings -->
						@isset($allJobs)
						@foreach($allJobs as $index=>$job)
						<div class="job-list-one style-two position-relative border-style mb-20">
							<div class="row justify-content-between align-items-center">
								<div class="col-md-5">
									<div class="job-title d-flex align-items-center">
                                    <a href="{{route('jobDetails', \Crypt::encryptString($job->id))}}" class="logo">
										@if(isset($job->employerDetails->institution_logo))
										<img src="{{asset($job->employerDetails->institution_logo)}}" data-src="{{asset($job->employerDetails->institution_logo)}}" alt="" class="lazy-img m-auto">
										@else
										<img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/logo/media_22.png')}}" alt="" class="lazy-img m-auto">
										@endif
									</a>
										<div class="split-box1">
											<a href="{{route('jobDetails', \Crypt::encryptString($job->id))}}" class="job-duration fw-500">{{$job->job_type}}</a>
											<a href="{{route('jobDetails', \Crypt::encryptString($job->id))}}" class="title fw-500 tran3s">{{$job->job_title}}</a>
										</div>
									</div>
								</div>
								<div class="col-md-4 col-sm-6">
									<div class="job-location">
										<a href="javascript;;">{{$job->city_town}}</a>
									</div>
									<div class="job-salary"><span class="fw-500 text-dark">{{number_format($job->monthly_salary)}} USD</span> / month . {{$job->experience_level ?? ''}}</div>
								</div>
								<div class="col-md-3 col-sm-6">
									<div class="btn-group d-flex align-items-center justify-content-sm-end xs-mt-20">
										<a  class="save-btn text-center rounded-circle tran3s {{(savedJob($job->id) == 1 ? 'bg-black' : '')}} save_job save_job{{base64_encode($job->id)}}" id="{{base64_encode($job->id)}}" title="Save Job"><i class="bi bi-bookmark-dash"></i></a>
                                        @if($job->job_status == 1)
										<a href="{{route('jobDetails', \Crypt::encryptString($job->id))}}" class="apply-btn text-center tran3s">APPLY</a>
                                        @else
                                        <a href="#" class="apply-btn text-center tran3s">Expired</a>
                                        @endif
									</div>
								</div>
							</div>
						</div>
						@endforeach
						@endisset
						<!-- /.job-list-one -->
						<!-- <div class="job-list-one style-two position-relative border-style mb-20">
							<div class="row justify-content-between align-items-center">
								<div class="col-md-5">
									<div class="job-title d-flex align-items-center">
										<a href="javascript;;" class="logo"><img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/logo/media_24.png')}}" alt="" class="lazy-img m-auto"></a>
										<div class="split-box1">
											<a href="javascript;;" class="job-duration fw-500 part-time">Part-time</a>
											<a href="javascript;;" class="title fw-500 tran3s">Web Desginer.</a>
										</div>
									</div>
								</div>
								<div class="col-md-4 col-sm-6">
									<div class="job-location">
										<a href="javascript;;">Rome, Italy</a>
									</div>
									<div class="job-salary"><span class="fw-500 text-dark">$400-$550</span> / week . Expert</div>
								</div>
								<div class="col-md-3 col-sm-6">
									<div class="btn-group d-flex align-items-center justify-content-sm-end xs-mt-20">
										<a href="javascript;;" class="save-btn text-center rounded-circle tran3s me-3" title="Save Job"><i class="bi bi-bookmark-dash"></i></a>
										<a href="javascript;;" class="apply-btn text-center tran3s">APPLY</a>
									</div>
								</div>
							</div>
						</div> -->
						<!-- /.job-list-one -->
						<!-- <div class="job-list-one style-two position-relative border-style mb-20">
							<div class="row justify-content-between align-items-center">
								<div class="col-md-5">
									<div class="job-title d-flex align-items-center">
										<a href="javascript;;" class="logo"><img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/logo/media_25.png')}}" alt="" class="lazy-img m-auto"></a>
										<div class="split-box1">
											<a href="javascript;;" class="job-duration fw-500">Fulltime</a>
											<a href="javascript;;" class="title fw-500 tran3s">Javascript Developer</a>
										</div>
									</div>
								</div>
								<div class="col-md-4 col-sm-6">
									<div class="job-location">
										<a href="javascript;;">Milan, Italy</a>
									</div>
									<div class="job-salary"><span class="fw-500 text-dark">$35k-$40k</span> / year . Beginner</div>
								</div>
								<div class="col-md-3 col-sm-6">
									<div class="btn-group d-flex align-items-center justify-content-sm-end xs-mt-20">
										<a href="javascript;;" class="save-btn text-center rounded-circle tran3s me-3" title="Save Job"><i class="bi bi-bookmark-dash"></i></a>
										<a href="javascript;;" class="apply-btn text-center tran3s">APPLY</a>
									</div>
								</div>
							</div>
						</div> -->
						<!-- /.job-list-one -->
						<!-- <div class="job-list-one style-two position-relative border-style mb-20">
							<div class="row justify-content-between align-items-center">
								<div class="col-md-5">
									<div class="job-title d-flex align-items-center">
										<a href="javascript;;" class="logo"><img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/logo/media_26.png')}}" alt="" class="lazy-img m-auto"></a>
										<div class="split-box1">
											<a href="javascript;;" class="job-duration fw-500">Fulltime</a>
											<a href="javascript;;" class="title fw-500 tran3s">Inbound Call service.</a>
										</div>
									</div>
								</div>
								<div class="col-md-4 col-sm-6">
									<div class="job-location">
										<a href="javascript;;">UK, London</a>
									</div>
									<div class="job-salary"><span class="fw-500 text-dark">$30-$50</span> / hour . Intermediate</div>
								</div>
								<div class="col-md-3 col-sm-6">
									<div class="btn-group d-flex align-items-center justify-content-sm-end xs-mt-20">
										<a href="javascript;;" class="save-btn text-center rounded-circle tran3s me-3" title="Save Job"><i class="bi bi-bookmark-dash"></i></a>
										<a href="javascript;;" class="apply-btn text-center tran3s">APPLY</a>
									</div>
								</div>
							</div>
						</div> -->
						<!-- /.job-list-one -->
						<!-- <div class="job-list-one style-two position-relative border-style mb-20">
							<div class="row justify-content-between align-items-center">
								<div class="col-md-5">
									<div class="job-title d-flex align-items-center">
										<a href="javascript;;" class="logo"><img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/logo/media_33.png')}}" alt="" class="lazy-img m-auto"></a>
										<div class="split-box1">
											<a href="javascript;;" class="job-duration fw-500 part-time">Part-time</a>
											<a href="javascript;;" class="title fw-500 tran3s">Document Typing.</a>
										</div>
									</div>
								</div>
								<div class="col-md-4 col-sm-6">
									<div class="job-location">
										<a href="javascript;;">UAE, Dubai</a>
									</div>
									<div class="job-salary"><span class="fw-500 text-dark">$3k-$4k</span> / month . Expert</div>
								</div>
								<div class="col-md-3 col-sm-6">
									<div class="btn-group d-flex align-items-center justify-content-sm-end xs-mt-20">
										<a href="javascript;;" class="save-btn text-center rounded-circle tran3s me-3" title="Save Job"><i class="bi bi-bookmark-dash"></i></a>
										<a href="javascript;;" class="apply-btn text-center tran3s">APPLY</a>
									</div>
								</div>
							</div>
						</div> -->
						<!-- /.job-list-one -->
						<!-- <div class="job-list-one style-two position-relative border-style mb-20">
							<div class="row justify-content-between align-items-center">
								<div class="col-md-5">
									<div class="job-title d-flex align-items-center">
										<a href="javascript;;" class="logo"><img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/logo/media_34.png')}}" alt="" class="lazy-img m-auto"></a>
										<div class="split-box1">
											<a href="javascript;;" class="job-duration fw-500 part-time">Part-time</a>
											<a href="javascript;;" class="title fw-500 tran3s">Hotel Manager</a>
										</div>
									</div>
								</div>
								<div class="col-md-4 col-sm-6">
									<div class="job-location">
										<a href="javascript;;">AUS, Sydney</a>
									</div>
									<div class="job-salary"><span class="fw-500 text-dark">$30-$50</span> / hour . Intermediate</div>
								</div>
								<div class="col-md-3 col-sm-6">
									<div class="btn-group d-flex align-items-center justify-content-sm-end xs-mt-20">
										<a href="javascript;;" class="save-btn text-center rounded-circle tran3s me-3" title="Save Job"><i class="bi bi-bookmark-dash"></i></a>
										<a href="javascript;;" class="apply-btn text-center tran3s">APPLY</a>
									</div>
								</div>
							</div>
						</div> -->
						<!-- /.job-list-one -->
						<!-- <div class="job-list-one style-two position-relative border-style mb-20">
							<div class="row justify-content-between align-items-center">
								<div class="col-md-5">
									<div class="job-title d-flex align-items-center">
										<a href="javascript;;" class="logo"><img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/logo/media_35.png')}}" alt="" class="lazy-img m-auto"></a>
										<div class="split-box1">
											<a href="javascript;;" class="job-duration fw-500">Fulltime</a>
											<a href="javascript;;" class="title fw-500 tran3s">Personal Assistant (HR)</a>
										</div>
									</div>
								</div>
								<div class="col-md-4 col-sm-6">
									<div class="job-location">
										<a href="javascript;;">USA, Alaska</a>
									</div>
									<div class="job-salary"><span class="fw-500 text-dark">$20-$25</span> / hour . Intermediate</div>
								</div>
								<div class="col-md-3 col-sm-6">
									<div class="btn-group d-flex align-items-center justify-content-sm-end xs-mt-20">
										<a href="javascript;;" class="save-btn text-center rounded-circle tran3s me-3" title="Save Job"><i class="bi bi-bookmark-dash"></i></a>
										<a href="javascript;;" class="apply-btn text-center tran3s">APPLY</a>
									</div>
								</div>
							</div>
						</div> -->
						<!-- /.job-list-one -->
						<!-- <div class="job-list-one style-two position-relative border-style mb-30">
							<div class="row justify-content-between align-items-center">
								<div class="col-md-5">
									<div class="job-title d-flex align-items-center">
										<a href="javascript;;" class="logo"><img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/logo/media_36.png')}}" alt="" class="lazy-img m-auto"></a>
										<div class="split-box1">
											<a href="javascript;;" class="job-duration fw-500">Fulltime</a>
											<a href="javascript;;" class="title fw-500 tran3s">Interactive Designer.</a>
										</div>
									</div>
								</div>
								<div class="col-md-4 col-sm-6">
									<div class="job-location">
										<a href="javascript;;">USA, California</a>
									</div>
									<div class="job-salary"><span class="fw-500 text-dark">$250-$300</span> / week . Expert</div>
								</div>
								<div class="col-md-3 col-sm-6">
									<div class="btn-group d-flex align-items-center justify-content-sm-end xs-mt-20">
										<a href="javascript;;" class="save-btn text-center rounded-circle tran3s me-3" title="Save Job"><i class="bi bi-bookmark-dash"></i></a>
										<a href="javascript;;" class="apply-btn text-center tran3s">APPLY</a>
									</div>
								</div>
							</div>
						</div> -->
						<!-- /.job-list-one -->
					</div>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</section>


@endsection