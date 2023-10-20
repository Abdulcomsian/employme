@extends('employer.layout.main')

@section('title')
Profile
@endsection
<style>
	.step {
		display: none;
	}

	.active {
		display: block;
		color: rgba(0, 0, 0, 0.7) !important;
	}

	.employer-sign-up .stepper {
		display: flex;
		flex-direction: row;
		justify-content: space-between;
		align-items: center;
		width: 100%;
		gap: 1%;
	}

	.employer-sign-up #multi-step-form {
		margin-top: 25px;
	}

	.employer-sign-up .stepper>.step {
		display: flex;
		flex-direction: column;
		align-items: center;
		text-align: center;
		gap: 1rem;
	}

	.employer-sign-up .stepper>.step>.icon>div {
		border: 1px solid rgba(0, 0, 0, 0.5);
		border-radius: 50%;
		padding: 15%;
		width: 30px;
		height: 30px;
	}

	.employer-sign-up .stepper>.step.selected>.icon>div {
		background: #31795A;
		color: #fff;
	}

	.employer-sign-up .stepper>.step>.icon,
	.employer-sign-up .stepper>.step>.text {
		font-size: 13px;
		font-weight: 600;
	}
</style>
@push('page-css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/select2.css')}}" media="all">	
@endpush
@section('content')
<div class="dashboard-body">
	<div class="position-relative">
		<!-- ************************ Header **************************** -->
		<header class="dashboard-header">
			<div class="d-flex align-items-center justify-content-end">
				<button class="dash-mobile-nav-toggler d-block d-md-none me-auto">
					<span></span>
				</button>
				<form action="#" class="search-form">
					<input type="text" placeholder="Search here..">
					<button><img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/dashboard-icon/icon_10.svg')}}" alt="" class="lazy-img m-auto"></button>
				</form>
				<div class="profile-notification ms-2 ms-md-5 me-4">
					<button class="noti-btn dropdown-toggle" type="button" id="notification-dropdown" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
						<img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/icon/icon_11.svg')}}" alt="" class="lazy-img">
						<div class="badge-pill"></div>
					</button>
					<ul class="dropdown-menu" aria-labelledby="notification-dropdown">
						<li>
							<h4>Notification</h4>
							<ul class="style-none notify-list">
								<li class="d-flex align-items-center unread">
									<img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/icon/icon_36.svg')}}" alt="" class="lazy-img icon">
									<div class="flex-fill ps-2">
										<h6>You have 3 new mails</h6>
										<span class="time">3 hours ago</span>
									</div>
								</li>
								<li class="d-flex align-items-center">
									<img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/icon/icon_37.svg')}}" alt="" class="lazy-img icon">
									<div class="flex-fill ps-2">
										<h6>Your job post has been approved</h6>
										<span class="time">1 day ago</span>
									</div>
								</li>
								<li class="d-flex align-items-center unread">
									<img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/icon/icon_38.svg')}}" alt="" class="lazy-img icon">
									<div class="flex-fill ps-2">
										<h6>Your meeting is cancelled</h6>
										<span class="time">3 days ago</span>
									</div>
								</li>
							</ul>
						</li>
					</ul>
				</div>
				<div><a href="{{route('postAJob')}}" class="job-post-btn tran3s">Post a Job</a></div>
			</div>
		</header>
		<!-- End Header -->
		@if(session('email_verification'))
			<div class="alert alert-danger">
				{{ __('A verification link has been sent to your email account.') }}
				{{ __('If you did not receive the email') }},
				<form class="d-inline" method="POST" action="{{ route('verification.send') }}">
					@csrf
					<button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to resend link') }}</button>.
				</form>
			</div>
		  @elseif(session('profile_completion'))
			<div class="alert alert-danger">
					{{ __('Dear Employer, Your profile is not complete, kindly complete your profile.') }}
				</div>
		  @endif
		<h2 class="main-title">Profile</h2>

		<div class="bg-white card-box border-20 mb-40">
			<div class="employer-sign-up">
				<div class="stepper">
					<div id="tag-step-1" class="step selected">
						<div class="icon">
							<div>1</div>
						</div>
						<div class="text">Basic Employer Information</div>
					</div>
					<div id="tag-step-2" class="step">
						<div class="icon">
							<div>2</div>
						</div>
						<div class="text">Operational Details</div>
					</div>
					<div id="tag-step-3" class="step">
						<div class="icon">
							<div>3</div>
						</div>
						<div class="text">Subscription Plan Selection</div>
					</div>
					<div id="tag-step-4" class="step">
						<div class="icon">
							<div>4</div>
						</div>
						<div class="text">Eligibility Confirmation and Documentation</div>
					</div>
					<div id="tag-step-5" class="step">
						<div class="icon">
							<div>5</div>
						</div>
						<div class="text">Historical Recruitment Data</div>
					</div>
					<div id="tag-step-6" class="step">
						<div class="icon">
							<div>6</div>
						</div>
						<div class="text">Feedback and Testimonials</div>
					</div>
					<div id="tag-step-7" class="step">
						<div class="icon">
							<div>7</div>
						</div>
						<div class="text">Support and Development Initiatives</div>
					</div>
					<div id="tag-step-8" class="step">
						<div class="icon">
							<div>8</div>
						</div>
						<div class="text">Cultural Integration Programs</div>
					</div>
					<div id="tag-step-9" class="step">
						<div class="icon">
							<div>9</div>
						</div>
						<div class="text">Declaration and Consent</div>
					</div>
				</div>
				<form id="multi-step-form">
					<!-- Step 1 -->
					<div class="step active" id="step-1">
						<div class="row">
							<div class="col-md-6">
								<div class="dash-input-wrapper mb-30">
									<label for="">Legal name of the school or institution</label>
									<input type="text" name="legalNameOfSchool" placeholder="Legal name of the school or institution" value="{{$employerDetails->institution ?? ''}}">
								</div>
							</div>
							<div class="col-md-6">
								<div class="dash-input-wrapper mb-30">
									<label for="">Type of school</label>
									<select name="typeOfSchool" id="typeOfSchool" class="nice-select">
										<option value="Hagwon" {{$employerDetails->institution_type == 'Hagwon' ? 'selected' : ''}}>Hagwon</option>
										<option value="Private Academy" {{$employerDetails->institution_type == 'Private Academy' ? 'selected' : ''}}>Private Academy</option>
										<option value="Public School" {{$employerDetails->institution_type == 'Public School' ? 'selected' : ''}}>Public School</option>
										<option value="University" {{$employerDetails->institution_type == 'University' ? 'selected' : ''}}>University</option>
									</select>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="dash-input-wrapper mb-30">
									<label for="">Address Line 1</label>
									<input type="text" name="addressLine1" placeholder="65 Hansen Way" value="{{$employerDetails->address_line_1 ?? ''}}">
								</div>
							</div>
							<div class="col-md-6">
								<div class="dash-input-wrapper mb-30">
									<label for="">Address Line 2</label>
									<input type="text" name="addressLine2" placeholder="Apartment 4" value="{{$employerDetails->address_line_2 ?? ''}}">
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="dash-input-wrapper mb-30">
									<label for="country">Country</label>
									<select name="country" id="country" class="nice-select ">
										<option value="">Select</option>
											@isset($countries)
											@foreach($countries as $country)
											<option value="{{$country->id}}" {{$employerDetails->country_id == $country->id ? 'selected' : ''}}>{{$country->name}}</option>
											@endforeach
											@endisset
									</select>								
								</div>
							</div>
							
							<div class="col-md-6">
								<div class="dash-input-wrapper mb-30">
									<label for="">State/Region/Province</label>
									<input type="text" name="state" id="state" placeholder="65 Hansen Way" value="{{$employerDetails->state ?? ''}}">
								
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="dash-input-wrapper mb-30">
									<label for="">City/Town</label>
									<input type="text" name="city" id="city" placeholder="65 Hansen Way" value="{{$employerDetails->city ?? ''}}">
								
								</div>
							</div>
							<div class="col-md-6">
								<div class="dash-input-wrapper mb-30">
									<label for="">Zip/Post code</label>
									<input type="text" name="zipPostCode" placeholder="94304" value="{{$employerDetails->zip_code ?? ''}}">
								</div>
							</div>
							
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="dash-input-wrapper mb-30">
									<label for="">Phone number</label>
									<input type="number" name="phoneNumber" placeholder="(201) 555-0123" value="{{$employerDetails->phone_number ?? ''}}">
								</div>
							</div>
							<div class="col-md-6">
								<div class="dash-input-wrapper mb-30">
									<label for="">Email</label>
									<input type="email" name="email" placeholder="name@example.com" value="{{$employerDetails->email ?? ''}}">
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="dash-input-wrapper mb-30">
									<label for="">Number of Students</label>
									<input type="number" name="numberOfStudents" placeholder="4935" value="{{$employerDetails->number_of_students ?? ''}}">
								</div>
							</div>
							<div class="col-md-6">
								<div class="dash-input-wrapper mb-30">
									<label for="">Number of Teachers</label>
									<input type="number" name="numberOfTeachers" placeholder="215" value="{{$employerDetails->number_of_teachers ?? ''}}">
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="dash-input-wrapper mb-30">
									<label for="">
										Number of Administrative Staff</label>
									<input type="number" name="numberOfAdministrativeStaff" placeholder="215" value="{{$employerDetails->number_of_administrative_staff ?? ''}}">
								</div>
							</div>
							<div class="col-md-6">
								<div class="dash-input-wrapper mb-30">
									<label for="">Year of Established</label>
									<input type="date" name="yearOfEstablished" placeholder="" value="{{$employerDetails->established_date ?? ''}}">
								</div>
							</div>
						</div>

						<div class="d-flex flex-row justify-content-end gap-3">
							<button type="button" class="dash-btn-one" id="basic-information" onclick="nextStep(1)">Next</button>
						</div>
					</div>

					<!-- Step 2 -->
					<div class="step" id="step-2">
						<div class="row">
							<div class="col-md-6">
								<div class="dash-input-wrapper mb-30">
									<label for="">School's mission and vision statement</label>
									<input type="text" name="schoolMission" id="schoolMission" placeholder="Type your answer here..." value="{{$employerDetails->school_vision_and_mission ?? ''}}">
								</div>
							</div>
							<div class="col-md-6">
								<div class="dash-input-wrapper mb-30">
									<label for="">Languages of instruction used in the school</label>
									<select name="languagesOfInstructionUsedInTheSchool" id="languagesOfInstructionUsedInTheSchool" class="nice-select">
										<option value="korean" {{$employerDetails->instruction_languages_used == 'korean' ? 'selected' : ''}}>korean</option>
										<option value="English" {{$employerDetails->instruction_languages_used == 'English' ? 'selected' : ''}}>English</option>
										<option value="Other" {{$employerDetails->instruction_languages_used == 'Other' ? 'selected' : ''}}>Other</option>
									</select>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="dash-input-wrapper mb-30">
									<label for="">Any international or national accreditations or
										certifications.</label>
									<div class="user-avatar-setting d-flex align-items-center">
										<img src="../images/lazy.svg" data-src="images/avatar_04.jpg" alt="" class="lazy-img user-img">
										<div class="upload-btn position-relative tran3s ms-4 me-3">
											Upload File
											<input type="file" id="anyInternationalOrNationalAccreditations" name="anyInternationalOrNationalAccreditations" placeholder="" >
										</div>
										<button class="delete-btn tran3s">Delete</button>
									</div>
									@if(isset($employerDetails->international_accredition_or_certification) && !empty($employerDetails->international_accredition_or_certification))
                                    <div style = "padding-left:20px;">
                                        <a class="btn btn-primary" href = "{{asset($employerDetails->international_accredition_or_certification)}}" target = "_blank">File</a>
                                    </div>
                                    @endif
								</div>
							</div>
							<div class="col-md-6">
								<div class="dash-input-wrapper mb-30">
									<label for="">Number of foreign staff currently employed and their
										roles</label>
									<input type="text" name="numberofForeignStaffCurrentlyEmployed" placeholder="Type your answer here..." value="{{$employerDetails->employed_foreign_staff_and_roles ?? ''}}">
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="dash-input-wrapper mb-30">
									<label for="">Technical resources available for teachingThis question is
										required.</label>
									<select name="technicalResources" id="technicalResources" class="nice-select">
										<option value="smart classrooms" {{$employerDetails->terms_and_conditions_acceptance == 'smart classrooms' ? 'selected' : ''}}>Smart Classrooms</option>
										<option value="Teaching Software" {{$employerDetails->terms_and_conditions_acceptance == 'Teaching Software' ? 'selected' : ''}}>Teaching Software</option>
										<option value="Other" {{$employerDetails->terms_and_conditions_acceptance == 'Other' ? 'selected' : ''}}>Other</option>
									</select>
								</div>
							</div>
						</div>

						<div class="d-flex flex-row justify-content-end gap-3">
							<button type="button" class="dash-btn-one" onclick="previousStep(2)">Previous</button>
							<button type="button" class="dash-btn-one" id ="operational-details" onclick="nextStep(2)">Next</button>
						</div>
					</div>

					<!-- Step 3 -->
					<div class="step" id="step-3">
						<div class="row">
							<div class="col-md-6">
								<div class="dash-input-wrapper mb-30">
									<label for="">Different subscription options with features and price
										points.</label>
									<select name="differentSubscriptionOptions" id="differentSubscriptionOptions" class="nice-select">
										<option value="1" {{$employerDetails->subscription_plan_id == '1' ? 'selected' : ''}}>Basic Candidate Access - $59/mo</option>
										<option value="2" {{$employerDetails->subscription_plan_id == '2' ? 'selected' : ''}}>Jobs Marketplace Access - $69/mo</option>
										<option value="3" {{$employerDetails->subscription_plan_id == '3' ? 'selected' : ''}}>Flexi Plan - $39/mo</option>
										<option value="3" {{$employerDetails->subscription_plan_id == '4' ? 'selected' : ''}}>Advanced Candidate Access - $79/mo</option>
										<option value="4" {{$employerDetails->subscription_plan_id == '5' ? 'selected' : ''}}>Combined Marketplace Access - $129/mo</option>
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="dash-input-wrapper mb-30">
									<label for="">Acceptance of terms and conditions of the subscription.</label>
									<select name="acceptanceOfTermsAndConditions" id="acceptanceOfTermsAndConditions" class="nice-select" >
										<option value="I Accept" {{$employerDetails->terms_and_conditions_acceptance == 'I Accept' ? 'selected' : ''}}>I Accept</option>
										<option value="I do not Accept" {{$employerDetails->terms_and_conditions_acceptance == 'I do not Accept' ? 'selected' : ''}}>I do not Accept</option>
									</select>
								</div>
							</div>
						</div>

						<div class="d-flex flex-row justify-content-end gap-3">
							<button type="button" class="dash-btn-one" onclick="previousStep(3)">Previous</button>
							<button type="button" class="dash-btn-one" id="subscription-details" onclick="nextStep(3)">Next</button>
						</div>
					</div>

					<!-- Step 4 -->
					<div class="step" id="step-4">
						<div class="row">
							<div class="col-md-6">
								<div class="dash-input-wrapper mb-30">
									<label for="">Proof of registration and a business license</label>
									<input type="text" name="proofOfRegistration" placeholder="Type your answer here..." value="{{$employerDetails->registration_business_license_proof ?? ''}}">
								</div>
							</div>
							<div class="col-md-6">
								<div class="dash-input-wrapper mb-30">
									<label for="">Acknowledgment that they adhere to South Korea's labor
										laws.</label>
									<select name="southKoreaLawAcknowledgement" id="southKoreaLawAcknowledgement" class="nice-select">
										<option value="I Accept" {{$employerDetails->south_korea_laws_acknowledgement == 'I Accept' ? 'selected' : ''}}>I Accept</option>
										<option value="I do not Accept" {{$employerDetails->south_korea_laws_acknowledgement == 'I do not Accept' ? 'selected' : ''}}>I do not Accept</option>
									</select>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="dash-input-wrapper mb-30">
									<label for="">Confirmation of no history of major legal disputes related to
										employment</label>
									<label for="">provide relevant documents</label>
									<div class="user-avatar-setting d-flex align-items-center">
										<div class="upload-btn position-relative tran3s ms-4 me-3">
											Upload
											<input type="file" id="legalDisputesConfirmationDocument" name="legalDisputesConfirmationDocument" placeholder="" value="">
										</div>
										<button class="delete-btn tran3s">Delete</button>
									</div>
									@if(isset($employerDetails->legal_disputes_confirmation_document) && !empty($employerDetails->legal_disputes_confirmation_document))
                                    <div style = "padding-left:20px;">
                                        <a class="btn btn-primary" href = "{{asset($employerDetails->legal_disputes_confirmation_document)}}" target = "_blank">File</a>
                                    </div>
                                    @endif
								</div>
							</div>
							<div class="col-md-6">
								<div class="dash-input-wrapper mb-30">
									<label for="">Assurance of the ability and willingness to sponsor an E-2
										teaching visa.</label>
									<select name="abilityWillingnessAssurance" id="abilityWillingnessAssurance" class="nice-select">
										<option value="I Accept" {{$employerDetails->ability_willingness_assurance == 'I Accept' ? 'selected' : ''}}>I Accept</option>
										<option value="I do not Accept" {{$employerDetails->ability_willingness_assurance == 'I do not Accept' ? 'selected' : ''}}>I do not Accept</option>
									</select>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="dash-input-wrapper mb-30">
									<label for="">Financial health to ensure the ability to pay salaries and
										benefits.</label>
									<select name="financialHealthToEnsure" id="financialHealthToEnsure" class="nice-select">
										<option value="I Accept" {{$employerDetails->financial_health == 'I Accept' ? 'selected' : ''}}>I Accept</option>
										<option value="I do not Accept" {{$employerDetails->financial_health == 'I do not Accept' ? 'selected' : ''}}>I do not Accept</option>
									</select>
								</div>
							</div>
						</div>

						<div class="d-flex flex-row justify-content-end gap-3">
							<button type="button" class="dash-btn-one" onclick="previousStep(4)">Previous</button>
							<button type="button" class="dash-btn-one" id="eligibility-confirmation-details" onclick="nextStep(4)">Next</button>
						</div>
					</div>

					<!-- Step 5 -->
					<div class="step" id="step-5">
						<div class="row">
							<div class="col-md-6">
								<div class="dash-input-wrapper mb-30">
									<label for="">Number of foreign teachers recruited in the past 3
										years</label>
									<input type="number" name="numberOfForeignTeachersRecruited" placeholder="Type your answer here..." value="{{$employerDetails->foreign_teachers_in_3_years ?? ''}}">
								</div>
							</div>
							<div class="col-md-6">
								<div class="dash-input-wrapper mb-30">
									<label for="">Retention rate of foreign teachers.</label>
									<input type="text" name="retentionRateOfForeignTeachers" placeholder="Type your answer here..." value="{{$employerDetails->foreign_teachers_retention_rate ?? ''}}">
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="dash-input-wrapper mb-30">
									<label for="">Reasons for teacher contract terminations, if any</label>
									<input type="text" name="reasonsForTeacherContractTerminations" placeholder="Type your answer here..." value="{{$employerDetails->reason_contract_termination ?? ''}}">
								</div>
							</div>
						</div>

						<div class="d-flex flex-row justify-content-end gap-3">
							<button type="button" class="dash-btn-one" onclick="previousStep(5)">Previous</button>
							<button type="button" class="dash-btn-one" id="historical-recruitment-details" onclick="nextStep(5)">Next</button>
						</div>
					</div>

					<!-- Step 6 -->
					<div class="step" id="step-6">
						<div class="row">
							<div class="col-md-6">
								<div class="dash-input-wrapper mb-30">
									<label for="">Option to provide references from current or past foreign
										teachers</label>
									<input type="text" name="optionToProvideReferences" placeholder="Type your answer here..." value="{{$employerDetails->current_past_teacher_references ?? ''}}">
								</div>
							</div>
							<div class="col-md-6">
								<div class="dash-input-wrapper mb-30">
									<label for="">Any awards or recognitions received related to teaching or
										management.</label>
									<input type="text" name="anyAwardsOrRecognitions" placeholder="Type your answer here..." value="{{$employerDetails->teaching_management_recognition_award ?? ''}}">
								</div>
							</div>
						</div>

						<div class="d-flex flex-row justify-content-end gap-3">
							<button type="button" class="dash-btn-one" onclick="previousStep(6)">Previous</button>
							<button type="button" class="dash-btn-one" id="feedback-testimonial-details" onclick="nextStep(6)">Next</button>
						</div>
					</div>

					<!-- Step 7 -->
					<div class="step" id="step-7">
						<div class="row">
							<div class="col-md-6">
								<div class="dash-input-wrapper mb-30">
									<label for="">Past and ongoing teacher training programs</label>
									<select name="pastAndOngoingTeacherTrainingPrograms" id="pastAndOngoingTeacherTrainingPrograms" class="nice-select">
										<option value="TEFL" {{$employerDetails->past_ongoing_training_program == 'TEFL' ? 'selected' : ''}}>TEFL</option>
										<option value="TESOL" {{$employerDetails->past_ongoing_training_program == 'TESOL' ? 'selected' : ''}}>TESOL</option>
										<option value="Mentorshiop programs" {{$employerDetails->past_ongoing_training_program == 'Mentorshiop programs' ? 'selected' : ''}}>Mentorshiop programs</option>
										<option value="In-Service Training" {{$employerDetails->past_ongoing_training_program == 'In-Service Training' ? 'selected' : ''}}>In-Service Training</option>
										<option value="Other" {{$employerDetails->past_ongoing_training_program == 'Other' ? 'selected' : ''}}>Other</option>
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="dash-input-wrapper mb-30">
									<label for="">List of external professional development opportunities
										supported by the institution.</label>
									<select name="listOfExternalProfessionalDevelopmentOpportunities" id="listOfExternalProfessionalDevelopmentOpportunities" class="nice-select">
										<option value="Conference Attendance" {{$employerDetails->institution_development_opportunities == 'Conference Attendance' ? 'selected' : ''}}>Conference Attendance</option>
										<option value="Workshops and Seminars" {{$employerDetails->institution_development_opportunities == 'Workshops and Seminars' ? 'selected' : ''}}>Workshops and Seminars</option>
										<option value="Graduate Studies" {{$employerDetails->institution_development_opportunities == 'Workshops and Seminars' ? 'selected' : ''}}>Graduate Studies</option>
										<option value="Collaborative Projects" {{$employerDetails->institution_development_opportunities == 'Collaborative Projects' ? 'selected' : ''}}>Collaborative Projects</option>
										<option value="Action Research Projects" {{$employerDetails->institution_development_opportunities == 'Action Research Projects' ? 'selected' : ''}}>Action Research Projects
										</option>
										<option value="Other">Other</option>
									</select>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="dash-input-wrapper mb-30">
									<label for="">Orientation programs for new hires</label>
									<select name="orientationProgramsForNewHires" id="orientationProgramsForNewHires" class="nice-select">
										<option value="Yes" {{$employerDetails->new_hiree_orientation == 'Yes' ? 'selected' : ''}}>Yes</option>
										<option value="No" {{$employerDetails->new_hiree_orientation == 'No' ? 'selected' : ''}}>No</option>
									</select>
								</div>
							</div>
						</div>

						<div class="d-flex flex-row justify-content-end gap-3">
							<button type="button" class="dash-btn-one" onclick="previousStep(7)">Previous</button>
							<button type="button" id="support-development-details" class="dash-btn-one" onclick="nextStep(7)">Next</button>
						</div>
					</div>

					<!-- Step 8 -->
					<div class="step" id="step-8">
						<div class="row">
							<div class="col-md-6">
								<div class="dash-input-wrapper mb-30">
									<label for="">Existing programs or efforts to help foreign teachers
										assimilate into South Korean culture.</label>
									<select name="existingProgramsOrEffortsToHelp" id="existingProgramsOrEffortsToHelp" class="nice-select">
										<option value="Yes" {{$employerDetails->sk_cultural_programs == 'Yes' ? 'selected' : ''}}>Yes</option>
										<option value="No" {{$employerDetails->sk_cultural_programs == 'No' ? 'selected' : ''}}>No</option>
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="dash-input-wrapper mb-30">
									<label for="">Language programs or resources available to foreign
										staff.</label>
									<select name="languageProgramsOrResourcesAvailableToForeignStaff" id="languageProgramsOrResourcesAvailableToForeignStaff" class="nice-select">
										<option value="Yes" {{$employerDetails->languages_resources_foreign_staff == 'Yes' ? 'selected' : ''}}>Yes</option>
										<option value="No" {{$employerDetails->languages_resources_foreign_staff == 'No' ? 'selected' : ''}}>No</option>
									</select>
								</div>
							</div>
						</div>

						<div class="d-flex flex-row justify-content-end gap-3">
							<button type="button" class="dash-btn-one" onclick="previousStep(8)">Previous</button>
							<button type="button" class="dash-btn-one" id="cultural-development-details" onclick="nextStep(8)">Next</button>
						</div>
					</div>

					<!-- Step 9 -->
					<div class="step" id="step-9">
						<div class="row">
							<div class="col-md-6">
								<div class="dash-input-wrapper mb-30">
									<label for="">Agreement to periodic checks and updates to ensure information
										accuracy.</label>
									<select name="agreementToPeriodicChecksAndUpdates" id="agreementToPeriodicChecksAndUpdates" class="nice-select">
										<option value="I Accept" {{$employerDetails->agreement_period_checks_updates == 'I Accept' ? 'selected' : ''}}>I Accept</option>
										<option value="I do not Accept" {{$employerDetails->agreement_period_checks_updates == 'I do not Accept' ? 'selected' : ''}}>I do not Accept</option>
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="dash-input-wrapper mb-30">
									<label for="">Consent for data storage and processing as per data protection
										regulations.</label>
									<select name="consentForDataStorageAndProcessing" id="consentForDataStorageAndProcessing" class="nice-select">
										<option value="I Accept" {{$employerDetails->agreement_period_checks_updates == 'I Accept' ? 'selected' : ''}}>I Accept</option>
										<option value="I do not Accept" {{$employerDetails->agreement_period_checks_updates == 'I do not Accept' ? 'selected' : ''}}>I do not Accept</option>
									</select>
								</div>
							</div>
						</div>

						<div class="d-flex flex-row justify-content-end gap-3">
							<button type="button" class="dash-btn-one" onclick="previousStep(9)">Previous</button>
							<button type="submit" id="declaration-consent-details" class="dash-btn-one">Submit</button>
						</div>
					</div>
				</form>
			</div>
		</div>

		<div class="bg-white card-box border-20">
			<div class="user-avatar-setting d-flex align-items-center mb-30">
				<img src="../images/lazy.svg" data-src="{{asset('assets/images/avatar_04.jpg')}}" alt="" class="lazy-img user-img">
				<div class="upload-btn position-relative tran3s ms-4 me-3">
					Upload new photo
					<input type="file" id="uploadImg" name="uploadImg" placeholder="">
				</div>
				<button class="delete-btn tran3s">Delete</button>
			</div>
			<!-- /.user-avatar-setting -->
			<div class="row">
				<div class="col-md-6">
					<div class="dash-input-wrapper mb-30">
						<label for="">Employer Name*</label>
						<input type="text" placeholder="Zubayer Hasan">
					</div>
				</div>
				<div class="col-md-6">
					<div class="dash-input-wrapper mb-30">
						<label for="">Employer Bussiness Registration Number *</label>
						<input type="text" placeholder="AD1234">
					</div>
				</div>
			</div>

			<!-- /.dash-input-wrapper -->
			<div class="row">
				<div class="col-md-6">
					<div class="dash-input-wrapper mb-30">
						<label for="">Email*</label>
						<input type="email" placeholder="companyinc@gmail.com">
						<!-- <label for="socialmedia">Social Media</label>
								<input type="email" placeholder="www.facebook.com/profile"> -->
					</div>
					<!-- /.dash-input-wrapper -->
				</div>
				<div class="col-md-6">
					<div class="dash-input-wrapper mb-30">
						<label for="">Website*</label>
						<input type="text" placeholder="http://somename.come">
					</div>
					<!-- /.dash-input-wrapper -->
				</div>
				<!-- <div class="col-md-6">
                            <div class="dash-input-wrapper mb-30">
                                <label for="">Founded Date*</label>
                                <input type="date">
                            </div>
                    
                        </div>
                        <div class="col-md-6">
                            <div class="dash-input-wrapper mb-30">
                                <label for="">Company Size*</label>
                                <input type="text" placeholder="700">
                            </div>
                    
                        </div> -->
				<div class="col-md-6">
					<div class="dash-input-wrapper mb-30">
						<label for="">Phone Number*</label>
						<input type="tel" placeholder="+880 01723801729">
					</div>
					<!-- /.dash-input-wrapper -->
				</div>
				<!-- <div class="col-md-6">
                            <div class="dash-input-wrapper mb-30">
                                <label for="">Category*</label>
                                <input type="text" placeholder="Account, Finance, Marketing">
                            </div>
                    
                        </div> -->
			</div>
			<!-- <div class="dash-input-wrapper">
                        <label for="">About Company*</label>
                        <textarea class="size-lg" placeholder="Write something interesting about you...."></textarea>
						<div class="alert-text">Brief description for your company. URLs are hyperlinked.</div>
                    </div> -->
			<!-- /.dash-input-wrapper -->
		</div>
		<!-- /.card-box -->

		<div class="bg-white card-box border-20 mt-40">
			<h4 class="dash-title-three">Social Media</h4>

			<div class="dash-input-wrapper mb-20">
				<label for="">Network 1</label>
				<input type="text" placeholder="https://www.facebook.com/zubayer0145">
			</div>
			<!-- /.dash-input-wrapper -->
			<div class="dash-input-wrapper mb-20">
				<label for="">Network 2</label>
				<input type="text" placeholder="https://twitter.com/FIFAcom">
			</div>
			<!-- /.dash-input-wrapper -->
			<a href="#" class="dash-btn-one"><i class="bi bi-plus"></i> Add more link</a>
		</div>
		<!-- /.card-box -->

		<div class="bg-white card-box border-20 mt-40">
			<h4 class="dash-title-three">Address & Location</h4>
			<div class="row">
				<div class="col-12">
					<div class="dash-input-wrapper mb-25">
						<label for="">Address*</label>
						<input type="text" placeholder="Cowrasta, Chandana, Gazipur Sadar">
					</div>
					<!-- /.dash-input-wrapper -->
				</div>
				<div class="col-lg-3">
					<div class="dash-input-wrapper mb-25">
						<label for="">Country*</label>
						<select class="nice-select">
							<option>Afghanistan</option>
							<option>Albania</option>
							<option>Algeria</option>
							<option>Andorra</option>
							<option>Angola</option>
							<option>Antigua and Barbuda</option>
							<option>Argentina</option>
							<option>Armenia</option>
							<option>Australia</option>
							<option>Austria</option>
							<option>Azerbaijan</option>
							<option>Bahamas</option>
							<option>Bahrain</option>
							<option>Bangladesh</option>
							<option>Barbados</option>
							<option>Belarus</option>
							<option>Belgium</option>
							<option>Belize</option>
							<option>Benin</option>
							<option>Bhutan</option>
						</select>
					</div>
					<!-- /.dash-input-wrapper -->
				</div>
				<div class="col-lg-3">
					<div class="dash-input-wrapper mb-25">
						<label for="">City*</label>
						<select class="nice-select">
							<option>Dhaka</option>
							<option>Tokyo</option>
							<option>Delhi</option>
							<option>Shanghai</option>
							<option>Mumbai</option>
							<option>Bangalore</option>
						</select>
					</div>
					<!-- /.dash-input-wrapper -->
				</div>
				<div class="col-lg-3">
					<div class="dash-input-wrapper mb-25">
						<label for="">Zip Code*</label>
						<input type="number" placeholder="1708">
					</div>
					<!-- /.dash-input-wrapper -->
				</div>
				<div class="col-lg-3">
					<div class="dash-input-wrapper mb-25">
						<label for="">State*</label>
						<select class="nice-select">
							<option>Dhaka</option>
							<option>Tokyo</option>
							<option>Delhi</option>
							<option>Shanghai</option>
							<option>Mumbai</option>
							<option>Bangalore</option>
						</select>
					</div>
					<!-- /.dash-input-wrapper -->
				</div>
				<div class="col-12">
					<div class="dash-input-wrapper mb-25">
						<label for="">Map Location*</label>
						<div class="position-relative">
							<input type="text" placeholder="XC23+6XC, Moiran, N105">
							<button class="location-pin tran3s"><img src="../images/lazy.svg" data-src="images/icon/icon_16.svg" alt="" class="lazy-img m-auto"></button>
						</div>
						<div class="map-frame mt-30">
							<div class="gmap_canvas h-100 w-100">
								<iframe class="gmap_iframe h-100 w-100" src="https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&amp;q=dhaka collage&amp;t=&amp;z=12&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
							</div>
						</div>
					</div>
					<!-- /.dash-input-wrapper -->
				</div>
			</div>
		</div>
		<!-- /.card-box -->

		<div class="bg-white card-box border-20 mt-40">
			<h4 class="dash-title-three">Members</h4>

			<div class="dash-input-wrapper">
				<label for="">Add & Remove Member</label>
			</div>

			<div class="accordion dash-accordion-one" id="accordionOne">
				<div class="accordion-item">
					<div class="accordion-header" id="headingOne">
						<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
							Add Member 1
						</button>
					</div>
					<div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionOne">
						<div class="accordion-body">
							<div class="row">
								<div class="col-lg-2">
									<div class="dash-input-wrapper mb-30 md-mb-10">
										<label for="">Name*</label>
									</div>
									<!-- /.dash-input-wrapper -->
								</div>
								<div class="col-lg-10">
									<div class="dash-input-wrapper mb-30">
										<input type="text" placeholder="Product Designer (Google)">
									</div>
									<!-- /.dash-input-wrapper -->
								</div>
							</div>
							<div class="row">
								<div class="col-lg-2">
									<div class="dash-input-wrapper mb-30 md-mb-10">
										<label for="">Designation*</label>
									</div>
									<!-- /.dash-input-wrapper -->
								</div>
								<div class="col-lg-10">
									<div class="dash-input-wrapper mb-30">
										<input type="text" placeholder="Account Manager">
									</div>
									<!-- /.dash-input-wrapper -->
								</div>
							</div>
							<div class="row">
								<div class="col-lg-2">
									<div class="dash-input-wrapper mb-30 md-mb-10">
										<label for="">Email*</label>
									</div>
									<!-- /.dash-input-wrapper -->
								</div>
								<div class="col-lg-10">
									<div class="dash-input-wrapper mb-30">
										<input type="email" placeholder="newmmwber@gmail.com">
									</div>
									<!-- /.dash-input-wrapper -->
								</div>
							</div>

							<div class="d-flex justify-content-end mb-20">
								<a href="#" class="dash-btn-one">Remove</a>
							</div>
						</div>
					</div>
				</div>
				<div class="accordion-item">
					<div class="accordion-header" id="headingTwo">
						<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
							Add Member 2
						</button>
					</div>
					<div id="collapseTwo" class="accordion-collapse collapse show" aria-labelledby="headingTwo" data-bs-parent="#accordionOne">
						<div class="accordion-body">
							<div class="row">
								<div class="col-lg-2">
									<div class="dash-input-wrapper mb-30 md-mb-10">
										<label for="">Name*</label>
									</div>
									<!-- /.dash-input-wrapper -->
								</div>
								<div class="col-lg-10">
									<div class="dash-input-wrapper mb-30">
										<input type="text" placeholder="Product Designer (Google)">
									</div>
									<!-- /.dash-input-wrapper -->
								</div>
							</div>
							<div class="row">
								<div class="col-lg-2">
									<div class="dash-input-wrapper mb-30 md-mb-10">
										<label for="">Designation*</label>
									</div>
									<!-- /.dash-input-wrapper -->
								</div>
								<div class="col-lg-10">
									<div class="dash-input-wrapper mb-30">
										<input type="text" placeholder="Account Manager">
									</div>
									<!-- /.dash-input-wrapper -->
								</div>
							</div>
							<div class="row">
								<div class="col-lg-2">
									<div class="dash-input-wrapper mb-30 md-mb-10">
										<label for="">Email*</label>
									</div>
									<!-- /.dash-input-wrapper -->
								</div>
								<div class="col-lg-10">
									<div class="dash-input-wrapper mb-30">
										<input type="email" placeholder="newmmwber@gmail.com">
									</div>
									<!-- /.dash-input-wrapper -->
								</div>
							</div>

							<div class="d-flex justify-content-end mb-20">
								<a href="#" class="dash-btn-one">Remove</a>
							</div>
						</div>
					</div>
				</div>
			</div> <!-- /.dash-accordion-one -->
			<a href="#" class="dash-btn-one"><i class="bi bi-plus"></i> Add Another Member</a>
		</div>
		<!-- /.card-box -->

		<div class="button-group d-inline-flex align-items-center mt-30">
			<a href="#" class="dash-btn-two tran3s me-3">Save</a>
			<a href="#" class="dash-cancel-btn tran3s">Cancel</a>
		</div>
	</div>
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

<script>
	let currentStep = 1;

	function nextStep(step) {
		document.getElementById(`step-${step}`).classList.remove('active');
		document.getElementById(`tag-step-${step}`).classList.remove('selected');
		currentStep = step + 1;
		document.getElementById(`step-${currentStep}`).classList.add('active');
		document.getElementById(`tag-step-${currentStep}`).classList.add('selected');
	}

	function previousStep(step) {
		document.getElementById(`step-${step}`).classList.remove('active');
		document.getElementById(`tag-step-${step}`).classList.remove('selected');
		currentStep = step - 1;
		document.getElementById(`step-${currentStep}`).classList.add('active');
		document.getElementById(`tag-step-${currentStep}`).classList.add('selected');
	}

	document.getElementById("multi-step-form").addEventListener("submit", function(event) {
		event.preventDefault();
		var formData = new FormData(this);
		var formDataObject = {};
		formData.forEach(function(value, key) {
			formDataObject[key] = value;
		});
		console.log(formDataObject);
	});
</script>
<script>
    $(document).ready(function() {

    $("#basic-information").on("click", function(e) {
        e.preventDefault();
          $.ajax({
            type: "POST",
              url: "{{route('employer.profile-1.save')}}",
              data: {
                _token:"{{csrf_token()}}",
                institution: $("#multi-step-form").find("[name=legalNameOfSchool]").val(),
                institution_type: $("#multi-step-form").find("[name=typeOfSchool]").val(),
                address_line_1: $("#multi-step-form").find("[name=addressLine1]").val(),
                address_line_2: $("#multi-step-form").find("[name=addressLine2]").val(),
                country_id: $("#multi-step-form").find("[name=country]").val(),
                state: $("#multi-step-form").find("[name=state]").val(),
                city: $("#multi-step-form").find("[name=city]").val(),
                zip_code: $("#multi-step-form").find("[name=zipPostCode]").val(),
                phone_number: $("#multi-step-form").find("[name=phoneNumber]").val(),
                email: $("#multi-step-form").find("[name=email]").val(),
                number_of_students: $("#multi-step-form").find("[name=numberOfStudents]").val(), 
                number_of_teachers: $("#multi-step-form").find("[name=numberOfTeachers]").val(),
                number_of_administrative_staff: $("#multi-step-form").find("[name=numberOfAdministrativeStaff]").val(),
                established_date: $("#multi-step-form").find("[name=yearOfEstablished]").val(),
                        },
				
              dataType: 'json',
              success: function (data) {
    
                if (data.status) {
                    // window.location = data.redirect;
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

	  // Employer Opeational Details
      $("#operational-details").on("click", function(e) {
			e.preventDefault();
			var formData = new FormData();
			formData.append("_token", "{{ csrf_token() }}");
			formData.append('school_vision_and_mission',$("#multi-step-form").find('[name=schoolMission]').val());
			formData.append('instruction_languages_used',$("#multi-step-form").find('[name=languagesOfInstructionUsedInTheSchool]').val());
			formData.append('international_accredition_or_certification',$('#anyInternationalOrNationalAccreditations')[0].files[0]);
			formData.append('employed_foreign_staff_and_roles',$("#multi-step-form").find('[name=numberofForeignStaffCurrentlyEmployed]').val());
			formData.append('available_technical_resources',$("#multi-step-form").find('[name=technicalResources]').val());
		
          $.ajax({
            type: "POST",
              url: "{{route('employer.profile-2.save')}}",
              data: formData,
              dataType: 'json',
              contentType: false,
              processData: false,
              success: function (data) {
    
                if (data.status) {
                    // window.location = data.redirect;
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
	
      // Canidate Educational and Professional Information
      $("#subscription-details").on("click", function(e) {
        e.preventDefault();
        var formData = new FormData();
        formData.append("_token", "{{ csrf_token() }}");
        formData.append('subscription_plan_id',$("#multi-step-form").find('[name=differentSubscriptionOptions]').val())
        formData.append('terms_and_conditions_acceptance',$("#multi-step-form").find('[name=acceptanceOfTermsAndConditions]').val())
          $.ajax({
            type: "POST",
              url: "{{route('employer.profile-3.save')}}",
              data: formData,
              dataType: 'json',
              contentType: false,
              processData: false,
              success: function (data) {
    
                if (data.status) {
                    // window.location = data.redirect;
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

	 // Historical Recruitment Details
	  $("#eligibility-confirmation-details").on("click", function(e) {
        e.preventDefault();
        var formData = new FormData();
        formData.append("_token", "{{ csrf_token() }}");
        formData.append('registration_business_license_proof',$("#multi-step-form").find('[name=proofOfRegistration]').val())
        formData.append('south_korea_laws_acknowledgement',$("#multi-step-form").find('[name=southKoreaLawAcknowledgement]').val())
        formData.append('legal_disputes_confirmation_document',$('#legalDisputesConfirmationDocument')[0].files[0])
        formData.append('ability_willingness_assurance',$("#multi-step-form").find('[name=abilityWillingnessAssurance]').val())
        formData.append('financial_health',$("#multi-step-form").find('[name=financialHealthToEnsure]').val())
	
          $.ajax({
            type: "POST",
              url: "{{route('employer.profile-4.save')}}",
              data: formData,
              dataType: 'json',
              contentType: false,
              processData: false,
              success: function (data) {
    
                if (data.status) {
                    // window.location = data.redirect;
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
	  $("#historical-recruitment-details").on("click", function(e) {
        e.preventDefault();
        var formData = new FormData();
        formData.append("_token", "{{ csrf_token() }}");
        formData.append('foreign_teachers_in_3_years',$("#multi-step-form").find('[name=numberOfForeignTeachersRecruited]').val())
        formData.append('foreign_teachers_retention_rate',$("#multi-step-form").find('[name=retentionRateOfForeignTeachers]').val())
        formData.append('reason_contract_termination',$("#multi-step-form").find('[name=reasonsForTeacherContractTerminations]').val())
	
          $.ajax({
            type: "POST",
              url: "{{route('employer.profile-5.save')}}",
              data: formData,
              dataType: 'json',
              contentType: false,
              processData: false,
              success: function (data) {
    
                if (data.status) {
                    // window.location = data.redirect;
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
	  $("#feedback-testimonial-details").on("click", function(e) {
        e.preventDefault();
        var formData = new FormData();
        formData.append("_token", "{{ csrf_token() }}");
        formData.append('current_past_teacher_references',$("#multi-step-form").find('[name=optionToProvideReferences]').val())
        formData.append('teaching_management_recognition_award',$("#multi-step-form").find('[name=anyAwardsOrRecognitions]').val())
          $.ajax({
            type: "POST",
              url: "{{route('employer.profile-6.save')}}",
              data: formData,
              dataType: 'json',
              contentType: false,
              processData: false,
              success: function (data) {
    
                if (data.status) {
                    // window.location = data.redirect;
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
	  $("#support-development-details").on("click", function(e) {
        e.preventDefault();
        var formData = new FormData();
        formData.append("_token", "{{ csrf_token() }}");
        formData.append('past_ongoing_training_program',$("#multi-step-form").find('[name=pastAndOngoingTeacherTrainingPrograms]').val())
        formData.append('institution_development_opportunities',$("#multi-step-form").find('[name=listOfExternalProfessionalDevelopmentOpportunities]').val())
        formData.append('new_hiree_orientation',$("#multi-step-form").find('[name=orientationProgramsForNewHires]').val())
          $.ajax({
            type: "POST",
              url: "{{route('employer.profile-7.save')}}",
              data: formData,
              dataType: 'json',
              contentType: false,
              processData: false,
              success: function (data) {
    
                if (data.status) {
                    // window.location = data.redirect;
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
	  $("#cultural-development-details").on("click", function(e) {
        e.preventDefault();
        var formData = new FormData();
        formData.append("_token", "{{ csrf_token() }}");
        formData.append('sk_cultural_programs',$("#multi-step-form").find('[name=existingProgramsOrEffortsToHelp]').val())
        formData.append('languages_resources_foreign_staff',$("#multi-step-form").find('[name=languageProgramsOrResourcesAvailableToForeignStaff]').val())
          $.ajax({
            type: "POST",
              url: "{{route('employer.profile-8.save')}}",
              data: formData,
              dataType: 'json',
              contentType: false,
              processData: false,
              success: function (data) {
    
                if (data.status) {
                    // window.location = data.redirect;
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
	  $("#declaration-consent-details").on("click", function(e) {
        e.preventDefault();
        var formData = new FormData();
        formData.append("_token", "{{ csrf_token() }}");
        formData.append('agreement_period_checks_updates',$("#multi-step-form").find('[name=agreementToPeriodicChecksAndUpdates]').val())
        formData.append('storage_processing_consent',$("#multi-step-form").find('[name=consentForDataStorageAndProcessing]').val())
          $.ajax({
            type: "POST",
              url: "{{route('employer.profile-9.save')}}",
              data: formData,
              dataType: 'json',
              contentType: false,
              processData: false,
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
    
	  
    }); 
</script>
@push('page-script')
<script src="{{asset('assets/js/select2-custom.js')}}"></script>
<script src="{{asset('assets/js/select2.full.js')}}"></script>
@endpush
@endsection