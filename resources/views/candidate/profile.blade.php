@extends('candidate.layout.main')

@section('title')
Profile
@endsection
@push('page-css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style>
    .step {
        display: none;
    }

    .active {
        display: block;
        color: rgba(0, 0, 0, 0.7) !important;
    }

    .stepper {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
        width: 100%;
    }

    .candidate-sign-up #multi-step-form {
        margin-top: 25px;
    }

    .candidate-sign-up .stepper>.step {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        gap: 1rem;
    }

    .candidate-sign-up .stepper>.step>.icon>div {
        border: 1px solid rgba(0, 0, 0, 0.5);
        border-radius: 50%;
        padding: 15%;
        width: 30px;
        height: 30px;
    }

    .candidate-sign-up .stepper>.step.selected>.icon>div {
        background: #31795A;
        color: #fff;
    }

    .candidate-sign-up .stepper>.step>.icon,
    .candidate-sign-up .stepper>.step>.text {
        /* white-space: nowrap; */
        font-size: 13px;
        font-weight: 600;
    }

    .select2-container {
        width: 100% !important;
        border: 1px solid #E5E5E5!important;
        height: 54px;
        border-radius : 5px!important;
    }

    .select2-container--default .select2-selection--multiple{
        border: none!important;
        height: 100%;
        overflow-y: scroll;
    }
    .alert-danger {
        width: content-fit;
    }
    .card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: none;
    border-radius: .25rem;
}

    h4{
        font-family: 'gordita';
    }
</style>
@endpush
@section('content')
<div class="dashboard-body">
    <div class="position-relative">
        <!-- ************************ Header **************************** -->
			@include('candidate.layout.header_menu')
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
					{{ __('Dear Candidate, Your profile is not complete, kindly complete your profile.') }}
				</div>
		  @endif
        <h2 class="main-title">My Profile</h2>

        {{-- <div class="bg-white card-box border-20 mb-40">
            <div class="candidate-sign-up">
                <div class="stepper">
                    <div id="tag-step-1" class="step selected">
                        <div class="icon">
                            <div>1</div>
                        </div>
                        <div class="text">Visa Eligibility Check</div>
                    </div>
                    <div id="tag-step-2" class="step">
                        <div class="icon">
                            <div>2</div>
                        </div>
                        <div class="text">Personal Details</div>
                    </div>
                    <div id="tag-step-3" class="step">
                        <div class="icon">
                            <div>3</div>
                        </div>
                        <div class="text">Education</div>
                    </div>
                    <div id="tag-step-4" class="step">
                        <div class="icon">
                            <div>4</div>
                        </div>
                        <div class="text">Professional Details</div>
                    </div>
                    <div id="tag-step-5" class="step">
                        <div class="icon">
                            <div>5</div>
                        </div>
                        <div class="text">Skills & Preferences</div>
                    </div>
                    <div id="tag-step-6" class="step">
                        <div class="icon">
                            <div>6</div>
                        </div>
                        <div class="text">Introduce Yourself</div>
                    </div>
                    <div id="tag-step-7" class="step">
                        <div class="icon">
                            <div>7</div>
                        </div>
                        <div class="text">Teaching Video & Interview (optional)</div>
                    </div>
                    <div id="tag-step-8" class="step">
                        <div class="icon">
                            <div>8</div>
                        </div>
                        <div class="text">Legal & Verification</div>
                    </div>
                </div>
               
            </div>
        </div> --}}

        <form id="multi-step-form" enctype = "multipart/form-data">
            <!-- Step 1 -->
            <div class="bg-white card-box border-20 mb-40">
                <h4 class="dash-title-three">Visa Eligibility</h4>
                <div class="candidate-sign-up">
                    <div class="card my-3 p-3" id="step-1">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="dash-input-wrapper mb-30">
                                    <label for="">Nationality</label>
                                    <select name="nationality" id="nationality" class="nice-select">
                                        @isset($countries)
                                            @foreach($countries as $country)
                                            <option value="{{$country->id}}" {{$candidatePersonalDetails->nationality == $country->id ? 'selected' : ''}}>{{$country->name}}</option>
                                            @endforeach
                                        @endisset
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="dash-input-wrapper mb-30">
                                    <label for="">Passport</label>
                                    <select name="passport" id="passport" class="nice-select">
                                        @isset($countries)
                                            @foreach($countries as $country)
                                            <option value="{{$country->id}}" {{$candidatePersonalDetails->passport == $country->id ? 'selected' : ''}}>{{$country->name}}</option>
                                            @endforeach
                                        @endisset
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="dash-input-wrapper mb-30">
                                    <label for="">Current Visa Status</label>
                                    <select name="current_visa_status" id="current_visa_status" class="nice-select">
                                        <option value="New To Apply" {{$candidatePersonalDetails->current_visa_status == 'New To Apply' ? 'selected' : ''}}>New To Apply</option>
                                        <option value="E-2 (Teaching)" {{$candidatePersonalDetails->current_visa_status == 'E-2 (Teaching)' ? 'selected' : ''}}>E-2 (Teaching)</option>
                                        <option value="E-7 (Special Occupation)" {{$candidatePersonalDetails->current_visa_status == 'E-7 (Special Occupation)' ? 'selected' : ''}}>E-7 (Special Occupation)</option>
                                        <option value="F-2 (Resident)" {{$candidatePersonalDetails->current_visa_status == 'F-2 (Resident)' ? 'selected' : ''}}>F-2 (Resident)</option>
                                        <option value="F-5 (Permanent Resident)" {{$candidatePersonalDetails->current_visa_status == 'F-5 (Permanent Resident)' ? 'selected' : ''}}>F-5 (Permanent Resident)</option>
                                        <option value="F-6 (Marriage Migrant)" {{$candidatePersonalDetails->current_visa_status == 'F-6 (Marriage Migrant)' ? 'selected' : ''}}>F-6 (Marriage Migrant)</option>
                                        <option value="D-8 (Corporate Investment)" {{$candidatePersonalDetails->current_visa_status == 'D-8 (Corporate Investment)' ? 'selected' : ''}}>D-8 (Corporate Investment)</option>
                                        <option value="D-9 (Trade Management)" {{$candidatePersonalDetails->current_visa_status == 'D-9 (Trade Management)' ? 'selected' : ''}}>D-9 (Trade Management)</option>
                                        <option value="H-1 (Working Holiday)" {{$candidatePersonalDetails->current_visa_status == 'H-1 (Working Holiday)' ? 'selected' : ''}}>H-1 (Working Holiday)</option>
                                        <option value="Other" {{$candidatePersonalDetails->current_visa_status == 'Other' ? 'selected' : ''}}>Other</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="dash-input-wrapper mb-30">
                                    <label for="">Do you have any criminal convictions?</label>
                                    <select name="criminal_record" id="criminal_record" class="nice-select">
                                        <option value="Yes" {{$candidatePersonalDetails->criminal_record == 'Yes' ? 'selected' : ''}}>Yes</option>
                                        <option value="No" {{$candidatePersonalDetails->criminal_record == 'No' ? 'selected' : ''}}>No</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="dash-input-wrapper mb-30">
                                    <label for="">Graduated From An Accredited University</label>
                                    <select name="graduation_from_accredited_university" id="graduation_from_accredited_university" class="nice-select">
                                        <option value="Yes" {{$candidatePersonalDetails->graduation == 'Yes' ? 'selected' : ''}}>Yes</option>
                                        <option value="No" {{$candidatePersonalDetails->graduation == 'No' ? 'selected' : ''}}>No</option>
                                    </select>
                                </div>
                            </div>
                            {{-- <div class="col-md-12">
                                <div class="dash-input-wrapper mb-30">
                                    <label for="">Health Declaration</label>
                                    <div id="note" class="summernote">{!! $candidatePersonalDetails->health_declaration !!}</div>
                                     <select name="is_healthy" id="is_healthy" class="nice-select">
                                        <option value="Yes" {{$candidatePersonalDetails->is_healthy == 'Yes' ? 'selected' : ''}}>Yes</option>
                                        <option value="No" {{$candidatePersonalDetails->is_healthy == 'No' ? 'selected' : ''}}>No</option>
                                    </select>
                                </div>
                            </div> --}}
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="dash-input-wrapper mb-30">
                                    <p>Please confirm that you are in good health and fitness, and that you have no health issues that could affect the approval of your visa</p>
                                    <label for="">Health Declaration </label>
                                    <select name="is_healthy" id="is_healthy" class="nice-select">
                                        <option value="Yes" {{$candidatePersonalDetails->is_healthy == 'Yes' ? 'selected' : ''}}>Yes</option>
                                        <option value="No" {{$candidatePersonalDetails->is_healthy == 'No' ? 'selected' : ''}}>No</option>
                                    </select> 
                                </div>
                            </div>
                        </div>
                        {{-- <div class="row">
                            <div class="col">
                                <div class="dash-input-wrapper mb-30">
                                    <label for="">Note</label>
                                    <div id="note" class="summernote">{!! $candidatePersonalDetails->note ?? '<b>A brief explanation that these checks are essential for E2 visa requirements and obtaining teaching positions in South Korea</b>'!!}</div>
                                </div>
                            </div>
                        </div> --}}

                        <div class="d-flex flex-row justify-content-end gap-3">
                            <button type="button" class="dash-btn-one" id="visa_eligibility_check">Save</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Step 2 -->
            <div class="bg-white card-box border-20 mb-40">
                <h4 class="dash-title-three">Personal Details</h4>
                <div class="candidate-sign-up">
                    <div class="card my-3 p-3" id="step-2">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="dash-input-wrapper mb-30">
                                    <label for="">First Name</label>
                                    <input type="text" name="first_name" placeholder="First Name" value= "{{$candidatePersonalDetails->first_name ?? ''}}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="dash-input-wrapper mb-30">
                                    <label for="">Middle Name</label>
                                    <input type="text" name="middle_name" placeholder="Middle Name" value= "{{$candidatePersonalDetails->middle_name ?? ''}}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="dash-input-wrapper mb-30">
                                    <label for="">Last Name</label>
                                    <input type="text" name="last_name" placeholder="Last Name" value= "{{$candidatePersonalDetails->last_name ?? ''}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="dash-input-wrapper mb-30">
                                    <label for="">Gender</label>
                                    <select name="gender" id="gender" class="nice-select">
                                        <option value="Male" {{$candidatePersonalDetails->gender == 'Male' ? 'selected' : ''}}>Male</option>
                                        <option value="Female" {{$candidatePersonalDetails->gender == 'Female' ? 'selected' : ''}}>Female</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="dash-input-wrapper mb-30">
                                    <label for="">Date of Birth</label>
                                    <input type="date" name="dateOfBirth" placeholder="Date of birth" value = "{{$candidatePersonalDetails->date_of_birth ?? ''}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="dash-input-wrapper mb-30">
                                    <label for="">Current Location</label>
                                    <input type="text" name="currentLocation" id="currentLocation" placeholder="Current Location" value = "{{$candidatePersonalDetails->current_location ?? ''}}">
                                </div>
                            </div>
                        </div>
                        {{-- <div class="row">
                            <div class="col-md-6">
                                <div class="dash-input-wrapper mb-30">
                                    <label for="">Designation</label>
                                    <input type="text" name="candidateDesignation" id="candidateDesignation" placeholder="Designation" value = "{{$candidatePersonalDetails->designation ?? ''}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="dash-input-wrapper mb-30">
                                    <label for="">Type</label>
                                    <select name="designationType" id="designationType" class="nice-select">
                                        
                                        @if(!$jobCategories->isEmpty())
                                            @foreach($jobCategories as $jobCategory)
                                            <option value="{{$jobCategory->id}}" {{$candidatePersonalDetails->job_category_id == $jobCategory->id ? 'selected' : ''}}>{{$jobCategory->name}}</option>
                                            @endforeach
                                        @else
                                        <option value="" selected>Select</option>
                                        @endif
                                        
                                    </select>
                                </div>
                            </div>
                            
                        </div> --}}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="dash-input-wrapper mb-30">
                                    <label for="">Teaching Experience</label>
                                    <select name="ExperienceLevel" id="ExperienceLevel" class="nice-select">
                                        <option value="No Experience" {{$candidatePreferencesDetails->experience_level == 'No Experience' ? 'selected' : ''}}>No Experience</option>
                                        <option value="0-1 Year" {{$candidatePreferencesDetails->experience_level == '0-1 Year' ? 'selected' : ''}}>0-1 Year</option>
                                        <option value="1-3 Years" {{$candidatePreferencesDetails->experience_level == '1-3 Years' ? 'selected' : ''}}>1-3 Years</option>
                                        <option value="3-5 Years" {{$candidatePreferencesDetails->experience_level == '3-5 Years' ? 'selected' : ''}}>3-5 Years</option>
                                        <option value="5-7 Years" {{$candidatePreferencesDetails->experience_level == '5-7 Years' ? 'selected' : ''}}>5-7 Years</option>
                                        <option value="7-10 Years" {{$candidatePreferencesDetails->experience_level == '7-10 Years' ? 'selected' : ''}}>7-10 Years</option>
                                        <option value="10+" {{$candidatePreferencesDetails->experience_level == '10+' ? 'selected' : ''}}>10+</option>
                                    </select>
                                </div>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="dash-input-wrapper mb-30">
                                    <label for="">Profile Photo</label>
                                    <div class="user-avatar-setting d-flex align-items-center">
                                        @if($candidatePersonalDetails->profile_picture)
                                        <img src="{{asset($candidatePersonalDetails->profile_picture)}}" data-src="images/avatar_04.jpg" alt="" class="lazy-img user-img profile-photo" >
                                        @else
                                        <img src="{{asset('assets/images/avatar_04.jpg')}}" data-src="images/avatar_04.jpg" alt="" class="lazy-img user-img">
                                        @endif
                                        <div class="upload-btn position-relative tran3s ms-4 me-3">
                                            Upload profile photo
                                            <input type="file" id="uploadImg" name="profileImage" placeholder="" accept="image/png, image/jpeg">
                                        </div>
                                        <button class="delete-btn tran3s " onclick = "deleteFile('profile-photo')">Delete</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="dash-input-wrapper mb-30">
                                    <label for="">Resume</label>
                                    <div class="user-avatar-setting d-flex align-items-center mb-30">
                                        <div class="upload-btn position-relative tran3s me-3">
                                            Upload Resume PDF
                                            <input type="file" id="candidate_resume" name="candidate_resume" placeholder="" accept="application/pdf">
                                        </div>

                                        <button class="delete-btn tran3s" onclick = "deleteFile('resume-file')">Delete</button>
                                    </div>
                                    @if(isset($candidatePersonalDetails->candidate_resume) && !empty($candidatePersonalDetails->candidate_resume))
                                    <div style = "padding-left:20px;">
                                        <a class="btn btn-primary resume-file" href = "{{asset($candidatePersonalDetails->candidate_resume)}}" target = "_blank">File</a>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        

                        <div class="d-flex flex-row justify-content-end gap-3">
                            <button type="button"  class="dash-btn-one" id = "candidate-personal-details">Save</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Step 3 -->
            <div class="bg-white card-box border-20 mb-40">
                <h4 class="dash-title-three">Education</h4>
                <div class="candidate-sign-up">
                    <div class="card my-3 p-3" id="step-3">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="dash-input-wrapper mb-30">
                                    <label for="">Education</label>
                                    <select name="highestDegreeObtained" id="highestDegreeObtained" class="nice-select">
                                        <option value="High School Diploma/GED" {{$candidateEducationalDetails->highest_degree == 'High School Diploma/GED' ? 'selected' : ''}}>High School Diploma/GED</option>
                                        <option value="Associate's Degree" {{$candidateEducationalDetails->highest_degree == "Associate's Degree" ? 'selected' : ''}}>Associate's Degree</option>
                                        <option value="Bachelor's Degree" {{$candidateEducationalDetails->highest_degree == "Bachelor's Degree" ? 'selected' : ''}}>Bachelor's Degree</option>
                                        <option value="Master's Degree" {{$candidateEducationalDetails->highest_degree == "Master's Degree" ? 'selected' : ''}}>Master's Degree</option>
                                        <option value="Doctorate/Ph.D." {{$candidateEducationalDetails->highest_degree == "Doctorate/Ph.D." ? 'selected' : ''}}>Doctorate/Ph.D.</option>
                                        <option value="Professional Certification" {{$candidateEducationalDetails->highest_degree == "Professional Certification" ? 'selected' : ''}}>Professional Certification</option>
                                        <option value="Vocational Training" {{$candidateEducationalDetails->highest_degree == 'Vocational Training' ? 'selected' : ''}}>Vocational Training</option>
                                        <option value="Other (Please Specify)" {{$candidateEducationalDetails->highest_degree == "Other (Please Specify)" ? 'selected' : ''}}>Other (Please Specify)</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="dash-input-wrapper mb-30">
                                    <label for="">Qualification Obtained</label>
                                    <select name="fieldOfStudy" id="fieldOfStudy" class="nice-select">
                                        <option value="Bachelor Of Arts" {{$candidateEducationalDetails->field_of_study == 'Bachelor Of Arts' ? 'selected' : ''}}>Bachelor Of Arts</option>
                                        <option value="Engineering" {{$candidateEducationalDetails->field_of_study == 'Engineering' ? 'selected' : ''}}>Engineering</option>
                                        <option value="MBBS" {{$candidateEducationalDetails->field_of_study == 'MBBS' ? 'selected' : ''}}>MBBS</option>
                                        <option value="Business" {{$candidateEducationalDetails->field_of_study == 'Business' ? 'selected' : ''}}>Business</option>
                                        <option value="Arts" {{$candidateEducationalDetails->field_of_study == 'Arts' ? 'selected' : ''}}>Arts</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="dash-input-wrapper mb-30">
                                    <label for="">University/College Name</label>
                                    <input type="text" name="universityCollegeNameCountry" placeholder="Name of College or Univesity" value = "{{$candidateEducationalDetails->institute_name ?? ''}}">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="dash-input-wrapper mb-30">
                                    <label for="">Country</label>
                                    <select name="instituteCountry" id="instituteCountry" class="nice-select">
                                        @foreach($countries as $country)
                                        <option value="{{$country->id}}" {{$candidateEducationalDetails->country_id == $country->id ? 'selected' : ''}}>{{$country->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="dash-input-wrapper mb-30">
                                    <label for="">Year Graduated</label>
                                    <input type="number" name="yearsOfTeachingExperience" class="number-input" placeholder="Year Graduated" value = "{{$candidateEducationalDetails->teaching_experiance ?? ''}}">

                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="dash-input-wrapper mb-30">
                                    <label for="">TEFL/TESOL Certification</label>
                                    <select name="TEFLTESOLCertification" id="TEFLTESOLCertification" class="nice-select">
                                        <option value="Yes" {{$candidateEducationalDetails->tefl_tesol_clarification == 'Yes' ? 'selected' : ''}}>Yes</option>
                                        <option value="No" {{$candidateEducationalDetails->tefl_tesol_clarification == 'No' ? 'selected' : ''}}>No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="dash-input-wrapper mb-30">
                                    <label for="">Previous Teaching in Korea</label>
                                    <select name="previousTeachingInKorea" id="previousTeachingInKorea" class="nice-select">
                                        <option value="Yes" {{$candidateEducationalDetails->prevous_teaching_in_korea == 'Yes' ? 'selected' : ''}}>Yes</option>
                                        <option value="No" {{$candidateEducationalDetails->prevous_teaching_in_korea == 'No' ? 'selected' : ''}}>No</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        @if(isset($candidateEducationalDetails->educational_details))
                        @foreach($candidateEducationalDetails->educational_details as $index=>$educational_detail)
                            @if($index == 0)
                            <div  id="candidate-education" class="educational-details-row">
                                    <center><h3>Educational Details</h3></center>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="dash-input-wrapper mb-30">
                                            <label for="">Degree</label>
                                            <input type="text" name="education[{{$index}}][degree]" placeholder="" value = "{{$educational_detail['degree'] ?? ''}}">

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="dash-input-wrapper mb-30">
                                            <label for="">Institution</label>
                                            <input type="text" name="education[{{$index}}][institution]" placeholder="" value = "{{$educational_detail['institution'] ?? ''}}">

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="dash-input-wrapper mb-30">
                                            <label for="">Description</label>
                                            <input type="text" name="education[{{$index}}][description]" placeholder="" value = "{{$educational_detail['description'] ?? ''}}">

                                        </div>
                                    </div>
                                    <div class="col-md-2 pt-4">
                                        <div class="dash-input-wrapper mb-30">
                                            <button type="button" class="btn btn-danger remove-tr" >Remove</button>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            @else
                            <div  class="educational-details-row">
                                    <center><h3>Educational Details</h3></center>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="dash-input-wrapper mb-30">
                                            <label for="">Degree</label>
                                            <input type="text" name="education[{{$index}}][degree]" placeholder="" value = "{{$educational_detail['degree'] ?? ''}}">

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="dash-input-wrapper mb-30">
                                            <label for="">Institution</label>
                                            <input type="text" name="education[{{$index}}][institution]" placeholder="" value = "{{$educational_detail['institution'] ?? ''}}">

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="dash-input-wrapper mb-30">
                                            <label for="">Description</label>
                                            <input type="text" name="education[{{$index}}][description]" placeholder="" value = "{{$educational_detail['description'] ?? ''}}">

                                        </div>
                                    </div>
                                    <div class="col-md-2 pt-4">
                                        <div class="dash-input-wrapper mb-30">
                                            <button type="button" class="btn btn-danger remove-tr" >Remove</button>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        @endif
                        @endforeach
                        @else
                        <div  id="candidate-education">
                            
                        </div>
                        @endif
                        <div class="d-flex flex-row justify-content-start gap-3">
                                <button type="button" class="dash-btn-one" id="add-more-education" >add more</button>
                        </div>

                        <div class="d-flex flex-row justify-content-end gap-3">
                            <button type="button" class="dash-btn-one" id="candidate-educational-details">Save</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Step 4 -->
            <div class="bg-white card-box border-20 mb-40">
                <h4 class="dash-title-three">Professional Details</h4>
                <div class="candidate-sign-up">
                    <div class="card my-3 p-3" id="step-4">
                        @if(isset($candidateEducationalDetails->professional_details))
                        @foreach($candidateEducationalDetails->professional_details as $index=>$professional_details)
                            @if($index==0)
                        <div id="candidate-experience" >
                                <center><h3>Experience Details</h3></center>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="dash-input-wrapper mb-30">
                                        <label for="">Role</label>
                                        <input type="text" name="experience[{{$index}}][role]" placeholder="" value = "{{$professional_details['role'] ?? ''}}">

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="dash-input-wrapper mb-30">
                                        <label for="">Employer Name</label>
                                        <input type="text" name="experience[{{$index}}][employer_name]" placeholder="" value = "{{$professional_details['employer_name'] ?? ''}}">

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="dash-input-wrapper mb-30">
                                        <label for="">Date From</label>
                                        <input type="date" name="experience[{{$index}}][date_from]" placeholder="" value = "{{($professional_details['date_from']) ?? ''}}">

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="dash-input-wrapper mb-30">
                                        <label for="">Date To</label>
                                        <input type="date" name="experience[{{$index}}][date_to]" placeholder="" value = "{{$professional_details['date_to'] ?? ''}}">

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="dash-input-wrapper mb-30">
                                        <label for="">Description</label>
                                        <textarea  name="experience[{{$index}}][description]" value="" class="summernote">{!! $professional_details['description'] ?? '' !!}</textarea>
                                        {{-- <input type="text" name="experience[{{$index}}][description]" placeholder="" value = "{{$professional_details['description'] ?? ''}}"> --}}

                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        @else
                        <div class="candidate-experience-details">
                                <center><h3>Experience Details</h3></center>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="dash-input-wrapper mb-30">
                                        <label for="">Role</label>
                                        <input type="text" name="experience[{{$index}}][role]" placeholder="" value = "{{$professional_details['role'] ?? ''}}">

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="dash-input-wrapper mb-30">
                                        <label for="">Employer Name</label>
                                        <input type="text" name="experience[{{$index}}][employer_name]" placeholder="" value = "{{$professional_details['employer_name'] ?? ''}}">

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="dash-input-wrapper mb-30">
                                        <label for="">Date From</label>
                                        <input type="date" name="experience[{{$index}}][date_from]" placeholder="" value = "{{($professional_details['date_from']) ?? ''}}">

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="dash-input-wrapper mb-30">
                                        <label for="">Date To</label>
                                        <input type="date" name="experience[{{$index}}][date_to]" placeholder="" value = "{{$professional_details['date_to'] ?? ''}}">

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="dash-input-wrapper mb-30">
                                        <label for="">Description</label>
                                        <div  name="experience[{{$index}}][description]" value="" class="summernote">{!! $professional_details['description'] ?? '' !!}</div>
                                        {{-- <input type="text" name="experience[{{$index}}][description]" placeholder="" value = "{{$professional_details['description'] ?? ''}}"> --}}

                                    </div>
                                </div>
                                <div class="col-md-2 pt-4">
                                    <div class="dash-input-wrapper mb-30">
                                    <button type="button" class="btn btn-danger remove-tr" >Remove</button>

                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        @endif
                        @endforeach
                        @else
                        <div id="candidate-experience" >
                                <center><h3>Experience Details</h3></center>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="dash-input-wrapper mb-30">
                                        <label for="">Role</label>
                                        <input type="text" name="experience[0][role]" placeholder="" value = "{{$professional_details['role'] ?? ''}}">

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="dash-input-wrapper mb-30">
                                        <label for="">Employer Name</label>
                                        <input type="text" name="experience[0][employer_name]" placeholder="" value = "{{$professional_details['role'] ?? 'employer_name'}}">

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="dash-input-wrapper mb-30">
                                        <label for="">Date From</label>
                                        <input type="date" name="experience[0][date_from]" placeholder="" value = "{{($professional_details['date_from']) ?? ''}}">

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="dash-input-wrapper mb-30">
                                        <label for="">Date To</label>
                                        <input type="date" name="experience[0][date_to]" placeholder="" value = "{{$professional_details['date_to'] ?? ''}}">

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="dash-input-wrapper mb-30">
                                        <label for="">Description</label>
                                        <div  name="experience[0][description]" value="" class="summernote">{!! $professional_details['description'] ?? '' !!}</div>
                                        {{-- <input type="text" name="experience[0][description]" placeholder="" value = "{{$professional_details['description'] ?? ''}}"> --}}

                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        @endif
                            <div class="d-flex flex-row justify-content-start gap-3">
                                <button type="button" class="dash-btn-one" id="add-more-experience" >add more</button>
                            </div>
                        <div class="d-flex flex-row justify-content-end gap-3">
                            <button type="button" class="dash-btn-one" id="candidate-professional-details">Save</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Step 5 -->
            <div class="bg-white card-box border-20 mb-40">
                <h4 class="dash-title-three">Preferences</h4>
                <div class="candidate-sign-up">
                    <div class="card my-3 p-3" id="step-5">
                            
                        <div class="row">
                            <!-- <div class="col-md-6">
                                <div class="dash-input-wrapper mb-30">
                                    <label for="">Skills</label>
                                    <select name="professionalSkills" id="professionalSkills" class="nice-select" multiple>
                                        <option value= "" {{$candidatePreferencesDetails->skills == '' ? 'selected' : ''}}>Select</option>
                                        @isset($professionalSkills)
                                        @foreach($professionalSkills as $professionalSkill)
                                        <option value="{{$professionalSkill->id}}" {{$candidatePreferencesDetails->skills == $professionalSkill->id ? 'selected' : ''}}>{{$professionalSkill->name}}</option>
                                        @endforeach
                                        @endisset
                                    </select>
                                </div>
                            </div> -->
                            <div class="col-md-6">
                                <div class="dash-input-wrapper mb-30">
                                    <label for="">Preferred City/Region in South Korea</label>
                                    {{-- <input type="text" name="preferredCityRegionInSouthKorea" id="preferredCityRegionInSouthKorea" placeholder="Preferred City/Region in South Korea" value = "{{$candidatePreferencesDetails->preferred_city_region ?? ''}}"> --}}
                                    @php
                                        $location = explode("," ,$candidatePreferencesDetails->preferred_city_region);
                                    @endphp
                                    <select name="preferredCityRegionInSouthKorea" id="preferredCityRegionInSouthKorea" multiple>
                                        <option value="Seoul" {{$candidatePreferencesDetails->preferred_city_region && in_array("Seoul" , $location) ? 'selected' : ''}}>Seoul</option>
                                        <option value="Busan"  {{$candidatePreferencesDetails->preferred_city_region && in_array("Busan" , $location) ? 'selected' : ''}}>Busan</option>
                                        <option value="Incheon" {{$candidatePreferencesDetails->preferred_city_region && in_array("Incheon" , $location) ? 'selected' : ''}}>Incheon</option>
                                        <option value="Daegu" {{$candidatePreferencesDetails->preferred_city_region && in_array("Daegu" , $location) ? 'selected' : ''}}>Daegu</option>
                                        <option value="Daejeon" {{$candidatePreferencesDetails->preferred_city_region && in_array("Daejeon" , $location) ? 'selected' : ''}}>Daejeon</option>
                                        <option value="Gwangju" {{$candidatePreferencesDetails->preferred_city_region && in_array("Gwangju" , $location) ? 'selected' : ''}}>Gwangju</option>
                                        <option value="Ulsan" {{$candidatePreferencesDetails->preferred_city_region && in_array("Ulsan" , $location) ? 'selected' : ''}}>Ulsan</option>
                                        <option value="Suwon" {{$candidatePreferencesDetails->preferred_city_region && in_array("Suwon" , $location) ? 'selected' : ''}}>Suwon</option>
                                        <option value="Gyeonggi Province" {{$candidatePreferencesDetails->preferred_city_region && in_array("Gyeonggi Province" , $location) ? 'selected' : ''}}>Gyeonggi Province</option>
                                        <option value="Gangwon Province" {{$candidatePreferencesDetails->preferred_city_region && in_array("Gangwon Province" , $location) ? 'selected' : ''}}>Gangwon Province</option>
                                        <option value="Chungcheong Province" {{$candidatePreferencesDetails->preferred_city_region && in_array("Chungcheong Province" , $location) ? 'selected' : ''}}>Chungcheong Province</option>
                                        <option value="Gyeongsang Province" {{$candidatePreferencesDetails->preferred_city_region && in_array("Gyeongsang Province" , $location) ? 'selected' : ''}}>Gyeongsang Province</option>
                                        <option value="Jeolla Province" {{$candidatePreferencesDetails->preferred_city_region && in_array("Jeolla Province" , $location) ? 'selected' : ''}}>Jeolla Province</option>
                                        <option value="Jeju Special Self-Governing Province" {{$candidatePreferencesDetails->preferred_city_region && in_array("Jeju Special Self-Governing Province" , $location) ? 'selected' : ''}}>Jeju Special Self-Governing Province</option>
                                        <option value="Other Please Specify" {{$candidatePreferencesDetails->preferred_city_region && in_array("Other Please Specify" , $location) ? 'selected' : ''}}>Other Please Specify</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="dash-input-wrapper mb-30">
                                    <label for="">Preferences</label>
                                    <select name="schoolTypePreference" id="schoolTypePreference" class="nice-select">
                                        <option value= "" {{$candidatePreferencesDetails->school_type == '' ? 'selected' : ''}}>Select</option>
                                        <option value="Public"  {{$candidatePreferencesDetails->school_type == 'Public' ? 'selected' : ''}}>Public</option>
                                        <option value="Private" {{$candidatePreferencesDetails->school_type == 'Private' ? 'selected' : ''}}>Private</option>
                                        <option value="Hagwon" {{$candidatePreferencesDetails->school_type == 'Hagwon' ? 'selected' : ''}}>Hagwon</option>
                                        <option value="University" {{$candidatePreferencesDetails->school_type == 'University' ? 'selected' : ''}}>University</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            
                            <div class="col-md-6">
                                <div class="dash-input-wrapper mb-30">
                                    <label for="">Age Group Preference</label>
                                    <select name="ageGroupPreference" id="ageGroupPreference" class="nice-select">
                                        <option value= "" {{$candidatePreferencesDetails->age_group == '' ? 'selected' : ''}}>Select</option>
                                        <option value="Kindergarten" {{$candidatePreferencesDetails->age_group == 'Kindergarten' ? 'selected' : ''}}>Kindergarten</option>
                                        <option value="Elementary" {{$candidatePreferencesDetails->age_group == 'Elementary' ? 'selected' : ''}} >Elementary</option>
                                        <option value="Middle School" {{$candidatePreferencesDetails->age_group == 'Middle School' ? 'selected' : ''}}>Middle School</option>
                                        <option value="High School" {{$candidatePreferencesDetails->age_group == 'High School' ? 'selected' : ''}}>High School</option>
                                        <option value="Adults" {{$candidatePreferencesDetails->age_group == 'Adults' ? 'selected' : ''}}>Adults</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="dash-input-wrapper mb-30">
                                    <label for="">Salary Expectations</label>
                                    <select value= "" name="salaryExpectations" id="salaryExpectations" class="nice-select">
                                        <option value="Under 2,000,000 KRW/month" {{$candidatePreferencesDetails->expected_salary == 'Under 2,000,000 KRW/month' ? 'selected' : ''}}>Under 2,000,000 KRW/month</option>
                                        <option value="2,000,000 - 2,999,999 KRW/month" {{$candidatePreferencesDetails->expected_salary == '2,000,000 - 2,999,999 KRW/month' ? 'selected' : ''}}>2,000,000 - 2,999,999 KRW/month/option>
                                        <option value="3,000,000 - 3,999,999 KRW/month" {{$candidatePreferencesDetails->expected_salary == '3,000,000 - 3,999,999 KRW/month' ? 'selected' : ''}}>3,000,000 - 3,999,999 KRW/month</option>
                                        <option value="4,000,000 - 4,999,999 KRW/month" {{$candidatePreferencesDetails->expected_salary == '4,000,000 - 4,999,999 KRW/month' ? 'selected' : ''}}>4,000,000 - 4,999,999 KRW/month</option>
                                        <option value="5,000,000 - 5,999,999 KRW/month" {{$candidatePreferencesDetails->expected_salary == '5,000,000 - 5,999,999 KRW/month' ? 'selected' : ''}}>5,000,000 - 5,999,999 KRW/month</option>
                                        <option value="6,000,000 - 6,999,999 KRW/month" {{$candidatePreferencesDetails->expected_salary == '6,000,000 - 6,999,999 KRW/month' ? 'selected' : ''}}>6,000,000 - 6,999,999 KRW/month</option>
                                        <option value="7,000,000 - 7,999,999 KRW/month" {{$candidatePreferencesDetails->expected_salary == '7,000,000 - 7,999,999 KRW/month' ? 'selected' : ''}}>7,000,000 - 7,999,999 KRW/month</option>
                                        <option value="8,000,000 - 8,999,999 KRW/month" {{$candidatePreferencesDetails->expected_salary == '8,000,000 - 8,999,999 KRW/month' ? 'selected' : ''}}>8,000,000 - 8,999,999 KRW/month</option>
                                        <option value="9,000,000 - 9,999,999 KRW/month" {{$candidatePreferencesDetails->expected_salary == '9,000,000 - 9,999,999 KRW/month' ? 'selected' : ''}}>9,000,000 - 9,999,999 KRW/month</option>
                                        <option value="10,000,000 KRW and above/month" {{$candidatePreferencesDetails->expected_salary == '10,000,000 KRW and above/month' ? 'selected' : ''}}>10,000,000 KRW and above/month</option>
                                        <option value="Negotiable" {{$candidatePreferencesDetails->expected_salary == 'Negotiable' ? 'selected' : ''}}>Negotiable</option>
                                        <option value="Other (Please Specify)" {{$candidatePreferencesDetails->expected_salary == 'Other (Please Specify)' ? 'selected' : ''}}>Other (Please Specify)</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="dash-input-wrapper mb-30">
                                    <div class="dash-input-wrapper mb-30">
                                        <label for="">Preferred Start Date</label>
                                        <input type="date" name="preferredStartDate" placeholder="" value="{{$candidatePreferencesDetails->preferred_start_date}}">

                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        {{-- <div class="row " id="add-skill-field">
                                @if(isset($candidatePreferencesDetails->skills))
                                @foreach($candidatePreferencesDetails->skills as $index=>$skill)
                                @if($index==0)
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="dash-input-wrapper mb-30">
                                            <label for="">Skills</label>
                                            <input type="text" name="skill[]" id="professionalSkills" placeholder="Add Skill" value = "{{$skill ?? ''}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-4">
                                        <div class="dash-input-wrapper mb-30">
                                            <button type="button" name="add" id="add" class="btn btn-success">Add More</button>
                                        </div>
                                    </div>
                                </div>
                                @else
                                <div class="row skill-field-row">
                                    <div class="col-md-6">
                                        <div class="dash-input-wrapper mb-30">
                                            <input type="text" name="skill[]"  placeholder="Add Skill" value = "{{$skill ?? ''}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="dash-input-wrapper mb-30">
                                            <button type="button" class="btn btn-danger remove-tr">Remove</button>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @endforeach
                                @else
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="dash-input-wrapper mb-30">
                                            <label for="">Skills</label>
                                            <input type="text" name="skill[]" id="professionalSkills" placeholder="Add Skill" value = "{{$candidatePersonalDetails->preferred_city_region ?? ''}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-4">
                                        <div class="dash-input-wrapper mb-30">
                                            <button type="button" name="add" id="add" class="btn btn-success">Add More</button>
                                        </div>
                                    </div>
                                </div>
                                @endif
                        </div> --}}

                        <div class="d-flex flex-row justify-content-end gap-3">
                            <button type="button" class="dash-btn-one" id = "candidate-preferences-details">Save</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Step 6 -->
            <div class="bg-white card-box border-20 mb-40">
             <h4 class="dash-title-three">Introduction</h4>
                <div class="candidate-sign-up">
                    <div class="card my-3 p-3" id="step-6">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="dash-input-wrapper mb-30">
                                    <label for="">Bio/Introduction</label>
                                    <textarea  name="bioIntroduction"  >{{$candidatePersonalDetails->introduction ?? ''}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="dash-input-wrapper mb-30">
                                    <label for="">What motivates you interest in teaching in South Korea?</label>
                                    <textarea  name="whyInterestedInTeachingInSouthKorea"  >{{$candidatePersonalDetails->why_interested_teaching_in_korea ?? ''}}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="dash-input-wrapper mb-30">
                                    <label for="">Language Proficiency</label>
                                    <select name="languageProficiency" class="nice-select">
                                        <option value="Native/Bilingual Proficiency">Native/Bilingual Proficiency</option>
                                        <option value="Fluent">Fluent</option>
                                        <option value="Advanced">Advanced</option>
                                        <option value="Intermediate">Intermediate</option>
                                        <option value="Basic">Basic</option>
                                        <option value="None">None</option>
                                    </select>
                                    {{-- <textarea  name="languageProficiency"  >{{$candidatePersonalDetails->language_proficiency ?? ''}}</textarea> --}}
                                </div>
                            </div>
                        </div>

                        <div class="d-flex flex-row justify-content-end gap-3">
                            <button type="button" class="dash-btn-one" id= "candidate-introduction-details">Save</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Step 7 -->
            <div class="bg-white card-box border-20 mb-40">
               <h4 class="dash-title-three">Uploads</h4>
                <div class="candidate-sign-up">
                    <div class="card my-3 p-3" id="step-7">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="dash-input-wrapper mb-30">
                                    <label for="">Teaching Video</label>
                                    <div class="user-avatar-setting d-flex align-items-center mb-30">
                                        <div class="upload-btn position-relative tran3s ms-4 me-3">
                                            Upload a 30-Second Introduction Video
                                            <input type="file" id="teachingVideo" name="teachingVideo" placeholder="" accept="video/mp4" onchange="previewVideo()">
                                        </div>

                                        <button class="delete-btn tran3s " onclick = "deleteFile('video-url')">Delete</button>
                                    </div>
                                    <video id="videoPreview" class = "d-none" width="320" height="240" controls></video>
                                    @if(isset($candidatePreferencesDetails->video_url) && !empty($candidatePreferencesDetails->video_url))
                                    <div style = "padding-left:20px;" class = "mt-2 video-url">
                                        <a class="btn btn-primary" href = "{{asset($candidatePreferencesDetails->video_url)}}" target = "_blank">File</a>
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
                                    @if(isset($candidatePreferencesDetails->video_thumbnail) && !empty($candidatePreferencesDetails->video_thumbnail))
                                    <div style = "padding-left:20px;" class = "thumbnail-image">
                                        <a class="btn btn-primary" href = "{{asset($candidatePreferencesDetails->video_thumbnail)}}" target = "_blank">File</a>
                                    </div>
                                    @endif
                                </div>
                                {{-- <div class="dash-input-wrapper mb-30">
                                    <label for="">Link to VideoAsk</label>
                                    <input type="text" name="linkToVideoAsk" placeholder="A direct link or button that takes them to the VideoAsk platform to record or upload their video (this is mandatory but can be completed after the sign-up as well)" value = "{{$candidatePreferencesDetails->other_platform_video_url ?? ''}}">
                                </div> --}}
                                    {{-- @if(isset($candidatePreferencesDetails->other_platform_video_url) && !empty($candidatePreferencesDetails->other_platform_video_url))
                                    <div style = "padding-left:20px;">
                                        <a class="btn btn-primary" href = "{{$candidatePreferencesDetails->other_platform_video_url}}" target = "_blank">Link</a>
                                    </div>
                                    @endif --}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                {{-- <div class="dash-input-wrapper mb-30">
                                    <label for="">Video Thumbnail Image</label>
                                    <div class="user-avatar-setting d-flex align-items-center mb-30">
                                        <div class="upload-btn position-relative tran3s ms-4 me-3">
                                            Upload Thumbnail
                                            <input type="file" id="videoThumbnail" name="videoThumbnail" placeholder="" accept="image/jpeg,image/png">
                                        </div>

                                        <button class="delete-btn tran3s " onclick = "deleteFile('thumbnail-image')">Delete</button>
                                    </div>
                                    @if(isset($candidatePreferencesDetails->video_thumbnail) && !empty($candidatePreferencesDetails->video_thumbnail))
                                    <div style = "padding-left:20px;" class = "thumbnail-image">
                                        <a class="btn btn-primary" href = "{{asset($candidatePreferencesDetails->video_thumbnail)}}" target = "_blank">File</a>
                                    </div>
                                    @endif
                                </div> --}}
                            </div>
                        </div>
                        @php
                        $degree = $candidateDocuments->first(function($document){
                            return $document->document_type === 1;
                        });

                        $policeCertificate = $candidateDocuments->first(function($document){
                            return $document->document_type === 2;
                        });

                        $degreeApostilled = $candidateDocuments->first(function($document){
                            return $document->document_type === 3;
                        });

                        $certificateApostilled = $candidateDocuments->first(function($document){
                            return $document->document_type === 4;
                        });

                        $saqaLetter = $candidateDocuments->first(function($document){
                            return $document->document_type === 5;
                        });

                        $passport = $candidateDocuments->first(function($document){
                            return $document->document_type === 6;
                        });
                        @endphp 
                        <div class="row">
                            <div class="col-md-6">
                                <div class="dash-input-wrapper mb-30">
                                    <label for="">Copy of your Degree</label>
                                    <div class="user-avatar-setting d-flex align-items-center mb-30">
                                        <div class="upload-btn position-relative tran3s ms-4 me-3">
                                            Upload Degree
                                            <input type="file" id="degree" name="degree" placeholder="" accept="image/jpeg,image/png,.docx,.doc,.txt,.pdf">
                                        </div>

                                        <button class="delete-btn tran3s delete-doc" @if(isset($degree)) data-doc-id="{{$degree->id}}" @endif>Delete</button>
                                    </div>
                                    @if(isset($degree))
                                    <div style = "padding-left:20px;" class="thumbnail-image">
                                        <a class="btn btn-primary" href = "{{asset($degree->url)}}" target = "_blank">File</a>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="dash-input-wrapper mb-30">
                                    <label for="">Copy of your Police Certificate (Within Last 6 Months)</label>
                                    <div class="user-avatar-setting d-flex align-items-center mb-30">
                                        <div class="upload-btn position-relative tran3s ms-4 me-3">
                                            Upload Certificate
                                            <input type="file" id="policeCertificate" name="degree" placeholder="" accept="image/jpeg,image/png,.docx,.doc,.txt,.pdf">
                                        </div>

                                        <button class="delete-btn tran3s delete-doc" @if(isset($policeCertificate)) data-doc-id="{{$policeCertificate->id}}" @endif>Delete</button>
                                    </div>
                                    @if(isset($policeCertificate))
                                    <div style = "padding-left:20px;" class="thumbnail-image">
                                        <a class="btn btn-primary" href = "{{asset($policeCertificate->url)}}" target = "_blank">File</a>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                <div class="dash-input-wrapper mb-30">
                                    <label for="">Copy of your Degree Apostille</label>
                                    <div class="user-avatar-setting d-flex align-items-center mb-30">
                                        <div class="upload-btn position-relative tran3s ms-4 me-3">
                                            Upload Degree Apostille
                                            <input type="file" id="degreeApostille" name="degree" placeholder="" accept="image/jpeg,image/png,.docx,.doc,.txt,.pdf">
                                        </div>

                                        <button class="delete-btn tran3s delete-doc"  @if(isset($degreeApostilled)) data-doc-id="{{$degreeApostilled->id}}" @endif>Delete</button>
                                    </div>
                                    @if(isset($degreeApostilled))
                                    <div style = "padding-left:20px;" class="thumbnail-image">
                                        <a class="btn btn-primary" href = "{{asset($degreeApostilled->url)}}" target = "_blank">File</a>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="dash-input-wrapper mb-30">
                                    <label for="">Copy of your Certificate Apostille</label>
                                    <div class="user-avatar-setting d-flex align-items-center mb-30">
                                        <div class="upload-btn position-relative tran3s ms-4 me-3">
                                            Upload Certificate Apostille
                                            <input type="file" id="certificateApostille" name="degree" placeholder="" accept="image/jpeg,image/png,.docx,.doc,.txt,.pdf">
                                        </div>

                                        <button class="delete-btn tran3s delete-doc"  @if(isset($certificateApostilled)) data-doc-id="{{$certificateApostilled->id}}" @endif>Delete</button>
                                    </div>
                                    @if(isset($certificateApostilled))
                                    <div style = "padding-left:20px;" class="thumbnail-image">
                                        <a class="btn btn-primary" href = "{{asset($certificateApostilled->url)}}" target = "_blank">File</a>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                <div class="dash-input-wrapper mb-30">
                                    <label for="">SAQA Letter (Only For South Africa)</label>
                                    <div class="user-avatar-setting d-flex align-items-center mb-30">
                                        <div class="upload-btn position-relative tran3s ms-4 me-3">
                                            Upload SAQA Letter
                                            <input type="file" id="saqaLetter" name="degree" placeholder="" accept="image/jpeg,image/png,.docx,.doc,.txt,.pdf">
                                        </div>

                                        <button class="delete-btn tran3s delete-doc"  @if(isset($saqaLetter)) data-doc-id="{{$saqaLetter->id}}" @endif>Delete</button>
                                    </div>
                                    @if(isset($saqaLetter))
                                    <div style = "padding-left:20px;" class="thumbnail-image">
                                        <a class="btn btn-primary" href = "{{asset($saqaLetter->url)}}" target = "_blank">File</a>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="dash-input-wrapper mb-30">
                                    <label for="">Copy of your Passport</label>
                                    <div class="user-avatar-setting d-flex align-items-center mb-30">
                                        <div class="upload-btn position-relative tran3s ms-4 me-3">
                                            Upload passport
                                            <input type="file" id="userPassport" name="degree" placeholder="" accept="image/jpeg,image/png,.docx,.doc,.txt,.pdf">
                                        </div>

                                        <button class="delete-btn tran3s delete-doc"  @if(isset($passport)) data-doc-id="{{$passport->id}}" @endif>Delete</button>
                                    </div>
                                    @if(isset($passport))
                                    <div style = "padding-left:20px;" class="thumbnail-image">
                                        <a class="btn btn-primary" href = "{{asset($passport->url)}}" target = "_blank">File</a>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-12">
                                    <p>Please note: If all the above documents are uploaded and approved, your account will considered "verified". 
                                        This means employers can feel confident that they are serious and ready to start.
                                    </p>
                            </div>
                            <div class="col-12">
                                <p>Documents are only for verfication and visa purposes. If you have not obtained the documents, we suggest doing
                                    doing so visa applications can be a lengthy process.

                                </p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                    <input type="checkbox" name="terms_and_conditions" id="preferences_terms_and_conditions" @if($candidatePreferencesDetails->terms_and_conditions) checked @endif>
                                    <label for="preferences_terms_and_conditions"><strong>Terms And Conditions</strong></label>
                            </div>
                        </div>


                        <div class="d-flex flex-row justify-content-end gap-3">
                            <button type="button" class="dash-btn-one" id="teaching-video-details">Save</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Step 8 -->
            {{-- <div class="card my-3 p-3" id="step-8">
                <div class="row">
                    <div class="col">
                        <div class="dash-input-wrapper mb-30">
                            <label for="">Criminal Background Check</label>
                            <input type="text" name="criminalBackgroundCheck" value = "{{$candidatePersonalDetails->criminal_background ?? ''}}" placeholder="A note that this will be required later for the E2 visa, so they should be prepared to provide it upon job offer. The document must be apostilled and no older than 6 months">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="dash-input-wrapper mb-30">
                            <label for="">Apostille Degree</label>
                            <label for="">Must be mailed to the employer along with the criminal back
                                check upon signing of the final employment contract.</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="dash-input-wrapper mb-30">
                            <label for="">Health Declaration</label>
                            <input type="text" name="healthDeclaration2" value = "{{$candidatePersonalDetails->health_declaration ?? ''}}" placeholder="A short note or checkbox stating they have no health conditions that would impede teaching or living abroad.">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="dash-input-wrapper mb-30">
                            <label for="">Terms and Conditions</label>
                            <input type="text" name="TermsAndConditions" value = "{{$candidatePersonalDetails->terms_and_conditions ?? ''}}" placeholder="Including a privacy clause about how their data will be used.">
                        </div>
                    </div>
                </div>

                <div class="d-flex flex-row justify-content-end gap-3">
                    <button type="button" class="dash-btn-one" onclick="previousStep(8)">Previous</button>
                    <button type="submit" class="dash-btn-one" id = "legal-verification-details">Submit</button>
                </div>
            </div> --}}
        </form>

        <!-- <div class="bg-white card-box border-20">
            <div class="user-avatar-setting d-flex align-items-center mb-30">
                <img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/avatar_02.jpg')}}" alt="" class="lazy-img user-img">
                <div class="upload-btn position-relative tran3s ms-4 me-3">
                    Upload new photo
                    <input type="file" id="uploadImg" name="uploadImg" placeholder="">
                </div>
                <button class="delete-btn tran3s">Delete</button>
            </div>
            <div class="dash-input-wrapper mb-30">
                <label for="">Full Name*</label>
                <input type="text" placeholder="Md Rashed Kabir">
            </div>
            <div class="dash-input-wrapper">
                <label for="">Bio*</label>
                <textarea class="size-lg" placeholder="Write something interesting about you...."></textarea>
                <div class="alert-text">Brief description for your profile. URLs are hyperlinked.</div>
            </div>
        </div> -->

        <!-- <div class="bg-white card-box border-20 mt-40">
            <h4 class="dash-title-three">Social Media</h4>

            <div class="dash-input-wrapper mb-20">
                <label for="">Network 1</label>
                <input type="text" placeholder="https://www.facebook.com/zubayer0145">
            </div>
            <div class="dash-input-wrapper mb-20">
                <label for="">Network 2</label>
                <input type="text" placeholder="https://twitter.com/FIFAcom">
            </div>
            <a href="#" class="dash-btn-one"><i class="bi bi-plus"></i> Add more link</a>
        </div> -->

        <!-- <div class="bg-white card-box border-20 mt-40">
            <h4 class="dash-title-three">Address & Location</h4>
            <div class="row">
                <div class="col-12">
                    <div class="dash-input-wrapper mb-25">
                        <label for="">Address*</label>
                        <input type="text" placeholder="Cowrasta, Chandana, Gazipur Sadar">
                    </div>
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
                </div>
                <div class="col-lg-3">
                    <div class="dash-input-wrapper mb-25">
                        <label for="">Zip Code*</label>
                        <input type="number" placeholder="1708">
                    </div>
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
                </div>
                <div class="col-12">
                    <div class="dash-input-wrapper mb-25">
                        <label for="">Map Location*</label>
                        <div class="position-relative">
                            <input type="text" placeholder="XC23+6XC, Moiran, N105">
                            <button class="location-pin tran3s"><img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/dashboard-icon/icon_16.svg')}}" alt="" class="lazy-img m-auto"></button>
                        </div>
                        <div class="map-frame mt-30">
                            <div class="gmap_canvas h-100 w-100">
                                <iframe class="gmap_iframe h-100 w-100" src="https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&amp;q=dhaka collage&amp;t=&amp;z=12&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

        <!-- <div class="button-group d-inline-flex align-items-center mt-30">
            <a href="#" class="dash-btn-two tran3s me-3">Save</a>
            <a href="#" class="dash-cancel-btn tran3s">Cancel</a>
        </div> -->
    </div>
</div>
@push('page-script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    let currentStep = 1;


    document.getElementById("multi-step-form").addEventListener("submit", function(event) {
        event.preventDefault();
        var formData = new FormData(this);
        var formDataObject = {};
        formData.forEach(function(value, key) {
            formDataObject[key] = value;
        });
        console.log(formDataObject);
    });
    $(document).ready(function() {

        $('.summernote').summernote({
            height: 300,
            toolbar: [
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough', 'superscript', 'subscript']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']],
            ['view', ['fullscreen']],
            ['insert', []] // Empty array to remove all insert options (including video, audio, and picture)
        ]});

        $("#preferredCityRegionInSouthKorea").select2();

        document.querySelector("#uploadImg").addEventListener("change" , function(e){
            const file = event.target.files;
            if (file) {
                const fileReader = new FileReader();
                const preview = document.querySelector('.profile-photo');
                fileReader.onload = event => {
                    preview.setAttribute('src', event.target.result);
                }
                fileReader.readAsDataURL(file[0]);
            }
            
        })

    $(".delete-doc").on("click" , function(e){
        e.preventDefault();
        e.stopImmediatePropagation();
        let docId = e.target.dataset.docId;
        if(docId !== undefined)
        {
            $.ajax({
            type: "POST",
              url: "{{route('deleteDocument')}}",
              data: {
                _token : "{{csrf_token()}}",
                docId : docId
              },
              success:function(res){
                if(res.status){
                    toastr.success(res.message);
                }else{
                    toastr.error(res.message)
                }
              }
            })
        }
    });

    $("#visa_eligibility_check").on("click", function(e) {
        e.preventDefault();
          $.ajax({
            type: "POST",
              url: "{{route('candidate.profile-1.save')}}",
              data: {
                _token:"{{csrf_token()}}",
                nationality: $("#multi-step-form").find("[name=nationality]").val(),
                passport: $("#multi-step-form").find("[name=passport]").val(),
                current_visa_status: $("#multi-step-form").find("[name=current_visa_status]").val(),
                criminal_record: $("#multi-step-form").find("[name=criminal_record]").val(),
                graduation: $("#multi-step-form").find("[name=graduation_from_accredited_university]").val(),
                is_healthy: $("#multi-step-form").find("[name=is_healthy]").val(),
                // health_declaration: document.querySelector("#step-1").querySelector(".note-editable").innerHTML,
                        },
              dataType: 'json',
              success: function (data) {
    
                if (data.status) {
                    toastr.success(data.message);
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

      $("#candidate-personal-details").on("click", function(e) {
        e.preventDefault();
        var formData = new FormData();
        formData.append("_token", "{{ csrf_token() }}");
        formData.append("middle_name", $("#multi-step-form").find("[name=middle_name]").val());
        formData.append("first_name", $("#multi-step-form").find("[name=first_name]").val());
        formData.append("last_name", $("#multi-step-form").find("[name=last_name]").val());
        // formData.append("designation", $("#multi-step-form").find("[name=candidateDesignation]").val());
        // formData.append("job_category_id", $("#multi-step-form").find("[name=designationType]").val());
        formData.append("experience_level", $("#multi-step-form").find("[name=ExperienceLevel]").val());
        formData.append("gender", $("#multi-step-form").find("[name=gender]").val());
        formData.append("current_location", $("#multi-step-form").find("[name=currentLocation]").val());
        formData.append("date_of_birth", $("#multi-step-form").find("[name=dateOfBirth]").val());
        formData.append("profile_picture", $('#uploadImg')[0].files[0]);
        formData.append("candidate_resume", $('#candidate_resume')[0].files[0]);
          $.ajax({
            type: "POST",
              url: "{{route('candidate.profile-2.save')}}",
              data: formData,
              dataType: 'json',
              contentType: false,
              processData: false,
              success: function (data) {
    
                if (data.status) {
                    toastr.success(data.message);
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
      $("#candidate-educational-details").on("click", function(e) {
        e.preventDefault();
        var formData = new FormData();
        formData.append("_token", "{{ csrf_token() }}");
        // var experienceData = [];
    
        //     for (var i = 0; ; i++) {
        //     var role = $("input[name='experience[" + i + "][role]']").val();
        //     if (role === undefined) {
        //         break;
        //     }
            
        //     var employerName = $("input[name='experience[" + i + "][employer_name]']").val();
        //     var dataFrom = $("input[name='experience[" + i + "][date_from]']").val();
        //     var dataTo = $("input[name='experience[" + i + "][date_to]']").val();
        //     var description = $("input[name='experience[" + i + "][description]']").val();
            
        //     experienceData.push({
        //         role: role,
        //         employer_name: employerName,
        //         data_from: dataFrom,
        //         data_to: dataTo,
        //         description: description
        //     });
        //     }
                    var educationData = [];
    
                    for (var j = 0; ; j++) {
                    var degree = $("input[name='education[" + j + "][degree]']").val();
                   
                    var institution = $("input[name='education[" + j + "][institution]']").val();
                    var description = $("input[name='education[" + j + "][description]']").val();
                    if (degree === undefined && institution === undefined && description === undefined ) {
                            break;
                        }
                                educationData.push({
                        degree: degree,
                        institution: institution,
                        description: description,
                    });
                    }
        var educationData = JSON.stringify(educationData);

        formData.append('educational_details',educationData)
        formData.append('highest_degree',$("#multi-step-form").find('[name=highestDegreeObtained]').val())
        formData.append('field_of_study',$("#multi-step-form").find('[name=fieldOfStudy]').val())
        formData.append('institute_name',$("#multi-step-form").find('[name=universityCollegeNameCountry]').val())
        formData.append('teaching_experiance',$("#multi-step-form").find('[name=yearsOfTeachingExperience]').val())
        formData.append('tefl_tesol_clarification',$("#multi-step-form").find('[name=TEFLTESOLCertification]').val())
        formData.append('prevous_teaching_in_korea',$("#multi-step-form").find('[name=previousTeachingInKorea]').val())
        formData.append('country_id',$("#multi-step-form").find('[name=instituteCountry]').val())
          $.ajax({
            type: "POST",
              url: "{{route('candidate.profile-3.save')}}",
              data: formData,
              dataType: 'json',
              contentType: false,
              processData: false,
              success: function (data) {
    
                if (data.status) {
                    toastr.success(data.message);
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

       // Canidate  Professional Information
      $("#candidate-professional-details").on("click", function(e) {
        e.preventDefault();
        var formData = new FormData();
        formData.append("_token", "{{ csrf_token() }}");
        var noteEditable = document.querySelector("#step-4").querySelectorAll(".note-editable");
        var experienceData = [];
    
            for (var i = 0; ; i++) {
            var role = $("input[name='experience[" + i + "][role]']").val();
            if (role === undefined) {
                break;
            }
            
            var employerName = $("input[name='experience[" + i + "][employer_name]']").val();
            var dataFrom = $("input[name='experience[" + i + "][date_from]']").val();
            var dataTo = $("input[name='experience[" + i + "][date_to]']").val();
            // var description = $("input[name='experience[" + i + "][description]']").val();
            var description = noteEditable[i].innerHTML; 
            experienceData.push({
                role: role,
                employer_name: employerName,
                date_from: dataFrom,
                date_to: dataTo,
                description: description
            });
            }
    
        var experienceData = JSON.stringify(experienceData);
        formData.append('professional_details',experienceData)

          $.ajax({
            type: "POST",
              url: "{{route('candidate.profile-3.save')}}",
              data: formData,
              dataType: 'json',
              contentType: false,
              processData: false,
              success: function (data) {
    
                if (data.status) {
                    toastr.success(data.message);
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
      // Skills and Preferences save data
      $("#candidate-preferences-details").on("click", function(e) {
        e.preventDefault();
        var formData = new FormData();
        formData.append("_token", "{{ csrf_token() }}");
        var skillInput = $('input[name="skill[]"]');

// Loop through each input element and append it to the FormData
        // skillInput.each(function(index, element) {
        // formData.append('skills[]', element.value);
        // });
        formData.append('preferred_city_region',$("#multi-step-form").find('[name=preferredCityRegionInSouthKorea]').val());
        formData.append('school_type',$("#multi-step-form").find('[name=schoolTypePreference]').val());
        formData.append('age_group',$("#multi-step-form").find('[name=ageGroupPreference]').val());
        formData.append('expected_salary',$("#multi-step-form").find('[name=salaryExpectations]').val());
        formData.append('preferred_start_date',$("#multi-step-form").find('[name=preferredStartDate]').val());
          $.ajax({
            type: "POST",
              url: "{{route('candidate.profile-4.save')}}",
              data: formData,
              dataType: 'json',
              contentType: false,
              processData: false,
              success: function (data) {
    
                if (data.status) {
                    toastr.success(data.message);
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

      // Candidate Introduction Details
      $("#candidate-introduction-details").on("click", function(e) {
        e.preventDefault();
        var formData = new FormData();
        formData.append("_token", "{{ csrf_token() }}");
        formData.append('introduction',$("#multi-step-form").find('[name=bioIntroduction]').val());
        formData.append('why_interested_teaching_in_korea',$("#multi-step-form").find('[name=whyInterestedInTeachingInSouthKorea]').val());
        formData.append('language_proficiency',$("#multi-step-form").find('[name=languageProficiency]').val());
          $.ajax({
            type: "POST",
              url: "{{route('candidate.profile-5.save')}}",
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
      //Teaching Video Details Saving
      
      $("#teaching-video-details").on("click", function(e) {
        e.preventDefault();
        var formData = new FormData();
        formData.append("_token", "{{ csrf_token() }}");
        formData.append("video_url", $('#teachingVideo')[0].files[0]);
        formData.append("video_thumbnail", $('#videoThumbnail')[0].files[0]);

        formData.append("degree", document.getElementById("degree").files[0]);
        formData.append("police_certificate", document.getElementById("policeCertificate").files[0]);
        formData.append("degree_apostille", document.getElementById("degreeApostille").files[0]);
        formData.append("certificate_apostille", document.getElementById("certificateApostille").files[0]);
        formData.append("saqa_letter", document.getElementById("saqaLetter").files[0]);
        formData.append("passport", document.getElementById("userPassport").files[0]);
        formData.append('terms_and_conditions' , document.getElementById("preferences_terms_and_conditions").value);
        formData.append('other_platform_video_url',$("#multi-step-form").find('[name=linkToVideoAsk]').val());
          $.ajax({
            type: "POST",
              url: "{{route('candidate.profile-6.save')}}",
              data: formData,
              dataType: 'json',
              contentType: false,
              processData: false,
              success: function (data) {
    
                if (data.status) {
                    toastr.success(data.message)
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
      //Legal Verification
      $("#legal-verification-details").on("click", function(e) {
        e.preventDefault();
        var formData = new FormData();
        formData.append("_token", "{{ csrf_token() }}");
        formData.append('criminal_background',$("#multi-step-form").find('[name=criminalBackgroundCheck]').val());
        formData.append('health_declaration',$("#multi-step-form").find('[name=healthDeclaration2]').val());
        formData.append('terms_and_conditions',$("#multi-step-form").find('[name=TermsAndConditions]').val());
     
          $.ajax({
            type: "POST",
              url: "{{route('candidate.profile-7.save')}}",
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
<script>
     var i = 0;
       
       $("#add").click(function(){
      
           ++i;
      
        //    $("#add-skill-field").append('<tr><td><input type="text" name="addmore['+i+'][name]" placeholder="Enter your Name" class="form-control" /></td><td><input type="text" name="addmore['+i+'][qty]" placeholder="Enter your Qty" class="form-control" /></td><td><input type="text" name="addmore['+i+'][price]" placeholder="Enter your Price" class="form-control" /></td><td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>');
           $("#add-skill-field").append('<div class="row skill-field-row"><div class="col-md-6"><div class="dash-input-wrapper mb-30"><input type="text" name="skill[]"  placeholder="Add Skill" value = "{{$candidatePersonalDetails->preferred_city_region ?? ''}}"></div></div><div class="col-md-6"><div class="dash-input-wrapper mb-30"><button type="button" class="btn btn-danger remove-tr">Remove</button></div></div>')
       });
      
       $(document).on('click', '.remove-tr', function(){  
            $(this).parents('.skill-field-row').remove();
       });
       
       //adding more experience details fields

// The length property of the jQuery object gives you the count of matched elements
const experienceFormFields = document.getElementById('multi-step-form');
const experienceArr = Array.from(experienceFormFields.getElementsByTagName('input')).map(input => input.name);
const experienceArrLength = experienceArr.filter(name => /experience\[\d+\]\[role\]/.test(name)).length;
      
       var j = experienceArrLength-1;
       $("#add-more-experience").click(function(){
           ++j;
           console.log(j);
        //    $("#add-skill-field").append('<tr><td><input type="text" name="addmore['+i+'][name]" placeholder="Enter your Name" class="form-control" /></td><td><input type="text" name="addmore['+i+'][qty]" placeholder="Enter your Qty" class="form-control" /></td><td><input type="text" name="addmore['+i+'][price]" placeholder="Enter your Price" class="form-control" /></td><td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>');
           $("#candidate-experience").append('<div class="candidate-experience-details"><center><h3>Experience '+(j+1)+'</h3></center><div class="row ">'+
                                '<div class="col-md-6">'+
                                    '<div class="dash-input-wrapper mb-30">'+
                                        '<label for="">Role</label>'+
                                        '<input type="text" name="experience['+j+'][role]" placeholder="" value = "">'+
                                    '</div>'+
                                '</div>'+
                                '<div class="col-md-6">'+
                                    '<div class="dash-input-wrapper mb-30">'+
                                        '<label for="">Employer Name</label>'+
                                        '<input type="text" name="experience['+j+'][employer_name]" placeholder="" value = "">'+
                                    '</div>'+
                                '</div>'+
                            '</div>'+
                            '<div class="row">'+
                                '<div class="col-md-6">'+
                                   ' <div class="dash-input-wrapper mb-30">'+
                                        '<label for="">Date From</label>'+
                                       ' <input type="date" name="experience['+j+'][date_from]" placeholder="" value = "">'+
                                   ' </div>'+
                               ' </div>'+
                                '<div class="col-md-6">'+
                                    '<div class="dash-input-wrapper mb-30">'+
                                        '<label for="">Date To</label>'+
                                        '<input type="date" name="experience['+j+'][date_to]" placeholder="" value = "">'+
                                    '</div>'+
                                '</div>'+
                           ' </div>'+
                            '<div class="row">'+
                               ' <div class="col-md-8">'+
                                    '<div class="dash-input-wrapper mb-30">'+
                                        '<label for="">Description</label>'+
                                        '<div type="text" name="experience['+j+'][description]" placeholder="" value = "" class="summernote"></div>'+
                                    '</div>'+
                                '</div>'+
                                ' <div class="col-md-2 pt-4">'+
                                    '<div class="dash-input-wrapper mb-30">'+
                                        '<button type="button" class="btn btn-danger remove-tr" >Remove</button>'+
                                    '</div>'+
                                '</div>'+
                                '</div>'+
                            '</div>'
                            
                            )

            $(".summernote").summernote({
                height: 300,
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']],
                    ['view', ['fullscreen']],
                    ['insert', []] // Empty array to remove all insert options (including video, audio, and picture)
                ]
       });
       });
       $(document).on('click', '.remove-tr', function(){  
            $(this).parents('.candidate-experience-details').remove();
       });
        //End of adding more experience details fields 

        //adding more experience educational fields 
       var k = 0;
       const form = document.getElementById('multi-step-form');
const inputNames = Array.from(form.getElementsByTagName('input')).map(input => input.name);
const educationCount = inputNames.filter(name => /education\[\d+\]\[degree\]/.test(name)).length;
        k=educationCount-1;
// console.log(`Number of objects in the 'education' array: ${objectCount}`);
       $("#add-more-education").click(function(){


           ++k;
      
        //    $("#add-skill-field").append('<tr><td><input type="text" name="addmore['+i+'][name]" placeholder="Enter your Name" class="form-control" /></td><td><input type="text" name="addmore['+i+'][qty]" placeholder="Enter your Qty" class="form-control" /></td><td><input type="text" name="addmore['+i+'][price]" placeholder="Enter your Price" class="form-control" /></td><td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>');
           $("#candidate-education").append('<div class="educational-details-row"><center><h3>Educational Details</h3></center><div class="row ">'+
                                '<div class="col-md-6">'+
                                    '<div class="dash-input-wrapper mb-30">'+
                                        '<label for="">Degree</label>'+
                                        '<input type="text" name="education['+k+'][degree]" placeholder="" value = "">'+
                                    '</div>'+
                                '</div>'+
                                '<div class="col-md-6">'+
                                    '<div class="dash-input-wrapper mb-30">'+
                                        '<label for="">Institution</label>'+
                                        '<input type="text" name="education['+k+'][institution]" placeholder="" value = "">'+
                                    '</div>'+
                                '</div>'+
                            '</div>'+
                            '<div class="row">'+
                               ' <div class="col-md-8">'+
                                    '<div class="dash-input-wrapper mb-30">'+
                                        '<label for="">Description</label>'+
                                        '<input type="text" name="education['+k+'][description]" placeholder="" value = "">'+
                                    '</div>'+
                                '</div>'+
                                ' <div class="col-md-2 pt-4">'+
                                    '<div class="dash-input-wrapper mb-30">'+
                                        '<button type="button" class="btn btn-danger remove-tr" >Remove</button>'+
                                    '</div>'+
                                '</div>'+
                                '</div>'+
                            '</div>'
                            
                            )
       });
       $(document).on('click', '.remove-tr', function(){  
        this.closest(".educational-details-row").remove();
            // $(this).parents('.educational-details-row').remove();
       });
        //End of adding more educational details fields 

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
    const videoFile = document.getElementById('teachingVideo').files[0];
    const videoPreview = document.getElementById('videoPreview');

    if (videoFile) {
        const videoURL = URL.createObjectURL(videoFile);
        videoPreview.src = videoURL;
        videoPreview.classList.remove('d-none')
    }else
    {
        videoPreview.src = '';
        videoPreview.classList.add('d-none')
    }
}



 function deleteFile(fileType)
 {
    var formData = new FormData();
        formData.append("_token", "{{ csrf_token() }}");
        formData.append("file_type",fileType);
    
     
          $.ajax({
            type: "POST",
              url: "{{route('candidate.deleteFile')}}",
              data: formData,
              dataType: 'json',
              contentType: false,
              processData: false,
              success: function (data) {
    
                if (data.status) {
                    toastr.success(data.message);
                    document.querySelector('.'+fileType).classList.add('d-none')
                }else{
                    toastr.error(data.message);
                    $(".alert").remove();
                    $.each(data.errors, function (key, val) {
                        $("#errors-list").append("<div class='alert alert-danger'>" + val + "</div>");
                    });
                }
               
              }
          });
 }
</script>
@endpush
@endsection