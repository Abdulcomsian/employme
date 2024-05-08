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
<style>
	span#loadingIcon img {
		width: 20px;
	}
</style>
<div class="modal fade" id="JobApplicationModal" tabindex="-1" role="dialog" aria-labelledby="Edit User"
    aria-hidden="true">
    <div class="modal-dialog modal-lg " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="User-Edit-Modal">{{__('Job Application')}}</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id='Job-Application-Form' method="POST" class="clearfix" enctype="multipart/form-data">
					<input id="interview-job-id" type="hidden" name="job_id" value="">
					<div id="errors-list"></div>
                    <div class="mb-3">
                        <label class="col-form-label" for="Major Name">Interview Date</label>
						<input type="date" name="application_date" id="application_date" class="form-control" min="{{date('Y-m-d')}}">
                    </div>
             
            </div>
            <div class="modal-footer">
                <button class="btn-one" type="button" data-bs-dismiss="modal">
					Close
                </button>
                <button class=" btn-submit btn-one" type="submit" name="submit">
					<span id="buttonText">Apply</span>
					<span id="loadingIcon" class="d-none"><img src="{{asset('assets/images/loading.gif')}}" alt="Loading..."></span>
				</button>
            </div>
            </form>
        </div>
    </div>
</div>
<div class="inner-banner-one position-relative">
	<div class="container">
		<div class="position-relative">
			<div class="row">
				<div class="col-xl-6 m-auto text-center">
					<div class="title-two">
						<h2 class="text-white">Jobs Marketplace</h2>
					</div>
					<p class="text-lg text-white mt-30 lg-mt-20 mb-35 lg-mb-20">Find the best candidate for your company</p>
				</div>
			</div>
			<div class="position-relative">
				<div class="row">
					<div class="col-xl-9 col-lg-8 m-auto">
						<div class="job-search-one position-relative" method="get">
							<form action="{{route('jobMarketplace')}}">
								<div class="row">
									<div class="col-md-9">
										<div class="input-box">
											<div class="label">What are you looking for?</div>
											<input type="text" class="form-control form-control-lg" name="SearchJobTitle" placeholder="Keyword" value="{{ isset($_GET['SearchJobTitle']) ? $_GET['SearchJobTitle'] : ''}}"/>
										</div>
									</div>
									<!-- <div class="col-md-4">
										<div class="input-box border-left">
											<div class="label">Category</div>
											<select name="SearchJobCategory" class="nice-select lg">
													@if(!$jobCategories->isEmpty())
														@foreach($jobCategories as $jobCategory)
														<option value="{{$jobCategory->id}}" {{(isset($_GET['SearchJobCategory']) && $_GET['SearchJobCategory'] == $jobCategory->id) ? 'selected' : ''}}>{{$jobCategory->name}}</option>
														@endforeach
													@else
													<option value="" selected>Select All</option>
													@endif
											</select>
										</div>
									</div> -->
									<!-- <div class="col-md-4">
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
									</div> -->
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
							<div class="main-title fw-500 text-dark d-flex justify-content-between">
								<div>Filter By</div>
								<div ><a class="btn-one" href="{{route('jobMarketplace')}}" title="Refresh Filter"><i class="bi bi-arrow-clockwise"></i></a></div>
							</div>
							<div class="light-bg border-20 ps-4 pe-4 pt-25 pb-30 mt-20">
								<div class="filter-block bottom-line pb-25">
									<a class="filter-title fw-500 text-dark collapsed" data-bs-toggle="collapse" href="#collapseLocation" role="button" aria-expanded="false">Location</a>
									<div class="collapse {{(isset($_GET['SearchLocation']) && $_GET['SearchLocation'] !='') ? 'show' : ''}}" id="collapseLocation">
										<div class="main-body">
											<!-- <select class="nice-select bg-white" name="SearchLocation">
												<option value="">Select</option>
												<option value="Washington DC" {{(isset($_GET['SearchLocation']) && $_GET['SearchLocation'] =='Washington DC') ? 'selected' : ''}}>Washington DC</option>
												<option value="California, CA" {{(isset($_GET['SearchLocation']) && $_GET['SearchLocation'] =='California, CA') ? 'selected' : ''}}>California, CA</option>
												<option value="New York" {{(isset($_GET['SearchLocation']) && $_GET['SearchLocation'] =='New York') ? 'selected' : ''}}>New York</option>
												<option value="Miami" {{(isset($_GET['SearchLocation']) && $_GET['SearchLocation'] =='Miami') ? 'selected' : ''}}>Miami</option>
											</select> -->
											<input type="text" name="SearchLocation" placeholder = "" value="{{ isset($_GET['SearchLocation']) ? $_GET['SearchLocation'] : ''}}"/>
										</div>
									</div>
								</div>
								<!-- /.filter-block -->
								<div class="filter-block bottom-line pb-25 mt-25">
									<a class="filter-title fw-500 text-dark collapsed" data-bs-toggle="collapse" href="#collapseJobType" role="button" aria-expanded="false">Job Type</a>
									<div class="collapse {{(isset($_GET['SearchFixedPriceJob']) || isset($_GET['SearchFullTimeJob']) || isset($_GET['SearchPartTimeJob']) || isset($_GET['SearchFixedTermContract'])) ? 'show' : ''}}" id="collapseJobType">
										<div class="main-body">
											<ul class="style-none filter-input">
												{{--<li>
													<input type="checkbox" name="SearchFixedPriceJob" value="Fixed-Price" {{isset($_GET['SearchFixedPriceJob']) ? 'checked' : ''}}>
													<label>Fixed-Price <span>{{jobTypeCount('Fixed-Price')}}</span></label>
												</li>--}}
												<li>
													<input type="checkbox" name="SearchFullTimeJob" value="Full Time" {{isset($_GET['SearchFullTimeJob']) ? 'checked' : ''}}>
													<label>Full Time <span>{{jobTypeCount('Full Time')}}</span></label>
												</li>
												<li>
													<input type="checkbox" name="SearchPartTimeJob" value="Part Time" {{isset($_GET['SearchPartTimeJob']) ? 'checked' : ''}}>
													<label>Part Time<span>{{jobTypeCount('Part Time')}}</span></label>
												</li>
												<li>
													<input type="checkbox" name="SearchFixedTermContract" value="Fixed Term Contract" {{isset($_GET['SearchFixedTermContract']) ? 'checked' : ''}}>
													<label>Fixed Term Contract <span>{{jobTypeCount('Fixed Term Contract')}}</span></label>
												</li>
											</ul>
										</div>
									</div>
								</div>
								<!-- /.filter-block -->
								<div class="filter-block bottom-line pb-25 mt-25">
									<a class="filter-title fw-500 text-dark collapsed" data-bs-toggle="collapse" href="#collapseExp" role="button" aria-expanded="false">Experience</a>
									<div class="collapse {{(isset($_GET['Search0To1Year']) || isset($_GET['Search1To3Years']) || isset($_GET['Search3To5Years']) || isset($_GET['Search5To7Years']) || isset($_GET['Search7To10Years']) || isset($_GET['Search10PlusYears'])) ? 'show' : ''}}" id="collapseExp">
										<div class="main-body">
											<ul class="style-none filter-input">
												<li>
													<input type="checkbox" name="Search0To1Year" value="0-1 Year" {{isset($_GET['Search0To1Year']) ? 'checked' : ''}}>
													<label>0-1 Year <span>{{jobExperienceCount('0-1 Year')}}</span></label>
												</li>
												<li>
													<input type="checkbox" name="Search1To3Years" value="1-3 Years" {{isset($_GET['Search1To3Years']) ? 'checked' : ''}}>
													<label>1-3 Years <span>{{jobExperienceCount('Intermediate')}}</span></label>
												</li>
												<li>
													<input type="checkbox" name="Search3To5Years" value="3-5 Years" {{isset($_GET['Search3To5Years']) ? 'checked' : ''}}>
													<label>3-5 Years <span>{{jobExperienceCount('3-5 Years')}}</span></label>
												</li>
												<li>
													<input type="checkbox" name="Search5To7Years" value="5-7 Years" {{isset($_GET['Search5To7Years']) ? 'checked' : ''}}>
													<label>5-7 Years <span>{{jobExperienceCount('5-7 Years')}}</span></label>
												</li>
												<li>
													<input type="checkbox" name="Search7To10Years" value="7-10 Years" {{isset($_GET['Search7To10Years']) ? 'checked' : ''}}>
													<label>7-10 Years <span>{{jobExperienceCount('7-10 Years')}}</span></label>
												</li>
												<li>
													<input type="checkbox" name="Search10PlusYears" value="10+ Years" {{isset($_GET['Search10PlusYears']) ? 'checked' : ''}}>
													<label>10+ Years <span>{{jobExperienceCount('10+ Years')}}</span></label>
												</li>
											</ul>
										</div>
									</div>
								</div>
								<!-- /.filter-block -->
								<!-- <div class="filter-block bottom-line pb-25 mt-25">
									<a class="filter-title fw-500 text-dark collapsed" data-bs-toggle="collapse" href="#collapseSalary" role="button" aria-expanded="false">Salary </a>
									<div class="collapse {{((isset($_GET['SearchRangeMin']) && $_GET['SearchRangeMin'] !='') || (isset($_GET['SearchRangeMax']) && $_GET['SearchRangeMax'] !='')) ? 'show' : ''}}" id="collapseSalary">
										<div class="main-body">
											<div class="salary-slider">
												<div class="price-input d-flex align-items-center pt-5">
													<div class="field d-flex align-items-center">
														<input type="number" name="SearchRangeMin" class="input-min" value="{{isset($_GET['SearchRangeMin']) ? $_GET['SearchRangeMin'] : 0}}" >
													</div>
													<div class="pe-1 ps-1">-</div>
													<div class="field d-flex align-items-center">
														<input type="number" name= "SearchRangeMax" class="input-max" value="{{isset($_GET['SearchRangeMax']) ? $_GET['SearchRangeMax'] : 3000}}" >
													</div>
													<div class="currency ps-1">USD</div>
												</div>
												<div class="slider">
													<div class="progress"></div>
												</div>
												<div class="range-input mb-10">
													<input type="range"  class="range-min" min="0" max="50000" value="0" step="10">
													<input type="range"  class="range-max" min="0" max="100000" value="30000" step="10">
												</div>
											</div>
											
										</div>
									</div>
								</div> -->


								<!-- house included demand of client -->
								{{-- <div class="filter-block bottom-line pb-25 mt-25">
									<a class="filter-title fw-500 text-dark collapsed" data-bs-toggle="collapse" href="#collapseHousingIncluded" role="button" aria-expanded="false">Housing Included</a>
									<div class="collapse {{(isset($_GET['SearchHousingIncluded']) && $_GET['SearchHousingIncluded'] !='') ? 'show' : ''}}" id="collapseHousingIncluded">
										<div class="main-body">
											<select class="nice-select bg-white" name="SearchHousingIncluded">
												<option value="">Select</option>
												<option value="Yes" {{(isset($_GET['SearchHousingIncluded']) && $_GET['SearchHousingIncluded'] == 'Yes') ? 'selected' : ''}}>Yes</option>
												<option value="No" {{(isset($_GET['SearchHousingIncluded']) && $_GET['SearchHousingIncluded'] == 'No') ? 'selected' : ''}}>No</option>
											</select>
										</div>
									</div>
								</div> --}}


								<!--  Insurances Included demand of client -->
								{{-- <div class="filter-block bottom-line pb-25 mt-25">
									<a class="filter-title fw-500 text-dark collapsed" data-bs-toggle="collapse" href="#collapseInsuranceIncluded" role="button" aria-expanded="false"> Insurances Included </a>
									<div class="collapse {{(isset($_GET['SearchInsuranceIncluded']) && $_GET['SearchInsuranceIncluded'] !='') ? 'show' : ''}}" id="collapseInsuranceIncluded">
										<div class="main-body">
											<select class="nice-select bg-white" name="SearchInsuranceIncluded">
												<option value="">Select</option>
												<option value="Yes" {{(isset($_GET['SearchInsuranceIncluded']) && $_GET['SearchInsuranceIncluded'] == 'Yes') ? 'selected' : ''}}>Yes</option>
												<option value="No" {{(isset($_GET['SearchInsuranceIncluded']) && $_GET['SearchInsuranceIncluded'] == 'No') ? 'selected' : ''}}>No</option>
											</select>
										</div>
									</div>
								</div> --}}





								<button type="submit" class="btn-ten fw-500 text-white w-100 text-center tran3s mt-30">Apply Filter</button>
							</div>
						</div>
							<!-- /.filter-area-tab -->
					</form>
				</div>


			<div class="col-xl-9 col-lg-8">
				<div class="job-post-item-wrapper ms-xxl-5 ms-xl-3">
					<div class="upper-filter d-flex justify-content-between align-items-center mb-20">
						<div class="total-job-found">All <span class="text-dark fw-500">@isset($allJobs){{ $allJobs->total()}}@endisset</span> jobs found</div>
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
						
						<!-- /Grid Job Listings -->
						@isset($allJobs)
						@foreach($allJobs as $index=>$job)
						<div class="job-list-one style-two position-relative border-style mb-20">
							<div class="row justify-content-between align-items-center">
								<div class="col-md-5">
									
									<div class="job-title d-flex align-items-center">
										<a href="{{route('jobDetails', \Crypt::encryptString($job->id))}}" class="round-circle">
										@if(isset($job->employerDetails->institution_logo))
										<img src="{{asset($job->employerDetails->institution_logo)}}" data-src="{{asset($job->employerDetails->institution_logo)}}" alt="" class="lazy-img rounded-circle round-avatar">
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
										<a href="{{route('jobDetails', \Crypt::encryptString($job->id))}}">{{$job->city_town}}</a>
									</div>
									<div class="job-salary"><span class="fw-500 text-dark">{{$job->monthly_salary}} USD</span> / month . {{$job->experience_level ?? ''}}</div>
								</div>
								<div class="col-md-4 col-sm-6 company-detail d-flex align-items-center">
									<p>{{$job->employerDetails->institution_type}}</p>
								</div>
								<div class="col-md-3 col-sm-6">
									<div class="btn-group d-flex align-items-center justify-content-sm-end xs-mt-20">
										<a  class="save-btn text-center rounded-circle tran3s {{(savedJob($job->id) == 1 ? 'bg-black' : '')}} save_job save_job{{base64_encode($job->id)}}" id="{{base64_encode($job->id)}}" title="Save Job"><i class="bi bi-bookmark-dash"></i></a>
										<a href="{{route('jobDetails', \Crypt::encryptString($job->id))}}" class="apply-btn text-center tran3s">APPLY</a>
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

					<div class="accordion-box grid-style show">
						<div class="row">
						   @isset($allJobs)
						   @foreach($allJobs as $index=>$job)
							<div class="col-sm-6 mb-30">
								<div class="job-list-two style-two position-relative">
									<a href="{{route('jobDetails', \Crypt::encryptString($job->id))}}" class="rounded-circle">
										@if(isset($job->employerDetails->institution_logo))
										<img src="{{asset($job->employerDetails->institution_logo)}}" data-src="{{asset($job->employerDetails->institution_logo)}}" alt="" class="lazy-img rounded-circle round-avatar">
										@else
										<img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/human-avatar.png')}}" alt="" class="lazy-img rounded-circle round-avatar">
										@endif
									</a>
									<a  class="save-btn text-center rounded-circle tran3s {{(savedJob($job->id) == 1 ? 'bg-black' : '')}} save_job save_job{{base64_encode($job->id)}}" id="{{base64_encode($job->id)}}" title="Save Job"><i class="bi bi-bookmark-dash"></i></a>
									
									<div><a href="{{route('jobDetails', \Crypt::encryptString($job->id))}}" class="job-duration fw-500">{{$job->job_type}}</a></div>
									<div class="company-detail my-3"><span class="title fw-200 tran3s">{{$job->employerDetails->institution_type}}</span></div>
									<div><a href="{{route('jobDetails', \Crypt::encryptString($job->id))}}" class="title fw-500 tran3s">{{$job->job_title}}</a></div>
									<!-- <div class="job-salary"><span class="fw-500 text-dark">$300-$450</span> / Week</div> -->
									<div class="job-salary"><span class="fw-500 text-dark my-2">{{$job->monthly_salary}} USD</span></div>
									<div class="row">
										<div class="col-12">
										<div class="job-location"><a href="{{route('jobDetails', \Crypt::encryptString($job->id))}}">{{$job->employerDetails ? $job->employerDetails->city.','.$job->employerDetails->state : ''}}</a></div>
										</div>
									</div>
									<div class="job-date"><span class="fw-100 text-dark"><i>Starting Date: </i>{{date("d-m-Y" , strtotime($job->start_date))}}</span></div>
									

									<div class="d-flex align-items-center justify-content-between mt-auto">
										
										@if($job->applications->count() == 1)
										<button class="apply-btn text-center tran3s">Interview Applied</button>
										@else
										<button class="apply-btn text-center tran3s apply-interview" data-job-id="{{$job->id}}">Interview Request</button>
										@endif
										
										<div class="job-location"><a href="{{route('jobDetails', \Crypt::encryptString($job->id))}}">{{$job->city_town}}</a></div>
									</div>
								</div> <!-- /.job-list-two -->
							</div>
							@endforeach
							@endisset
							
						</div>
					</div>
					<!-- /.accordion-box -->

					{{ $allJobs->onEachSide(2)->links('vendor.pagination.custom-pagination') }}

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
					@auth
					@role('candidate')
					<li class="me-2"><a href="{{route('jobMarketplace')}}" class="btn-three">Looking for job?</a></li>
					@endrole
					@role('employer')
					<li class="ms-2"><a href="{{route('employer-jobs.create')}}" class="btn-four">Post a job</a></li>
					@endrole
					@endauth
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
	$(document).on("click" , ".apply-interview" , function(e){
		let id = this.dataset.jobId;
		document.getElementById('interview-job-id').value = id;
		$("#JobApplicationModal").modal("show");
	})

	$(document).on("submit", "#Job-Application-Form", function() {
        // e.preventDefault();
        //   var e = this;
		$('#buttonText').hide();
        $('#loadingIcon').removeClass("d-none");
        $(".btn-submit").prop('disabled',true);
  
          $.ajax({
              url: '{{route("jobApplicationRequest")}}',
              data: {
                _token:"{{csrf_token()}}",
                job_id: $("#Job-Application-Form").find('input[name=job_id]').val(),
                application_date: $("#Job-Application-Form").find('input[name="application_date"]').val(),
                        },
              type: "POST",
              dataType: 'json',
              success: function (data) {
    
                if (data.status) {
                    window.location = data.redirect;
                }else{
                    $(".alert").remove();
                    $.each(data.errors, function (key, val) {
                        $("#errors-list").append("<div class='alert alert-danger'>" + val + "</div>");
                    });
                }
               
              },
			  complete: function(){
                $('#loadingIcon').addClass("d-none");
                $('#buttonText').show();
				$(".btn-submit").attr('disabled',false);

            }
          });
  
          return false;
      });
</script>
@endsection

