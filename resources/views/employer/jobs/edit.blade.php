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
    .selection{
        overflow-y: scroll;
    }
</style>

<div class="dashboard-body">
    <div class="position-relative">
        <!-- ************************ Header **************************** -->
            @include('employer.layout.header_menu')
        <!-- End Header -->

        <h2 class="main-title">Edit Job</h2>
        <div>
            <form id="employer-job-form" action="{{route('employer-jobs.update',$id)}}" method = "POST" class="search-form">
                 @csrf
                 @method('PUT')
                <div class="bg-white card-box border-20 section" id="step1">

                    <h4 class="dash-title-three">Position Overview</h4>
                    <div class="row">
                        {{-- <div class="col-md-6">
                            <div class="dash-input-wrapper mb-30">
                                <label for="">School Vision:</label>
                                <input type="text" name="school_vision" placeholder="Briefly describe the school's ethos, aims, and values." value="{{$employerJob->school_vision ?? ''}}">
                            </div>
                        </div> --}}
                        <div class="col-md-6">
                            <div class="dash-input-wrapper mb-30">
                                <label for="">Unique Selling Points:</label>
                                <input type="hidden" name="unique_selling_point">
                                @php
                                    $uniqueSellingPoints = $employerJob->unique_selling_point ? explode(',' , $employerJob->unique_selling_point) : [];
                                @endphp
                                <select name="unique_selling_point" id="unique_selling_point" multiple>
                                    <option value="Proximit to Subway" @if(in_array( "Proximit to Subway", $uniqueSellingPoints)) selected @endif>Proximit to Subway</option>
                                    <option value="Seoul Location" @if(in_array( "Seoul Location", $uniqueSellingPoints)) selected @endif>Seoul Location</option>
                                    <option value="Competitive Compensation" @if(in_array( "Competitive Compensation", $uniqueSellingPoints)) selected @endif>Competitive Compensation</option>
                                    <option value="Bonus Incentives" @if(in_array( "Bonus Incentives", $uniqueSellingPoints)) selected @endif>Bonus Incentives</option>
                                    <option value="Opportunity for Renewal Contract" @if(in_array( "Opportunity for Renewal Contract", $uniqueSellingPoints)) selected @endif>Opportunity for Renewal Contract</option>
                                    <option value="Health Insurance Coverage" @if(in_array( "Health Insurance Coverage", $uniqueSellingPoints)) selected @endif>Health Insurance Coverage</option>
                                    <option value="Provided Accommodation" @if(in_array( "Provided Accommodation", $uniqueSellingPoints)) selected @endif>Provided Accommodation</option>
                                    <option value="Training Opportunities" @if(in_array( "Training Opportunities", $uniqueSellingPoints)) selected @endif>Training Opportunities</option>
                                    <option value="Public Holidays Off" @if(in_array( "Public Holidays Off", $uniqueSellingPoints)) selected @endif>Public Holidays Off</option>
                                    <option value="Paid Time Off" @if(in_array( "Paid Time Off", $uniqueSellingPoints)) selected @endif>Paid Time Off</option>
                                    <option value="Sick Leave" @if(in_array( "Sick Leave", $uniqueSellingPoints)) selected @endif>Sick Leave</option>
                                    <option value="Flexible Hours" @if(in_array( "Flexible Hours", $uniqueSellingPoints)) selected @endif>Flexible Hours</option>
                                    <option value="No Weekend Work" @if(in_array( "No Weekend Work", $uniqueSellingPoints)) selected @endif>No Weekend Work</option>
                                    <option value="Launch or Dinner Provided" @if(in_array( "Launch or Dinner Provided", $uniqueSellingPoints)) selected @endif>Launch or Dinner Provided</option>
                                </select>
                                {{-- <input type="text" name="unique_selling_point" placeholder="Highlight what sets the school apart."> --}}
                            </div>
                        </div>
                        {{-- <div class="col-md-6">
                            <div class="dash-input-wrapper mb-30">
                                <label for="">Unique Selling Points:</label>
                                <input type="text" name="unique_selling_point" placeholder="Highlight what sets the school apart." value="{{$employerJob->unique_selling_point ?? ''}}">
                            </div>
                        </div> --}}

                       

                        <div class="col-md-6">
                            <div class="dash-input-wrapper mb-30">
                                <label for="">Key Candidate Qualifications:</label>
                                <input type="hidden" name="ideal_candidate_profile">
                                @php
                
                                $idealCandidateProfile = $employerJob->ideal_candidate_profile ? explode(',' , $employerJob->ideal_candidate_profile) : [];
                                @endphp
                                <select id="ideal_candidate_profile" multiple>
                                    <option value="1 Year Teaching Experience" @if(in_array("1 Year Teaching Experience", $idealCandidateProfile)) selected @endif>1 Year Teaching Experience</option>
                                    <option value="2 Years+ Teaching Experience" @if(in_array("2 Years+ Teaching Experience", $idealCandidateProfile)) selected @endif>2 Years+ Teaching Experience</option>
                                    <option value="Qualified Teacher" @if(in_array("Qualified Teacher", $idealCandidateProfile)) selected @endif>Qualified Teacher</option>
                                    <option value="Clear Pronounciation" @if(in_array("Clear Pronounciation", $idealCandidateProfile)) selected @endif>Clear Pronounciation</option>
                                    <option value="Native English Speaker" @if(in_array("Native English Speaker", $idealCandidateProfile)) selected @endif>Native English Speaker</option>
                                    <option value="Able to adapt quickly to Korean Culture" @if(in_array("Able to adapt quickly to Korean Culture", $idealCandidateProfile)) selected @endif>Able to adapt quickly to Korean Culture</option>
                                    <option value="Can work Autonomously" @if(in_array("Can work Autonomously", $idealCandidateProfile)) selected @endif>Can work Autonomously</option>
                                    <option value="Passionate About Teaching Kids" @if(in_array("Passionate About Teaching Kids", $idealCandidateProfile)) selected @endif>Passionate About Teaching Kids</option>
                                    <option value="Can Create and Implement New Curriculum" @if(in_array("Can Create and Implement New Curriculum", $idealCandidateProfile)) selected @endif>Can Create and Implement New Curriculum</option>
                                    <option value="Basic Korean Language Proficiency" @if(in_array("Basic Korean Language Proficiency", $idealCandidateProfile)) selected @endif>Basic Korean Language Proficiency</option>
                                    <option value="Fluent in Korean" @if(in_array("Fluent in Korean", $idealCandidateProfile)) selected @endif>Fluent in Korean</option>
                                    <option value="Can Work Flexible Hours" @if(in_array("Can Work Flexible Hours", $idealCandidateProfile)) selected @endif>Can Work Flexible Hours</option>
                                    <option value="Work Weekends" @if(in_array("Work Weekends", $idealCandidateProfile)) selected @endif>Work Weekends</option>
                                    <option value="Quick Learner" @if(in_array("Quick Learner", $idealCandidateProfile)) selected @endif>Quick Learner</option>
                                </select>
                                {{-- <input type="text" name="ideal_candidate_profile" placeholder="Outline qualities the school is particularly looking for."> --}}
                            </div>
                        </div>
                        {{-- <div class="col-md-6">
                            <div class="dash-input-wrapper mb-30">
                                <label for="">Ideal Candidate Profile:</label>
                                <input type="text" name="ideal_candidate_profile" placeholder="Outline qualities the school is particularly looking for." value="{{$employerJob->ideal_candidate_profile ?? ''}}">
                            </div>
                        </div> --}}
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Job Type:</label>
                            <select class="nice-select" name="job_type">
                                <option value="Full Time" {{$employerJob->job_type == 'Full Time' ? 'selected' : ''}}>Full Time</option>
                                <option value="Part Time" {{$employerJob->job_type == 'Part Time' ? 'selected' : ''}}>Part Time</option>
                                <option value="Freelance" {{$employerJob->job_type == 'Freelance' ? 'selected' : ''}}>Freelance</option>
                            </select>
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-12">
                            <label for="">Description:</label>
                            <textarea class="size-lg summernote" name="job_description" placeholder="Write about the job in details...">{!! $employerJob->job_description ?? '' !!}</textarea>
                        </div>
                    </div>
                    <div class="button-group d-inline-flex align-items-center mt-30" style="width:100%;justify-content: flex-end;" >
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
                                    <option value="{{$jobCategory->id}}" {{$employerJob->job_category_id == $jobCategory->id ? 'selected' : ''}}>{{$jobCategory->name}}</option>
                                    @endforeach
                                    @else
                                    <option value="" selected>Select</option>
                                    @endif
                          
                            </select>
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Job Title:</label>
                            <input type="text" name="job_title" placeholder="e.g., ESL Instructor, Children’s English Teacher" value="{{$employerJob->job_title ?? ''}}">
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Renewal Possibilities:</label>
                            <select class="nice-select" name="renewal_possibilities">
                                <option value="Yes" {{$employerJob->renewal_possibilities == 'Yes' ? 'selected' : ''}}>Yes</option>
                                <option value="No" {{$employerJob->renewal_possibilities == 'No' ? 'selected' : ''}}>No</option>
                            </select>
                        </div>
                        <!-- /.dash-input-wrapper -->
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Contract Duration:</label>
                            <!-- <textarea class="size-lg" placeholder="Write about the job in details..."></textarea> -->
                            <select class="nice-select" name="contract_duration">
                                <option value="1 Year" @if($employerJob->contract_duration == "1 Year") selected @endif>1 Year</option>
                                <option value="2 Years or More" @if($employerJob->contract_duration == "2 Years or More") selected @endif>2 Years or More</option>
                            </select>
                            {{-- <input type="text" name="contract_duration" placeholder="" value="{{$employerJob->contract_duration ?? ''}}"> --}}
                        </div>
                        
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Start Date:</label>
                            <input type="date" name="start_date" placeholder="" value="{{$employerJob->start_date ?? ''}}"></input>
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">End Date:</label>
                            <input type="date" name="end_date" placeholder="" value="{{$employerJob->end_date ?? ''}}"></input>
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-12">
                            <label for="">Salary Breakdown:</label>
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Monthly Pay:</label>
                            <input type="text" list="monthly_amount" name="monthly_salary" value="{{$employerJob->monthly_salary}}"/>
                            <datalist id="monthly_amount">
                                <option>Negotiation</option>
                                <option>2.5k - 3k</option>
                            </datalist>

                        </div>

                        {{-- <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Base pay:</label>
                            <input type="text" name="base_pay" placeholder="" value="{{$employerJob->base_pay ?? ''}}"></input>
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Allowances and other incentives.</label>
                            <input type="text" name="allownces_other_incentives" placeholder="" value="{{$employerJob->allownces_other_incentives ?? ''}}"></input>
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for=""> Specify:</label>
                            <select class="nice-select" name="specify">
                                <option value="KRW" {{$employerJob->specify == 'KRW' ? 'selected' : ''}}>KRW </option>
                                <option value="USD" {{$employerJob->specify == 'USD' ? 'selected' : ''}}>USD</option>
                            </select>
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Tax Deductions</label>
                            <input type="text" name="tax_deductions" placeholder="" value="{{$employerJob->tax_deductions ?? ''}}"></input>
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Bonuses</label>
                            <input type="text" name="bonuses" placeholder="" value="{{$employerJob->bonuses ?? ''}}"></input>
                        </div> --}}
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Monthly Payment Day:</label>
                            <input type="date" name="payday_details" value="{{$employerJob->payday_details ?? ''}}" ></input>
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
                        {{-- <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Student Age Group:</label>
                            <input type="text" name="student_age_group" placeholder="" value="{{$employerJob->student_age_group ?? ''}}">
                        </div> --}}
                        
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Student Age Group:</label>
                            <input type="hidden" name="student_age_group">
                            @php
                                $studentAgeGroup = $employerJob->student_age_group ? explode(',' , $employerJob->student_age_group) : [];
                            @endphp
                            <select id="student_age_group" multiple>
                                <option value="Kindergarten" @if(in_array("Kindergarten" , $studentAgeGroup)) selected @endif>Kindergarten</option>
                                <option value="Elementary" @if(in_array("Elementary" , $studentAgeGroup)) selected @endif>Elementary</option>
                                <option value="Middle School" @if(in_array( "Middle School", $studentAgeGroup)) selected @endif>Middle School</option>
                                <option value="High School" @if(in_array("High School" , $studentAgeGroup)) selected @endif>High School</option>
                                <option value="Adults" @if(in_array("Adults" , $studentAgeGroup)) selected @endif>Adults</option>
                            </select>
                            {{-- <input type="text" name="student_age_group" placeholder=""> --}}
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Class Size:</label>
                            <select id="class_size" class="nice-select" name="class_size">
                                <option value="1-5" @if($employerJob->class_size == '1-5') selected @endif>1-5</option>
                                <option value="6-10" @if($employerJob->class_size == '6-10') selected @endif>6-10</option>
                                <option value="10-15" @if($employerJob->class_size == '10-15') selected @endif>10-15</option>
                                <option value="15-20" @if($employerJob->class_size == '15-20') selected @endif>15-20</option>
                                <option value="20+" @if($employerJob->class_size == '20+') selected @endif>20+</option>
                            </select>
                            {{-- <input type="text" name="class_size" placeholder="" value="{{$employerJob->class_size ?? ''}}"> --}}
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Hours/Week:</label>
                            <input type="number" class="number-input" name="hours_per_week" placeholder="" value="{{$employerJob->hours_per_week ?? ''}}">
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Classes Each Day:</label>
                            <select class="nice-select" name="teaching_hours_per_day">
                                <option value="1-5 Classes Per Day" @if($employerJob->teaching_hours_per_day == "1-5 Classes Per Day") selected @endif>1-5 Classes Per Day</option>
                                <option value="5-10 Classes Per Day" @if($employerJob->teaching_hours_per_day == "5-10 Classes Per Day") selected @endif>5-10 Classes Per Day</option>
                                <option value="Other" @if($employerJob->teaching_hours_per_day == "Other") selected @endif>Other</option>
                            </select>
                            {{-- <input type="number" class="number-input" name="teaching_hours_per_day" placeholder="" value="{{$employerJob->teaching_hours_per_day ?? ''}}"> --}}
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Non-Teaching Hours/Day:</label>
                            <label for="">Preparation Time</label>
                            <select class="nice-select" name="non_teaching_hours_per_day">
                                <option value="Yes" @if($employerJob->non_teaching_hours_per_day == "Yes") selected @endif>Yes</option>
                                <option value="No" @if($employerJob->non_teaching_hours_per_day == "No") selected @endif>No</option>
                            </select>
                            {{-- <input type="number" class="number-input" name="non_teaching_hours_per_day" placeholder="prep time, meetings" value="{{$employerJob->non_teaching_hours_per_day ?? ''}}"> --}}
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Break times</label>
                            <select id="break_times" class="nice-select" name="break_times" >
                                <option value="Between Classes">Between Classes</option>
                                <option value="1 Hour Per Day" @if($employerJob->break_times == "1 Hour Per Day" ) selected @endif>1 Hour Per Day</option>
                                <option value="2 Hour Per Day" @if($employerJob->break_times == "2 Hour Per Day" ) selected @endif>2 Hour Per Day</option>
                                <option value="1 Hour or Less Per Day" @if($employerJob->break_times == "1 Hour or Less Per Day" ) selected @endif>1 Hour or Less Per Day</option>
                                <option value="Other" @if($employerJob->break_times == "Other" ) selected @endif>Other</option>
                            </select>
                            {{-- <input type="text" name="break_times" placeholder="" value="{{$employerJob->break_times ?? ''}}"> --}}
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Curriculum Overview:</label>
                            <input type="hidden" name="curriculum_overview">
                            @php
                                $curriculumActivities = $employerJob->curriculum_overview ? explode(',' , $employerJob->curriculum_overview) : [];
                            @endphp
                            <select id="curriculum_overview" multiple>
                                <option value="Phonics" @if(in_array( "Phonics", $curriculumActivities)) selected @endif>Phonics</option>
                                <option value="Speaking Class" @if(in_array("Speaking Class" , $curriculumActivities)) selected @endif>Speaking Class</option>
                                <option value="Reading Class" @if(in_array( "Reading Class", $curriculumActivities)) selected @endif>Reading Class</option>
                                <option value="Writing Class" @if(in_array( "Writing Class", $curriculumActivities)) selected @endif>Writing Class</option>
                                <option value="Other" @if(in_array("Other" , $curriculumActivities)) selected @endif>Other</option>
                            </select>
                            {{-- <input type="text" name="curriculum_overview" placeholder="" value="{{$employerJob->curriculum_overview ?? ''}}"> --}}
                        </div>

                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Class Duration:</label>
                            <select class="nice-select" name="class_duration">
                                <option value="30 Minutes" @if($employerJob->class_duration == "30 Minutes" ) selected @endif>30 Minutes</option>
                                <option value="40 Minutes" @if($employerJob->class_duration == "40 Minutes" ) selected @endif>40 Minutes</option>
                                <option value="45 Minutes" @if($employerJob->class_duration == "45 Minutes" ) selected @endif>45 Minutes</option>
                                <option value="50 Minutes" @if($employerJob->class_duration == "50 Minutes" ) selected @endif>50 Minutes</option>
                                <option value="1 Hour" @if($employerJob->class_duration == "1 Hour" ) selected @endif>1 Hour</option>
                                <option value="Other" @if($employerJob->class_duration == "Other" ) selected @endif>Other</option>
                            </select>
                        </div>

                        {{--<div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Materials & Resources Available:</label>
                            <input type="text" name="material_resources_available" placeholder="" value="{{$employerJob->material_resources_available ?? ''}}">
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Teaching Aids:</label>
                            <input type="text" name="teaching_aids" placeholder="smartboards, projectors" value="{{$employerJob->teaching_aids ?? ''}}">
                        </div>--}}
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Start Time:</label>
                            <input type="time" name="start_time" value="{{$employerJob->start_time}}">
                        </div>

                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Finish Time:</label>
                            <input type="time" name="finish_time" value="{{$employerJob->finish_time}}">
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
                            <input type="number" name="monthly_salary" placeholder="" value="{{$employerJob->monthly_salary ?? ''}}">
                        </div> --}}
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Housing Included:</label>
                            <select class="nice-select" name="housing_included">
                                <option value="Yes" {{$employerJob->housing_included == 'Yes' ? 'selected' : ''}}>Yes</option>
                                <option value="No" {{$employerJob->housing_included == 'No' ? 'selected' : ''}}>No</option>
                            </select>
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Insurance Included:</label>
                            <select class="nice-select" name="Insurance_included">
                                <option value="Yes" {{$employerJob->Insurance_included == 'Yes' ? 'selected' : ''}}>Yes</option>
                                <option value="No" {{$employerJob->Insurance_included == 'No' ? 'selected' : ''}}>No</option>
                            </select>
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Visa Application Assistance</label>
                            {{--<input type="text" name="relocation_allowance" placeholder="" value="{{$employerJob->relocation_allowance ?? ''}}"></input>--}}
                            <select class="nice-select" name="relocation_allowance">
                                <option value="Yes" {{$employerJob->relocation_allowance == 'Yes' ?  'selected' : ''}} >Yes</option>
                                <option value="No"{{$employerJob->relocation_allowance == 'No' ?  'selected' : ''}}>No</option>
                            </select>
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Housing Details:</label>
                            <select class="nice-select" name="housing_details">
                                <option value="Furnished"  @if($employerJob->housing_details == "Furnished") selected @endif>Furnished</option>
                                <option value="Unfurnished" @if($employerJob->housing_details == "Unfurnished") selected @endif>Unfurnished</option>
                                <option value="Partially Furnished" @if($employerJob->housing_details == "Partially Furnished") selected @endif>Partially Furnished</option>
                            </select>
                            {{-- <textarea type="text" name="housing_details" placeholder="Size, type, furnished/unfurnished, utilities covered, etc.">{{$employerJob->housing_details ?? ''}}</textarea> --}}
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Health Insurance:</label>
                            {{--<textarea type="text" name="health_dental_insurance" placeholder="Size, type, furnished/unfurnished, utilities covered, etc.">{{$employerJob->health_dental_insurance ?? ''}}</textarea>--}}
                            <select class="nice-select" name="health_dental_insurance">
                                <option value="Yes" {{$employerJob->health_dental_insurance == 'Yes' ?  'selected' : ''}} >Yes</option>
                                <option value="No"{{$employerJob->health_dental_insurance == 'No' ?  'selected' : ''}}>No</option>
                            </select>
                        </div>
                     
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Airfare: </label>
                            <select class="nice-select" name="airfare">
                                <option value="Return Flight (Paid End Of Contract)" @if($employerJob->airfare == "Return Flight (Paid End Of Contract)") selected @endif>Return Flight (Paid End Of Contract)</option>
                                <option value="Single Flight (Reimbursed First Pay Check)" @if($employerJob->airfare == "Single Flight (Reimbursed First Pay Check)") selected @endif>Single Flight (Reimbursed First Pay Check)</option>
                                <option value="Single Flight (Paid End Of Contract)" @if($employerJob->airfare == "Single Flight (Paid End Of Contract)") selected @endif>Single Flight (Paid End Of Contract)</option>
                                <option value="Single Flight (Paid By Employer)" @if($employerJob->airfare == "Single Flight (Paid By Employer)") selected @endif>Partially Furnished</option>
                                <option value="No Airfare" @if($employerJob->airfare == "No Airfare") selected @endif>No Airfare</option>
                                <option value="Other" @if($employerJob->airfare == "Other") selected @endif>Other</option>
                            </select>
                            {{-- <input type="text" name="airfare" placeholder=""> --}}
                        </div>
                        {{-- <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Airfare: </label>
                            <input type="text" name="airfare" placeholder="" value="{{$employerJob->airfare ?? ''}}">
                        </div> --}}
                       
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Pension:</label>
                            <select class="nice-select" name="pension">
                                <option value="Yes" @if($employerJob->pension == "Yes") selected @endif>Yes</option>
                                <option value="No" @if($employerJob->pension == "No") selected @endif>No</option>
                            </select>
                            {{-- <input type="text" name="pension" placeholder="" value="{{$employerJob->pension ?? ''}}"> --}}
                        </div>
                        {{-- <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Vacation & Sick Leave:</label>
                            <input type="text" name="vacation_sick_leave" placeholder="" value="{{$employerJob->vacation_sick_leave ?? ''}}">
                        </div> --}}
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">National Holidays:</label>
                            <select class="nice-select" name="national_holidays">
                                <option value="Paid" {{$employerJob->national_holidays == 'Paid' ? 'selected' : ''}}>Paid</option>
                                <option value="Unpaid" {{$employerJob->national_holidays == 'Unpaid' ? 'selected' : ''}}>Unpaid</option>
                                <option value="No" {{$employerJob->national_holidays == 'No' ? 'selected' : ''}}>No</option>
                            </select>
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Paid Vacation</label>
                            <select class="nice-select specify">
                                <option value="11 Days" @if($employerJob->vacation_leave =="11 Days") selected @endif>11 Days</option>
                                <option value="Other" @if($employerJob->vacation_leave == "Other") selected @endif>Other (Specify how many days)</option>
                                <option value="No" @if($employerJob->vacation_leave =="No") selected @endif>No</option>
                            </select>
                            <input type="{{$employerJob->vacation_leave == "Other" ? "text" : "hidden"}}" class="select-hidden-input" name="vacation_leave" placeholder="Paid Vacation">

                        </div>

                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for=""> Sick Leave:</label>
                            <select class="nice-select" name="sick_leave">
                                <option value="Yes" @if($employerJob->sick_leave =="Yes") selected @endif>Yes</option>
                                <option value="No" @if($employerJob->sick_leave =="No") selected @endif>No</option>
                            </select>
                        </div>
                        {{-- <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Professional Development Opportunities:</label>
                            <input type="text" name="professional_development_opportunities" placeholder="" value="{{$employerJob->professional_development_opportunities ?? ''}}">
                        </div> --}}
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Overtime Pay:</label>
                            {{--<input type="text" name="overtime_pay" placeholder="" value="{{$employerJob->overtime_pay ?? ''}}">--}}
                            <select class="nice-select" name="overtime_pay">
                                <option value="Yes" {{$employerJob->overtime_pay == 'Yes' ? 'selected' : ''}}>Yes</option>
                                <option value="No"{{$employerJob->overtime_pay == 'No' ? 'selected' : ''}}>No</option>
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
                                    <option value="High School Diploma/GED" @if($employerJob->education =="High School Diploma/GED") selected @endif>High School Diploma/GED</option>
                                    <option value="Associate's Degree"  @if($employerJob->education =="Associate's Degree") selected @endif>Associate's Degree</option>
                                    <option value="Bachelor's Degree"  @if($employerJob->education =="Bachelor's Degree") selected @endif>Bachelor's Degree</option>
                                    <option value="Master's Degree"  @if($employerJob->education =="Master's Degree") selected @endif>Master's Degree</option>
                                    <option value="Doctorate/Ph.D."  @if($employerJob->education =="Doctorate/Ph.D.") selected @endif>Doctorate/Ph.D.</option>
                                    <option value="Professional Certification"  @if($employerJob->education =="Professional Certification") selected @endif>Professional Certification</option>
                                    <option value="Vocational Training"  @if($employerJob->education =="Vocational Training") selected @endif>Vocational Training</option>
                                    @php
                                        $educationArray = ["High School Diploma" , "Associate's Degree" , "Bachelor's Degree" , "Master's Degree" , "Doctorate/Ph.D.", "Professional Certification" , "Vocational Training"];
                                    @endphp
                                    <option value="Other"  @if(!in_array($employerJob->education , $educationArray )) selected @endif>Other (Please Specify)</option>
                                </select>
                                <input type="hidden" class="select-hidden-input" name="education" placeholder="Education" value="{{$employerJob->education}}">
                            {{-- <input type="text" name="education" placeholder="" value="{{$employerJob->education ?? ''}}"> --}}
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Teaching Certificate:</label>
                            <select class="nice-select specify">
                                <option value="TESOL" @if($employerJob->teaching_certificate =="TESOL") selected @endif>TESOL</option>
                                <option value="TEFL" @if($employerJob->teaching_certificate =="TEFL") selected @endif>TEFL</option>
                                <option value="CELTA" @if($employerJob->teaching_certificate =="CELTA") selected @endif>CELTA</option>
                                <option value="DELTA" @if($employerJob->teaching_certificate =="DELTA") selected @endif>DELTA</option>
                                <option value="TESL" @if($employerJob->teaching_certificate =="TESL") selected @endif>TESL</option>
                                @php
                                        $certificateArray = ["TESOL" , "TEFL" , "CELTA" , "DELTA" , "TESL"];
                                    @endphp
                                <option value="Other" @if(!in_array($employerJob->teaching_certificate , $certificateArray)) selected @endif>Other (Please Specify)</option>
                            </select>
                            <input type="hidden" class="select-hidden-input" name="teaching_certificate" placeholder="Certificate" value="{{$employerJob->teaching_certificate}}">
                            
                            {{-- <input type="text" name="teaching_certificate" placeholder="" value="{{$employerJob->teaching_certificate ?? ''}}"></input> --}}
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Teaching Experience:</label>
                            <select class="nice-select" name="experience_level">
                                <option value="0-1 Year" {{$employerJob->experience_level == "0-1 Year" ? 'selected' : ''}}>0-1 Year</option>
                                <option value="1-3 Years" {{$employerJob->experience_level == "1-3 Years" ? 'selected' : ''}}>1-3 Years</option>
                                <option value="3-5 Years" {{$employerJob->experience_level == "3-5 Years" ? 'selected' : ''}}>3-5 Years</option>
                                <option value="5-7 Years" {{$employerJob->experience_level == "5-7 Years" ? 'selected' : ''}}>5-7 Years</option>
                                <option value="7-10 Years" {{$employerJob->experience_level == "7-10 Years" ? 'selected' : ''}}>7-10 Years</option>
                                <option value="10+ Years" {{$employerJob->experience_level == "10+ Years" ? 'selected' : ''}}>10+ Years</option>
                               
                            </select>
                        </div>
                        {{-- <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Experience Details:</label>
                            <input type="text" name="experience" placeholder="" value="{{$employerJob->experience ?? ''}}"></input>
                        </div> --}}
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Background Check:</label>
                            <select class="nice-select" name="background_check">
                                <option value="Yes" {{$employerJob->background_check == "Yes" ? 'selected' : ''}}>Yes</option>
                                <option value="No" {{$employerJob->background_check == "No" ? 'selected' : ''}}>No</option>
                            </select>
                            {{-- <input type="text" name="background_check" placeholder="" value="{{$employerJob->background_check ?? ''}}"> --}}
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Health Check Requirements:</label>
                            <select class="nice-select" id="health_check_requirement" name="health_check_requirement">
                                <option value="Yes" {{$employerJob->health_check_requirement == "Yes" ? 'selected' : ''}} >Yes</option>
                                <option value="No" {{$employerJob->health_check_requirement == "Yes" ? 'selected' : ''}} >No</option>
                            </select>
                            {{-- <input type="text" name="health_check_requirement" placeholder="" value="{{$employerJob->health_check_requirement ?? ''}}"> --}}
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Preferred Accent:</label>
                            <input type="hidden" name="preferred_accent">
                            @php
                                $preferredAccent = $employerJob->preferred_accent ? explode(',' , $employerJob->preferred_accent) : [];
                            @endphp 
                            <select id="preferred_accent" multiple>
                                <option value="British English" {{in_array("British English" , $preferredAccent) ? 'selected' : ''}}>British English</option>
                                <option value="American English" {{in_array("American English" , $preferredAccent) ? 'selected' : ''}}>American English</option>
                                <option value="Canadian English" {{in_array("Canadian English" , $preferredAccent) ? 'selected' : ''}}>Canadian English</option>
                                <option value="Australian English" {{in_array("Australian English" , $preferredAccent) ? 'selected' : ''}}>Australian English</option>
                                <option value="New Zealand English" {{in_array("New Zealand English" , $preferredAccent) ? 'selected' : ''}}>New Zealand English</option>
                                <option value="South African English" {{in_array("South African English" , $preferredAccent) ? 'selected' : ''}}>South African English</option>
                                <option value="Scottish English" {{in_array("Scottish English" , $preferredAccent) ? 'selected' : ''}}>Scottish English</option>
                            </select>
                            {{-- <input type="text" name="preferred_accent" placeholder="" value="{{$employerJob->preferred_accent ?? ''}}"> --}}
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Visa Type:</label>
                            <select class="nice-select specify" id="visa_type">
                                <option value="Eligible E2 Visa Application" {{$employerJob->visa_type == "Eligible E2 Visa Application" ? 'selected' : ''}}>Eligible E2 Visa Application</option>
                                <option value="E-1 (Professorship)" {{$employerJob->visa_type == "E-1 (Professorship)" ? 'selected' : ''}} >E-1 (Professorship)</option>
                                <option value="E-2 (Teaching)" {{$employerJob->visa_type == "E-2 (Teaching)" ? 'selected' : ''}} >E-2 (Teaching)</option>
                                <option value="E-3 (Research)" {{$employerJob->visa_type == "E-3 (Research)" ? 'selected' : ''}} >E-3 (Research)</option>
                                <option value="E-4 (Technial Internship)" {{$employerJob->visa_type == "E-4 (Technial Internship)" ? 'selected' : ''}} >E-4 (Technial Internship)</option>
                                <option value="E-5 (Professional Employment)" {{$employerJob->visa_type == "E-5 (Professional Employment)" ? 'selected' : ''}} >E-5 (Professional Employment)</option>
                                <option value="E-6 (Entertainment)" {{$employerJob->visa_type == "E-6 (Entertainment)" ? 'selected' : ''}} >E-6 (Entertainment)</option>
                                <option value="E-7 (Special Occupation)" {{$employerJob->visa_type == "E-7 (Special Occupation)" ? 'selected' : ''}} >E-7 (Special Occupation)</option>
                                <option value="E-9 (Non-Professional Employment)" {{$employerJob->visa_type == "E-9 (Non-Professional Employment)" ? 'selected' : ''}} >E-9 (Non-Professional Employment)</option>
                                <option value="E-10 (Job Seeking)" {{$employerJob->visa_type == "E-10 (Job Seeking)" ? 'selected' : ''}}>E-10 (Job Seeking)</option>
                                <option value="F-2 (Resident)" {{$employerJob->visa_type == "F-2 (Resident)" ? 'selected' : ''}} >F-2 (Resident)</option>
                                <option value="F-5 (Permanent Resident)" {{$employerJob->visa_type == "F-5 (Permanent Resident)" ? 'selected' : ''}} >F-5 (Permanent Resident)</option>
                                <option value="F-6 (Marriage Migrant)" {{$employerJob->visa_type == "F-6 (Marriage Migrant)" ? 'selected' : ''}} >F-6 (Marriage Migrant)</option>
                                @php
                                    $visaArray = [
                                                        "Eligible E2 Visa Application" , "E-1 (Professorship)" , "E-2 (Teaching)" , "E-3 (Research)" , "E-4 (Technial Internship)", 
                                                         "E-5 (Professional Employment)" , "E-6 (Entertainment)" , "E-7 (Special Occupation)" , "E-9 (Non-Professional Employment)",
                                                         "F-2 (Resident)" ,"F-5 (Permanent Resident)" ,"F-6 (Marriage Migrant)" 
                                                        ];
                                @endphp
                                <option value="Other" {{!in_array($employerJob->visa_type , $visaArray) ? 'selected' : ''}} >Other (Please Specify)</option>
                            </select>
                            <input type="hidden" class="select-hidden-input" name="visa_type" placeholder="Visa Type" value="{{$employerJob->visa_type}}">
                            {{-- <input type="text" name="visa_type" placeholder="" value="{{$employerJob->visa_type ?? ''}}"> --}}
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Language Proficiency:</label>
                            <select class="nice-select" id="language_proficiency" name="language_proficiency">
                                <option value="Native/Bilingual Proficiency"  {{$employerJob->language_proficiency == "Native/Bilingual Proficiency" ? 'selected' : ''}}>Native/Bilingual Proficiency</option>
                                <option value="Fluent"  {{$employerJob->language_proficiency == "Fluent" ? 'selected' : ''}} >Fluent</option>
                                <option value="Advanced"  {{$employerJob->language_proficiency == "Advanced" ? 'selected' : ''}} >Advanced</option>
                                <option value="Intermediate"  {{$employerJob->language_proficiency == "Intermediate" ? 'selected' : ''}} >Intermediate</option>
                                <option value="Basic"  {{$employerJob->language_proficiency == "Basic" ? 'selected' : ''}} >Basic</option>
                                <option value="None"  {{$employerJob->language_proficiency == "None" ? 'selected' : ''}} >None</option>
                            </select>
                            {{-- <input type="text" name="language_proficiency" placeholder="" value="{{$employerJob->language_proficiency ?? ''}}"> --}}
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
                            <input type="hidden" name="arrival_assitance" value="{{$employerJob->arrival_assitance}}">
                            @php
                               $arrivalAssistance = explode(',' , $employerJob->arrival_assitance);
                            @endphp
                            <select id="arrival_assitance" name="arrival_assitance" multiple>
                                <option value="Airport Pickup" {{in_array("Airport Pickup" , $arrivalAssistance) ? 'selected' : '' }}>Airport Pickup</option>
                                <option value="Temporary Accommodation Assistance" {{in_array("Temporary Accommodation Assistance" , $arrivalAssistance ) ? 'selected' : ''}} >Temporary Accommodation Assistance</option>
                                <option value="Assistance With Documentation" {{ in_array("Assistance With Documentation" , $arrivalAssistance ) ? 'selected' : ''}} >Assistance With Documentation</option>
                                <option value="Not Provided" {{ in_array("Not Provided" , $arrivalAssistance ) ? 'selected' : '' }} >Not Provided</option>
                            </select>
                            {{-- <input type="text" name="arrival_assitance" placeholder="Airport pick-up, initial days' guidance" value="{{$employerJob->arrival_assitance ?? ''}}"> --}}
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Initial Accommodation:</label>(If the provided accomodation is not ready upon your arrival, the employer will arrange temporary housing until it is ready for occupancy)
                            <select class="nice-select" id="initial_accomodation" name="initial_accomodation">
                                <option value="No" {{$employerJob->initial_accomodation == "No" ? 'selected' : ''}}  >No</option>
                                <option value="Yes" {{$employerJob->initial_accomodation == "Yes" ? 'selected' : ''}}  >Yes</option>
                            </select>
                            {{-- <input type="text" name="initial_accomodation" placeholder="" value="{{$employerJob->initial_accomodation ?? ''}}"></input> --}}
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Training:</label>
                            <select class="nice-select" id="first_week_structure" name="first_week_structure">
                                <option value="Unpaid" {{$employerJob->first_week_structure == "Unpaid" ? 'selected' : ''}}  >Unpaid</option>
                                <option value="Paid"  {{$employerJob->first_week_structure == "Paid" ? 'selected' : ''}} >Paid</option>
                            </select>
                            {{-- <input type="text" name="first_week_structure" placeholder="Orientation, training, introductions, etc." value="{{$employerJob->first_week_structure ?? ''}}"></input> --}}
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Induction Programs:</label>
                            <label for="">Traning Duration:</label>
                            <select class="nice-select" id="induction_programs" name="induction_programs">
                                <option value="1 Week"  {{$employerJob->induction_programs == "1 Week" ? 'selected' : ''}} >1 Week</option>
                                <option value="2 Weeks" {{$employerJob->induction_programs == "2 Weeks" ? 'selected' : ''}} >2 Weeks</option>
                                <option value="3 Weeks" {{$employerJob->induction_programs == "3 Weeks" ? 'selected' : ''}} >3 Weeks</option>
                                <option value="4 Weeks" {{$employerJob->induction_programs == "4 Weeks" ? 'selected' : ''}} >4 Weeks</option>
                            </select>
                            {{-- <input type="text" name="induction_programs" placeholder="Training, school's philosophy, methodologies, etc." value="{{$employerJob->induction_programs ?? ''}}"> --}}
                        </div>
                        {{-- <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Mentorship:</label>
                            <input type="text" name="mentorship" placeholder="" value="{{$employerJob->mentorship ?? ''}}">
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
                            <input type="text" name="city_town" placeholder="" value="{{$employerJob->city_town ?? ''}}">
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Neighborhood Description:</label>
                            <input type="text" name="neighbourhood_description" placeholder="" value="{{$employerJob->neighbourhood_description ?? ''}}"></input>
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Proximity to Landmarks:</label>
                            <input type="text" name="proximity_to_landmarks" placeholder="" value="{{$employerJob->proximity_to_landmarks ?? ''}}"></input>
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Local Amenities:</label>
                            <input type="text" name="local_amenities" placeholder="" value="{{$employerJob->local_amenities ?? ''}}">
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">School Facilities:</label>
                            <input type="text" name="school_facilities" placeholder="" value="{{$employerJob->school_facilities ?? ''}}">
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Public Transport Options:</label>
                            <input type="text" name="public_transport_options" placeholder="" value="{{$employerJob->public_transport_options ?? ''}}">
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Work Environment & Culture:</label>
                            <input type="text" name="work_enviroment_and_culture" placeholder="" value="{{$employerJob->work_enviroment_and_culture ?? ''}}">
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Co-teachers or Assistant Teachers Available:</label>
                            <input type="text" name="co_assistant_teachers_availability" placeholder="" value="{{$employerJob->co_assistant_teachers_availability ?? ''}}">
                        </div>
                    </div>
                    <div class="button-group d-inline-flex align-items-center mt-30" style="width:100%;justify-content: flex-end;">
                        <button type="button" id="prevBtn" class="dash-cancel-btn tran3s  me-3" onclick="nextPrev(-1)">Previous</button>
                        <button type="button" id="nextBtn" class="dash-btn-two tran3s" onclick="nextPrev(1)">Next</button>
                    </div>
                </div> --}}
                {{-- <div class="bg-white card-box border-20 hide section" id="step7">
                    <h4 class="dash-title-three">Support for Foreign Teachers</h4>
                    <div class="row">
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Orientation & Training:</label>
                            <input type="text" name="orientation_and_training" placeholder="" value="{{$employerJob->orientation_and_training ?? ''}}">
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Cultural Assimilation Programs:</label>
                            <input type="text" name="culture_assimilation_program" placeholder="" value="{{$employerJob->culture_assimilation_program ?? ''}}"></input>
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Language Courses or Assistance:</label>
                            <input type="text" name="language_courses_or_asistance" placeholder="" value="{{$employerJob->language_courses_or_asistance ?? ''}}"></input>
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Assistance with Setting up Local Bank Account, Phone</label>
                            <input type="text" name="local_bank_account_assistance" placeholder="" value="{{$employerJob->local_bank_account_assistance ?? ''}}">
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Emergency Contacts & Support:</label>
                            <input type="text" name="emergency_contacts_and_support" placeholder="" value="{{$employerJob->emergency_contacts_and_support ?? ''}}">
                        </div>

                    </div>
                    <div class="button-group d-inline-flex align-items-center mt-30" style="width:100%;justify-content: flex-end;">
                        <button type="button" id="prevBtn" class="dash-cancel-btn tran3s  me-3" onclick="nextPrev(-1)">Previous</button>
                        <button type="button" id="nextBtn" class="dash-btn-two tran3s" onclick="nextPrev(1)">Next</button>
                    </div>
                </div> --}}

                <div class="bg-white card-box border-20 hide section" id="step7">
                    <h4 class="dash-title-three">Application & Recruitment Process</h4>
                    <div class="row">
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">E2 Visa Document Required:</label>
                            <div>
                                <select class="nice-select" id="required_documents" name="required_documents">
                                    <option value="No" @if($employerJob->required_documents == "No") selected @endif>No</option>
                                    <option value="Yes" @if($employerJob->required_documents == "Yes") selected @endif>Yes</option>
                                </select>
                            </div>
                            <div class="document_type_box @if($employerJob->required_documents == "No") d-none @endif my-2">

                                @php
                                $documentType = explode("," , $employerJob->document_type);
                                @endphp
                                <input type="hidden" name="document_type">
                                <select class="my-2" id="document_type" multiple>
                                    <option value="@if(in_array("Degree Apostile (For South African candidate: Letter from SAQA authorizing degree)", $documentType)) selected @endif" >Degree Apostile (For South African candidate: Letter from SAQA authorizing degree)</option>
                                    <option value="@if(in_array("Criminal Background Check Apostile", $documentType)) selected @endif" >Criminal Background Check Apostile</option>
                                    <option value="@if(in_array("Completed Visa Application Form", $documentType)) selected @endif" >Completed Visa Application Form</option>
                                    <option value="@if(in_array("Copy of Passport" , $documentType)) selected @endif" >Copy of Passport</option>
                                    <option value="@if(in_array("Recent Passport-Sized photos" , $documentType)) selected @endif" >Recent Passport-Sized photos</option>
                                    <option value="@if(in_array("Self Health Statement" , $documentType)) selected @endif" >Self Health Statement</option>
                                    <option value="@if(in_array("Other documents may be required" , $documentType)) selected @endif" >Other documents may be required</option>
                                </select>
                            </div>
                            {{-- <input type="text" name="required_documents" placeholder=""> --}}
                        </div>
                        {{-- <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Required Documents:</label>
                            <input type="text" name="required_documents" placeholder="" value="{{$employerJob->required_documents ?? ''}}">
                        </div> --}}
                        {{-- <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Interview Process:</label>
                            <input type="text" name="interview_process" placeholder="" value="{{$employerJob->interview_process ?? ''}}"></input>
                        </div> --}}
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Application Deadline:</label>
                            <input type="date" name="application_deadline" placeholder="" value="{{$employerJob->application_deadline ?? ''}}"></input>
                        </div>
                        {{-- <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Contract Review Process:</label>
                            <input type="text" name="contact_review_process" placeholder="" value="{{$employerJob->contact_review_process ?? ''}}">
                        </div> --}}
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Decision Deadline:</label>
                            <input type="date" name="decision_deadline" placeholder="" value="{{$employerJob->decision_deadline ?? ''}}">
                        </div>

                    </div>
                    <div class="button-group d-inline-flex align-items-center mt-30" style="width:100%;justify-content: flex-end;">
                        <button type="button" id="prevBtn" class="dash-cancel-btn tran3s  me-3" onclick="nextPrev(-1)">Previous</button>
                        <button type="button" id="nextBtn" class="dash-btn-two tran3s" onclick="nextPrev(1)">Next</button>
                    </div>
                </div>

                {{-- <div class="bg-white card-box border-20 hide section" id="step10">
                    <h4 class="dash-title-three">Additional Information</h4>
                    <div class="row">
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Extracurricular Duties:</label>
                            <input type="text" name="extracurricular_duties" placeholder="" value="{{$employerJob->extracurricular_duties ?? ''}}">
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Performance Evaluations:</label>
                            <input type="text" name="performance_evaluation" placeholder="" value="{{$employerJob->performance_evaluation ?? ''}}"></input>
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Advancement Opportunities:</label>
                            <input type="text" name="advancement_opportunities" placeholder="" value="{{$employerJob->advancement_opportunities ?? ''}}"></input>
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">School's Values & Teaching Philosophy: </label>
                            <input type="text" name="school_values_and_teaching_philosophy" placeholder="" value="{{$employerJob->school_values_and_teaching_philosophy ?? ''}}">
                        </div>

                    </div>
                    <div class="button-group d-inline-flex align-items-center mt-30" style="width:100%;justify-content: flex-end;">
                        <button type="button" id="prevBtn" class="dash-cancel-btn tran3s  me-3" onclick="nextPrev(-1)">Previous</button>
                        <button type="button" id="nextBtn" class="dash-btn-two tran3s" onclick="nextPrev(1)">Next</button>
                    </div>
                </div> --}}

                <div class="bg-white card-box border-20 hide section" id="step8">
                    <h4 class="dash-title-three">Reviews & Testimonials</h4>
                    <div class="dash-input-wrapper mb-30 col-md-6">
                        <label for="">Company Introduction</label>
                        <input type="file" name="company_introduction" id="" accept=".mp4, .asf, .mov , .webm ,.avi , .mkv">
                        <textarea class="size-lg summernote" name="company_detail" placeholder="company_detail">{!! $employerJob->company_detail !!}</textarea>
                    </div>
                    <div class="dash-input-wrapper mb-30 col-md-6">
                        <label for="">Option to Contact Current/Past Foreign Teachers:</label>
                        <select class="nice-select" name="option_to_current_past_foreign_teachers">
                            <option value="Yes" @if($employerJob->option_to_current_past_foreign_teachers == "Yes") selected @endif>Yes</option>
                            <option value="No" @if($employerJob->option_to_current_past_foreign_teachers == "No") selected @endif>No</option>
                        </select>

                        <div>
                            <select class="form-select @if($employerJob->option_to_current_past_foreign_teachers == "Yes") d-none @endif my-2" id="document_type" name="document_type">
                                <option value="">Select Document Type</option>
                                <option value="Degree Apostile (For South African candidate: Letter from SAQA authorizing degree)" @if($employerJob->document_type == "Degree Apostile (For South African candidate: Letter from SAQA authorizing degree)" ) selected @endif>Degree Apostile (For South African candidate: Letter from SAQA authorizing degree)</option>
                                <option value="Criminal Background Check Apostile" @if($employerJob->document_type == "Criminal Background Check Apostile" ) selected @endif>Criminal Background Check Apostile</option>
                                <option value="Completed Visa Application Form" @if($employerJob->document_type == "Completed Visa Application Form" ) selected @endif>Completed Visa Application Form</option>
                                <option value="Copy of Passport" @if($employerJob->document_type == "Copy of Passport" ) selected @endif>Copy of Passport</option>
                                <option value="Recent Passport-Sized photos" @if($employerJob->document_type == "Recent Passport-Sized photos" ) selected @endif>Recent Passport-Sized photos</option>
                                <option value="Self Health Statement" @if($employerJob->document_type == "Self Health Statement" ) selected @endif>Self Health Statement</option>
                                <option value="Other documents may be required" @if($employerJob->document_type == "Other documents may be required" ) selected @endif>Other documents may be required</option>
                            </select>
                        </div>

                    </div>

                    <div class="dash-input-wrapper mb-30 col-md-6">
                        <label for="">Visa Document Submission Deadline:</label>
                        <input type="date" name="application_deadline" value="{{$employerJob->application_deadline}}" placeholder=""></input>
                    </div>
                    {{-- <div class="row">
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Links to Teacher Testimonials or Reviews:</label>
                            <textarea type="text" name="links_to_teacher_testimonials_or_reviews" placeholder="" >{{$employerJob->links_to_teacher_testimonials_or_reviews ?? ''}}</textarea>
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Option to Contact Current/Past Foreign Teachers:</label>
                            <textarea type="text" name="option_to_current_past_foreign_teachers" placeholder="" >{{$employerJob->option_to_current_past_foreign_teachers ?? ''}}</textarea>
                        </div>

                    </div> --}}
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
        $(document).on( "change", "#required_documents" , function(e){
            // $("document_type").toggleClass('open');
            if(this.value == 'Yes'){
                document.querySelector(".document_type_box").classList.remove("d-none")
            } else{
                document.querySelector(".document_type_box").classList.add("d-none")
                document.querySelector(".document_type_box").selectedIndex = 0;
            }; 
        })
        $(document).ready(function() {

            $("#ideal_candidate_profile").select2();
            $("#unique_selling_point").select2();
            $("#student_age_group").select2();
            $("#curriculum_overview").select2();
            $("#preferred_accent").select2();
            $("#arrival_assitance").select2();
            $("#document_type").select2();

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
                document.querySelector("input[name='arrival_assitance']").value = $("#arrival_assitance").val();
                document.querySelector("input[name='document_type']").value = $("#document_type").val();
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