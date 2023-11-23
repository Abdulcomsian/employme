@extends('layout.main')
@section('content')
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
						<h2 class="text-white">Job Details</h2>
					</div>
					<p class="text-lg text-white mt-30 lg-mt-20">Here will be your company job details & requirements</p>
				</div>
			</div>
		</div>
	</div>
	<img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/shape/shape_02.svg')}}" alt="" class="lazy-img shapes shape_01">
	<img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/shape/shape_03.svg')}}" alt="" class="lazy-img shapes shape_02">
</div> <!-- /.inner-banner-one -->
<!-- 
		=============================================
			Job Details
		============================================== 
		-->
<section class="job-details pt-100 lg-pt-80 pb-130 lg-pb-80">
	<div class="container">
		<div class="row">
			<div class="col-xxl-8 col-xl-8">
				<div class="details-post-data me-xxl-5 pe-xxl-4">
					<!-- <div class="post-date">{{date('d M Y',strtotime($jobDetails->created_at))}} by <a href="#" class="fw-500 text-dark">{{$jobDetails->employerDetails->institution ?? ''}}</a></div> -->
					<div class="post-date d-flex justify-content-between">
						<div>
							{{date('d M Y',strtotime($jobDetails->created_at))}} by
							<a href="#" class="fw-500 text-dark">{{$jobDetails->employerDetails->institution ?? ''}}</a>
						</div>
						@if(\Auth::check())
						   @role('admin')
						   	<button class="btn-one NonCandidateButton" >Apply For This Job</button>
						   @endrole
						   @role('employer')
						   <button class="btn-one NonCandidateButton" >Apply For This Job</button>
						   @endrole
						   @role('candidate')
						   @if(jobApplicationStatus($jobDetails->id) == 1)
						   		<button class="btn-one">Applied Already</button>
							@else
								<!-- <button class="btn-one" onclick="event.preventDefault(); document.getElementById('job-application-form').submit();">Apply</button> -->
								<button class="btn-one" data-bs-toggle="modal" data-bs-target="#JobApplicationModal">Apply For This Job</button>
						   @endif
						   @endrole
						@else
							<button class="btn-one PleaseLoginButton" >Apply For This Job</button>
						      <!-- <button class="btn-one" onclick="event.preventDefault(); document.getElementById('job-application-form').submit();">Apply</button> -->
						@endif
							<!-- <form id="job-application-form" action="{{ route('jobApplicationRequest') }}" method="POST" style="display: none;">
                              @csrf
							  <input type = "hidden" name = "job_id" value = "{{$jobDetails->id}}">
							</form> -->
						
					</div>
					<h3 class="post-title">{{$jobDetails->job_title ?? ''}}</h3>
					<ul class="share-buttons d-flex flex-wrap style-none">
						<li><a href="#" class="d-flex align-items-center justify-content-center">
								<i class="bi bi-facebook"></i>
								<span>Facebook</span>
							</a></li>
						<li><a href="#" class="d-flex align-items-center justify-content-center">
								<i class="bi bi-twitter"></i>
								<span>Twitter</span>
							</a></li>
						<li><a href="#" class="d-flex align-items-center justify-content-center">
								<i class="bi bi-link-45deg"></i>
								<span>Copy</span>
							</a></li>
					</ul>
					 @php $sectionNumber = 0; @endphp
					 @if($jobDetails->job_description !='')
					  @php $sectionNumber++; @endphp
					<div class="post-block border-style mt-30">
						<div class="d-flex align-items-center">
							<div class="block-numb text-center fw-500 text-white rounded-circle me-2">{{$sectionNumber}}</div>
							<h4 class="block-title">Job Description</h4>
						</div>
						<!-- <p>As a <a href="#">Product Designer</a> at WillowTree, you’ll give form to ideas by being the voice and owner of product decisions. You’ll drive the design direction, and then make it happen!</p> -->
						<p>{{$jobDetails->job_description ?? ''}}</p>
					</div>
					 @endif
					  @if(isset($jobDetails->employerDetails->employer_details) && $jobDetails->employerDetails->employer_details !='')
					   @php $sectionNumber++; @endphp
					<div class="post-block border-style mt-50 lg-mt-30">
						<div class="d-flex align-items-center">
							<div class="block-numb text-center fw-500 text-white rounded-circle me-2">{{$sectionNumber}}</div>
							<h4 class="block-title">About Employer</h4>
						</div>
						<p>{!! $jobDetails->employerDetails->employer_details ?? '' !!}</p>
					</div>
					 @endif
							<!---- Requirements and Qualifications ---->
							@if($jobDetails->education !='' ||
								$jobDetails->teaching_certificate !='' ||       
								$jobDetails->experience !='' ||       
								$jobDetails->background_check !='' ||       
								$jobDetails->health_check_requirement !='' ||       
								$jobDetails->preferred_accent !='' ||       
								$jobDetails->visa_type !='' ||       
								$jobDetails->language_proficiency !=''     
								)
								@php $sectionNumber++; @endphp
					<div class="post-block border-style mt-40 lg-mt-30">
						<div class="d-flex align-items-center">
							<div class="block-numb text-center fw-500 text-white rounded-circle me-2">{{$sectionNumber}}</div>
							<h4 class="block-title">Requirements and Qualifications</h4>
						</div>
						<ul class="list-type-one style-none mb-15">
							@if($jobDetails->education)
							<li>{{$jobDetails->education ?? ''}}</li>
							@endif
							@if($jobDetails->teaching_certificate)
							<li>{{$jobDetails->teaching_certificate ?? ''}}</li>
							@endif
							@if($jobDetails->experience)
							<li>{{$jobDetails->experience ?? ''}}</li>
							@endif
							@if($jobDetails->background_check)
							<li>{{$jobDetails->background_check ?? ''}}</li>
							@endif
							@if($jobDetails->health_check_requirement)
							<li>{{$jobDetails->health_check_requirement ?? ''}}</li>
							@endif
							@if($jobDetails->preferred_accent)
							<li>{{$jobDetails->preferred_accent ?? ''}}</li>
							@endif
							@if($jobDetails->visa_type)
							<li>{{$jobDetails->visa_type ?? ''}}</li>
							@endif
							@if($jobDetails->language_proficiency)
							<li>{{$jobDetails->language_proficiency ?? ''}}</li>
							@endif
						</ul>
					</div>
					 @endif
							<!---- Position Overview ---->
						@if($jobDetails->school_vision !='' ||
							$jobDetails->unique_selling_point !='' ||       
							$jobDetails->ideal_candidate_profile !=''     
							)
							@php $sectionNumber++; @endphp
					<div class="post-block border-style mt-40 lg-mt-30">
						<div class="d-flex align-items-center">
							<div class="block-numb text-center fw-500 text-white rounded-circle me-2">{{$sectionNumber}}</div>
							<h4 class="block-title">Position Overview:</h4>
						</div>
						<ul class="list-type-two style-none mb-15">
							@if($jobDetails->school_vision)
							<li>{{$jobDetails->school_vision ?? ''}}</li>
							@endif
							@if($jobDetails->unique_selling_point)
							<li>{{$jobDetails->unique_selling_point ?? ''}}</li>
							@endif
							@if($jobDetails->ideal_candidate_profile)
							<li>{{$jobDetails->ideal_candidate_profile ?? ''}}</li>
							@endif
						</ul>
					</div>
					  @endif
							<!---- Onboarding Process ---->
						@if($jobDetails->arrival_assitance !='' ||
							$jobDetails->initial_accomodation !='' ||       
							$jobDetails->first_week_structure !='' ||       
							$jobDetails->induction_programs !='' ||       
							$jobDetails->mentorship !=''      
							)
							@php $sectionNumber++; @endphp
					<div class="post-block border-style mt-40 lg-mt-30">
						<div class="d-flex align-items-center">
							<div class="block-numb text-center fw-500 text-white rounded-circle me-2">{{$sectionNumber}}</div>
							<h4 class="block-title">Onboarding Process</h4>
						</div>
						<ul class="list-type-one style-none mb-15">
							@if($jobDetails->arrival_assitance)
							<li>{{$jobDetails->arrival_assitance ?? ''}}</li>
							@endif
							@if($jobDetails->initial_accomodation)
							<li>{{$jobDetails->initial_accomodation ?? ''}}</li>
							@endif
							@if($jobDetails->first_week_structure)
							<li>{{$jobDetails->first_week_structure ?? ''}}</li>
							@endif
							@if($jobDetails->induction_programs)
							<li>{{$jobDetails->induction_programs ?? ''}}</li>
							@endif
							@if($jobDetails->mentorship)
							<li>{{$jobDetails->mentorship ?? ''}}</li>
							@endif
						</ul>
					</div>
					  @endif
						<!----Location & Environment ---->
						@if($jobDetails->city_town !='' ||
							$jobDetails->neighbourhood_description !='' ||       
							$jobDetails->proximity_to_landmarks !='' ||       
							$jobDetails->local_amenities !='' ||       
							$jobDetails->school_facilities !='' || 
							$jobDetails->work_enviroment_and_culture !='' ||       
							$jobDetails->co_assistant_teachers_availability !=''       
							)
							@php $sectionNumber++; @endphp
					<div class="post-block border-style mt-40 lg-mt-30">
						<div class="d-flex align-items-center">
							<div class="block-numb text-center fw-500 text-white rounded-circle me-2">{{$sectionNumber}}</div>
							<h4 class="block-title">Location & Environment</h4>
						</div>
						<ul class="list-type-one style-none mb-15">
							@if($jobDetails->city_town)
							<li>{{$jobDetails->city_town ?? ''}}</li>
							@endif
							@if($jobDetails->neighbourhood_description)
							<li>{{$jobDetails->neighbourhood_description ?? ''}}</li>
							@endif
							@if($jobDetails->proximity_to_landmarks)
							<li>{{$jobDetails->proximity_to_landmarks ?? ''}}</li>
							@endif
							@if($jobDetails->local_amenities)
							<li>{{$jobDetails->local_amenities ?? ''}}</li>
							@endif
							@if($jobDetails->school_facilities)
							<li>{{$jobDetails->school_facilities ?? ''}}</li>
							@endif
							@if($jobDetails->public_transport_options)
							<li>{{$jobDetails->public_transport_options ?? ''}}</li>
							@endif
							@if($jobDetails->work_enviroment_and_culture)
							<li>{{$jobDetails->work_enviroment_and_culture ?? ''}}</li>
							@endif
							@if($jobDetails->co_assistant_teachers_availability)
							<li>{{$jobDetails->co_assistant_teachers_availability ?? ''}}</li>
							@endif
						</ul>
					</div>
					 @endif
						<!---- Support for Foreign Teachers -!---->
						@if($jobDetails->orientation_and_training !='' ||
							$jobDetails->culture_assimilation_program !='' ||       
							$jobDetails->language_courses_or_asistance !='' ||       
							$jobDetails->local_bank_account_assistance !='' ||       
							$jobDetails->emergency_contacts_and_support !=''       
							)
							@php $sectionNumber++; @endphp
					<div class="post-block border-style mt-40 lg-mt-30">
						<div class="d-flex align-items-center">
							<div class="block-numb text-center fw-500 text-white rounded-circle me-2">{{$sectionNumber}}</div>
							<h4 class="block-title">Support for Foreign Teachers:</h4>
						</div>
						<ul class="list-type-two style-none mb-15">
							@if($jobDetails->orientation_and_training)
							<li>{{$jobDetails->orientation_and_training ?? ''}}</li>
							@endif
							@if($jobDetails->culture_assimilation_program)
							<li>{{$jobDetails->culture_assimilation_program ?? ''}}</li>
							@endif	
							@if($jobDetails->language_courses_or_asistance)
							<li>{{$jobDetails->language_courses_or_asistance ?? ''}}</li>
							@endif	
							@if($jobDetails->local_bank_account_assistance)
							<li>{{$jobDetails->local_bank_account_assistance ?? ''}}</li>
							@endif	
							@if($jobDetails->emergency_contacts_and_support)
							<li>{{$jobDetails->emergency_contacts_and_support ?? ''}}</li>
							@endif								
						</ul>
					</div>
					 @endif
						<!---- Application & Recruitment Process -!---->
						@if($jobDetails->required_documents !='' ||
							$jobDetails->interview_process !='' ||       
							$jobDetails->application_deadline !='' ||       
							$jobDetails->contact_review_process !='' ||       
							$jobDetails->decision_deadline !=''       
							)
							@php $sectionNumber++; @endphp
					<div class="post-block border-style mt-40 lg-mt-30">
						<div class="d-flex align-items-center">
							<div class="block-numb text-center fw-500 text-white rounded-circle me-2">{{$sectionNumber}}</div>
							<h4 class="block-title">Application & Recruitment Process</h4>
						</div>
						<ul class="list-type-one style-none mb-15">
							@if($jobDetails->required_documents)
							<li>{{$jobDetails->required_documents ?? ''}}</li>
							@endif
							@if($jobDetails->interview_process)
							<li>{{$jobDetails->interview_process ?? ''}}</li>
							@endif
							@if($jobDetails->application_deadline)
							<li>{{$jobDetails->application_deadline ?? ''}}</li>
							@endif
							@if($jobDetails->contact_review_process)
							<li>{{$jobDetails->contact_review_process ?? ''}}</li>
							@endif
							@if($jobDetails->decision_deadline)
							<li>{{$jobDetails->decision_deadline ?? ''}}</li>
							@endif
						</ul>
					</div>
					 @endif
						<!---- Application & Recruitment Process -!---->
					  @if($jobDetails->orientation_and_training !='' ||
					    $jobDetails->culture_assimilation_program !='' ||       
					    $jobDetails->language_courses_or_asistance !='' ||       
					    $jobDetails->local_bank_account_assistance !='' ||       
					    $jobDetails->emergency_contacts_and_support !=''       
					 		)
							@php $sectionNumber++; @endphp
					<div class="post-block border-style mt-40 lg-mt-30">
						<div class="d-flex align-items-center">
							<div class="block-numb text-center fw-500 text-white rounded-circle me-2">{{$sectionNumber}}</div>
							<h4 class="block-title">Additional Information:</h4>
						</div>
						<ul class="list-type-two style-none mb-15">
							@if($jobDetails->orientation_and_training)
							<li>{{$jobDetails->orientation_and_training ?? ''}}</li>
							@endif
							@if($jobDetails->culture_assimilation_program)
							<li>{{$jobDetails->culture_assimilation_program ?? ''}}</li>
							@endif	
							@if($jobDetails->language_courses_or_asistance)
							<li>{{$jobDetails->language_courses_or_asistance ?? ''}}</li>
							@endif	
							@if($jobDetails->local_bank_account_assistance)
							<li>{{$jobDetails->local_bank_account_assistance ?? ''}}</li>
							@endif	
							@if($jobDetails->emergency_contacts_and_support)
							<li>{{$jobDetails->emergency_contacts_and_support ?? ''}}</li>
							@endif								
						</ul>
					</div> :
					@endif
					
				</div>
				<!-- /.details-post-data -->
			</div>

			<div class="col-xxl-4 col-xl-4">
				<div class="job-company-info ms-xl-5 ms-xxl-0 lg-mt-50">
						@if(isset($jobDetails->employerDetails->institution_logo))
						<img src="{{asset($jobDetails->employerDetails->institution_logo)}}" data-src="{{asset($jobDetails->employerDetails->institution_logo)}}" alt="" class="lazy-img m-auto logo">
						@else
						<img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/logo/media_37.png')}}" alt="" class="lazy-img m-auto logo">
						@endif
					<div class="text-md text-dark text-center mt-15 mb-20">{{$jobDetails->employerDetails->institution ?? ''}}</div>
					<a href="{{route('companyAboutUs', \Crypt::encryptString($jobDetails->employerDetails->id))}}" class="website-btn tran3s">About Company</a>

					<div class="border-top mt-40 pt-40">
						<ul class="job-meta-data row style-none">
							<li class="col-xl-7 col-md-4 col-sm-6">
								<span>Job Title</span>
								<div>{{$jobDetails->job_title ?? ''}}</div>
							</li>
							<li class="col-xl-5 col-md-4 col-sm-6">
								<span>Contract Duration</span>
								<div>{{$jobDetails->contract_duration ?? ''}}</div>
							</li>
							<li class="col-xl-7 col-md-4 col-sm-6">
								<span>Start Date</span>
								<div>{{date('d M, Y',strtotime($jobDetails->start_date)) ?? ''}}</div>
							</li>
							<li class="col-xl-5 col-md-4 col-sm-6">
								<span>End Date</span>
								<div>{{date('d M, Y',strtotime($jobDetails->end_date)) ?? ''}}</div>
							</li>
							<li class="col-xl-7 col-md-4 col-sm-6">
								<span>Experience Level</span>
								<div>{{$jobDetails->experience_level ?? ''}}</div>
							</li>
							<li class="col-xl-5 col-md-4 col-sm-6">
								<span>Job Type</span>
								<div>{{$jobDetails->job_type ?? ''}}</div>
							</li>
							<li class="col-xl-7 col-md-4 col-sm-6">
								<span>Renewal Possiblities</span>
								<div>{{$jobDetails->renewal_possibilities ?? ''}}</div>
							</li>
							<li class="col-xl-5 col-md-4 col-sm-6">
								<span>Base Pay</span>
								<div>{{$jobDetails->base_pay ?? ''}}</div>
							</li>
							<li class="col-xl-7 col-md-4 col-sm-6">
								<span>Housing Included</span>
								<div>{{$jobDetails->housing_included ?? ''}}</div>
							</li>
							<li class="col-xl-5 col-md-4 col-sm-6">
								<span>Insurance Included</span>
								<div>{{$jobDetails->Insurance_included ?? ''}}</div>
							</li>
							<li class="col-xl-7 col-md-4 col-sm-6">
								<span>Allowances & Other Incentives</span>
								<div>{{$jobDetails->allownces_other_incentives ?? ''}}</div>
							</li>
							<!-- <li class="col-xl-7 col-md-4 col-sm-6">

								<span>Education Grade</span>
								<div>B+</div>
							</li> -->
							<li class="col-xl-5 col-md-4 col-sm-6">
								<span>Location</span>
								<div>{{$jobDetails->city_town ?? ''}}</div>
							</li>
							<li class="col-xl-7 col-md-4 col-sm-6">
								<span>Specification</span>
								<div>{{$jobDetails->specify ?? ''}} </div>
							</li>
							<li class="col-xl-5 col-md-4 col-sm-6">
								<span>Tax Deductions</span>
								<div>{{$jobDetails->tax_deductions ?? ''}}</div>
							</li>
							<li class="col-xl-7 col-md-4 col-sm-6">
								<span>Housing and Insurances</span>
								<div>yes</div>
							</li>
							<li class="col-xl-5 col-md-4 col-sm-6">
								<span>Flights</span>
								<div>{{$jobDetails->airfare ?? ''}}</div>
							</li>


							<li class="col-xl-7 col-md-4 col-sm-6">
								<span>Furnished Housing</span>
								<div>no</div>
							</li>
							<li class="col-xl-5 col-md-4 col-sm-6">
								<span>Airport Assistance</span>
								<div>{{$jobDetails->arrival_assitance ?? ''}}</div>
							</li>
							<li class="col-xl-7 col-md-4 col-sm-6">
								<span>Bonuses</span>
								<div>{{$jobDetails->bonuses ?? ''}}</div>
							</li>
							<li class="col-xl-5 col-md-4 col-sm-6">
								<span>Tax Deductions</span>
								<div>{{$jobDetails->tax_deductions ?? ''}}</div>
							</li>
							<li class="col-xl-12 col-md-4 col-sm-6">
								<span>Payday Details:</span>
								<div>{{$jobDetails->payday_details ?? ''}}</div>
							</li>
						
						</ul>

						<!-- <div class="job-tags d-flex flex-wrap pt-15">
							<a href="#">Design</a>
							<a href="#">Product Design</a>
							<a href="#">Brands</a>
							<a href="#">Application</a>
							<a href="#">UI/UX</a>
						</div> -->
						<!-- <a href="#" class="btn-one w-100 mt-25">Request An Interview </a> -->
					</div>
				</div>
				   	 <!---- Class Information ---->
				<div class="job-company-info ms-xl-5 ms-xxl-0 lg-mt-50 mt-20">
					<div class="text-md text-dark text-center mt-15 mb-20">Class Information</div>
					<div class="border-top mt-20 pt-40">
						<ul class="job-meta-data row style-none">
							<li class="col-xl-7 col-md-4 col-sm-6">
								<span>Student Age Group</span>
								<div>{{$jobDetails->student_age_group ?? ''}}</div>
							</li>
							<li class="col-xl-5 col-md-4 col-sm-6">
								<span>Class Size</span>
								<div>{{$jobDetails->class_size ?? ''}}</div>
							</li>
							<li class="col-xl-7 col-md-4 col-sm-6">
								<span>Hours/Week</span>
								<div>{{$jobDetails->hours_per_week ?? ''}}</div>
							</li>
							<li class="col-xl-5 col-md-4 col-sm-6">
								<span>Teaching Hrs/Day</span>
								<div>{{$jobDetails->teaching_hours_per_day ?? ''}}</div>
							</li>
							<li class="col-xl-7 col-md-4 col-sm-6">
								<span>Non-Teaching Hrs/Day</span>
								<div>{{$jobDetails->non_teaching_hours_per_day ?? ''}}</div>
							</li>
							<li class="col-xl-5 col-md-4 col-sm-6">
								<span>Break Times</span>
								<div>{{$jobDetails->break_times ?? ''}}</div>
							</li>
							<li class="col-xl-12 col-md-4 col-sm-6">
								<span>Curriculum Overview</span>
								<div>{{$jobDetails->curriculum_overview ?? ''}}</div>
							</li>
							<!-- <li class="col-xl-7 col-md-4 col-sm-6">

								<span>Education Grade</span>
								<div>B+</div>
							</li> -->
							<li class="col-xl-12 col-md-4 col-sm-6">
								<span>Materials & Resources Available</span>
								<div>{{$jobDetails->material_resources_available ?? ''}}</div>
							</li>
							<li class="col-xl-12 col-md-4 col-sm-6">
								<span>Teaching Aids</span>
								<div>{{$jobDetails->teaching_aids ?? ''}} </div>
							</li>
						</ul>

						<!-- <div class="job-tags d-flex flex-wrap pt-15">
							<a href="#">Design</a>
							<a href="#">Product Design</a>
							<a href="#">Brands</a>
							<a href="#">Application</a>
							<a href="#">UI/UX</a>
						</div> -->
						<!-- <a href="#" class="btn-one w-100 mt-25">Request An Interview </a> -->
					</div>
				</div>
					<!---- Compensations & Benefits ---->
				<div class="job-company-info ms-xl-5 ms-xxl-0 lg-mt-50 mt-20">
					<div class="text-md text-dark text-center mt-15 mb-20">Compensation & Benefits</div>
					<div class="border-top mt-20 pt-40">
						<ul class="job-meta-data row style-none">
							<li class="col-xl-7 col-md-4 col-sm-6">
								<span>Monthly Salary</span>
								<div>{{$jobDetails->monthly_salary ?? ''}}</div>
							</li>
							<li class="col-xl-5 col-md-4 col-sm-6">
								<span>Relocation Allowance</span>
								<div>{{$jobDetails->relocation_allowance ?? ''}}</div>
							</li>
							<li class="col-xl-7 col-md-4 col-sm-6">
								<span>Health & Dental Insurance</span>
								<div>{{$jobDetails->health_dental_insurance ?? ''}}</div>
							</li>
							<li class="col-xl-5 col-md-4 col-sm-6">
								<span>Airfare</span>
								<div>{{$jobDetails->airfare ?? ''}}</div>
							</li>
							<li class="col-xl-7 col-md-4 col-sm-6">
								<span>Vacation & Sick Leave</span>
								<div>{{$jobDetails->vacation_sick_leave ?? ''}}</div>
							</li>
							<li class="col-xl-5 col-md-4 col-sm-6">
								<span>Pension</span>
								<div>{{$jobDetails->pension ?? ''}}</div>
							</li>
							<li class="col-xl-7 col-md-4 col-sm-6">
								<span>National Holidays</span>
								<div>{{$jobDetails->national_holidays ?? ''}}</div>
							</li>
							<!-- <li class="col-xl-7 col-md-4 col-sm-6">

								<span>Education Grade</span>
								<div>B+</div>
							</li> -->
							<li class="col-xl-5 col-md-4 col-sm-6">
								<span>Overtime Pay</span>
								<div>{{$jobDetails->overtime_pay ?? ''}}</div>
							</li>
							<li class="col-xl-12 col-md-4 col-sm-6">
								<span>Professional Development Opportunities</span>
								<div>{{$jobDetails->professional_development_opportunities ?? ''}} </div>
							</li>
							<li class="col-xl-12 col-md-4 col-sm-6">
								<span>Housing Details</span>
								<div>{{$jobDetails->housing_details ?? ''}}</div>
							</li>
						</ul>

						<!-- <div class="job-tags d-flex flex-wrap pt-15">
							<a href="#">Design</a>
							<a href="#">Product Design</a>
							<a href="#">Brands</a>
							<a href="#">Application</a>
							<a href="#">UI/UX</a>
						</div> -->
						<!-- <a href="#" class="btn-one w-100 mt-25">Request An Interview </a> -->
					</div>
				</div>
				<!-- /.job-company-info -->
			</div>
		</div>
	</div>
</section>
<!--
		=====================================================
			Related Job Slider
		=====================================================
		-->
<!-- <section class="related-job-section pt-90 lg-pt-70 pb-120 lg-pb-70">
	<div class="container">
		<div class="position-relative">
			<div class="title-three text-center text-md-start mb-55 lg-mb-40">
				<h2 class="main-font">Related Jobs</h2>
			</div>

			<div class="related-job-slider">
				<div class="item">
					<div class="job-list-two style-two position-relative">
						<a href="{{route('jobDetails',$jobDetails->id)}}" class="logo"><img src="images/logo/media_22.png" alt="" class="m-auto"></a>
						<a href="{{route('jobDetails',$jobDetails->id)}}" class="save-btn text-center rounded-circle tran3s" title="Save Job"><i class="bi bi-bookmark-dash"></i></a>
						<div><a href="{{route('jobDetails',$jobDetails->id)}}" class="job-duration fw-500">Fulltime</a></div>
						<div><a href="{{route('jobDetails',$jobDetails->id)}}" class="title fw-500 tran3s">Lead designer & expert in maya 3D</a></div>
						<div class="job-salary"><span class="fw-500 text-dark">$300-$450</span> / Week</div>
						<div class="d-flex align-items-center justify-content-between mt-auto">
							<div class="job-location"><a href="{{route('jobDetails',$jobDetails->id)}}">USA, California</a></div>
							<a href="{{route('jobDetails',$jobDetails->id)}}" class="apply-btn text-center tran3s">APPLY</a>
						</div>
					</div> {{--job-list-two--}}
				</div>
				<div class="item">
					<div class="job-list-two style-two position-relative">
						<a href="{{route('jobDetails',$jobDetails->id)}}" class="logo"><img src="images/logo/media_23.png" alt="" class="m-auto"></a>
						<a href="{{route('jobDetails',$jobDetails->id)}}" class="save-btn text-center rounded-circle tran3s" title="Save Job"><i class="bi bi-bookmark-dash"></i></a>
						<div><a href="{{route('jobDetails',$jobDetails->id)}}" class="job-duration fw-500 part-time">Part-time</a></div>
						<div><a href="{{route('jobDetails',$jobDetails->id)}}" class="title fw-500 tran3s">Developer & expert in c++ & java.</a></div>
						<div class="job-salary"><span class="fw-500 text-dark">$10-$15</span> / Hour</div>
						<div class="d-flex align-items-center justify-content-between mt-auto">
							<div class="job-location"><a href="{{route('jobDetails',$jobDetails->id)}}">USA, Alaska</a></div>
							<a href="{{route('jobDetails',$jobDetails->id)}}" class="apply-btn text-center tran3s">APPLY</a>
						</div>
					</div> {{--job-list-two--}}
				</div>
				<div class="item">
					<div class="job-list-two style-two position-relative">
						<a href="{{route('jobDetails',$jobDetails->id)}}" class="logo"><img src="images/logo/media_24.png" alt="" class="m-auto"></a>
						<a href="{{route('jobDetails',$jobDetails->id)}}" class="save-btn text-center rounded-circle tran3s" title="Save Job"><i class="bi bi-bookmark-dash"></i></a>
						<div><a href="{{route('jobDetails',$jobDetails->id)}}" class="job-duration fw-500 part-time">Part-time</a></div>
						<div><a href="{{route('jobDetails',$jobDetails->id)}}" class="title fw-500 tran3s">Marketing specialist in SEO & Affiliate. </a></div>
						<div class="job-salary"><span class="fw-500 text-dark">$40k</span> / Yearly</div>
						<div class="d-flex align-items-center justify-content-between mt-auto">
							<div class="job-location"><a href="{{route('jobDetails',$jobDetails->id)}}">AUS, Sydney</a></div>
							<a href="{{route('jobDetails',$jobDetails->id)}}" class="apply-btn text-center tran3s">APPLY</a>
						</div>
					</div> {{--job-list-two--}}
				</div>
				<div class="item">
					<div class="job-list-two style-two position-relative">
						<a href="{{route('jobDetails',$jobDetails->id)}}" class="logo"><img src="images/logo/media_25.png" alt="" class="m-auto"></a>
						<a href="{{route('jobDetails',$jobDetails->id)}}" class="save-btn text-center rounded-circle tran3s" title="Save Job"><i class="bi bi-bookmark-dash"></i></a>
						<div><a href="{{route('jobDetails',$jobDetails->id)}}" class="job-duration fw-500">Fulltime</a></div>
						<div><a href="{{route('jobDetails',$jobDetails->id)}}" class="title fw-500 tran3s">Lead & Product & Web Designer.</a></div>
						<div class="job-salary"><span class="fw-500 text-dark">$2k-3k</span> / Month</div>
						<div class="d-flex align-items-center justify-content-between mt-auto">
							<div class="job-location"><a href="{{route('jobDetails',$jobDetails->id)}}">UAE, Dubai</a></div>
							<a href="{{route('jobDetails',$jobDetails->id)}}" class="apply-btn text-center tran3s">APPLY</a>
						</div>
					</div> {{--job-list-two--}}
				</div>
			</div>

			<ul class="slider-arrows slick-arrow-one color-two d-flex justify-content-center style-none sm-mt-20">
				<li class="prev_e slick-arrow"><i class="bi bi-arrow-left"></i></li>
				<li class="next_e slick-arrow"><i class="bi bi-arrow-right"></i></li>
			</ul>
		</div>
	</div>
</section> -->
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
						<li class="ms-2"><a href="{{ route('postAJob') }}" class="btn-four">Post a job </a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- /.job-portal-intro -->
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
					<input type = "hidden" name = "job_id" value = "{{$jobDetails->id}}">
					<div id="errors-list"></div>
                    <div class="mb-3">
                        <label class="col-form-label" for="Major Name">{{__('Cover Letter')}}</label>
                        <textarea class="form-control"  name="cover_letter" id="cover_letter"
                            placeholder="{{__('Job Application Cover Letter')}}" rows="5" autocomplete="off"></textarea>
                    </div>
             
            </div>
            <div class="modal-footer">
                <button class="btn-one" type="button" data-bs-dismiss="modal">
					Close
                </button>
                <button class="btn-one" type="submit" name="submit">
                    Apply
            </div>
            </form>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script>
	$(".PleaseLoginButton").on('click',function(){
        toastr.warning("Please Login First to Apply for this Job");
	});
	$(".NonCandidateButton").on('click',function(){
        toastr.warning("Only Candidate can apply for the Job");
	});
	$(document).on("submit", "#Job-Application-Form", function() {
        // e.preventDefault();
        //   var e = this;
  
  
          $.ajax({
              url: '{{route("jobApplicationRequest")}}',
              data: {
                _token:"{{csrf_token()}}",
                job_id: $("#Job-Application-Form").find('input[name=job_id]').val(),
                cover_letter: $("#Job-Application-Form").find('textarea[name=cover_letter]').val(),
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
               
              }
          });
  
          return false;
      });
  
</script>
@endsection