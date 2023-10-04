@extends('candidate.layout.main')

@section('title')
Candidate Profile
@endsection
<style>
    .step {
        display: none;
    }

    .active {
        display: block;
        color: rgba(0, 0, 0, 0.7) !important;
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
                <div><a href="employer-dashboard-submit-job.html" class="job-post-btn tran3s">Post a Job</a></div>
            </div>
        </header>
        <!-- End Header -->

        <h2 class="main-title">My Profile</h2>

        <div class="bg-white card-box border-20 mb-40">
            <div class="candidate-sign-up">
                <form id="multi-step-form">
                    <!-- Step 1 -->
                    <div class="step active" id="step-1">
                        <div class="header">
                            <div class="container">
                                <span>1. Visa Eligibility Check</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="dash-input-wrapper mb-30">
                                    <label for="">Nationality</label>
                                    <select name="nationality" id="nationality" class="nice-select">
                                        <option value="Test 1">Test 1</option>
                                        <option value="Test 1">Test 1</option>
                                        <option value="Test 1">Test 1</option>
                                        <option value="Test 1">Test 1</option>
                                        <option value="Test 1">Test 1</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="dash-input-wrapper mb-30">
                                    <label for="">Passport</label>
                                    <select name="passport" id="passport" class="nice-select">
                                        <option value="Test 1">Test 1</option>
                                        <option value="Test 1">Test 1</option>
                                        <option value="Test 1">Test 1</option>
                                        <option value="Test 1">Test 1</option>
                                        <option value="Test 1">Test 1</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="dash-input-wrapper mb-30">
                                    <label for="">Current Visa Status in South Korea</label>
                                    <select name="currentVisaStatusinSouthKorea" id="currentVisaStatusinSouthKorea" class="nice-select">
                                        <option value="Test 1">Test 1</option>
                                        <option value="Test 1">Test 1</option>
                                        <option value="Test 1">Test 1</option>
                                        <option value="Test 1">Test 1</option>
                                        <option value="Test 1">Test 1</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="dash-input-wrapper mb-30">
                                    <label for="">Do you have any criminal convictions?</label>
                                    <select name="criminalRecordDeclaration" id="criminalRecordDeclaration" class="nice-select">
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="dash-input-wrapper mb-30">
                                    <label for="">Graduated From An Accredited University</label>
                                    <select name="graduatedFromAnAccreditedUniversity" id="graduatedFromAnAccreditedUniversity" class="nice-select">
                                        <option value="Test 1">Test 1</option>
                                        <option value="Test 1">Test 1</option>
                                        <option value="Test 1">Test 1</option>
                                        <option value="Test 1">Test 1</option>
                                        <option value="Test 1">Test 1</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="dash-input-wrapper mb-30">
                                    <label for="">Health Declaration</label>
                                    <select name="healthDeclaration1" id="healthDeclaration1" class="nice-select">
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="dash-input-wrapper mb-30">
                                    <label for="">Note</label>
                                    <input type="text" name="note" placeholder="A brief explanation that these checks are essential for E2 visa requirements and obtaining teaching positions in South Korea.">
                                </div>
                            </div>
                        </div>

                        <div class="d-flex flex-row justify-content-end gap-3">
                            <button type="button" class="dash-btn-one" onclick="nextStep(1)">Next</button>
                        </div>
                    </div>

                    <!-- Step 2 -->
                    <div class="step" id="step-2">
                        <div class="header">
                            <div class="container">
                                <span>2. Personal Details </span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="dash-input-wrapper mb-30">
                                    <label for="">Full Name</label>
                                    <input type="text" name="fullName" placeholder="First and last name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="dash-input-wrapper mb-30">
                                    <label for="">Profile Photo</label>
                                    <div class="user-avatar-setting d-flex align-items-center">
                                        <img src="../images/lazy.svg" data-src="images/avatar_04.jpg" alt="" class="lazy-img user-img">
                                        <div class="upload-btn position-relative tran3s ms-4 me-3">
                                            Upload profile photo
                                            <input type="file" id="uploadImg" name="uploadImg" placeholder="">
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
                                    <input type="date" name="dob" placeholder="Date of birth">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="dash-input-wrapper mb-30">
                                    <label for="">Current Location</label>
                                    <select name="currentLocation" id="currentLocation" class="nice-select">
                                        <option value="Test 1">Test 1</option>
                                        <option value="Test 1">Test 1</option>
                                        <option value="Test 1">Test 1</option>
                                        <option value="Test 1">Test 1</option>
                                        <option value="Test 1">Test 1</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex flex-row justify-content-end gap-3">
                            <button type="button" class="dash-btn-one" onclick="previousStep(2)">Previous</button>
                            <button type="button" class="dash-btn-one" onclick="nextStep(2)">Next</button>
                        </div>
                    </div>

                    <!-- Step 3 -->
                    <div class="step" id="step-3">
                        <div class="header">
                            <div class="container">
                                <span>3. Educational & Professional Details</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="dash-input-wrapper mb-30">
                                    <label for="">Highest Degree Obtained</label>
                                    <input type="date" name="highestDegreeObtained" placeholder="Essential for E2 visa – a bachelor's degree or higher is typically required.">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="dash-input-wrapper mb-30">
                                    <label for="">Field of Study</label>
                                    <select name="fieldOfStudy" id="fieldOfStudy" class="nice-select">
                                        <option value="Test 1">Test 1</option>
                                        <option value="Test 1">Test 1</option>
                                        <option value="Test 1">Test 1</option>
                                        <option value="Test 1">Test 1</option>
                                        <option value="Test 1">Test 1</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="dash-input-wrapper mb-30">
                                    <label for="">University/College Name & Country</label>
                                    <select name="universityCollegeNameCountry" id="universityCollegeNameCountry" class="nice-select">
                                        <option value="Test 1">Test 1</option>
                                        <option value="Test 1">Test 1</option>
                                        <option value="Test 1">Test 1</option>
                                        <option value="Test 1">Test 1</option>
                                        <option value="Test 1">Test 1</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="dash-input-wrapper mb-30">
                                    <label for="">Years of Teaching Experience</label>
                                    <select name="yearsOfTeachingExperience" id="yearsOfTeachingExperience" class="nice-select">
                                        <option value="Test 1">Test 1</option>
                                        <option value="Test 1">Test 1</option>
                                        <option value="Test 1">Test 1</option>
                                        <option value="Test 1">Test 1</option>
                                        <option value="Test 1">Test 1</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="dash-input-wrapper mb-30">
                                    <label for="">TEFL/TESOL Certification</label>
                                    <select name="TEFLTESOLCertification" id="TEFLTESOLCertification" class="nice-select">
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="dash-input-wrapper mb-30">
                                    <label for="">Previous Teaching in Korea</label>
                                    <select name="previousTeachingInKorea" id="previousTeachingInKorea" class="nice-select">
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex flex-row justify-content-end gap-3">
                            <button type="button" class="dash-btn-one" onclick="previousStep(3)">Previous</button>
                            <button type="button" class="dash-btn-one" onclick="nextStep(3)">Next</button>
                        </div>
                    </div>

                    <!-- Step 4 -->
                    <div class="step" id="step-4">
                        <div class="header">
                            <div class="container">
                                <span>4. Skills & Preferences </span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="dash-input-wrapper mb-30">
                                    <label for="">Skills</label>
                                    <select name="skills" id="skills" class="nice-select">
                                        <option value="Test 1">Test 1</option>
                                        <option value="Test 1">Test 1</option>
                                        <option value="Test 1">Test 1</option>
                                        <option value="Test 1">Test 1</option>
                                        <option value="Test 1">Test 1</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="dash-input-wrapper mb-30">
                                    <label for="">Preferred City/Region in South Korea</label>
                                    <select name="preferredCityRegionInSouthKorea" id="preferredCityRegionInSouthKorea" class="nice-select">
                                        <option value="Test 1">Test 1</option>
                                        <option value="Test 1">Test 1</option>
                                        <option value="Test 1">Test 1</option>
                                        <option value="Test 1">Test 1</option>
                                        <option value="Test 1">Test 1</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="dash-input-wrapper mb-30">
                                    <label for="">School Type Preference</label>
                                    <select name="schoolTypePreference" id="schoolTypePreference" class="nice-select">
                                        <option value="Test 1">Test 1</option>
                                        <option value="Test 1">Test 1</option>
                                        <option value="Test 1">Test 1</option>
                                        <option value="Test 1">Test 1</option>
                                        <option value="Test 1">Test 1</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="dash-input-wrapper mb-30">
                                    <label for="">Age Group Preference</label>
                                    <select name="ageGroupPreference" id="ageGroupPreference" class="nice-select">
                                        <option value="Test 1">Test 1</option>
                                        <option value="Test 1">Test 1</option>
                                        <option value="Test 1">Test 1</option>
                                        <option value="Test 1">Test 1</option>
                                        <option value="Test 1">Test 1</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="dash-input-wrapper mb-30">
                                    <label for="">Salary Expectations</label>
                                    <select name="salaryExpectations" id="salaryExpectations" class="nice-select">
                                        <option value="Test 1">Test 1</option>
                                        <option value="Test 1">Test 1</option>
                                        <option value="Test 1">Test 1</option>
                                        <option value="Test 1">Test 1</option>
                                        <option value="Test 1">Test 1</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex flex-row justify-content-end gap-3">
                            <button type="button" class="dash-btn-one" onclick="previousStep(4)">Previous</button>
                            <button type="button" class="dash-btn-one" onclick="nextStep(4)">Next</button>
                        </div>
                    </div>

                    <!-- Step 5 -->
                    <div class="step" id="step-5">
                        <div class="header">
                            <div class="container">
                                <span>5. Introduce Yourself</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="dash-input-wrapper mb-30">
                                    <label for="">Bio/Introduction</label>
                                    <input type="text" name="bioIntroduction" placeholder="Write a few sentences or a short paragraph about themselves.">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="dash-input-wrapper mb-30">
                                    <label for="">Why Interested in Teaching in South Korea</label>
                                    <input type="text" name="whyInterestedInTeachingInSouthKorea" placeholder="Allows potential employers to gauge enthusiasm and fit.">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="dash-input-wrapper mb-30">
                                    <label for="">Language Proficiency</label>
                                    <input type="text" name="languageProficiency" placeholder="Specifically their English fluency level, and proficiency in any other languages including Korean.">
                                </div>
                            </div>
                        </div>

                        <div class="d-flex flex-row justify-content-end gap-3">
                            <button type="button" class="dash-btn-one" onclick="previousStep(5)">Previous</button>
                            <button type="button" class="dash-btn-one" onclick="nextStep(5)">Next</button>
                        </div>
                    </div>

                    <!-- Step 6 -->
                    <div class="step" id="step-6">
                        <div class="header">
                            <div class="container">
                                <span>6. Teaching Video & Interview (optional)</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="dash-input-wrapper mb-30">
                                    <label for="">Teaching Video</label>
                                    <div class="user-avatar-setting d-flex align-items-center mb-30">
                                        <div class="upload-btn position-relative tran3s ms-4 me-3">
                                            Upload new video
                                            <input type="file" id="uploadImg" name="teachingVideo" placeholder="">
                                        </div>
                                        <button class="delete-btn tran3s">Delete</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="dash-input-wrapper mb-30">
                                    <label for="">Link to VideoAsk</label>
                                    <input type="text" name="linkToVideoAsk" placeholder="A direct link or button that takes them to the VideoAsk platform to record or upload their video (this is mandatory but can be completed after the sign-up as well)">
                                </div>
                            </div>
                        </div>

                        <div class="d-flex flex-row justify-content-end gap-3">
                            <button type="button" class="dash-btn-one" onclick="previousStep(6)">Previous</button>
                            <button type="button" class="dash-btn-one" onclick="nextStep(6)">Next</button>
                        </div>
                    </div>

                    <!-- Step 7 -->
                    <div class="step" id="step-7">
                        <div class="header">
                            <div class="container">
                                <span>7. Legal & Verification </span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="dash-input-wrapper mb-30">
                                    <label for="">Criminal Background Check</label>
                                    <input type="text" name="criminalBackgroundCheck" placeholder="A note that this will be required later for the E2 visa, so they should be prepared to provide it upon job offer. The document must be apostilled and no older than 6 months">
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
                                    <input type="text" name="healthDeclaration2" placeholder="A short note or checkbox stating they have no health conditions that would impede teaching or living abroad.">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="dash-input-wrapper mb-30">
                                    <label for="">Terms and Conditions</label>
                                    <input type="text" name="TermsAndConditions" placeholder="Including a privacy clause about how their data will be used.">
                                </div>
                            </div>
                        </div>

                        <div class="d-flex flex-row justify-content-end gap-3">
                            <button type="button" class="dash-btn-one" onclick="previousStep(7)">Previous</button>
                            <button type="submit" class="dash-btn-one">Submit</button>
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
<script>
    let currentStep = 1;

    function nextStep(step) {
        document.getElementById(`step-${step}`).classList.remove('active');
        currentStep = step + 1;
        document.getElementById(`step-${currentStep}`).classList.add('active');
    }

    function previousStep(step) {
        document.getElementById(`step-${step}`).classList.remove('active');
        currentStep = step - 1;
        document.getElementById(`step-${currentStep}`).classList.add('active');
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
@endsection