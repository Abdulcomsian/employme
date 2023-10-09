@extends('employer.layout.main')
@section('title')
Employer Job Listing
@endsection

@section('content')

<style>
    .show {
        display: block;
    }

    .hide {
        display: none;
    }
</style>

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

        <h2 class="main-title">Post a New Job</h2>
        <div>
            <form action="#" class="search-form">
                <div class="bg-white card-box border-20 section" id="step1">

                    <h4 class="dash-title-three">Position Overview</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="dash-input-wrapper mb-30">
                                <label for="">School Vision:</label>
                                <input type="text" name="PositionOverview" placeholder="Briefly describe the school's ethos, aims, and values.">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="dash-input-wrapper mb-30">
                                <label for="">Unique Selling Points:</label>
                                <input type="text" name="UniqueSellingPoints" placeholder="Highlight what sets the school apart.">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="dash-input-wrapper mb-30">
                                <label for="">Ideal Candidate Profile:</label>
                                <input type="text" name="IdealCandidateProfile" placeholder="Outline qualities the school is particularly looking for.">
                            </div>
                        </div>
                    </div>
                    <div class="button-group d-inline-flex align-items-center mt-30" style="width:100%;justify-content: flex-end;">
                        <button type="button" id="nextBtn" class="dash-btn-two tran3s" onclick="nextPrev(1)">Next</button>
                    </div>
                </div>
                <div class="bg-white card-box border-20 hide section" id="step2">
                    <h4 class="dash-title-three">Position Details</h4>
                    <div class="row">

                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Job Title:</label>
                            <input type="text" name="jobTitle" placeholder="e.g., ESL Instructor, Children’s English Teacher">
                        </div>
                        <!-- /.dash-input-wrapper -->
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Contract Duration:</label>
                            <!-- <textarea class="size-lg" placeholder="Write about the job in details..."></textarea> -->
                            <input type="text" name="contactDuration" placeholder="">
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Start Date:</label>
                            <input type="date" name="startDate" placeholder=""></input>
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">End Date:</label>
                            <input type="date" name="endDate" placeholder=""></input>
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Renewal Possibilities:</label>
                            <select class="nice-select">
                                <option>Yes</option>
                                <option>No</option>
                            </select>
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-12">
                            <label for="">Salary Breakdown:</label>
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Base pay:</label>
                            <input type="text" name="Base pay" placeholder=""></input>
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Allowances and other incentives.</label>
                            <input type="text" name="Base pay" placeholder=""></input>
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for=""> Specify:</label>
                            <select class="nice-select">
                                <option>KRW </option>
                                <option>USD</option>
                            </select>
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Tax Deductions</label>
                            <input type="text" name="Tax deductions" placeholder=""></input>
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Bonuses</label>
                            <input type="text" name="Bonuses" placeholder=""></input>
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Payday Details:</label>
                            <textarea type="text" name="Bonuses" placeholder=""></textarea>
                        </div>
                    </div>
                    <div class="button-group d-inline-flex align-items-center mt-30" style="width:100%;justify-content: flex-end;">
                        <button type="button" id="prevBtn" class="dash-cancel-btn tran3s  me-3" onclick="nextPrev(-1)">Previous</button>
                        <button type="button" id="nextBtn" class="dash-btn-two tran3s" onclick="nextPrev(1)">Next</button>
                    </div>
                </div>
                <!-- class information -->

                <div class="bg-white card-box border-20 hide section" id="step3">
                    <h4 class="dash-title-three">Class Information</h4>
                    <div class="row">
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Student Age Group:</label>
                            <input type="text" name="StudentAgeGroup" placeholder="">
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Class Size:</label>
                            <input type="text" name="ClassSize" placeholder="">
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Hours/Week:</label>
                            <input type="text" name="Hours/Week" placeholder="">
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Teaching Hours/Day:</label>
                            <input type="text" name="TeachingHours/Day" placeholder="">
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Non-Teaching Hours/Day:</label>
                            <input type="text" name="NonTeachingHours/Day" placeholder="prep time, meetings">
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Break times</label>
                            <input type="text" name="Breaktimes" placeholder="">
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Curriculum Overview:</label>
                            <input type="text" name="CurriculumOverview" placeholder="">
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Materials & Resources Available:</label>
                            <input type="text" name="Materials&ResourcesAvailable" placeholder="">
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Teaching Aids:</label>
                            <input type="text" name="TeachingAids" placeholder="smartboards, projectors">
                        </div>
                    </div>
                    <div class="button-group d-inline-flex align-items-center mt-30" style="width:100%;justify-content: flex-end;">
                        <button type="button" id="prevBtn" class="dash-cancel-btn tran3s  me-3" onclick="nextPrev(-1)">Previous</button>
                        <button type="button" id="nextBtn" class="dash-btn-two tran3s" onclick="nextPrev(1)">Next</button>
                    </div>
                </div>

                <!-- Compensation & Benefits-->

                <div class="bg-white card-box border-20 hide section" id="step4">
                    <h4 class="dash-title-three">Compensation & Benefits</h4>
                    <div class="row">
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Monthly Salary:</label>
                            <input type="text" name="MonthlySalary" placeholder="">
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Housing Details:</label>
                            <textarea type="text" name="HousingDetails" placeholder="Size, type, furnished/unfurnished, utilities covered, etc."></textarea>
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Relocation Allowance:</label>
                            <input type="text" name="RelocationAllowance" placeholder=""></input>
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Airfare: </label>
                            <input type="text" name="Airfare" placeholder="">
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Health & Dental Insurance:</label>
                            <input type="text" name="Health&DentalInsurance" placeholder="prep time, meetings">
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Pension:</label>
                            <input type="text" name="Pension:" placeholder="">
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Vacation & Sick Leave:</label>
                            <input type="text" name="Vacation&SickLeave" placeholder="">
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">National Holidays:</label>
                            <select class="nice-select">
                                <option>Paid</option>
                                <option>Unpaid</option>
                            </select>
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Professional Development Opportunities:</label>
                            <input type="text" name="ProfessionalDevelopmentOpportunities" placeholder="">
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Overtime Pay:</label>
                            <input type="text" name="OvertimePay" placeholder="">
                        </div>
                    </div>
                    <div class="button-group d-inline-flex align-items-center mt-30" style="width:100%;justify-content: flex-end;">
                        <button type="button" id="prevBtn" class="dash-cancel-btn tran3s  me-3" onclick="nextPrev(-1)">Previous</button>
                        <button type="button" id="nextBtn" class="dash-btn-two tran3s" onclick="nextPrev(1)">Next</button>
                    </div>
                </div>

                <div class="bg-white card-box border-20 hide section" id="step5">
                    <h4 class="dash-title-three">Requirements & Qualifications</h4>
                    <div class="row">
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Education:</label>
                            <input type="text" name="Education" placeholder="">
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Teaching Certificate:</label>
                            <input type="text" name="HousingDetails" placeholder=""></input>
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Experience:</label>
                            <input type="text" name="Experience" placeholder=""></input>
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Background Check:</label>
                            <input type="text" name="BackgroundCheck" placeholder="">
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Health Check Requirements:</label>
                            <input type="text" name="HealthCheckRequirements" placeholder="">
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Preferred Accent:</label>
                            <input type="text" name="PreferredAccent" placeholder="">
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Visa Type:</label>
                            <input type="text" name="VisaType" placeholder="">
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Language Proficiency:</label>
                            <input type="text" name="LanguageProficiency" placeholder="">
                        </div>
                    </div>
                    <div class="button-group d-inline-flex align-items-center mt-30" style="width:100%;justify-content: flex-end;">
                        <button type="button" id="prevBtn" class="dash-cancel-btn tran3s  me-3" onclick="nextPrev(-1)">Previous</button>
                        <button type="button" id="nextBtn" class="dash-btn-two tran3s" onclick="nextPrev(1)">Next</button>
                    </div>
                </div>

                <div class="bg-white card-box border-20 hide section" id="step6">
                    <h4 class="dash-title-three">Onboarding Process</h4>
                    <div class="row">
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Arrival Assistance:</label>
                            <input type="text" name="ArrivalAssistance" placeholder="Airport pick-up, initial days' guidance">
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Initial Accommodation:</label>
                            <input type="text" name="InitialAccommodation" placeholder=""></input>
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">First Week Structure:</label>
                            <input type="text" name="FirstWeekStructure" placeholder="Orientation, training, introductions, etc."></input>
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Induction Programs:</label>
                            <input type="text" name="InductionPrograms" placeholder="Training, school's philosophy, methodologies, etc.">
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Mentorship:</label>
                            <input type="text" name="Mentorship" placeholder="">
                        </div>
                    </div>
                    <div class="button-group d-inline-flex align-items-center mt-30" style="width:100%;justify-content: flex-end;">
                        <button type="button" id="prevBtn" class="dash-cancel-btn tran3s  me-3" onclick="nextPrev(-1)">Previous</button>
                        <button type="button" id="nextBtn" class="dash-btn-two tran3s" onclick="nextPrev(1)">Next</button>
                    </div>
                </div>

                <div class="bg-white card-box border-20 hide section" id="step7">
                    <h4 class="dash-title-three">Location & Environment</h4>
                    <div class="row">
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">City/Town:</label>
                            <input type="text" name="City/Town" placeholder="">
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Neighborhood Description:</label>
                            <input type="text" name="NeighborhoodDescription" placeholder=""></input>
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Proximity to Landmarks:</label>
                            <input type="text" name="ProximitytoLandmarks" placeholder=""></input>
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Local Amenities:</label>
                            <input type="text" name="Local Amenities" placeholder="">
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">School Facilities:</label>
                            <input type="text" name="School Facilities" placeholder="">
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Public Transport Options:</label>
                            <input type="text" name="Public Transport Options" placeholder="">
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Work Environment & Culture:</label>
                            <input type="text" name="Work Environment & Culture" placeholder="">
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Co-teachers or Assistant Teachers Available:</label>
                            <input type="text" name="Co-teachers or Assistant Teachers Available" placeholder="">
                        </div>
                    </div>
                    <div class="button-group d-inline-flex align-items-center mt-30" style="width:100%;justify-content: flex-end;">
                        <button type="button" id="prevBtn" class="dash-cancel-btn tran3s  me-3" onclick="nextPrev(-1)">Previous</button>
                        <button type="button" id="nextBtn" class="dash-btn-two tran3s" onclick="nextPrev(1)">Next</button>
                    </div>
                </div>
                <div class="bg-white card-box border-20 hide section" id="step8">
                    <h4 class="dash-title-three">Support for Foreign Teachers</h4>
                    <div class="row">
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Orientation & Training:</label>
                            <input type="text" name="Orientation & Training" placeholder="">
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Cultural Assimilation Programs:</label>
                            <input type="text" name="Cultural Assimilation Programs" placeholder=""></input>
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Language Courses or Assistance:</label>
                            <input type="text" name="Language Courses or Assistance" placeholder=""></input>
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Assistance with Setting up Local Bank Account, Phone</label>
                            <input type="text" name="Assistance with Setting" placeholder="">
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Emergency Contacts & Support:</label>
                            <input type="text" name="Emergency Contacts & Support" placeholder="">
                        </div>

                    </div>
                    <div class="button-group d-inline-flex align-items-center mt-30" style="width:100%;justify-content: flex-end;">
                        <button type="button" id="prevBtn" class="dash-cancel-btn tran3s  me-3" onclick="nextPrev(-1)">Previous</button>
                        <button type="button" id="nextBtn" class="dash-btn-two tran3s" onclick="nextPrev(1)">Next</button>
                    </div>
                </div>

                <div class="bg-white card-box border-20 hide section" id="step9">
                    <h4 class="dash-title-three">Application & Recruitment Process</h4>
                    <div class="row">
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Required Documents:</label>
                            <input type="text" name="Required Documents" placeholder="">
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Interview Process:</label>
                            <input type="text" name="Interview Process" placeholder=""></input>
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Application Deadline:</label>
                            <input type="text" name="Application Deadline" placeholder=""></input>
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Contract Review Process:</label>
                            <input type="text" name="Contract Review Process" placeholder="">
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Decision Deadline:</label>
                            <input type="text" name="Decision Deadline" placeholder="">
                        </div>

                    </div>
                    <div class="button-group d-inline-flex align-items-center mt-30" style="width:100%;justify-content: flex-end;">
                        <button type="button" id="prevBtn" class="dash-cancel-btn tran3s  me-3" onclick="nextPrev(-1)">Previous</button>
                        <button type="button" id="nextBtn" class="dash-btn-two tran3s" onclick="nextPrev(1)">Next</button>
                    </div>
                </div>

                <div class="bg-white card-box border-20 hide section" id="step10">
                    <h4 class="dash-title-three">Additional Information</h4>
                    <div class="row">
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Extracurricular Duties:</label>
                            <input type="text" name="Extracurricular Duties" placeholder="">
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Performance Evaluations:</label>
                            <input type="text" name="Performance Evaluations" placeholder=""></input>
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Advancement Opportunities:</label>
                            <input type="text" name="Advancement Opportunities" placeholder=""></input>
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">School's Values & Teaching Philosophy: </label>
                            <input type="text" name="School's Values & Teaching Philosophy" placeholder="">
                        </div>

                    </div>
                    <div class="button-group d-inline-flex align-items-center mt-30" style="width:100%;justify-content: flex-end;">
                        <button type="button" id="prevBtn" class="dash-cancel-btn tran3s  me-3" onclick="nextPrev(-1)">Previous</button>
                        <button type="button" id="nextBtn" class="dash-btn-two tran3s" onclick="nextPrev(1)">Next</button>
                    </div>
                </div>

                <div class="bg-white card-box border-20 hide section" id="step11">
                    <h4 class="dash-title-three">Reviews & Testimonials</h4>
                    <div class="row">
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Links to Teacher Testimonials or Reviews:</label>
                            <textarea type="text" name="Links to Teacher Testimonials or Reviews" placeholder=""></textarea>
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Option to Contact Current/Past Foreign Teachers:</label>
                            <textarea type="text" name="Option to Contact Current/Past Foreign Teachers" placeholder=""></textarea>
                        </div>

                    </div>
                    <div class="button-group d-inline-flex align-items-center mt-30" style="width:100%;justify-content: flex-end;">
                        <button type="button" id="prevBtn" class="dash-cancel-btn tran3s  me-3" onclick="nextPrev(-1)">Previous</button>
                        <button type="submit" id="nextBtn" class="dash-btn-two tran3s">Submit</button>
                    </div>

                </div>
                <!-- <div class="button-group d-inline-flex align-items-center mt-30" style="width:100%;justify-content: flex-end;">
                    <button type="button" id="prevBtn" class="dash-cancel-btn tran3s  me-3 hide" onclick="nextPrev(-1)">Previous</button>
					<button type="button" id="nextBtn" class="dash-btn-two tran3s" onclick="nextPrev(1)">Next</button>
				</div>	 -->
        </div>

        <!-- /.card-box -->

        </form>
    </div>
    <script>
        var currentSection = 1;

        var sections = document.querySelectorAll('.section');

        function hidePreviousButton() {
            const prevBtn = document.getElementById("prevBtn");
            if (currentSection > 1) {
                prevBtn.classList.remove("hide");
            } else {
                prevBtn.classList.add("hide");
            }
        }

        function showSection() {
            const prevBtn = document.getElementById("step" + currentSection);
            prevBtn.classList.remove("hide");
            prevBtn.classList.add("show");
        }

        function nextPrev(val) {
            const prevBtn = document.getElementById("step" + currentSection);
            prevBtn.classList.add("hide");
            prevBtn.classList.remove("show");
            currentSection += val;
            showSection();
            hidePreviousButton()

        }
    </script>
    <!-- <script>
    document.getElementById("myForm").addEventListener("submit", function(event) {
        event.preventDefault();

        var formData = new FormData(this);

       
        var formDataObject = {};
        formData.forEach(function(value, key) {
            formDataObject[key] = value;
        });
        console.log(formDataObject);

       
    });
</script> -->
    @endsection