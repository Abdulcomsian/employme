@extends('candidate.layout.main')

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
</style>
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
                        <img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/dashboard-icon/icon_11.svg')}}" alt="" class="lazy-img">
                        <div class="badge-pill"></div>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="notification-dropdown">
                        <li>
                            <h4>Notification</h4>
                            <ul class="style-none notify-list">
                                <li class="d-flex align-items-center unread">
                                    <img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/dashboard-icon/icon_36.svg')}}" alt="" class="lazy-img icon">
                                    <div class="flex-fill ps-2">
                                        <h6>You have 3 new mails</h6>
                                        <span class="time">3 hours ago</span>
                                    </div>
                                </li>
                                <li class="d-flex align-items-center">
                                    <img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/dashboard-icon/icon_37.svg')}}" alt="" class="lazy-img icon">
                                    <div class="flex-fill ps-2">
                                        <h6>Your job post has been approved</h6>
                                        <span class="time">1 day ago</span>
                                    </div>
                                </li>
                                <li class="d-flex align-items-center unread">
                                    <img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/dashboard-icon/icon_38.svg')}}" alt="" class="lazy-img icon">
                                    <div class="flex-fill ps-2">
                                        <h6>Your meeting is cancelled</h6>
                                        <span class="time">3 days ago</span>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div><a href="{{route('jobMarketplace')}}" class="job-post-btn tran3s">Job Marketplace</a></div>
            </div>
        </header>
        <!-- End Header -->

        <h2 class="main-title">My Profile</h2>

        <div class="bg-white card-box border-20 mb-40">
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
                        <div class="text">Educational & Professional Details</div>
                    </div>
                    <div id="tag-step-4" class="step">
                        <div class="icon">
                            <div>4</div>
                        </div>
                        <div class="text">Skills & Preferences</div>
                    </div>
                    <div id="tag-step-5" class="step">
                        <div class="icon">
                            <div>5</div>
                        </div>
                        <div class="text">Introduce Yourself</div>
                    </div>
                    <div id="tag-step-6" class="step">
                        <div class="icon">
                            <div>6</div>
                        </div>
                        <div class="text">Teaching Video & Interview (optional)</div>
                    </div>
                    <div id="tag-step-7" class="step">
                        <div class="icon">
                            <div>7</div>
                        </div>
                        <div class="text">Legal & Verification</div>
                    </div>
                </div>
                <form id="multi-step-form" enctype = "multipart/form-data">
                    <!-- Step 1 -->
                    <div class="step active" id="step-1">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="dash-input-wrapper mb-30">
                                    <label for="">Nationality</label>
                                    <select name="nationality" id="nationality" class="nice-select">
                                        <option value="1" {{$candidatePersonalDetails->nationality == '1' ? 'selected' : ''}}>Korea</option>
                                        <option value="2" {{$candidatePersonalDetails->nationality == '2' ? 'selected' : ''}}>China</option>
                                        <option value="3" {{$candidatePersonalDetails->nationality == '3' ? 'selected' : ''}}>Taiwan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="dash-input-wrapper mb-30">
                                    <label for="">Passport</label>
                                    <select name="passport" id="passport" class="nice-select">
                                        <option value="1" {{$candidatePersonalDetails->passport == '1' ? 'selected' : ''}}>Korea</option>
                                        <option value="2" {{$candidatePersonalDetails->passport == '2' ? 'selected' : ''}}>China</option>
                                        <option value="3" {{$candidatePersonalDetails->passport == '3' ? 'selected' : ''}}>Taiwan</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="dash-input-wrapper mb-30">
                                    <label for="">Current Visa Status in South Korea</label>
                                    <select name="current_visa_status" id="current_visa_status" class="nice-select">
                                        <option value="No Visa" {{$candidatePersonalDetails->current_visa_status == 'No Visa' ? 'selected' : ''}}>No Visa</option>
                                        <option value="Tourist Visa" {{$candidatePersonalDetails->current_visa_status == 'Tourist Visa' ? 'selected' : ''}}>Tourist Visa</option>
                                        <option value="Student Visa" {{$candidatePersonalDetails->current_visa_status == 'Student Visa' ? 'selected' : ''}}>Student Visa</option>
                                        <option value="E2 Teaching Visa" {{$candidatePersonalDetails->current_visa_status == 'E2 Teaching Visa' ? 'selected' : ''}}>E2 Teaching Visa</option>
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
                            <div class="col-md-6">
                                <div class="dash-input-wrapper mb-30">
                                    <label for="">Health Declaration</label>
                                    <select name="is_healthy" id="is_healthy" class="nice-select">
                                        <option value="Yes" {{$candidatePersonalDetails->is_healthy == 'Yes' ? 'selected' : ''}}>Yes</option>
                                        <option value="No" {{$candidatePersonalDetails->is_healthy == 'No' ? 'selected' : ''}}>No</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="dash-input-wrapper mb-30">
                                    <label for="">Note</label>
                                    <input type="text" name="note" placeholder="A brief explanation that these checks are essential for E2 visa requirements and obtaining teaching positions in South Korea." value="{{$candidatePersonalDetails->note}}">
                                </div>
                            </div>
                        </div>

                        <div class="d-flex flex-row justify-content-end gap-3">
                            <button type="button" class="dash-btn-one" id = "visa_eligibility_check" onclick="nextStep(1)">Next</button>
                        </div>
                    </div>

                    <!-- Step 2 -->
                    <div class="step" id="step-2">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="dash-input-wrapper mb-30">
                                    <label for="">Full Name</label>
                                    <input type="text" name="fullName" placeholder="First and last name" value= "{{$candidatePersonalDetails->full_name ?? ''}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="dash-input-wrapper mb-30">
                                    <label for="">Profile Photo</label>
                                    <div class="user-avatar-setting d-flex align-items-center">
                                        @if($candidatePersonalDetails->profile_picture)
                                        <img src="{{asset($candidatePersonalDetails->profile_picture)}}" data-src="images/avatar_04.jpg" alt="" class="lazy-img user-img">
                                        @else
                                        <img src="{../images/lazy.svg}" data-src="images/avatar_04.jpg" alt="" class="lazy-img user-img">
                                        @endif
                                        <div class="upload-btn position-relative tran3s ms-4 me-3">
                                            Upload profile photo
                                            <input type="file" id="uploadImg" name="profileImage" placeholder="">
                                        </div>
                                        <button class="delete-btn tran3s">Delete</button>
                                    </div>
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
                                    <select name="currentLocation" id="currentLocation" class="nice-select">
                                        <option value="China" {{$candidatePersonalDetails->date_of_birth == 'China' ? 'selected' : ''}}>China</option>
                                        <option value="Taiwan" {{$candidatePersonalDetails->date_of_birth == 'Taiwan' ? 'selected' : ''}}>Taiwan</option>
                                        <option value="Korea" {{$candidatePersonalDetails->date_of_birth == 'Korea' ? 'selected' : ''}}>Korea</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex flex-row justify-content-end gap-3">
                            <button type="button" class="dash-btn-one" onclick="previousStep(2)">Previous</button>
                            <button type="button"  class="dash-btn-one" id = "candidate-personal-details" onclick="nextStep(2)">Next</button>
                        </div>
                    </div>

                    <!-- Step 3 -->
                    <div class="step" id="step-3">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="dash-input-wrapper mb-30">
                                    <label for="">Highest Degree Obtained</label>
                                    <input type="text" name="highestDegreeObtained" placeholder="Essential for E2 visa – a bachelor's degree or higher is typically required." value = "{{$candidateEducationalDetails->highest_degree ?? ''}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="dash-input-wrapper mb-30">
                                    <label for="">Field of Study</label>
                                    <select name="fieldOfStudy" id="fieldOfStudy" class="nice-select">
                                        <option value="Engineering" {{$candidateEducationalDetails->field_of_study == 'Engineering' ? 'selected' : ''}}>Engineering</option>
                                        <option value="MBBS" {{$candidateEducationalDetails->field_of_study == 'MBBS' ? 'selected' : ''}}>MBBS</option>
                                        <option value="Business" {{$candidateEducationalDetails->field_of_study == 'Business' ? 'selected' : ''}}>Business</option>
                                        <option value="Arts" {{$candidateEducationalDetails->field_of_study == 'Arts' ? 'selected' : ''}}>Arts</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="dash-input-wrapper mb-30">
                                    <label for="">University/College Name & Country</label>
                                    <input type="text" name="universityCollegeNameCountry" placeholder="Name of College or Univesity and Country" value = "{{$candidateEducationalDetails->field_of_study ?? ''}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="dash-input-wrapper mb-30">
                                    <label for="">Years of Teaching Experience</label>
                                    <input type="number" name="yearsOfTeachingExperience" placeholder="Name of College or Univesity and Country" value = "{{$candidateEducationalDetails->teaching_experiance ?? ''}}">

                                </div>
                            </div>
                        </div>

                        <div class="row">
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

                        <div class="d-flex flex-row justify-content-end gap-3">
                            <button type="button" class="dash-btn-one" onclick="previousStep(3)">Previous</button>
                            <button type="button" class="dash-btn-one" id="candidate-educational-professional-details" onclick="nextStep(3)">Next</button>
                        </div>
                    </div>

                    <!-- Step 4 -->
                    <div class="step" id="step-4">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="dash-input-wrapper mb-30">
                                    <label for="">Skills</label>
                                    <select name="professionalSkills" id="professionalSkills" class="nice-select" multiple>
                                        <option value= "" {{$candidatePreferencesDetails->skills == '' ? 'selected' : ''}}>Select</option>
                                        @isset($professionalSkills)
                                        @foreach($professionalSkills as $professionalSkill)
                                        <option value="{{$professionalSkill->id}}" {{$candidatePreferencesDetails->skills == $southKoreaCity->id ? 'selected' : ''}}>{{$professionalSkill->name}}</option>
                                        @endforeach
                                        @endisset
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="dash-input-wrapper mb-30">
                                    <label for="">Preferred City/Region in South Korea</label>
                                    <select name="preferredCityRegionInSouthKorea" id="preferredCityRegionInSouthKorea" class="nice-select">
                                        <option value= "" {{$candidatePreferencesDetails->preferred_city_region == '' ? 'selected' : ''}}>Select</option>
                                        @isset($southKoreaCities)
                                        @foreach($southKoreaCities as $southKoreaCity)
                                        <option value="{{$southKoreaCity->id}}" {{$candidatePreferencesDetails->preferred_city_region == $southKoreaCity->id ? 'selected' : ''}}>{{$southKoreaCity->name}}</option>
                                        @endforeach
                                        @endisset
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="dash-input-wrapper mb-30">
                                    <label for="">School Type Preference</label>
                                    <select name="schoolTypePreference" id="schoolTypePreference" class="nice-select">
                                        <option value= "" {{$candidatePreferencesDetails->school_type == '' ? 'selected' : ''}}>Select</option>
                                        <option value="Public"  {{$candidatePreferencesDetails->school_type == 'Public' ? 'selected' : ''}}>Public</option>
                                        <option value="Private" {{$candidatePreferencesDetails->school_type == 'Private' ? 'selected' : ''}}>Private</option>
                                        <option value="Hagwon" {{$candidatePreferencesDetails->school_type == 'Hagwon' ? 'selected' : ''}}>Hagwon</option>
                                        <option value="University" {{$candidatePreferencesDetails->school_type == 'University' ? 'selected' : ''}}>University</option>
                                    </select>
                                </div>
                            </div>
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
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="dash-input-wrapper mb-30">
                                    <label for="">Salary Expectations</label>
                                    <select value= "" name="salaryExpectations" id="salaryExpectations" class="nice-select">
                                        <option {{$candidatePreferencesDetails->salary_expection == '' ? 'selected' : ''}}>Select</option>
                                        <option value="10K" {{$candidatePreferencesDetails->salary_expection == '10K' ? 'selected' : ''}}>10K</option>
                                        <option value="20K" {{$candidatePreferencesDetails->salary_expection == '20K' ? 'selected' : ''}}>20K</option>
                                        <option value="50K+" {{$candidatePreferencesDetails->salary_expection == '50K+' ? 'selected' : ''}}>50K+</option>
                                        <option value="100K+" {{$candidatePreferencesDetails->salary_expection == '100K+' ? 'selected' : ''}}>100K+</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex flex-row justify-content-end gap-3">
                            <button type="button" class="dash-btn-one" onclick="previousStep(4)">Previous</button>
                            <button type="button" class="dash-btn-one" id = "candidate-preferences-details" onclick="nextStep(4)">Next</button>
                        </div>
                    </div>

                    <!-- Step 5 -->
                    <div class="step" id="step-5">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="dash-input-wrapper mb-30">
                                    <label for="">Bio/Introduction</label>
                                    <input type="text" name="bioIntroduction" placeholder="Write a few sentences or a short paragraph about themselves." value = "{{$candidatePersonalDetails->introduction ?? ''}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="dash-input-wrapper mb-30">
                                    <label for="">Why Interested in Teaching in South Korea</label>
                                    <input type="text" name="whyInterestedInTeachingInSouthKorea" placeholder="Allows potential employers to gauge enthusiasm and fit." value = "{{$candidatePersonalDetails->why_interested_teaching_in_korea ?? ''}}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="dash-input-wrapper mb-30">
                                    <label for="">Language Proficiency</label>
                                    <input type="text" name="languageProficiency" placeholder="Specifically their English fluency level, and proficiency in any other languages including Korean." value= "{{$candidatePersonalDetails->language_proficiency ?? ''}}">
                                </div>
                            </div>
                        </div>

                        <div class="d-flex flex-row justify-content-end gap-3">
                            <button type="button" class="dash-btn-one" onclick="previousStep(5)">Previous</button>
                            <button type="button" class="dash-btn-one" id= "candidate-introduction-details" onclick="nextStep(5)">Next</button>
                        </div>
                    </div>

                    <!-- Step 6 -->
                    <div class="step" id="step-6">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="dash-input-wrapper mb-30">
                                    <label for="">Teaching Video</label>
                                    <div class="user-avatar-setting d-flex align-items-center mb-30">
                                        <div class="upload-btn position-relative tran3s ms-4 me-3">
                                            Upload new video
                                            <input type="file" id="teachingVideo" name="teachingVideo" placeholder="">
                                        </div>

                                        <button class="delete-btn tran3s">Delete</button>
                                    </div>
                                    @if(isset($candidatePreferencesDetails->video_url) && !empty($candidatePreferencesDetails->video_url))
                                    <div style = "padding-left:20px;">
                                        <a class="btn btn-primary" href = "{{asset($candidatePreferencesDetails->video_url)}}" target = "_blank">File</a>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="dash-input-wrapper mb-30">
                                    <label for="">Link to VideoAsk</label>
                                    <input type="text" name="linkToVideoAsk" placeholder="A direct link or button that takes them to the VideoAsk platform to record or upload their video (this is mandatory but can be completed after the sign-up as well)" value = "{{$candidatePreferencesDetails->other_platform_video_url ?? ''}}">
                                </div>
                            </div>
                        </div>

                        <div class="d-flex flex-row justify-content-end gap-3">
                            <button type="button" class="dash-btn-one" onclick="previousStep(6)">Previous</button>
                            <button type="button" class="dash-btn-one" id="teaching-video-details" onclick="nextStep(6)">Next</button>
                        </div>
                    </div>

                    <!-- Step 7 -->
                    <div class="step" id="step-7">
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
                            <button type="button" class="dash-btn-one" onclick="previousStep(7)">Previous</button>
                            <button type="submit" class="dash-btn-one" id = "legal-verification-details">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="bg-white card-box border-20">
            <div class="user-avatar-setting d-flex align-items-center mb-30">
                <img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/avatar_02.jpg')}}" alt="" class="lazy-img user-img">
                <div class="upload-btn position-relative tran3s ms-4 me-3">
                    Upload new photo
                    <input type="file" id="uploadImg" name="uploadImg" placeholder="">
                </div>
                <button class="delete-btn tran3s">Delete</button>
            </div>
            <!-- /.user-avatar-setting -->
            <div class="dash-input-wrapper mb-30">
                <label for="">Full Name*</label>
                <input type="text" placeholder="Md Rashed Kabir">
            </div>
            <!-- /.dash-input-wrapper -->
            <div class="dash-input-wrapper">
                <label for="">Bio*</label>
                <textarea class="size-lg" placeholder="Write something interesting about you...."></textarea>
                <div class="alert-text">Brief description for your profile. URLs are hyperlinked.</div>
            </div>
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
                            <button class="location-pin tran3s"><img src="{{asset('assets/images/lazy.svg')}}" data-src="{{asset('assets/images/dashboard-icon/icon_16.svg')}}" alt="" class="lazy-img m-auto"></button>
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
    $(document).ready(function() {

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
                note: $("#multi-step-form").find("[name=note]").val(),
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

      $("#candidate-personal-details").on("click", function(e) {
        e.preventDefault();
        var formData = new FormData();
        formData.append("_token", "{{ csrf_token() }}");
        formData.append("full_name", $("#multi-step-form").find("[name=fullName]").val());
        formData.append("current_location", $("#multi-step-form").find("[name=currentLocation]").val());
        formData.append("date_of_birth", $("#multi-step-form").find("[name=dateOfBirth]").val());
        formData.append("profile_picture", $('#uploadImg')[0].files[0]);
          $.ajax({
            type: "POST",
              url: "{{route('candidate.profile-2.save')}}",
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
      $("#candidate-educational-professional-details").on("click", function(e) {
        e.preventDefault();
        var formData = new FormData();
        formData.append("_token", "{{ csrf_token() }}");
        formData.append('highest_degree',$("#multi-step-form").find('[name=highestDegreeObtained]').val())
        formData.append('field_of_study',$("#multi-step-form").find('[name=fieldOfStudy]').val())
        formData.append('institute_name',$("#multi-step-form").find('[name=universityCollegeNameCountry]').val())
        formData.append('teaching_experiance',$("#multi-step-form").find('[name=yearsOfTeachingExperience]').val())
        formData.append('tefl_tesol_clarification',$("#multi-step-form").find('[name=TEFLTESOLCertification]').val())
        formData.append('prevous_teaching_in_korea',$("#multi-step-form").find('[name=previousTeachingInKorea]').val())
          $.ajax({
            type: "POST",
              url: "{{route('candidate.profile-3.save')}}",
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

      // Skills and Preferences save data
      $("#candidate-preferences-details").on("click", function(e) {
        e.preventDefault();
        var formData = new FormData();
        formData.append("_token", "{{ csrf_token() }}");
        formData.append('skills',$("#multi-step-form").find('[name=professionalSkills]').val());
        formData.append('preferred_city_region',$("#multi-step-form").find('[name=preferredCityRegionInSouthKorea]').val());
        formData.append('school_type',$("#multi-step-form").find('[name=schoolTypePreference]').val());
        formData.append('age_group',$("#multi-step-form").find('[name=ageGroupPreference]').val());
        formData.append('salary_expection',$("#multi-step-form").find('[name=salaryExpectations]').val());
          $.ajax({
            type: "POST",
              url: "{{route('candidate.profile-4.save')}}",
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
@endsection