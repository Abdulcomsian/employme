@extends('layout.main')
@section('title')
Candidate Marketplace
@endsection
@section('content')
<style>
	.red-heart{
		color:red;
	}
	.filter-area-tab .salary-slider .price-input input {
    width: 110px;
    height: 20px;
    outline: none;
    font-size: 11px;
    text-align: center;
    color: #000;
    background: #fff;
    border: 1px solid rgba(0, 0, 0, 0.1);
    border-radius: 2px;
}
.btn-submit {
    height: 46px;
    border-radius: 7px;
    font-size: 14px;
    text-transform: uppercase;
    letter-spacing: 0.88px;
    color: #fff;
    background: #31795A;
    width: auto;
    padding: 14px;
}
#submitButton {
    position: relative;
    padding: 10px 20px;
    background-color: #007bff; /* Your button background color */
    color: #fff; /* Your button text color */
    border: none;
    border-radius: 5px;
}

#loadingIcon {
    /* position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%); */
	
}

#loadingIcon img {
    width: 20px; /* Adjust as needed */
    height: 20px; /* Adjust as needed */
}

</style>
<!--
		=============================================
			Inner Banner
		============================================== 
		-->
<div class="inner-banner-one position-relative">
	<div class="container">
		<div class="position-relative">
			<div class="row">
				<div class="col-xl-6 m-auto text-center">
					<div class="title-two">
						<h2 class="text-white">Candidate Marketplace</h2>
					</div>
					<p class="text-lg text-white mt-30 lg-mt-20 mb-35 lg-mb-20">Find you desire talents & make your work done</p>
				</div>
			</div>
			<div class="position-relative">
				<div class="row">
					<div class="col-xl-9 col-lg-8 m-auto">
						<div class="job-search-one position-relative">
							<form action="{{route('candidatesMarketplace')}}" method="GET">
								<div class="row">
									<div class="col-md-5">
										<div class="input-box">
											<div class="label">What are you looking for?</div>
											<input type="text" class="form-control form-control-lg" name="SearchProfileTitle" placeholder = "Search Candidate" value="{{ isset($_GET['SearchProfileTitle']) ? $_GET['SearchProfileTitle'] : ''}}"/>
										</div>
									</div>
									<div class="col-md-4">
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
			Candidates Profile
		============================================== 
		-->
<section class="candidates-profile pt-110 lg-pt-80 pb-160 xl-pb-150 lg-pb-80">
	<div class="container">
		<div class="row">
			<div class="col-xl-3 col-lg-4">
				<button type="button" class="filter-btn w-100 pt-2 pb-2 h-auto fw-500 tran3s d-lg-none mb-40" data-bs-toggle="offcanvas" data-bs-target="#filteroffcanvas">
					<i class="bi bi-funnel"></i>
					Filter
				</button>
				<div class="filter-area-tab offcanvas offcanvas-start" id="filteroffcanvas">
					<button type="button" class="btn-close text-reset d-lg-none" data-bs-dismiss="offcanvas" aria-label="Close"></button>
					<div class="main-title fw-500 text-dark d-flex justify-content-between">
						<div>Filter By</div>
						<div ><a class="btn-one" href="{{route('candidatesMarketplace')}}" title="Refresh Filter"><i class="bi bi-arrow-clockwise"></i></a></div>
					</div>
					<form action="{{route('candidatesMarketplace')}}" method="get">
						<div class="light-bg border-20 ps-4 pe-4 pt-25 pb-30 mt-20">
							<!-- <div class="filter-block bottom-line pb-25">
										<a class="filter-title fw-500 text-dark" data-bs-toggle="collapse" href="#collapseSemploye" role="button" aria-expanded="false">Name or Keyword</a>
										<div class="collapse show" id="collapseSemploye">
											<div class="main-body">
												<form action="#" class="input-box position-relative">
													<input type="text" placeholder="Name or keyword">
													<button><i class="bi bi-search"></i></button>
												</form>
											</div>
										</div>
									</div> -->
							<!-- /.filter-block -->
							<!-- <div class="filter-block bottom-line pb-25 mt-25">
										<a class="filter-title fw-500 text-dark" data-bs-toggle="collapse" href="#collapseCategory" role="button" aria-expanded="false">Category</a>
										<div class="collapse show" id="collapseCategory">
											<div class="main-body">
												<select class="nice-select">
													<option value="0">Web Design</option>
													<option value="1">Design & Creative </option>
													<option value="2">It & Development</option>
													<option value="3">Web & Mobile Dev</option>
													<option value="4">Writing</option>
													<option value="5">Sales & Marketing</option>
												</select>
											</div>
										</div>
									</div> -->
							<!-- /.filter-block -->
							<div class="filter-block bottom-line pb-25 mt-25">
								<a class="filter-title fw-500 text-dark" data-bs-toggle="collapse" href="#collapseLocation" role="button" aria-expanded="false">Location</a>
								<div class="collapse show" id="collapseLocation">
									<div class="main-body">
										<!-- <select class="nice-select bg-white" name="SearchCandidateLocation">
											<option value="">Select</option>
											<option value="California, CA" {{(isset($_GET['SearchCandidateLocation']) && $_GET['SearchCandidateLocation'] =='California, CA') ? 'selected' : ''}}>California, CA</option>
											<option value="New York" {{(isset($_GET['SearchCandidateLocation']) && $_GET['SearchCandidateLocation'] =='New York') ? 'selected' : ''}}>New York</option>
											<option value="Miami" {{(isset($_GET['SearchCandidateLocation']) && $_GET['SearchCandidateLocation'] =='Miami') ? 'selected' : ''}}>Miami</option>
										</select> -->
										<!-- <div class="loccation-range-select mt-5">
											<div class="d-flex align-items-center">
												<span>Radius: &nbsp;</span>
												<div id="rangeValue">50</div>
												<span>&nbsp;miles</span>
											</div>
											<input type="range" id="locationRange" value="50" max="100">
										</div> -->
										<input type="text" name="SearchCandidateLocation" placeholder = "" value="{{ isset($_GET['SearchCandidateLocation']) ? $_GET['SearchCandidateLocation'] : ''}}"/>
									</div>
								</div>
							</div>
							<div class="filter-block bottom-line pb-25 mt-25">
								<a class="filter-title fw-500 text-dark " data-bs-toggle="collapse" href="#collapseSalary" role="button" aria-expanded="false">Salary Range</a>
								<div class="collapse show" id="collapseSalary">
									<div class="main-body">
										<div class="salary-slider">
											<div class="price-input d-flex align-items-center pt-5">
												<div class="field d-flex align-items-center">
													<input type="number" name="SearchCanidateMinSalary" class="input-min" value="0" readonly>
												</div>
												<div class="pe-1 ps-1">-</div>
												<div class="field d-flex align-items-center">
													<input type="number" name="SearchCanidateMaxSalary" class="input-max" value="30000" readonly>
												</div>
												<div class="currency ps-1">USD</div>
											</div>
											<div class="slider">
												<div class="progress"></div>
											</div>
											<div class="range-input mb-10">
												<input type="range" class="range-min" min="0" max="50000" value="0" step="10">
												<input type="range" class="range-max" min="0" max="100000" value="30000" step="10">
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

							<!-- <div class="filter-block bottom-line pb-25  mt-25">
								<a class="filter-title fw-500 text-dark collapsed" data-bs-toggle="collapse" href="#EDUg" role="button" aria-expanded="false">Education Grade</a>
								<div class="collapse" id="EDUg">
									<div class="main-body">
										<select class="nice-select bg-white">
											<option value="0">A</option>
											<option value="1">B</option>
											<option value="2">C</option>
										</select>

									</div>
								</div>
							</div> -->
							<!-- /.filter-block -->
							<!-- <div class="filter-block bottom-line pb-25 mt-25">
										<a class="filter-title fw-500 text-dark collapsed" data-bs-toggle="collapse" href="#collapseExp" role="button" aria-expanded="false">Expert Level</a>
										<div class="collapse" id="collapseExp">
											<div class="main-body">
												<ul class="style-none filter-input">
													<li>
														<input type="checkbox" name="Experience" value="02">
														<label>Intermediate</label>
													</li>
													<li>
														<input type="checkbox" name="Experience" value="03">
														<label>No-Experience</label>
													</li>
													<li>
														<input type="checkbox" name="Experience" value="04">
														<label>Internship</label>
													</li>
													<li>
														<input type="checkbox" name="Experience" value="05">
														<label>Expert</label>
													</li>
												</ul>
											</div>
										</div>
									</div> -->
							<div class="filter-block bottom-line pb-25 mt-25">
								<a class="filter-title fw-500 text-dark collapsed" data-bs-toggle="collapse" href="#collapseExp" role="button" aria-expanded="false">Visa Type</a>
								<div class="collapse {{(isset($_GET['SearchNoVisa']) || isset($_GET['SearchTouristVisa']) || isset($_GET['SearchStudentVisa']) || isset($_GET['SearchE2TeachingVisa'])) ? 'show' : ''}}" id="collapseExp">
									<div class="main-body">
										<ul class="style-none filter-input">
											<li>
												<input type="checkbox" name="SearchNoVisa" value="No Visa" {{isset($_GET['SearchNoVisa']) ? 'checked' : ''}}>
												<label>No Visa</label>
											</li>
											<li>
												<input type="checkbox" name="SearchTouristVisa" value="Tourist Visa" {{isset($_GET['SearchTouristVisa']) ? 'checked' : ''}}>
												<label>Tourist Visa</label>
											</li>
											<li>
												<input type="checkbox" name="SearchStudentVisa" value="Student Visa" {{isset($_GET['SearchStudentVisa']) ? 'checked' : ''}}>
												<label>Student Visa</label>
											</li>
											<li>
												<input type="checkbox" name="SearchE2TeachingVisa" value="E2 Teaching Visa" {{isset($_GET['SearchE2TeachingVisa']) ? 'checked' : ''}}>
												<label>E2 Teaching Visa</label>
											</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="filter-block bottom-line pb-25 mt-25">
								<a class="filter-title fw-500 text-dark collapsed" data-bs-toggle="collapse" href="#collapseG" role="button" aria-expanded="false">Gender</a>
								<div class="collapse {{(isset($_GET['SearchMaleGender']) || isset($_GET['SearchFemaleGender'])) ? 'show' : ''}}" id="collapseG">
									<div class="main-body">
										<ul class="style-none filter-input">
											<li>
												<input type="checkbox" name="SearchMaleGender" value="Male" {{isset($_GET['SearchMaleGender']) ? 'checked' : ''}}>
												<label>Male</label>
											</li>
											<li>
												<input type="checkbox" name="SearchFemaleGender" value="Female" {{isset($_GET['SearchFemaleGender']) ? 'checked' : ''}}>
												<label>Female</label>
											</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="filter-block bottom-line pb-25 mt-25">
								<a class="filter-title fw-500 text-dark collapsed" data-bs-toggle="collapse" href="#collapseExp1" role="button" aria-expanded="false">Experience Level</a>
								<div class="collapse {{(isset($_GET['SearchIntermediateExperience']) || isset($_GET['SearchFresher']) || isset($_GET['SearchNoExperience']) || isset($_GET['SearcInternship']) || isset($_GET['SearchExpert'])) ? 'show' : ''}}" id="collapseExp1">
									<div class="main-body">
										<ul class="style-none filter-input">
											<li>
												<input type="checkbox" name="SearchFresher" value="Fresher" {{isset($_GET['SearchFresher']) ? 'checked' : ''}}>
												<label>Fresher</label>
											</li>
											<li>
												<input type="checkbox" name="SearchIntermediateExperience" value="Intermediate" {{isset($_GET['SearchIntermediateExperience']) ? 'checked' : ''}}>
												<label>Intermediate</label>
											</li>
											<li>
												<input type="checkbox" name="SearchNoExperience" value="No-Experience" {{isset($_GET['SearchNoExperience']) ? 'checked' : ''}}>
												<label>No-Experience</label>
											</li>
											<li>
												<input type="checkbox" name="SearcInternship" value="Internship" {{isset($_GET['SearcInternship']) ? 'checked' : ''}}>
												<label>Internship</label>
											</li>
											<li>
												<input type="checkbox" name="SearchExpert" value="Expert" {{isset($_GET['SearchExpert']) ? 'checked' : ''}}>
												<label>Expert</label>
											</li>
										</ul>
									</div>
								</div>
							</div>
							<!-- /.filter-block -->
							<div class="filter-block bottom-line pb-25 mt-25">
								<a class="filter-title fw-500 text-dark collapsed" data-bs-toggle="collapse" href="#collapseQualification" role="button" aria-expanded="false">Qualification</a>
								<div class="collapse {{(isset($_GET['SearchBachelorQualification']) || isset($_GET['SearchMasterQualification']) || isset($_GET['SearchDoctorateQualification'])) ? 'show' : ''}}" id="collapseQualification">
									<div class="main-body">
										<ul class="style-none filter-input">
											<li>
												<input type="checkbox" name="SearchBachelorQualification" value="Bachelor" {{isset($_GET['SearchBachelorQualification']) ? 'checked' : ''}}>
												<label>Bachelor</label>
											</li>
											<li>
												<input type="checkbox" name="SearchMasterQualification" value="Master" {{isset($_GET['SearchMasterQualification']) ? 'checked' : ''}}>
												<label>Master</label>
											</li>
											<li>
												<input type="checkbox" name="SearchDoctorateQualification" value="Doctorate" {{isset($_GET['SearchDoctorateQualification']) ? 'checked' : ''}}>
												<label>Doctorate</label>
											</li>
										</ul>
									</div>
								</div>
							</div>
							<!-- /.filter-block -->
							<!-- <div class="filter-block bottom-line pb-25 mt-25">
										<a class="filter-title fw-500 text-dark collapsed" data-bs-toggle="collapse" href="#collapseCType" role="button" aria-expanded="false">Candidate Type</a>
										<div class="collapse" id="collapseCType">
											<div class="main-body">
												<ul class="style-none filter-input">
													<li>
														<input type="checkbox" name="Gender" value="01">
														<label>Male</label>
													</li>
													<li>
														<input type="checkbox" name="Gender" value="02">
														<label>Female</label>
													</li>
												</ul>
											</div>
										</div>
									</div> -->
							<!-- /.filter-block -->

							<!-- <div class="filter-block bottom-line pb-25 mt-25">
										<a class="filter-title fw-500 text-dark collapsed" data-bs-toggle="collapse" href="#collapseSalary" role="button" aria-expanded="false">Salary Range</a>
										<div class="collapse" id="collapseSalary">
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
														<input type="range" class="range-min" min="0" max="950" value="0" step="10">
														<input type="range" class="range-max" min="0" max="1000" value="300" step="10">
													</div>
												</div>
												<ul class="style-none d-flex flex-wrap justify-content-between radio-filter mb-5">
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
												</ul>
											</div>
										</div>
									</div> -->
							<!-- /.filter-block -->

							<!-- <div class="filter-block bottom-line pb-25 mt-25">
										<a class="filter-title fw-500 text-dark collapsed" data-bs-toggle="collapse" href="#collapseFluency" role="button" aria-expanded="false">English Fluency</a>
										<div class="collapse" id="collapseFluency">
											<div class="main-body">
												<select class="nice-select">
													<option value="0">Basic</option>
													<option value="1">Conversational</option>
													<option value="2" selected>Fluent</option>
													<option value="3">Native/Bilingual</option>
												</select>
											</div>
										</div>
									</div> -->
							<!-- /.filter-block -->

							<button type="submit" class="btn-ten fw-500 text-white w-100 text-center tran3s mt-30">Apply Filter</button>
						</div>
					</form>
				</div>
				<!-- /.filter-area-tab -->
			</div>


			<div class="col-xl-9 col-lg-8">
				<div class="ms-xxl-5 ms-xl-3">
					<div class="upper-filter d-flex justify-content-between align-items-center mb-20">
						<div class="total-job-found">All <span class="text-dark fw-500">@isset($candidates){{ $candidates->total()}}@endisset</span> candidates found</div>
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

					<div class="accordion-box grid-style show">
						<div class="row">
							@isset($candidates)
							@foreach($candidates as $candidate)
							<div class="col-xxl-4 col-sm-6 d-flex">
								<div class="candidate-profile-card favourite text-center grid-layout mb-25">
									<a  class="save-btn tran3s save_candidate  save_candidate{{base64_encode($candidate->id)}}" id="{{base64_encode($candidate->id)}}" style="color:{{(savedCandidate($candidate->id) == 1 ? 'red' : '')}}"><i class="bi bi-heart-fill"></i></a>
									@if(isset($candidate->candidatePersonalDetails->profile_picture) && !empty($candidate->candidatePersonalDetails->profile_picture))
									<div class="cadidate-avatar online position-relative d-block m-auto"><a href="{{route('candidateProfileNew', \Crypt::encryptString($candidate->id))}}" class="rounded-circle"><img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset($candidate->candidatePersonalDetails->profile_picture)}}" alt="" class="lazy-img rounded-circle"></a></div>
									@else
									<div class="cadidate-avatar online position-relative d-block m-auto"><a href="{{route('candidateProfileNew', \Crypt::encryptString($candidate->id))}}" class="rounded-circle"><img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/candidates/img_01.jpg')}}" alt="" class="lazy-img rounded-circle"></a></div>
									@endif
									<h4 class="candidate-name mt-15 mb-0"><a href="{{route('candidateProfileNew', \Crypt::encryptString($candidate->id))}}" class="tran3s">{{$candidate->candidatePersonalDetails->full_name ?? ''}}</a></h4>
									<div class="candidate-post">{{$candidate->candidatePersonalDetails->designation ?? ''}}</div>
									<ul class="cadidate-skills style-none d-flex flex-wrap align-items-center justify-content-center justify-content-md-between pt-30 sm-pt-20 pb-10">
										@if(isset($candidate->candidatePreferences->skills) && !empty($candidate->candidatePreferences->skills))
										@foreach($candidate->candidatePreferences->skills as $index=>$skill)
										@if($index < 3)
										<li>{{$skill}}</li>
										@endif
										@endforeach
										@endif
										@if(isset($candidate->candidatePreferences->skills) && !empty($candidate->candidatePreferences->skills))
										@if(count($candidate->candidatePreferences->skills) > 3)
										<li class="more">+{{{count($candidate->candidatePreferences->skills)-3}}}</li>
										@endif
										@endif
									</ul>
									<!-- /.cadidate-skills -->
									<div class="row gx-1">
										<div class="col-md-12">
											<div class="candidate-info mt-10 d-flex justify-content-between">
												<span>Salary</span>
												<div>{{$candidate->candidatePreferences->expected_salary ?? ''}}{{!empty($candidate->candidatePreferences->expected_salary) ? '/mo' : ''}}</div>
											</div>
											<!-- /.candidate-info -->
										</div>
										<div class="col-md-12">
											<div class="candidate-info mt-10 d-flex justify-content-between">
												<span> Document Status</span>
												<div class="doc-v">Verified</div>
											</div>
											<!-- /.candidate-info -->
										</div>
										<div class="col-md-12">
											<div class="candidate-info mt-10 d-flex justify-content-between">
												<span>Current Location</span>
												<div>{{$candidate->candidatePersonalDetails->current_location ?? ''}}</div>
											</div>
											<!-- /.candidate-info -->
										</div>
										<!-- <div class="col-md-12">
											<div class="candidate-info mt-10 d-flex justify-content-between">
												<span>Start Date</span>
												<div>30 Aug 2023</div>
											</div>
										</div> -->
										<div class="col-md-12">
											<div class="candidate-info mt-10 d-flex justify-content-between">
												<span>Nationality</span>
												<div>{{$candidate->candidatePersonalDetails->getNationality->name ?? ''}}</div>
											</div>
										</div>

									</div>
									<div class="row gx-2 pt-25 sm-pt-10">
										<div class="col-md-6">
											<a href="{{route('candidateProfileNew', \Crypt::encryptString($candidate->id))}}" class="profile-btn tran3s w-100 mt-5">View Profile</a>
										</div>
										<div class="col-md-6">
										@if(\Auth::check())
											@role('admin')
												<button class="msg-btn tran3s w-100 mt-5 NonEmployerButton" >Request Interview</button>
											@endrole
											@role('candidate')
											<button class="msg-btn tran3s w-100 mt-5 NonEmployerButton" >Request Interview</button>
											@endrole
											@role('employer')
									{{--		@if(jobApplicationStatus($jobDetails->id) == 1)
													<button class="btn-one">Requested</button>
												@else
													<!-- <button class="btn-one" onclick="event.preventDefault(); document.getElementById('job-application-form').submit();">Apply</button> -->
													<button class=" msg-btn tran3s w-100 mt-5" data-bs-toggle="modal" data-bs-target="#InterviewRequestModal">Request Interview</button>
											@endif --}}
											<button class=" msg-btn tran3s w-100 mt-5 Interview-Modal-Button" data-bs-toggle="modal" data-bs-target="#InterviewRequestModal" value = "{{$candidate->id}}">Request Interview</button>

											@endrole
											@else
												<button class=" msg-btn tran3s w-100 mt-5 PleaseLoginButton" >Request Interview</button>
												<!-- <button class="btn-one" onclick="event.preventDefault(); document.getElementById('job-application-form').submit();">Apply</button> -->
											@endif
										</div>

									</div>
									<!-- <div class="row justify-content-center gx-2 pt-15 sm-pt-10">
													<div class="col-md-10">
													<a href="#" class="tran3s w-100 interview ">  Interview Request</a>
													</div>
									   			</div> -->
								</div>
								<!-- /.candidate-profile-card -->
							</div>
							@endforeach
							@endisset
							<!-- <div class="col-xxl-4 col-sm-6 d-flex">
								<div class="candidate-profile-card text-center grid-layout mb-25">
									<a href="{{route('candidateProfileNew', \Crypt::encryptString(1))}}" class="save-btn tran3s"><i class="bi bi-heart"></i></a>
									<div class="cadidate-avatar position-relative d-block m-auto"><a href="{{route('candidateProfileNew', \Crypt::encryptString(1))}}" class="rounded-circle"><img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/candidates/img_02.jpg')}}" alt="" class="lazy-img rounded-circle"></a></div>
									<h4 class="candidate-name mt-15 mb-0"><a href="{{route('candidateProfileNew', \Crypt::encryptString(1))}}" class="tran3s">Juan Marko</a></h4>
									<div class="candidate-post">Javascript Developer</div>
									<ul class="cadidate-skills style-none d-flex flex-wrap align-items-center justify-content-center justify-content-md-between pt-30 sm-pt-20 pb-10">
										<li>Java</li>
										<li>Developer</li>
										<li>code</li>
										<li class="more">1+</li>
									</ul>
									<div class="row gx-1">
										<div class="col-md-12">
											<div class="candidate-info mt-10 d-flex justify-content-between">
												<span>Salary</span>
												<div>$3k-$5k/m</div>
											</div>
										</div>
										<div class="col-md-12">
											<div class="candidate-info mt-10 d-flex justify-content-between">
												<span> Document Status</span>
												<div class="doc-v">Verified</div>
											</div>
										</div>
										<div class="col-md-12">
											<div class="candidate-info mt-10 d-flex justify-content-between">
												<span>Current Location</span>
												<div>California, US</div>
											</div>
										</div>
										<div class="col-md-12">
											<div class="candidate-info mt-10 d-flex justify-content-between">
												<span>Start Date</span>
												<div>30 Aug 2023</div>
											</div>
										</div>
										<div class="col-md-12">
											<div class="candidate-info mt-10 d-flex justify-content-between">
												<span>Nationality</span>
												<div>Pakistani</div>
											</div>
										</div>

									</div>
									<div class="row gx-2 pt-25 sm-pt-10">
										<div class="col-md-6">
											<a href="{{route('candidateProfileNew', \Crypt::encryptString(1))}}" class="profile-btn tran3s w-100 mt-5"> View Profile</a>
										</div>
										<div class="col-md-6">
											<a href="{{route('candidateProfileNew', \Crypt::encryptString(1))}}" class="msg-btn tran3s w-100 mt-5">Request Interview</a>
										</div>
									</div>
									
								</div>
							</div> -->
						</div>
					</div>

					<div class="accordion-box list-style">
						@isset($candidates)
						@foreach($candidates as $candidate)
						<div class="candidate-profile-card favourite list-layout mb-25">
							<div class="d-flex">
								@if(isset($candidate->candidatePersonalDetails->profile_picture) && !empty($candidate->candidatePersonalDetails->profile_picture))
								<div class="cadidate-avatar online position-relative d-block m-auto"><a href="{{route('candidateProfileNew', \Crypt::encryptString($candidate->id))}}" class="rounded-circle"><img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset($candidate->candidatePersonalDetails->profile_picture)}}" alt="" class="lazy-img rounded-circle"></a></div>
								@else
								<div class="cadidate-avatar online position-relative d-block m-auto"><a href="{{route('candidateProfileNew', \Crypt::encryptString($candidate->id))}}" class="rounded-circle"><img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/candidates/img_01.jpg')}}" alt="" class="lazy-img rounded-circle"></a></div>
								@endif
								<!-- <div class="cadidate-avatar online position-relative d-block me-auto ms-auto"><a href="{{route('candidateProfileNew', \Crypt::encryptString(1))}}" class="rounded-circle"><img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/candidates/img_01.jpg')}}" alt="" class="lazy-img rounded-circle"></a></div> -->
								<div class="right-side">
									<div class="row gx-1 align-items-center">
										<div class="col-xl-3">
											<div class="position-relative">
												<h4 class="candidate-name mb-0"><a href="{{route('candidateProfileNew', \Crypt::encryptString(1))}}" class="tran3s">{{$candidate->candidatePersonalDetails->full_name ?? ''}}</a></h4>
												<div class="candidate-post">{{$candidate->candidatePersonalDetails->designation ?? ''}}</div>
												<ul class="cadidate-skills style-none d-flex align-items-center">
													@if(isset($candidate->candidatePreferences->skills) && !empty($candidate->candidatePreferences->skills))
													@foreach($candidate->candidatePreferences->skills as $index=>$skill)
													@if($index < 3)
													<li>{{$skill}}</li>
													@endif
													@endforeach
													@endif
													@if(isset($candidate->candidatePreferences->skills) && !empty($candidate->candidatePreferences->skills))
													@if(count($candidate->candidatePreferences->skills) > 3)
													<li class="more">+{{{count($candidate->candidatePreferences->skills)-3}}}</li>
													@endif
													@endif
												</ul>
												<!-- /.cadidate-skills -->
											</div>
										</div>
										<div class="col-xl-3 col-md-4 col-sm-6">
											<div class="candidate-info">
												<span>Salary</span>
												<div>{{$candidate->candidatePreferences->expected_salary ?? ''}}</div>
											</div>
											<!-- /.candidate-info -->
										</div>
										<div class="col-xl-3 col-md-4 col-sm-6">
											<div class="candidate-info">
												<span>Location</span>
												<div>{{$candidate->candidatePersonalDetails->current_location ?? ''}}</div>
											</div>
											<!-- /.candidate-info -->
										</div>
										<div class="col-xl-3 col-md-4">
											<div class="d-flex justify-content-lg-end">
												<a  class="save-btn text-center rounded-circle tran3s mt-10 save_candidate  save_candidate{{base64_encode($candidate->id)}}" id="{{base64_encode($candidate->id)}}" style="color:{{(savedCandidate($candidate->id) == 1 ? 'red' : '')}}"><i class="bi bi-heart-fill"></i></a>
												<a href="{{route('candidateProfileNew', \Crypt::encryptString($candidate->id))}}" class="profile-btn tran3s ms-md-2 mt-10 sm-mt-20">View Profile</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						@endforeach
						@endisset
						<!-- /.candidate-profile-card -->
						<!-- <div class="candidate-profile-card favourite list-layout mb-25">
							<div class="d-flex">
								<div class="cadidate-avatar online position-relative d-block me-auto ms-auto"><a href="{{route('candidateProfileNew', \Crypt::encryptString(1))}}" class="rounded-circle"><img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/candidates/img_03.jpg')}}" alt="" class="lazy-img rounded-circle"></a></div>
								<div class="right-side">
									<div class="row gx-1 align-items-center">
										<div class="col-xl-3">
											<div class="position-relative">
												<h4 class="candidate-name mb-0"><a href="{{route('candidateProfileNew', \Crypt::encryptString(1))}}" class="tran3s">Shofie Ana</a></h4>
												<div class="candidate-post">Artist</div>
												<ul class="cadidate-skills style-none d-flex align-items-center">
													<li>Design</li>
													<li>UI</li>
													<li>Digital</li>
													<li class="more">2+</li>
												</ul>
												{{-- candidate skills--}}
											</div>
										</div>
										<div class="col-xl-3 col-md-4 col-sm-6">
											<div class="candidate-info">
												<span>Salary</span>
												<div>$30k-$50k/yr</div>
											</div>
											{{-- candidate-info --}}
										</div>
										<div class="col-xl-3 col-md-4 col-sm-6">
											<div class="candidate-info">
												<span>Location</span>
												<div>New York, US</div>
											</div>
											{{-- candidate-info --}}
										</div>
										<div class="col-xl-3 col-md-4">
											<div class="d-flex justify-content-lg-end">
												<a href="{{route('candidateProfileNew', \Crypt::encryptString(1))}}" class="save-btn text-center rounded-circle tran3s mt-10"><i class="bi bi-heart"></i></a>
												<a href="{{route('candidateProfileNew', \Crypt::encryptString(1))}}" class="profile-btn tran3s ms-md-2 mt-10 sm-mt-20">View Profile</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div> -->
					</div>
					<!-- /.accordion-box -->


					{{$candidates->links('vendor.pagination.custom-pagination-3')}}
				</div>
				<!-- /.-->
			</div>
			<!-- /.col- -->
		</div>
	</div>
</section>
<!-- ./candidates-profile -->
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
						@role('employer')
						<li class="me-2"><a href="{{route('candidatesMarketplace')}}" class="btn-three">Looking for job?</a></li>
						<li class="ms-2"><a href="{{route('postAJob')}}" class="btn-four">Post a job</a></li>
						@endrole
						@endauth
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>

<div class="modal fade" id="InterviewRequestModal" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog modal-fullscreen modal-dialog-centered">
		<div class="container">
			<div class="user-data-form modal-content">
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				<div class="text-center">
					<h3>Request Form</h3>
				</div>
				<div class="form-wrapper m-auto">
					<form  id = "Interview-Request-Form">
						<div id="interview-request-errors-list"></div>
						<div class="row">
							<div class="col-md-6">
								<div class="input-group-meta position-relative mb-25">
									<label>Date*</label>
									<input type="date" name = "interview_date" placeholder="" required>
								</div>
							</div>
							<div class="col-md-6">
								<div class="input-group-meta position-relative mb-20" required>
									<label>Time*</label>
									<input type="time" name = "interview_time" placeholder="Enter Password" class="pass_log_id" required>
								</div>
							</div>
							<div class="col-md-12">
								<div class="input-group-meta position-relative mb-20">
									<label>Job Link*</label>
									<input type="text" name = "job_link" placeholder="https://job.pk/job/1" class="pass_log_id">
								</div>
							</div>
							<div class="col-md-12">
							<div class="input-group-meta position-relative mb-20">
								<label for="">Select Meeting Media</label>
								<select name="meeting_media" id="meeting_media" class="nice-select">
									<option value="Skype" selected >Skype</option>
									<option value="Google Meet" >Google Meet</option>
									<option value="Zoom">Zoom</option>
								</select>
						</div>
							</div>
						
							<div class="col-md-6">
								<button class="btn-submit fw-500 tran3s d-block mt-20" type = "submit" >
									<span id="buttonText">Submit</span>
									<span id="loadingIcon" class="d-none"><img src="{{asset('assets/images/loading.gif')}}" alt="Loading..."></span>
								</button>
							</div>
						</div>
					</form>
				
				</div>
				<!-- /.form-wrapper -->
			</div>
			<!-- /.user-data-form -->
		</div>
	</div>
</div>
<!-- /.job-portal-intro -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script>
	$(".PleaseLoginButton").on('click',function(){
        toastr.warning("Please Login First to send request Request");
	});
	$(".NonEmployerButton").on('click',function(){
        toastr.warning("Only Employer can send Interview Request");
	});
	let candidate_id = '';
	$(document).on("click", ".Interview-Modal-Button", function() {
	candidate_id = 	this.value;

	});
	$(document).on("submit", "#Interview-Request-Form", function() {
        // e.preventDefault();
        //   var e = this;
		$('#buttonText').hide();
        $('#loadingIcon').removeClass("d-none");
        $(".btn-submit").prop('disabled',true);
          $.ajax({
              url: '{{route("employer.job_interview_request")}}',
              data: {
                _token:"{{csrf_token()}}",
                interview_date: $("#Interview-Request-Form").find('input[name=interview_date]').val(),
                interview_time: $("#Interview-Request-Form").find('input[name=interview_time]').val(),
                meeting_media: $("#Interview-Request-Form").find('select[name=meeting_media]').val(),
                job_link: $("#Interview-Request-Form").find('input[name=job_link]').val(),
				candidate_id : candidate_id
                        },
              type: "POST",
              dataType: 'json',
              success: function (data) {
    
                if (data.status) {
                    window.location = data.redirect;
                }else{
                    $(".alert").remove();
                    $.each(data.errors, function (key, val) {
                        $("#interview-request-errors-list").append("<div class='alert alert-danger'>" + val + "</div>");
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