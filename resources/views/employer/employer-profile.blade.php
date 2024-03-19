@extends('employer.layout.main')

@section('title')
Profile
@endsection
@push('page-css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/select2.css')}}" media="all">	
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
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
		border: 1px solid #b1b0eb;
		border-radius: 50%;
		padding: 15%;
		width: 30px;
		height: 30px;
	}

	.employer-sign-up .stepper>.step.selected>.icon>div {
		background: #ff715b	;
		color: #fff;
	}

	.employer-sign-up .stepper>.step>.icon,
	.employer-sign-up .stepper>.step>.text {
		font-size: 13px;
		font-weight: 600;
	}

	.note-editable{
   background: #fff;
}
.note-btn.dropdown-toggle:after {
   content: none;
}
.note-btn[aria-label="Help"]{
   display: none;
}

.note-editor .note-toolbar .note-color-all .note-dropdown-menu, .note-popover .popover-content .note-color-all .note-dropdown-menu{
   min-width: 185px;
}
/* Customize Summernote editor */
.note-editor {
/* Your custom styles here */
}

.note-editable {
/* Your custom styles here */
}

/* Toolbar customization */
.note-toolbar {
/* Your custom styles here */
}

/* Buttons customization */
.note-btn {
/* Your custom styles here */
}
</style>

@endpush
@section('content')
<div class="dashboard-body">
	<div class="position-relative">
		 <!-- ************************ Header **************************** -->
		 	@include('employer.layout.header_menu')
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
		  @elseif(session('license_approval'))
			<div class="alert alert-danger">
					{{ __('Dear Employer, Your can\'t perform any activity until your business license is approved by Admin') }}
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
						<div class="text">Employer Verification</div>
					</div>
					<div id="tag-step-4" class="step">
						<div class="icon">
							<div>4</div>
						</div>
						<div class="text">Declaration and Consent</div>
					</div>
					{{--<div id="tag-step-5" class="step">
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
					</div>--}}
					<div id="tag-step-5" class="step">
						<div class="icon">
							<div>5</div>
						</div>
						<div class="text">Introductry Video</div>
					</div>
				</div>
					<form id="basic-information-form" class = "mt-4" method = "post" enctype = "multipart/form-data">
						<!-- Step 1 -->
						<div class="step active" id="step-1">
							<div class="row">
								<div class="col-md-6">
									<div class="dash-input-wrapper mb-30">
										<label for="">Legal Business Name or Institute Name</label>
										<input type="text" name="legalNameOfSchool" placeholder="Legal name of the school or institution" value="{{$employerDetails->institution ?? ''}}">
									</div>
								</div>
								<div class="col-md-6">
									<div class="dash-input-wrapper mb-30">
										<label for="">Type of Business</label>
										<select name="typeOfSchool" id="typeOfSchool" class="nice-select">
											<option value="Private English Academy" {{$employerDetails->institution_type == 'Private English Academy' ? 'selected' : ''}}>Private English Academy</option>
											<option value="Private Math Academy" {{$employerDetails->institution_type == 'Private Math Academy' ? 'selected' : ''}}>Private Math Academy</option>
											<option value="Public School" {{$employerDetails->institution_type == 'Public School' ? 'selected' : ''}}>Public School</option>
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
										<input type="number" name="zipPostCode" placeholder="94304" value="{{$employerDetails->zip_code ?? ''}}">
									</div>
								</div>
								
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="dash-input-wrapper mb-30">
										<label for=""> Korean Phone Number</label>
										<input type="number" class="number-input" name="phoneNumber" placeholder="(201) 555-0123" value="{{$employerDetails->phone_number ?? ''}}">
									</div>
								</div>
								<div class="col-md-6">
									<div class="dash-input-wrapper mb-30">
										<label for="">Email</label>
										<input type="email" name="email" placeholder="name@example.com" value="{{$employerDetails->email ?? ''}}">
									</div>
								</div>
							</div>
								{{--
							

							<div class="row">
								<div class="col-md-6">
									<div class="dash-input-wrapper mb-30">
										<label for="">
											Number of Administrative Staff</label>
										<input type="number" class="number-input" name="numberOfAdministrativeStaff" placeholder="215" value="{{$employerDetails->number_of_administrative_staff ?? ''}}">
									</div>
								</div>
								<div class="col-md-6">
									<div class="dash-input-wrapper mb-30">
										<label for="">Year of Established</label>
										<input type="date" name="yearOfEstablished" placeholder="" value="{{$employerDetails->established_date ?? ''}}">
									</div>
								</div>
							</div>
									--}}
							<div class="row">
								<div class="col-md-6">
									<div class="dash-input-wrapper mb-30">
										<label for="">Logo</label>
										<div class="user-avatar-setting d-flex align-items-center">
											@if(!empty($employerDetails->institution_logo))
											<img src="{{asset($employerDetails->institution_logo)}}" data-src="images/avatar_04.jpg" alt="" class="lazy-img user-img">
											@else
											<img src="{../images/lazy.svg}" data-src="images/avatar_04.jpg" alt="" class="lazy-img user-img">
											@endif
											<div class="upload-btn position-relative tran3s ms-4 me-3">
												Upload Logo
												<input type="file" id="institution_logo" name="institution_logo" placeholder="">
											</div>
											<button class="delete-btn tran3s">Delete</button>
										</div>
									</div>
								</div>
							</div>
							{{--<div class="row">
								<div class="col-md-12">
									<div class="dash-input-wrapper">
										<label for="">Employer Details</label>
										<textarea class="size-lg" placeholder="Write something interesting about you...." name="detailsDescription">{{$employerDetails->employer_details ?? ''}}</textarea>
										<div class="alert-text">Brief description for your profile. URLs are hyperlinked.</div>
									</div>
												
								</div>
							</div>--}}

							<div class="d-flex flex-row justify-content-end gap-3">
								<button type="submit" class="dash-btn-one" id="basic-information" >Next</button>
							</div>
						</div>
					</form>

					<!-- Step 2 -->
					<form id="operational-details-form" class = "mt-4" method = "post" enctype = "multipart/form-data">
						<div class="step" id="step-2">
							<div class="row">
								<div class="col-md-6">
									<div class="dash-input-wrapper mb-30">
										<label for="">School's mission and vision statement</label>
										<input type="text" name="schoolMission" id="schoolMission" placeholder="Type your answer here..." value="{{$employerDetails->school_vision_and_mission ?? ''}}">
									</div>
								</div>
								{{--<div class="col-md-6">
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
								</div>--}}
								<div class="col-md-6">
									<div class="dash-input-wrapper mb-30">
										<label for="">Number of Foreign Employers</label>
										<input type="text" name="numberofForeignStaffCurrentlyEmployed" placeholder="Type your answer here..." value="{{$employerDetails->employed_foreign_staff_and_roles ?? ''}}">
									</div>
								</div>
							</div>

							{{--<div class="row">
								<div class="col-md-6">
									<div class="dash-input-wrapper mb-30">
										<label for="">Technical resources available for teaching (This question is required)</label>
										<select name="technicalResources" id="technicalResources" class="nice-select">
											<option value="smart classrooms" {{$employerDetails->available_technical_resources == 'smart classrooms' ? 'selected' : ''}}>Smart Classrooms</option>
											<option value="Teaching Software" {{$employerDetails->available_technical_resources == 'Teaching Software' ? 'selected' : ''}}>Teaching Software</option>
											<option value="Other" {{$employerDetails->available_technical_resources == 'Other' ? 'selected' : ''}}>Other</option>
										</select>
									</div>
								</div>
							</div>--}}
							<div class="row">
								<div class="col-md-6">
									<div class="dash-input-wrapper mb-30">
										<label for="">Number of Students</label>
										<input type="number" class="number-input" name="numberOfStudents" placeholder="4935" value="{{$employerDetails->number_of_students ?? ''}}">
									</div>
								</div>
								<div class="col-md-6">
									<div class="dash-input-wrapper mb-30">
										<label for="">Number of Teachers</label>
										<input type="number" class="number-input" name="numberOfTeachers" placeholder="215" value="{{$employerDetails->number_of_teachers ?? ''}}">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="dash-input-wrapper mb-30">
										<label for="">Business Hours</label>
										<input type="number" class="number-input" name="businessHours" placeholder="4935" value="{{$employerDetails->business_hours ?? ''}}">
									</div>
								</div>
							</div>

							<div class="d-flex flex-row justify-content-end gap-3">
								<button type="button" class="dash-btn-one" onclick="previousStep(2)">Previous</button>
								<button type="submit" class="dash-btn-one" id ="operational-details" >Next</button>
							</div>
						</div>
					</form>

					<!-- Step 3 -->
					

					<!-- Step 4 -->
						<div class="step" id="step-3">
							<form id="employer-verification-form" class = "mt-4" method = "post" enctype = "multipart/form-data">
							<div class = "mt-1" id ="license-document-error"></div>
								@isset($employerLicenseDetails)
								@if($employerLicenseDetails->approval_status == 0)
								<div class="row">
									<div class="col-md-2">
										<div class="dash-input-wrapper mb-30">
										    <label for="">{{$employerLicenseDetails->license_number}}</label>
											@if(isset($employerLicenseDetails->license_file) && !empty($employerLicenseDetails->license_file))
											<div style = "padding-left:20px;">
												<a class="btn btn-primary" href = "{{asset($employerLicenseDetails->license_file)}}" target = "_blank">File</a>
											</div>
											@endif
										</div>
									</div>
									<div class="col-md-6">
										<div class="dash-input-wrapper mb-30">
											<label for="">Waiting for an approval by Admin</label>
										</div>
									</div>
								</div>
								@elseif($employerLicenseDetails->approval_status == 1)
								<div class="row">
									<div class="col-md-2">
										<div class="dash-input-wrapper mb-30">
										    <label for="">{{$employerLicenseDetails->license_number}}</label>
											@if(isset($employerLicenseDetails->license_file) && !empty($employerLicenseDetails->license_file))
											<div style = "padding-left:20px;">
												<a class="btn btn-primary" href = "{{asset($employerLicenseDetails->license_file)}}" target = "_blank">File</a>
											</div>
											@endif
										</div>
									</div>
									<div class="col-md-6">
										<div class="dash-input-wrapper mb-30">
											<label for="">Approved by Admin</label>
										</div>
									</div>
								</div>
								@elseif($employerLicenseDetails->approval_status == 2)
								<div class="row">
									<div class="col-md-6">
										<div class="dash-input-wrapper mb-30">
											<label for="">Business License Number</label>
											<input type="text" name="proofOfRegistration" placeholder="Type your answer here..." value="">
										</div>
									</div>
									<div class="col-md-6">
										<div class="dash-input-wrapper mb-30">
											<label for="">Acknowledgement to adhere to South Korea’s labor laws</label>
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
											<label for="">Upload Business License Certificate</label>
											<div class="user-avatar-setting d-flex align-items-center">
												<div class="upload-btn position-relative tran3s ms-4 me-3">
													Upload
													<input type="file" id="legalDisputesConfirmationDocument" name="legalDisputesConfirmationDocument" placeholder="" value="">											</div>
												<button type = "button" class="delete-btn tran3s">Delete</button>
											</div>
										</div>
									</div>
								</div>
								@endif
								@else
								<div class="row">
									<div class="col-md-6">
										<div class="dash-input-wrapper mb-30">
											<label for="">Business License Number</label>
											<input type="text" name="proofOfRegistration" placeholder="Type your answer here..." value="">
										</div>
									</div>
									<div class="col-md-6">
										<div class="dash-input-wrapper mb-30">
											<label for="">Acknowledgement to adhere to South Korea’s labor laws</label>
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
											<label for="">Upload Business License Certificate</label>
											<div class="user-avatar-setting d-flex align-items-center">
												<div class="upload-btn position-relative tran3s ms-4 me-3">
													Upload
													<input type="file" id="legalDisputesConfirmationDocument" name="legalDisputesConfirmationDocument" placeholder="" value="">											</div>
												<button type = "button" class="delete-btn tran3s">Delete</button>
											</div>
										</div>
									</div>
								</div>
								@endisset
								{{--	
									<div class="row">
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
								</div>--}}

								<div class="d-flex flex-row justify-content-end gap-3">
									<button type="button" class="dash-btn-one" onclick="previousStep(3)">Previous</button>
									@isset($employerLicenseDetails)
									@if($employerLicenseDetails->approval_status == 0 || $employerDetails->approval_status == 1)
									<button type="button" class="dash-btn-one" onclick="nextStep(3)">Next</button>
									@else
									<button type="submit" class="dash-btn-one"  >Next</button>
									@endif
									@else
									<button type="submit" class="dash-btn-one"  >Next</button>
									@endif
								</div>
							</form>
						</div>
					<form id="declaration-consent-form" class = "mt-4" method = "post" enctype = "multipart/form-data">
						<div class="step" id="step-4">
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
								<button type="button" class="dash-btn-one" onclick="previousStep(4)">Previous</button>
								<button type="button" class="dash-btn-one" id = "declaration-consent-details"  onclick="nextStep(4)">Next</button>
							</div>
						</div>
					</form>
					<form id="payment-details-form" method = "post" enctype = "multipart/form-data">
						<div class="step" id="step-5">
							<div class="row">
								<div class="col-lg-12">
									<div class="dash-input-wrapper mb-20">
										<label for="">Overview</label>
										<textarea  name="detailsDescription" value="" id="summernote" class = " @error('title') is-invalid @enderror" placeholder="Zubayer">{!! $employerDetails->employer_details ?? '' !!}</textarea>
										
									</div>
									<!-- /.dash-input-wrapper -->
								</div>
							</div>
							{{--<div class="row">
								<div class="col-md-6">
									<div class="dash-input-wrapper mb-30">
										<label for="">Select Subscription</label>
										<select name="differentSubscriptionOptions" id="differentSubscriptionOptions" class="nice-select">
											@isset($plans)
											@foreach($plans as $plan)
											<option value="{{$plan->id}}" {{$employerDetails->subscription_plan_id == $plan->id ? 'selected' : ''}}>{{$plan->name}} - ₩ {{$plan->price}}/{{$plan->duration}} months</option>
											@endforeach
											@endisset
										</select>
									</div>
								</div>
								<div class="col-md-6">
									
									<div class="row dash-input-wrapper mb-30">
										<div class="form-group">
											<label for="">Card details</label>
											<div id="card-element"></div>
										</div>
									</div>
									<div class="row">
									<hr>
										<button type="submit" class="btn btn-primary" id="card-button" data-secret="{{ $intent->client_secret }}">Purchase</button>
									</div>
								</div>
							</div>--}}
							
							<div class = "row">
								<div class="col-md-6">
									<div class="dash-input-wrapper mb-30">
										<label for="">Teaching Video</label>
										<div class="user-avatar-setting d-flex align-items-center mb-30">
											<div class="upload-btn position-relative tran3s ms-4 me-3">
												Upload new video
												<input type="file" id="introductryVideo" name="introductryVideo" placeholder="" accept="video/mp4" onchange="previewVideo()">
											</div>

											<button class="delete-btn tran3s " onclick = "deleteFile('video-url')">Delete</button>
										</div>
										<video id="videoPreview" class = "d-none" width="320" height="240" controls></video>
										@if(isset($employerDetails->introductry_video) && !empty($employerDetails->introductry_video))
										<div style = "padding-left:20px;" class = "mt-2 video-url">
											<a class="btn btn-primary" href = "{{asset($employerDetails->introductry_video)}}" target = "_blank">File</a>
										</div>
										@endif
									</div>
								</div>
								<div class="col-md-6">
									<div class="dash-input-wrapper mb-30">
										<label for="">Video Thumbnail Image</label>
										<div class="user-avatar-setting d-flex align-items-center mb-30">
											<div class="upload-btn position-relative tran3s ms-4 me-3">
												Upload Thumbnail
												<input type="file" id="videoThumbnail" name="videoThumbnail" placeholder="" accept="image/jpeg,image/png">
											</div>

											<button class="delete-btn tran3s " onclick = "deleteFile('thumbnail-image')">Delete</button>
										</div>
										@if(isset($employerDetails->video_thumbnail) && !empty($employerDetails->video_thumbnail))
										<div style = "padding-left:20px;" class = "thumbnail-image">
											<a class="btn btn-primary" href = "{{asset($employerDetails->video_thumbnail)}}" target = "_blank">File</a>
										</div>
										@endif
									</div>
                            	</div>
							</div>
							<div class="row">
							
							<div class="col-md-6">
								<div class="dash-input-wrapper mb-30">
									<label for="">Acceptance of terms and conditions of the subscription.</label>
									<select name="acceptanceOfTermsAndConditions" id="acceptanceOfTermsAndConditions" class="nice-select" >
										<option value="I Accept" {{$employerDetails->terms_and_conditions_acceptance == 'I Accept' ? 'selected' : ''}}>I Accept</option>
										<option value="I do not Accept" {{$employerDetails->terms_and_conditions_acceptance == 'I do not Accept' ? 'selected' : ''}}>I do not Accept</option>
									</select>
									<div id="subscription-terms-condiditions-acceptance"></div>
								</div>
							</div>
						</div>


							<div class="d-flex flex-row justify-content-end gap-3">
								<button type="button" class="dash-btn-one" onclick="previousStep(5)">Previous</button>
								<button type="submit" id="subscription-details" class="dash-btn-one">Submit</button>
							</div>
						</div>
					</form>
             {{--
					<!-- Step 5 -->
					<div class="step" id="step-5">
						<div class="row">
							<div class="col-md-6">
								<div class="dash-input-wrapper mb-30">
									<label for="">Number of foreign teachers recruited in the past 3
										years</label>
									<input type="number" class="number-input" name="numberOfForeignTeachersRecruited" placeholder="Type your answer here..." value="{{$employerDetails->foreign_teachers_in_3_years ?? ''}}">
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
					        --}}

					<!-- Step 9 -->
					
			</div>
		</div>

	
	

		<!-- <div class="button-group d-inline-flex align-items-center mt-30">
			<a href="#" class="dash-btn-two tran3s me-3">Save</a>
			<a href="#" class="dash-cancel-btn tran3s">Cancel</a>
		</div> -->
	</div>
</div>
@push('page-script')
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script> -->

<script src="https://js.stripe.com/v3/"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script>
    const stripe = Stripe('{{ env('STRIPE_KEY') }}')
  
    const elements = stripe.elements()
    const cardElement = elements.create('card')
  
    cardElement.mount('#card-element')
  
    // const form = document.getElementById('payment-form')
    const cardBtn = document.getElementById('card-button')
    // const cardHolderName = document.getElementById('card-holder-name')
  
    cardBtn.addEventListener('click', async (e) => {
        e.preventDefault()
		
        cardBtn.disabled = true
        const { setupIntent, error } = await stripe.confirmCardSetup(
            cardBtn.dataset.secret, {
                payment_method: {
                    card: cardElement,
                    billing_details: {
                        name: '{{auth()->user()->name}}'
                    }   
                }
            }
        )	
		
        if(error) {
            cardBtn.disable = false
        } else {
            let token = document.createElement('input')
            token.setAttribute('type', 'hidden')
            token.setAttribute('name', 'token')
            token.setAttribute('value', setupIntent.payment_method)
			console.log();
        }
		
    })
</script>
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

	// document.getElementById("multi-step-form").addEventListener("submit", function(event) {
	// 	event.preventDefault();
	// 	var formData = new FormData(this);
	// 	var formDataObject = {};
	// 	formData.forEach(function(value, key) {
	// 		formDataObject[key] = value;
	// 	});
	// 	console.log(formDataObject);
	// });
</script>
<script>
    $(document).ready(function() {
		// const subscriptionButton = document.getElementById('subscription-details');
		// const customerbillingSubscripton = "{{auth()->user()->stripe_id }}";
		// if(!customerbillingSubscripton)
		// 	subscriptionButton.disabled = true
		// const step3NextBtn = document.getElementById('subscription-details')
		// var subscriptionStatus  =  "{{employerSubscription()}}";
		// console.log("subscription status is " + subscriptionStatus);
		// if(subscriptionStatus === 1)
		// step3NextBtn.disabled = false
	    //     else
		// 	step3NextBtn.disabled = true

		$('#summernote').summernote({
			placeholder: 'Curriculum',
			tabsize: 2,
			height: 200
 			});
		$("#basic-information-form").on("submit", function(e) {
			e.preventDefault();
			var formData = new FormData();
			formData.append("_token", "{{ csrf_token() }}");
			formData.append("institution", $("#basic-information-form").find("[name=legalNameOfSchool]").val());
			formData.append("institution_type", $("#basic-information-form").find("[name=typeOfSchool]").val());
			formData.append("address_line_1", $("#basic-information-form").find("[name=addressLine1]").val());
			formData.append("address_line_2", $("#basic-information-form").find("[name=addressLine2]").val());
			formData.append("country_id", $("#basic-information-form").find("[name=country]").val());
			formData.append("state", $("#basic-information-form").find("[name=state]").val());
			formData.append("city", $("#basic-information-form").find("[name=city]").val());
			formData.append("zip_code", $("#basic-information-form").find("[name=zipPostCode]").val());
			formData.append("phone_number", $("#basic-information-form").find("[name=phoneNumber]").val());
			formData.append("email", $("#basic-information-form").find("[name=email]").val());
			formData.append("institution_logo", $('#institution_logo')[0].files[0]);
				/* 
					formData.append("number_of_administrative_staff", $("#multi-step-form").find("[name=numberOfAdministrativeStaff]").val());
					formData.append("established_date", $("#multi-step-form").find("[name=yearOfEstablished]").val());
					formData.append("employer_details", $("#multi-step-form").find("[name=detailsDescription]").val());
					*/

			$.ajax({
				type: "POST",
				url: "{{route('employer.profile-1.save')}}",
				data: formData ,
				dataType: 'json',
				contentType: false,
				processData: false,
				success: function (data) {
		
					if (data.status) {
						nextStep(1);
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
		$("#operational-details-form").on("submit", function(e) {
				e.preventDefault();
				var formData = new FormData();
				formData.append("_token", "{{ csrf_token() }}");
				formData.append('school_vision_and_mission',$("#operational-details-form").find('[name=schoolMission]').val());
				/*formData.append('instruction_languages_used',$("#multi-step-form").find('[name=languagesOfInstructionUsedInTheSchool]').val());
				formData.append('available_technical_resources',$("#multi-step-form").find('[name=technicalResources]').val());
				formData.append('international_accredition_or_certification',$('#anyInternationalOrNationalAccreditations')[0].files[0]); */
				formData.append('employed_foreign_staff_and_roles',$("#operational-details-form").find('[name=numberofForeignStaffCurrentlyEmployed]').val());
				formData.append("number_of_students", $("#operational-details-form").find("[name=numberOfStudents]").val());
				formData.append("number_of_teachers", $("#operational-details-form").find("[name=numberOfTeachers]").val());
				formData.append("business_hours", $("#operational-details-form").find("[name=businessHours]").val());
			
			$.ajax({
				type: "POST",
				url: "{{route('employer.profile-2.save')}}",
				data: formData,
				dataType: 'json',
				contentType: false,
				processData: false,
				success: function (data) {
		
					if (data.status) {
						nextStep(2);
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
	
		$("#payment-details-form").on('submit',function(e){
			e.preventDefault();
			var formData = new FormData();
				formData.append("_token", "{{ csrf_token() }}");
				/* formData.append('plan',$("#payment-details-form").find('[name=differentSubscriptionOptions]').val())
				 */
				formData.append("employer_details", $("#payment-details-form").find("[name=detailsDescription]").val());
				formData.append("introductry_video", $('#introductryVideo')[0].files[0]);
        		formData.append("video_thumbnail", $('#videoThumbnail')[0].files[0]);
				formData.append('terms_and_conditions_acceptance',$("#payment-details-form").find('[name=acceptanceOfTermsAndConditions]').val())
				// formData.append('token',$("#multi-step-form").find('[name=token]').val())
				// formData.append('token',token.value)
				// form.submit();
				$.ajax({
				type: "POST",
				url: "{{route('employer.profile-5.save')}}",
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
							$("#subscription-terms-condiditions-acceptance").append("<div class='alert alert-danger'>" + val + "</div>");
						});
					}
				
				}
			});
		});
			// Canidate Educational and Professional Information
			//   $("#subscription-details").on("click", function(e) {
			//     e.preventDefault();
			//     var formData = new FormData();
			//     formData.append("_token", "{{ csrf_token() }}");
			//     formData.append('subscription_plan_id',$("#multi-step-form").find('[name=differentSubscriptionOptions]').val())
			//     formData.append('terms_and_conditions_acceptance',$("#multi-step-form").find('[name=acceptanceOfTermsAndConditions]').val())
			//       $.ajax({
			//         type: "POST",
			//           url: "{{route('employer.profile-3.save')}}",
			//           data: formData,
			//           dataType: 'json',
			//           contentType: false,
			//           processData: false,
			//           success: function (data) {
			
			//             if (data.status) {
			//                 // window.location = data.redirect;
			//             }else{
			//                 $(".alert").remove();
			//                 $.each(data.errors, function (key, val) {
			//                     $("#errors-list").append("<div class='alert alert-danger'>" + val + "</div>");
			//                 });
			//             }
					
			//           }
			//       });
		
			//       return false;
			//   });

			// Historical Recruitment Details
		$("#employer-verification-form").on("submit", function(e) {
			e.preventDefault();
			var formData = new FormData();
			formData.append("_token", "{{ csrf_token() }}");
			formData.append('license_number',$("#employer-verification-form").find('[name=proofOfRegistration]').val())
			formData.append('south_korea_laws_acknowledgement',$("#employer-verification-form").find('[name=southKoreaLawAcknowledgement]').val())
			var licenseFile = $('#legalDisputesConfirmationDocument')[0].files[0];
			formData.append('license_file', licenseFile ? licenseFile : '');
			/*
			formData.append('ability_willingness_assurance',$("#multi-step-form").find('[name=abilityWillingnessAssurance]').val())
			formData.append('financial_health',$("#multi-step-form").find('[name=financialHealthToEnsure]').val()) */
		
			$.ajax({
				type: "POST",
				url: "{{route('employer.profile-4.save')}}",
				data: formData,
				dataType: 'json',
				contentType: false,
				processData: false,
				success: function (data) {
		
					if (data.status) {
						nextStep(3);
						// window.location = data.redirect;
					}else {
							$("#license-document-error").empty(); // Clear previous errors
							$.each(data.errors, function (key, val) {
								$("#license-document-error").append("<div class='alert alert-danger'>" + val + "</div>");
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
		$("#declaration-consent-form").on("submit", function(e) {
			e.preventDefault();
			var formData = new FormData();
			formData.append("_token", "{{ csrf_token() }}");
			formData.append('agreement_period_checks_updates',$("#declaration-consent-form").find('[name=agreementToPeriodicChecksAndUpdates]').val())
			formData.append('storage_processing_consent',$("#declaration-consent-form").find('[name=consentForDataStorageAndProcessing]').val())
			$.ajax({
				type: "POST",
				url: "{{route('employer.profile-9.save')}}",
				data: formData,
				dataType: 'json',
				contentType: false,
				processData: false,
				success: function (data) {
		
					if (data.status) {
						nextStep(4);
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
    
	  
    }); 
	
</script>
<!-- Validation to Input Field exluding '-' input -->
<script>
    $(document).ready(function() {
        $('.number-input').on('keydown', function(e) {
            // Allow digits (0-9), backspace, and the currency symbols
            if (
                (e.key >= '0' && e.key <= '9') || // Digits
                e.key === 'Backspace' // Backspace
                // e.key === '$' ||
                // e.key === '.' || // Dollar sign
                // e.key === '£' // Pound sign
            ) {
                return true; // Allow the keypress
            } else {
                e.preventDefault(); // Prevent input of other characters
                return false;
            }
        });
    });

	

	function previewVideo() {
		const videoFile = document.getElementById('introductryVideo').files[0];
		const videoPreview = document.getElementById('videoPreview');

		if (videoFile) {
			const videoURL = URL.createObjectURL(videoFile);
			videoPreview.src = videoURL;
			videoPreview.classList.remove('d-none');
		}else
		{
			videoPreview.src = '';
			videoPreview.classList.add('d-none');
		}
	}
</script>
@endpush
@endsection