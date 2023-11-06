@extends('layout.main')
@section('title')
Job Marketplace
@endsection
<!-- 
		=============================================
			Inner Banner
		============================================== 
		-->
@section('content')
<div class="inner-banner-one position-relative">
	<div class="container">
		<div class="position-relative">
			<div class="row">
				<div class="col-xl-6 m-auto text-center">
					<div class="title-two">
						<h2 class="text-white">Jobs Marketplace</h2>
					</div>
					<p class="text-lg text-white mt-30 lg-mt-20 mb-35 lg-mb-20">We delivered blazing fast & striking work solution</p>
				</div>
			</div>
			<div class="position-relative">
				<div class="row">
					<div class="col-xl-9 col-lg-8 m-auto">
						<div class="job-search-one position-relative">
							<form action="{{route('jobMarketplace')}}">
								<div class="row">
									<div class="col-md-5">
										<div class="input-box">
											<div class="label">What are you looking for?</div>
											<select class="nice-select lg">
												<option value="1">UI Designer</option>
												<option value="2">Content creator</option>
												<option value="3">Web Developer</option>
												<option value="4">SEO Guru</option>
												<option value="5">Digital marketer</option>
											</select>
										</div>
									</div>
									<div class="col-md-4">
										<div class="input-box border-left">
											<div class="label">Category</div>
											<select class="nice-select lg">
												<option value="1">Web Design</option>
												<option value="2">Design & Creative</option>
												<option value="3">It & Development</option>
												<option value="4">Web & Mobile Dev</option>
												<option value="5">Writing</option>
												<option value="6">Sales & Marketing</option>
												<option value="7">Music & Audio</option>
											</select>
										</div>
									</div>
									<div class="col-md-3">
										<button class="fw-500 text-uppercase h-100 tran3s search-btn">Search</button>
									</div>
								</div>
							</form>
						</div>
						<!-- /.job-search-one -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/shape/shape_02.svg')}}" alt="" class="lazy-img shapes shape_01">
	<img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/shape/shape_03.svg')}}" alt="" class="lazy-img shapes shape_02">
</div> <!-- /.inner-banner-one -->



<!-- 
		=============================================
			Job Listing Three
		============================================== 
		-->
<section class="job-listing-three pt-110 lg-pt-80 pb-160 xl-pb-150 lg-pb-80">
	<div class="container">
		<div class="row">
				<div class="col-xl-3 col-lg-4">
					<form id="search-job-listings" action="{{route('jobMarketplace')}}" method="get">
						<button type="button" class="filter-btn w-100 pt-2 pb-2 h-auto fw-500 tran3s d-lg-none mb-40" data-bs-toggle="offcanvas" data-bs-target="#filteroffcanvas">
							<i class="bi bi-funnel"></i>
							Filter
						</button>
						<div class="filter-area-tab offcanvas offcanvas-start" id="filteroffcanvas">
							<button type="button" class="btn-close text-reset d-lg-none" data-bs-dismiss="offcanvas" aria-label="Close"></button>
							<div class="main-title fw-500 text-dark">Filter By</div>
							<div class="light-bg border-20 ps-4 pe-4 pt-25 pb-30 mt-20">
								<div class="filter-block bottom-line pb-25">
									<a class="filter-title fw-500 text-dark" data-bs-toggle="collapse" href="#collapseLocation" role="button" aria-expanded="false">Location</a>
									<div class="collapse show" id="collapseLocation">
										<div class="main-body">
											<select class="nice-select bg-white" name="SearchLocation">
												<option value="">Select</option>
												<option value="0">Washington DC</option>
												<option value="1">California, CA</option>
												<option value="2">New York</option>
												<option value="3">Miami</option>
											</select>
										</div>
									</div>
								</div>
								<!-- /.filter-block -->
								<div class="filter-block bottom-line pb-25 mt-25">
									<a class="filter-title fw-500 text-dark" data-bs-toggle="collapse" href="#collapseJobType" role="button" aria-expanded="false">Job Type</a>
									<div class="collapse show" id="collapseJobType">
										<div class="main-body">
											<ul class="style-none filter-input">
												<li>
													<input type="checkbox" name="SearchJobType" value="Fixed-Price">
													<label>Fixed-Price <span>7</span></label>
												</li>
												<li>
													<input type="checkbox" name="SearchJobType" value="Full-Time">
													<label>Full-Time <span>3</span></label>
												</li>
												<li>
													<input type="checkbox" name="SearchJobType" value="Part-time">
													<label>Part-time<span>0</span></label>
												</li>
												<li>
													<input type="checkbox" name="SearchJobType" value="Freelance">
													<label>Freelance <span>4</span></label>
												</li>
											</ul>
										</div>
									</div>
								</div>
								<!-- /.filter-block -->
								<div class="filter-block bottom-line pb-25 mt-25">
									<a class="filter-title fw-500 text-dark" data-bs-toggle="collapse" href="#collapseExp" role="button" aria-expanded="false">Experience</a>
									<div class="collapse show" id="collapseExp">
										<div class="main-body">
											<ul class="style-none filter-input">
												<li>
													<input type="checkbox" name="SearchExperience" value="01">
													<label>Fresher <span>5</span></label>
												</li>
												<li>
													<input type="checkbox" name="SearchExperience" value="02">
													<label>Intermediate <span>3</span></label>
												</li>
												<li>
													<input type="checkbox" name="SearchExperience" value="03">
													<label>No-Experience <span>1</span></label>
												</li>
												<li>
													<input type="checkbox" name="SearchExperience" value="04">
													<label>Internship <span>12</span></label>
												</li>
												<li>
													<input type="checkbox" name="SearchExperience" value="05">
													<label>Expert <span>17</span></label>
												</li>
											</ul>
										</div>
									</div>
								</div>
								<!-- /.filter-block -->
								<div class="filter-block bottom-line pb-25 mt-25">
									<a class="filter-title fw-500 text-dark" data-bs-toggle="collapse" href="#collapseSalary" role="button" aria-expanded="false">Salary </a>
									<div class="collapse show" id="collapseSalary">
										<div class="main-body">
											<div class="salary-slider">
												<div class="price-input d-flex align-items-center pt-5">
													<div class="field d-flex align-items-center">
														<input type="number" class="input-min" value="0" readonly>
													</div>
													<div class="pe-1 ps-1">-</div>
													<div class="field d-flex align-items-center">
														<input type="number" class="input-max" value="300" readonly>
													</div>
													<div class="currency ps-1">USD</div>
												</div>
												<div class="slider">
													<div class="progress"></div>
												</div>
												<div class="range-input mb-10">
													<input type="range" name="SearchRangeMin" class="range-min" min="0" max="950" value="0" step="10">
													<input type="range" name="SearchRangeMax" class="range-max" min="0" max="1000" value="300" step="10">
												</div>
											</div>
											<!-- <ul class="style-none d-flex flex-wrap justify-content-between radio-filter mb-5">
												<li>
													<input type="radio" name="jobDuration" value="01">
													<label>Weekly</label>
												</li>
												<li>
													<input type="radio" name="jobDuration" value="02">
													<label>Monthly</label>
												</li>
												<li>
													<input type="radio" name="jobDuration" value="03">
													<label>Hourly</label>
												</li>
											</ul> -->
										</div>
									</div>
								</div>


								<!-- house included demand of client -->
								<div class="filter-block bottom-line pb-25 mt-25">
									<a class="filter-title fw-500 text-dark" data-bs-toggle="collapse" href="#collapseLocation" role="button" aria-expanded="false">Housing Included</a>
									<div class="collapse show" id="collapseLocation">
										<div class="main-body">
											<select class="nice-select bg-white" name="SearchHousingIncluded">
												<option value="">Select</option>
												<option value="Yes">Yes</option>
												<option value="No">No</option>
											</select>
										</div>
									</div>
								</div>


								<!--  Insurances Included demand of client -->
								<div class="filter-block bottom-line pb-25 mt-25">
									<a class="filter-title fw-500 text-dark" data-bs-toggle="collapse" href="#collapseLocation" role="button" aria-expanded="false"> Insurances Included </a>
									<div class="collapse show" id="collapseLocation">
										<div class="main-body">
											<select class="nice-select bg-white" name="SearchInsuranceIncluded">
												<option value="">Select</option>
												<option value="Yes">Yes</option>
												<option value="No">No</option>
											</select>
										</div>
									</div>
								</div>





								<button type="submit" class="btn-ten fw-500 text-white w-100 text-center tran3s mt-30">Apply Filter</button>
							</div>
						</div>
							<!-- /.filter-area-tab -->
					</form>
				</div>


			<div class="col-xl-9 col-lg-8">
				<div class="job-post-item-wrapper ms-xxl-5 ms-xl-3">
					<div class="upper-filter d-flex justify-content-between align-items-center mb-20">
						<div class="total-job-found">All <span class="text-dark">@isset($allJobs){{ $allJobs->count()}}@endisset</span> jobs found</div>
						<div class="d-flex align-items-center">
							<div class="short-filter d-flex align-items-center">
								<div class="text-dark fw-500 me-2">Short:</div>
								<select class="nice-select">
									<option value="0">Latest</option>
									<option value="1">Category</option>
									<option value="2">Job Type</option>
								</select>
							</div>
							<button class="style-changer-btn text-center rounded-circle tran3s ms-2 list-btn active" title="Active List"><i class="bi bi-list"></i></button>
							<button class="style-changer-btn text-center rounded-circle tran3s ms-2 grid-btn" title="Active Grid"><i class="bi bi-grid"></i></button>
						</div>
					</div>
					<!-- /.upper-filter -->
					<div class="accordion-box list-style">
						<div class="job-list-one style-two position-relative border-style mb-20">
							<div class="row justify-content-between align-items-center">
								<div class="col-md-5">
									<div class="job-title d-flex align-items-center">
										<a href="javascript;;" class="logo"><img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/logo/media_22.png')}}" alt="" class="lazy-img m-auto"></a>
										<div class="split-box1">
											<a href="javascript;;" class="job-duration fw-500">Fulltime</a>
											<a href="javascript;;" class="title fw-500 tran3s">Animator & 3D Artist.</a>
										</div>
									</div>
								</div>
								<div class="col-md-4 col-sm-6">
									<div class="job-location">
										<a href="javascript;;">Spain, Bercelona</a>
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
						</div>
						<!-- /.job-list-one -->
						<div class="job-list-one style-two position-relative border-style mb-20">
							<div class="row justify-content-between align-items-center">
								<div class="col-md-5">
									<div class="job-title d-flex align-items-center">
										<a href="javascript;;" class="logo"><img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/logo/media_23.png')}}" alt="" class="lazy-img m-auto"></a>
										<div class="split-box1">
											<a href="javascript;;" class="job-duration fw-500">Fulltime</a>
											<a href="javascript;;" class="title fw-500 tran3s">Marketing Specialist.</a>
										</div>
									</div>
								</div>
								<div class="col-md-4 col-sm-6">
									<div class="job-location">
										<a href="javascript;;">US, New York</a>
									</div>
									<div class="job-salary"><span class="fw-500 text-dark">$22k-$30k</span> / year . Expert</div>
								</div>
								<div class="col-md-3 col-sm-6">
									<div class="btn-group d-flex align-items-center justify-content-sm-end xs-mt-20">
										<a href="javascript;;" class="save-btn text-center rounded-circle tran3s me-3" title="Save Job"><i class="bi bi-bookmark-dash"></i></a>
										<a href="javascript;;" class="apply-btn text-center tran3s">APPLY</a>
									</div>
								</div>
							</div>
						</div>
						<!-- /.job-list-one -->
						<div class="job-list-one style-two position-relative border-style mb-20">
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
						</div>
						<!-- /.job-list-one -->
						<div class="job-list-one style-two position-relative border-style mb-20">
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
						</div>
						<!-- /.job-list-one -->
						<div class="job-list-one style-two position-relative border-style mb-20">
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
						</div>
						<!-- /.job-list-one -->
						<div class="job-list-one style-two position-relative border-style mb-20">
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
						</div>
						<!-- /.job-list-one -->
						<div class="job-list-one style-two position-relative border-style mb-20">
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
						</div>
						<!-- /.job-list-one -->
						<div class="job-list-one style-two position-relative border-style mb-20">
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
						</div>
						<!-- /.job-list-one -->
						<div class="job-list-one style-two position-relative border-style mb-30">
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
						</div>
						<!-- /.job-list-one -->
					</div>


					<div class="accordion-box grid-style show">
						<div class="row">
						@isset($allJobs)
						@foreach($allJobs as $index=>$job)

							<div class="col-sm-6 mb-30">
								<div class="job-list-two style-two position-relative">
									<a href="{{route('jobDetails', \Crypt::encryptString($job->id))}}" class="logo">
										@if(isset($job->employerDetails->institution_logo))
										<img src="{{asset($job->employerDetails->institution_logo)}}" data-src="{{asset($job->employerDetails->institution_logo)}}" alt="" class="lazy-img m-auto">
										@else
										<img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/logo/media_22.png')}}" alt="" class="lazy-img m-auto">
										@endif
									</a>
									<a  class="save-btn text-center rounded-circle tran3s {{(savedJob($job->id) == 1 ? 'bg-black' : '')}} save_job save_job{{base64_encode($job->id)}}" id="{{base64_encode($job->id)}}" title="Save Job"><i class="bi bi-bookmark-dash"></i></a>
									<div><a href="{{route('jobDetails', \Crypt::encryptString($job->id))}}" class="job-duration fw-500">Fulltime</a></div>
									<div><a href="{{route('jobDetails', \Crypt::encryptString($job->id))}}" class="title fw-500 tran3s">{{$job->job_title}}</a></div>
									<!-- <div class="job-salary"><span class="fw-500 text-dark">$300-$450</span> / Week</div> -->
									<div class="job-salary"><span class="fw-500 text-dark">{{$job->monthly_salary ?? ''}}</span></div>
									<div class="d-flex align-items-center justify-content-between mt-auto">
										<div class="job-location"><a href="{{route('jobDetails', \Crypt::encryptString($job->id))}}">{{$job->city_town}}</a></div>
										<a href="{{route('jobDetails', \Crypt::encryptString($job->id))}}" class="apply-btn text-center tran3s">Interview Request</a>
									</div>
								</div> <!-- /.job-list-two -->
							</div>
							@endforeach
						@endisset
							<!-- <div class="col-sm-6 mb-30">
								<div class="job-list-two style-two position-relative">
									<a href="javascript;;" class="logo"><img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/logo/media_23.png')}}" alt="" class="lazy-img m-auto"></a>
									<a href="javascript;;" class="save-btn text-center rounded-circle tran3s" title="Save Job"><i class="bi bi-bookmark-dash"></i></a>
									<div><a href="javascript;;" class="job-duration fw-500 part-time">Part-time</a></div>
									<div><a href="javascript;;" class="title fw-500 tran3s">Developer & expert in c++ & java.</a></div>
									<div class="job-salary"><span class="fw-500 text-dark">$10-$15</span> / Hour</div>
									<div class="d-flex align-items-center justify-content-between mt-auto">
										<div class="job-location"><a href="javascript;;">USA, Alaska</a></div>
										<a href="javascript;;" class="apply-btn text-center tran3s">Interview Request</a>
									</div>
								</div> 
							</div>
							<div class="col-sm-6 mb-30">
								<div class="job-list-two style-two position-relative">
									<a href="javascript;;" class="logo"><img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/logo/media_24.png')}}" alt="" class="lazy-img m-auto"></a>
									<a href="javascript;;" class="save-btn text-center rounded-circle tran3s" title="Save Job"><i class="bi bi-bookmark-dash"></i></a>
									<div><a href="javascript;;" class="job-duration fw-500 part-time">Part-time</a></div>
									<div><a href="javascript;;" class="title fw-500 tran3s">Marketing specialist in SEO & Affiliate. </a></div>
									<div class="job-salary"><span class="fw-500 text-dark">$40k</span> / Yearly</div>
									<div class="d-flex align-items-center justify-content-between mt-auto">
										<div class="job-location"><a href="javascript;;">AUS, Sydney</a></div>
										<a href="javascript;;" class="apply-btn text-center tran3s">Interview Request</a>
									</div>
								</div>
							</div>
							<div class="col-sm-6 mb-30">
								<div class="job-list-two style-two position-relative">
									<a href="javascript;;" class="logo"><img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/logo/media_25.png')}}" alt="" class="lazy-img m-auto"></a>
									<a href="javascript;;" class="save-btn text-center rounded-circle tran3s" title="Save Job"><i class="bi bi-bookmark-dash"></i></a>
									<div><a href="javascript;;" class="job-duration fw-500">Fulltime</a></div>
									<div><a href="javascript;;" class="title fw-500 tran3s">Lead & Product & Web Designer.</a></div>
									<div class="job-salary"><span class="fw-500 text-dark">$2k-3k</span> / Month</div>
									<div class="d-flex align-items-center justify-content-between mt-auto">
										<div class="job-location"><a href="javascript;;">UAE, Dubai</a></div>
										<a href="javascript;;" class="apply-btn text-center tran3s">Interview Request</a>
									</div>
								</div> 
							</div>

							<div class="col-sm-6 mb-30">
								<div class="job-list-two style-two position-relative">
									<a href="javascript;;" class="logo"><img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/logo/media_34.png')}}" alt="" class="lazy-img m-auto"></a>
									<a href="javascript;;" class="save-btn text-center rounded-circle tran3s" title="Save Job"><i class="bi bi-bookmark-dash"></i></a>
									<div><a href="javascript;;" class="job-duration fw-500 part-time">Part-time</a></div>
									<div><a href="javascript;;" class="title fw-500 tran3s">Accountant Bookkeeper Financial Reporting</a></div>
									<div class="job-salary"><span class="fw-500 text-dark">$300-$450</span> / Week</div>
									<div class="d-flex align-items-center justify-content-between mt-auto">
										<div class="job-location"><a href="javascript;;">US, Alaska</a></div>
										<a href="javascript;;" class="apply-btn text-center tran3s">Interview Request</a>
									</div>
								</div> 
							</div>

							<div class="col-sm-6 mb-30">
								<div class="job-list-two style-two position-relative">
									<a href="javascript;;" class="logo"><img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/logo/media_37.png')}}" alt="" class="lazy-img m-auto"></a>
									<a href="javascript;;" class="save-btn text-center rounded-circle tran3s" title="Save Job"><i class="bi bi-bookmark-dash"></i></a>
									<div><a href="javascript;;" class="job-duration fw-500 part-time">Part-time</a></div>
									<div><a href="javascript;;" class="title fw-500 tran3s">Amazon Product Research</a></div>
									<div class="job-salary"><span class="fw-500 text-dark">$15-$20</span> / Hour</div>
									<div class="d-flex align-items-center justify-content-between mt-auto">
										<div class="job-location"><a href="javascript;;">Germany, Hamburg</a></div>
										<a href="javascript;;" class="apply-btn text-center tran3s">Interview Request</a>
									</div>
								</div> 
							</div> -->
						</div>
					</div>
					<!-- /.accordion-box -->

					<div class="pt-30 lg-pt-20 d-sm-flex align-items-center justify-content-between">
						<p class="m0 order-sm-last text-center text-sm-start xs-pb-20">Showing <span class="text-dark fw-500">1 to 20</span> of <span class="text-dark fw-500">7,096</span></p>
						<ul class="pagination-one d-flex align-items-center justify-content-center justify-content-sm-start style-none">
							<!-- <li class="active"><a href="#">1</a></li> -->
							<li><a href="#">{{ $allJobs->links() }}</a></li>
							<!-- <li><a href="#">3</a></li>
							<li><a href="#">4</a></li>
							<li>....</li>
							<li class="ms-2"><a href="#" class="d-flex align-items-center">Last <img src="images/icon/icon_50.svg" alt="" class="ms-2"></a></li> -->
						</ul>
					</div>
				</div>
				<!-- /.job-post-item-wrapper -->
			</div>
			<!-- /.col- -->
		</div>
	</div>
</section>
<!-- ./job-listing-three -->


<!--
		=====================================================
			Job Portal Intro
		=====================================================
		-->
<section class="job-portal-intro">
	<div class="container">
		<div class="wrapper bottom-border top-border pt-65 md-pt-50 pb-65 md-pb-50">
			<div class="row align-items-center">
				<div class="col-lg-7">
					<div class="text-center text-lg-start">
						<h2>Most complete job portal.</h2>
						<p class="text-md m0 md-pb-20">Signup and start find your job or talents.</p>
					</div>
				</div>
				<div class="col-lg-5">
					<ul class="btn-group style-none d-flex flex-wrap justify-content-center justify-content-lg-end">
						<li class="me-2"><a href="job-marketplace" class="btn-three">Looking for job?</a></li>
						<li class="ms-2"><a href="employer/post-a-job" class="btn-four">Post a job</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection