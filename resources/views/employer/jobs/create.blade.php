@extends('employer.layout.main')
@section('title')
Post A Job
@endsection
@section('page-head')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('content')

<style>
    .show {
        display: block;
    }

    .hide {
        display: none;
    }
    .select2-container--default.select2-container--focus .select2-selection--multiple {
        outline: 0;
        height: 55px;
        width: 100% !important;
        border: 1px solid gainsboro;
        overflow-y: scroll;
    }
    span.select2-selection.select2-selection--multiple {
        height: 55px;
        border: 1px solid gainsboro;
    }

    .form-select{
        border: 1px solid gainsboro; 
        height: 55px;
    }
    .select2-container {
        width: 100% !important; 
    }
</style>

<div class="dashboard-body">
    <div class="position-relative">
        <!-- ************************ Header **************************** -->
           @include('employer.layout.header_menu')
        <!-- End Header -->

        <h2 class="main-title">Post a New Job</h2>
        <div>
            <form id="employer-job-form" action="{{route('employer-jobs.store')}}" enctype="multipart/form-data" method = "POST" class="search-form">
                 @csrf
                <div class="bg-white card-box border-20 section" id="step1">

                    <h4 class="dash-title-three">Position Overview</h4>
                    <div class="row">
                        {{-- <div class="col-md-6">
                            <div class="dash-input-wrapper mb-30">
                                <label for="">School Vision:</label>
                                <input type="text" name="school_vision" placeholder="Briefly describe the school's ethos, aims, and values.">
                            </div>
                        </div> --}}
                        <div class="col-md-6">
                            <div class="dash-input-wrapper mb-30">
                                <label for="">Unique Selling Points:</label>
                                <input type="hidden" name="unique_selling_point">
                                <select name="unique_selling_point" id="unique_selling_point" multiple>
                                    <option value="Proximit to Subway">Proximit to Subway</option>
                                    <option value="Seoul Location">Seoul Location</option>
                                    <option value="Competitive Compensation">Competitive Compensation</option>
                                    <option value="Bonus Incentives">Bonus Incentives</option>
                                    <option value="Opportunity for Renewal Contract">Opportunity for Renewal Contract</option>
                                    <option value="Health Insurance Coverage">Health Insurance Coverage</option>
                                    <option value="Provided Accommodation">Provided Accommodation</option>
                                    <option value="Training Opportunities">Training Opportunities</option>
                                    <option value="Public Holidays Off">Public Holidays Off</option>
                                    <option value="Paid Time Off">Paid Time Off</option>
                                    <option value="Sick Leave">Sick Leave</option>
                                    <option value="Flexible Hours">Flexible Hours</option>
                                    <option value="No Weekend Work">No Weekend Work</option>
                                    <option value="Launch or Dinner Provided">Launch or Dinner Provided</option>
                                </select>
                                {{-- <input type="text" name="unique_selling_point" placeholder="Highlight what sets the school apart."> --}}
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="dash-input-wrapper mb-30">
                                <label for="">Key Candidate Qualifications:</label>
                                <input type="hidden" name="ideal_candidate_profile">
                                <select id="ideal_candidate_profile" multiple>
                                    <option value="1 Year Teaching Experience">1 Year Teaching Experience</option>
                                    <option value="2 Years+ Teaching Experience">2 Years+ Teaching Experience</option>
                                    <option value="Qualified Teacher">Qualified Teacher</option>
                                    <option value="Clear Pronounciation">Clear Pronounciation</option>
                                    <option value="Native English Speaker">Native English Speaker</option>
                                    <option value="Able to adapt quickly to Korean Culture">Able to adapt quickly to Korean Culture</option>
                                    <option value="Can work Autonomously">Can work Autonomously</option>
                                    <option value="Passionate About Teaching Kids">Passionate About Teaching Kids</option>
                                    <option value="Can Create and Implement New Curriculum">Can Create and Implement New Curriculum</option>
                                    <option value="Basic Korean Language Proficiency">Basic Korean Language Proficiency</option>
                                    <option value="Fluent in Korean">Fluent in Korean</option>
                                    <option value="Can Work Flexible Hours">Can Work Flexible Hours</option>
                                    <option value="Work Weekends">Work Weekends</option>
                                    <option value="Quick Learner">Quick Learner</option>
                                </select>
                                {{-- <input type="text" name="ideal_candidate_profile" placeholder="Outline qualities the school is particularly looking for."> --}}
                            </div>
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Job Type:</label>
                            <select class="nice-select" name="job_type">
                                <option value="Full Time" selected>Full Time</option>
                                <option value="Part Time">Part Time</option>
                                <option value="Fixed Term Contract">Fixed Term Contract</option>
                            </select>
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-12">
                            <label for="">Description:</label>
                            <textarea class="size-lg summernote" name="job_description" placeholder="">

                                <b>Tips:</b> Provide a summary of the role, what success in the position looks like, and how this role fits into the organization overall.<br><br>

                                <b>Responsibilities</b>
                                [Be specific when describing each of the responsibilities. Use gender-neutral, inclusive language.]
                                <br>Example: Determine and develop user requirements for systems in production, to ensure maximum usability <br><br>
                                <b>Qualifications</b>
                                [Some qualifications you may want to include are Skills, Education, Experience, or Certifications.] <br>
                                Example: Excellent verbal and written communication skills
                            </textarea>
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
                            <label for="">Job Category:</label>
                            <select name="job_category_id" id="job_category_id" class="nice-select">
                                    @if(!$jobCategories->isEmpty())
                                    @foreach($jobCategories as $jobCategory)
                                    <option value="{{$jobCategory->id}}">{{$jobCategory->name}}</option>
                                    @endforeach
                                    @else
                                    <option value="" selected>Select</option>
                                    @endif
                            </select>
                        </div>
                        <!-- /.dash-input-wrapper -->
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Job Title:</label>
                            <input type="text" name="job_title" placeholder="e.g., ESL Instructor, Children’s English Teacher">
                        </div>
                    
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Renewal Possibilities:</label>
                            <select class="nice-select" name="renewal_possibilities">
                                <option value="Yes" selected>Yes</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                        <!-- /.dash-input-wrapper -->
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Contract Duration:</label>
                            <select class="nice-select" name="contract_duration">
                                <option value="1 Year" selected>1 Year</option>
                                <option value="2 Years or More">2 Years or More</option>
                            </select>
                            {{-- <input type="text" name="contract_duration" placeholder=""> --}}
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Start Date:</label>
                            <input type="date" name="start_date" placeholder=""></input>
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">End Date:</label>
                            <input type="date" name="end_date" placeholder=""></input>
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-12">
                            <label for="">Salary Breakdown:</label>
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Monthly Pay:</label>
                            <input type="text" list="monthly_amount" name="monthly_salary"/>
                            <datalist id="monthly_amount">
                                <option>Negotiation</option>
                                <option>2.5k - 3k</option>
                            </datalist>

                        </div>
                        {{-- <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Allowances and other incentives.</label>
                            <input type="text" name="allownces_other_incentives" placeholder=""></input>
                        </div> --}}
                        {{-- <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for=""> Specify:</label>
                            <select class="nice-select" name="specify">
                                <option value="KRW" selected>KRW </option>
                                <option value="USD">USD</option>
                            </select>
                        </div> --}}
                        {{-- <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Tax Deductions</label>
                            <input type="text" name="tax_deductions" placeholder=""></input>
                        </div> --}}
                        {{-- <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Bonuses</label>
                            <input type="text" name="bonuses" placeholder=""></input>
                        </div> --}}
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Monthly Payment Day:</label>
                            <input type="date" name="payday_details" placeholder=""></input>
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
                            <input type="hidden" name="student_age_group">
                            <select id="student_age_group" multiple>
                                <option value="Kindergarten">Kindergarten</option>
                                <option value="Elementary">Elementary</option>
                                <option value="Middle School">Middle School</option>
                                <option value="High School">High School</option>
                                <option value="Adults">Adults</option>
                            </select>
                            {{-- <input type="text" name="student_age_group" placeholder=""> --}}
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Class Size:</label>
                            <select id="class_size" class="nice-select" name="class_size" >
                                <option value="1-5">1-5</option>
                                <option value="6-10">6-10</option>
                                <option value="10-15">10-15</option>
                                <option value="15-20">15-20</option>
                                <option value="20+">20+</option>
                            </select>
                            {{-- <input type="text" name="class_size" placeholder=""> --}}
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Hours/Week:</label>
                            <input type="number" class="number-input" name="hours_per_week" placeholder="">
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Classes Each Day:</label>
                            <select class="nice-select" name="teaching_hours_per_day">
                                <option value="1-5 Classes Per Day" selected>1-5 Classes Per Day</option>
                                <option value="5-10 Classes Per Day">5-10 Classes Per Day</option>
                                <option value="Other">Other</option>
                            </select>
                            {{-- <input type="number" class="number-input" name="teaching_hours_per_day" placeholder=""> --}}
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Preparation Time</label>
                            <select class="nice-select" name="non_teaching_hours_per_day">
                                <option value="Yes" selected>Yes</option>
                                <option value="No">No</option>
                            </select>
                            {{-- <input type="number" class="number-input" name="non_teaching_hours_per_day" placeholder="prep time, meetings"> --}}
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Break times</label>
                            <select id="break_times" class="nice-select" name="break_times" >
                                <option value="Between Classes">Between Classes</option>
                                <option value="1 Hour Per Day">1 Hour Per Day</option>
                                <option value="2 Hour Per Day">2 Hour Per Day</option>
                                <option value="1 Hour or Less Per Day">1 Hour or Less Per Day</option>
                                <option value="Other">Other</option>
                            </select>
                            {{-- <input type="text" name="break_times" placeholder=""> --}}
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Type of Class:</label>
                            <input type="hidden" name="curriculum_overview">
                            <select id="curriculum_overview" multiple>
                                <option value="Phonics">Phonics</option>
                                <option value="Speaking Class">Speaking Class</option>
                                <option value="Reading Class">Reading Class</option>
                                <option value="Writing Class">Writing Class</option>
                                <option value="Other">Other</option>
                            </select>
                            {{-- <input type="text" name="curriculum_overview" placeholder=""> --}}
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Class Duration:</label>
                            <select class="nice-select" name="class_duration">
                                <option value="30 Minutes" selected>30 Minutes</option>
                                <option value="40 Minutes">40 Minutes</option>
                                <option value="45 Minutes">45 Minutes</option>
                                <option value="50 Minutes">50 Minutes</option>
                                <option value="1 Hour">1 Hour</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        {{--<div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Materials & Resources Available:</label>
                            <input type="text" name="material_resources_available" placeholder="">
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Teaching Aids:</label>
                            <input type="text" name="teaching_aids" placeholder="smartboards, projectors">
                        </div>--}}
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Start Time:</label>
                            <input type="time" name="start_time" >
                        </div>

                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Finish Time:</label>
                            <input type="time" name="finish_time" >
                        </div>
                    </div>
                    <div class="button-group d-inline-flex align-items-center mt-30" style="width:100%;justify-content: flex-end;">
                        <button type="button" id="prevBtn" class="dash-cancel-btn tran3s  me-3" onclick="nextPrev(-1)">Previous</button>
                        <button type="button" id="nextBtn" class="dash-btn-two tran3s" onclick="nextPrev(1)">Next</button>
                    </div>
                </div>

                <!-- Compensation & Benefits-->

                <div class="bg-white card-box border-20 hide section" id="step4">
                    <h4 class="dash-title-three">Benefits</h4>
                    <div class="row">
                        {{-- <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Monthly Salary (USD):</label>
                            <input type="number" name="monthly_salary" placeholder="">
                        </div> --}}
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Housing Included:</label>
                            <select class="nice-select" name="housing_included">
                                <option value="Yes" selected>Yes</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Insurance Included:</label>
                            <select class="nice-select" name="Insurance_included">
                                <option value="Yes" selected>Yes</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Visa Application Assistance</label>
                            {{--<input type="text" name="relocation_allowance" placeholder=""></input>--}}
                            <select class="nice-select" name="relocation_allowance">
                                <option value="Yes" selected>Yes</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Housing Details:</label>
                            <select class="nice-select" name="housing_details">
                                <option value="Furnished" selected>Furnished</option>
                                <option value="Unfurnished">Unfurnished</option>
                                <option value="Partially Furnished">Partially Furnished</option>
                            </select>
                            {{-- <textarea type="text" name="housing_details" placeholder="Size, type, furnished/unfurnished, utilities covered, etc."></textarea> --}}
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Health Insurance:</label>
                            {{--<textarea type="text" name="health_dental_insurance" placeholder="Insurance Details"></textarea>--}}
                            <select class="nice-select" name="health_dental_insurance">
                                <option value="Yes" selected>Yes</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Airfare: </label>
                            <select class="nice-select specify">
                                <option value="">Select Airfare</option>
                                <option value="Return Flight (Paid End Of Contract)" selected>Return Flight (Paid End Of Contract)</option>
                                <option value="Single Flight (Reimbursed First Pay Check)">Single Flight (Reimbursed First Pay Check)</option>
                                <option value="Single Flight (Paid End Of Contract)">Single Flight (Paid End Of Contract)</option>
                                <option value="Single Flight (Paid By Employer)">Single Flight (Paid By Employer)</option>
                                <option value="No Airfare">No Airfare</option>
                                <option value="Other">Other (specify)</option>
                            </select>
                            <input type="hidden" class="select-hidden-input" name="airfare" placeholder="Airfare">
                            {{-- <input type="text" name="airfare" placeholder=""> --}}
                        </div>
                        
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Pension:</label>
                            <select class="nice-select" name="pension">
                                <option value="Yes" selected>Yes</option>
                                <option value="No">No</option>
                            </select>
                            {{-- <input type="text" name="pension" placeholder=""> --}}
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">National Holidays:</label>
                            <select class="nice-select" name="national_holidays">
                                <option value="Yes-Paid" selected>Yes-Paid</option>
                                <option value="Yes-Unpaid">Yes-Unpaid</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Paid Vacation</label>
                            <select class="nice-select" name="paid_vacation">
                                <option value="11 Days" selected>11 Days</option>
                                <option value="Other (Specify how many days)">Other (Specify how many days)</option>
                                <option value="No">No</option>
                            </select>
                        </div>

                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for=""> Sick Leave:</label>
                            <select class="nice-select" name="sick_leave">
                                <option value="Yes" selected>Yes</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                        
                        {{-- <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Professional Development Opportunities:</label>
                            <input type="text" name="professional_development_opportunities" placeholder="">
                        </div> --}}
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Overtime Pay:</label>
                            {{--<input type="text" name="overtime_pay" placeholder="">--}}
                            <select class="nice-select" name="overtime_pay">
                                <option value="Yes" selected>Yes</option>
                                <option value="No">No</option>
                            </select>
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
                            <select class="nice-select" name="education">
                                <option value="High School Diploma/GED" selected>High School Diploma/GED</option>
                                <option value="Associate's Degree">Associate's Degree</option>
                                <option value="Bachelor's Degree">Bachelor's Degree</option>
                                <option value="Master's Degree">Master's Degree</option>
                                <option value="Doctorate/Ph.D.">Doctorate/Ph.D.</option>
                                <option value="Professional Certification">Professional Certification</option>
                                <option value="Vocational Training">Vocational Training</option>
                                <option value="Other">Other (Please Specify)</option>
                            </select>
                            <input type="hidden" class="select-hidden-input" name="education" placeholder="Education">
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Teaching Certificate:</label>
                            <select class="nice-select specify">
                                <option value="">Select Certificate</option>
                                <option value="TESOL" selected>TESOL</option>
                                <option value="TEFL">TEFL</option>
                                <option value="CELTA">CELTA</option>
                                <option value="DELTA">DELTA</option>
                                <option value="TESL">TESL</option>
                                <option value="Other">Other (Please Specify)</option>
                            </select>
                            <input type="hidden" class="select-hidden-input" name="teaching_certificate" placeholder="Certificate">
                            {{-- <input type="text" name="teaching_certificate" placeholder=""></input> --}}
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Teaching Experience:</label>
                            <select class="nice-select" name="experience_level">
                                <option value="0-1 Year" selected>0-1 Year</option>
                                <option value="1-3 Years">1-3 Years</option>
                                <option value="3-5 Years">3-5 Years</option>
                                <option value="5-7 Years">5-7 Years</option>
                                <option value="7-10 Years">7-10 Years</option>
                                <option value="10+ Years">10+ Years</option>
                            </select>
                        </div>
                        {{-- <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Experience Details:</label>
                            <input type="text" name="experience" placeholder=""></input>
                        </div> --}}
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Reference Required:</label>
                            <select class="nice-select" name="background_check">
                                <option value="Yes" selected>Yes</option>
                                <option value="No">No</option>
                            </select>
                            {{-- <input type="text" name="background_check" placeholder=""> --}}
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Health Check Requirements:</label>
                            <select class="nice-select" id="health_check_requirement" name="health_check_requirement">
                                <option value="Yes" >Yes</option>
                                <option value="No" >No</option>
                            </select>
                            {{-- <input type="text" name="health_check_requirement" placeholder=""> --}}
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Preferred Accent:</label>
                            <input type="hidden" name="preferred_accent">
                            <select id="preferred_accent" multiple>
                                <option value="British English" >British English</option>
                                <option value="American English" >American English</option>
                                <option value="Canadian English" >Canadian English</option>
                                <option value="Australian English" >Australian English</option>
                                <option value="New Zealand English" >New Zealand English</option>
                                <option value="South African English" >South African English</option>
                                <option value="Scottish English" >Scottish English</option>
                            </select>
                            {{-- <input type="text" name="preferred_accent" placeholder=""> --}}
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Visa Type:</label>
                            <select class="nice-select specify" id="visa_type">
                                <option value="Eligible E2 Visa Application" >Eligible E2 Visa Application</option>
                                <option value="E-1 (Professorship)" >E-1 (Professorship)</option>
                                <option value="E-2 (Teaching)" >E-2 (Teaching)</option>
                                <option value="E-3 (Research)" >E-3 (Research)</option>
                                <option value="E-4 (Technial Internship)" >E-4 (Technial Internship)</option>
                                <option value="E-5 (Professional Employment)" >E-5 (Professional Employment)</option>
                                <option value="E-6 (Entertainment)" >E-6 (Entertainment)</option>
                                <option value="E-7 (Special Occupation)" >E-7 (Special Occupation)</option>
                                <option value="E-10 (Non-Professional Employment)" >E-9 (Non-Professional Employment)</option>
                                <option value="E-10 (Job Seeking)" >E-10 (Job Seeking)</option>
                                <option value="F-2 (Resident)" >F-2 (Resident)</option>
                                <option value="F-5 (Permanent Resident)" >F-5 (Permanent Resident)</option>
                                <option value="F-6 (Marriage Migrant)" >F-6 (Marriage Migrant)</option>
                                <option value="Other" >Other (Please Specify)</option>
                            </select>
                            <input type="hidden" class="select-hidden-input" name="visa_type" placeholder="Visa Type">
                            {{-- <input type="text" name="visa_type" placeholder=""> --}}
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Language Proficiency:</label>
                            <select class="nice-select" id="language_proficiency" name="language_proficiency">
                                <option value="Native/Bilingual Proficiency" >Native/Bilingual Proficiency</option>
                                <option value="Fluent" >Fluent</option>
                                <option value="Advanced" >Advanced</option>
                                <option value="Intermediate" >Intermediate</option>
                                <option value="Basic" >Basic</option>
                                <option value="None" >None</option>
                            </select>
                            {{-- <input type="text" name="language_proficiency" placeholder=""> --}}
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
                            <select class="nice-select" id="arrival_assitance" name="arrival_assitance">
                                <option value="Airport Pickup" >Airport Pickup</option>
                                <option value="Temporary Accommodation Assistance" >Temporary Accommodation Assistance</option>
                                <option value="Assistance With Documentation" >Assistance With Documentation</option>
                                <option value="Not Provided" >Not Provided</option>
                            </select>
                            {{-- <input type="text" name="arrival_assitance" placeholder="Airport pick-up, initial days' guidance"> --}}
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Initial Accommodation:</label>(If the provided accomodation is not ready upon your arrival, the employer will arrange temporary housing until it is ready for occupancy)
                            <select class="nice-select" id="initial_accomodation" name="initial_accomodation">
                                <option value="No" >No</option>
                                <option value="Yes" >Yes</option>
                            </select>
                            {{-- <input type="text" name="initial_accomodation" placeholder=""></input> --}}
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Training:</label>
                            <select class="nice-select" id="first_week_structure" name="first_week_structure">
                                <option value="Unpaid" >Unpaid</option>
                                <option value="Paid" >Paid</option>
                            </select>
                            {{-- <input type="text" name="first_week_structure" placeholder="Orientation, training, introductions, etc."></input> --}}
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Traning Duration:</label>
                            <select class="nice-select" id="induction_programs" name="induction_programs">
                                <option value="1 Week" >1 Week</option>
                                <option value="2 Weeks" >2 Weeks</option>
                                <option value="3 Weeks" >3 Weeks</option>
                                <option value="4 Weeks" >4 Weeks</option>
                            </select>
                            {{-- <input type="text" name="induction_programs" placeholder="Training, school's philosophy, methodologies, etc."> --}}
                        </div>
                        {{-- <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Mentorship:</label>
                            <input type="text" name="mentorship" placeholder="">
                        </div> --}}
                    </div>
                    <div class="button-group d-inline-flex align-items-center mt-30" style="width:100%;justify-content: flex-end;">
                        <button type="button" id="prevBtn" class="dash-cancel-btn tran3s  me-3" onclick="nextPrev(-1)">Previous</button>
                        <button type="button" id="nextBtn" class="dash-btn-two tran3s" onclick="nextPrev(1)">Next</button>
                    </div>
                </div>

                {{-- <div class="bg-white card-box border-20 hide section" id="step7">
                    <h4 class="dash-title-three">Location & Environment</h4>
                    <div class="row">
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">City/Town:</label>
                            <input type="text" name="city_town" placeholder="">
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Neighborhood Description:</label>
                            <input type="text" name="neighbourhood_description" placeholder=""></input>
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Proximity to Landmarks:</label>
                            <input type="text" name="proximity_to_landmarks" placeholder=""></input>
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Local Amenities:</label>
                            <input type="text" name="local_amenities" placeholder="">
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">School Facilities:</label>
                            <input type="text" name="school_facilities" placeholder="">
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Public Transport Options:</label>
                            <input type="text" name="public_transport_options" placeholder="">
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Work Environment & Culture:</label>
                            <input type="text" name="work_enviroment_and_culture" placeholder="">
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Co-teachers or Assistant Teachers Available:</label>
                            <input type="text" name="co_assistant_teachers_availability" placeholder="">
                        </div>
                    </div>
                    <div class="button-group d-inline-flex align-items-center mt-30" style="width:100%;justify-content: flex-end;">
                        <button type="button" id="prevBtn" class="dash-cancel-btn tran3s  me-3" onclick="nextPrev(-1)">Previous</button>
                        <button type="button" id="nextBtn" class="dash-btn-two tran3s" onclick="nextPrev(1)">Next</button>
                    </div>
                </div> --}}
                <div class="bg-white card-box border-20 hide section" id="step7">
                    <h4 class="dash-title-three">Support for Foreign Teachers</h4>
                    <div class="row">
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Orientation & Training:</label>
                            <input type="text" name="orientation_and_training" placeholder="">
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Cultural Assimilation Programs:</label>
                            <input type="text" name="culture_assimilation_program" placeholder=""></input>
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Language Courses or Assistance:</label>
                            <input type="text" name="language_courses_or_asistance" placeholder=""></input>
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Assistance with Setting up Local Bank Account, Phone</label>
                            <input type="text" name="local_bank_account_assistance" placeholder="">
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Emergency Contacts & Support:</label>
                            <input type="text" name="emergency_contacts_and_support" placeholder="">
                        </div>

                    </div>
                    <div class="button-group d-inline-flex align-items-center mt-30" style="width:100%;justify-content: flex-end;">
                        <button type="button" id="prevBtn" class="dash-cancel-btn tran3s  me-3" onclick="nextPrev(-1)">Previous</button>
                        <button type="button" id="nextBtn" class="dash-btn-two tran3s" onclick="nextPrev(1)">Next</button>
                    </div>
                </div>

                <div class="bg-white card-box border-20 hide section" id="step8">
                    <h4 class="dash-title-three">Application & Recruitment Process</h4>
                    <div class="row">
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">E2 Visa Document Required:</label>
                            <div>
                                <select class="nice-select" id="required_documents" name="required_documents">
                                    <option value="No" >No</option>
                                    <option value="Yes" >Yes</option>
                                </select>
                            </div>
                            <div>
                                <select class="form-select d-none my-2" id="document_type" name="document_type">
                                    <option value="">Select Document Type</option>
                                    <option value="Apostilled Degree Certificate" >Apostilled Degree Certificate</option>
                                    <option value="Apostilled Background Check (Within last 6 months)" >Apostilled Background Check (Within last 6 months)</option>
                                    <option value="SAQA Letter (South Africa Applicants Only )" >SAQA Letter (South Africa Applicants Only )</option>
                                </select>
                            </div>
                            {{-- <input type="text" name="required_documents" placeholder=""> --}}
                        </div>
                        {{-- <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Interview Process:</label>
                            <input type="text" name="interview_process" placeholder=""></input>
                        </div> --}}
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Application Deadline:</label>
                            <input type="date" name="application_deadline" placeholder=""></input>
                        </div>
                        {{-- <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Contract Review Process:</label>
                            <input type="text" name="contact_review_process" placeholder="">
                        </div> --}}
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Decision Deadline:</label>
                            <input type="date" name="decision_deadline" placeholder="">
                        </div>

                    </div>
                    <div class="button-group d-inline-flex align-items-center mt-30" style="width:100%;justify-content: flex-end;">
                        <button type="button" id="prevBtn" class="dash-cancel-btn tran3s  me-3" onclick="nextPrev(-1)">Previous</button>
                        <button type="button" id="nextBtn" class="dash-btn-two tran3s" onclick="nextPrev(1)">Next</button>
                    </div>
                </div>

                {{-- <div class="bg-white card-box border-20 hide section" id="step9">
                    <h4 class="dash-title-three">Additional Information</h4>
                    <div class="row">
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Extracurricular Duties:</label>
                            <input type="text" name="extracurricular_duties" placeholder="">
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Performance Evaluations:</label>
                            <input type="text" name="performance_evaluation" placeholder=""></input>
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Advancement Opportunities:</label>
                            <input type="text" name="advancement_opportunities" placeholder=""></input>
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">School's Values & Teaching Philosophy: </label>
                            <input type="text" name="school_values_and_teaching_philosophy" placeholder="">
                        </div>

                    </div>
                    <div class="button-group d-inline-flex align-items-center mt-30" style="width:100%;justify-content: flex-end;">
                        <button type="button" id="prevBtn" class="dash-cancel-btn tran3s  me-3" onclick="nextPrev(-1)">Previous</button>
                        <button type="button" id="nextBtn" class="dash-btn-two tran3s" onclick="nextPrev(1)">Next</button>
                    </div>
                </div> --}}

                <div class="bg-white card-box border-20 hide section" id="step9">
                    <h4 class="dash-title-three">Reviews & Testimonials</h4>
                    <div class="row">
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Company Introduction</label>
                            <p>Upload a video showcasing your business, display then ambiance of the workplace, introduce your team members, or have a staff member share insigts about the job and the work enviroment.</p>
                            <input type="file" name="company_introduction" id="" accept=".mp4, .asf, .mov , .webm ,.avi , .mkv">
                            <textarea class="size-lg summernote" name="company_detail" placeholder="company_detail"></textarea>
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Option to Contact Current/Past Foreign Teachers:</label>
                            <select class="nice-select" name="option_to_current_past_foreign_teachers">
                                <option value="Yes" selected>Yes</option>
                                <option value="No">No</option>
                            </select>
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
  

   @push('page-script')
   <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
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
   <script>
        $(document).ready(function() {
            $("#ideal_candidate_profile").select2();
            $("#unique_selling_point").select2();
            $("#student_age_group").select2();
            $("#curriculum_overview").select2();
            $("#preferred_accent").select2();
            
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

            document.querySelector('#employer-job-form').addEventListener("submit" , function(e){
                e.preventDefault()
                
                document.querySelector("input[name='ideal_candidate_profile']").value = $("#ideal_candidate_profile").val();
                document.querySelector("input[name='unique_selling_point']").value = $("#unique_selling_point").val();
                document.querySelector("input[name='student_age_group']").value = $("#student_age_group").val();
                document.querySelector("input[name='curriculum_overview']").value = $("#curriculum_overview").val();
                document.querySelector("input[name='preferred_accent']").value = $("#preferred_accent").val();
                this.submit();
                
            })
            

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

        $("#required_documents").change(function(e){
            // $("document_type").toggleClass('open');
            if(this.value == 'Yes'){
                document.getElementById("document_type").classList.remove("d-none")
            } else{
                document.getElementById("document_type").classList.add("d-none")
                document.getElementById("document_type").selectedIndex = 0;
            }; 
        })

        $(document).on("change" , ".specify" , function(e){
            let value = this.value;
            let parent = this.closest(".dash-input-wrapper");
            let hiddenField = parent.querySelector(".select-hidden-input")
            if(value === "Other"){
                hiddenField.setAttribute("type" , "text");
                hiddenField.value = "";
            }else{
                hiddenField.setAttribute("type" , "hidden");
                hiddenField.value = value;
            }
        })

    </script>
   @endpush

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