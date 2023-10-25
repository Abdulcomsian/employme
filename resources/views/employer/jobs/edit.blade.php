@extends('employer.layout.main')
@section('title')
Post A Job
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
            @include('employer.layout.header_menu')
        <!-- End Header -->

        <h2 class="main-title">Edit Job</h2>
        <div>
            <form action="{{route('employer-jobs.update',$id)}}" method = "POST" class="search-form">
                 @csrf
                 @method('PUT')
                <div class="bg-white card-box border-20 section" id="step1">

                    <h4 class="dash-title-three">Position Overview</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="dash-input-wrapper mb-30">
                                <label for="">School Vision:</label>
                                <input type="text" name="school_vision" placeholder="Briefly describe the school's ethos, aims, and values." value="{{$employerJob->school_vision ?? ''}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="dash-input-wrapper mb-30">
                                <label for="">Unique Selling Points:</label>
                                <input type="text" name="unique_selling_point" placeholder="Highlight what sets the school apart." value="{{$employerJob->unique_selling_point ?? ''}}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="dash-input-wrapper mb-30">
                                <label for="">Ideal Candidate Profile:</label>
                                <input type="text" name="ideal_candidate_profile" placeholder="Outline qualities the school is particularly looking for." value="{{$employerJob->ideal_candidate_profile ?? ''}}">
                            </div>
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
                            <label for="">Job Title:</label>
                            <input type="text" name="job_title" placeholder="e.g., ESL Instructor, Children’s English Teacher" value="{{$employerJob->job_title ?? ''}}">
                        </div>
                        <!-- /.dash-input-wrapper -->
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Contract Duration:</label>
                            <!-- <textarea class="size-lg" placeholder="Write about the job in details..."></textarea> -->
                            <input type="text" name="contract_duration" placeholder="" value="{{$employerJob->contract_duration ?? ''}}">
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Start Date:</label>
                            <input type="date" name="start_date" placeholder="" value="{{$employerJob->start_date ?? ''}}"></input>
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">End Date:</label>
                            <input type="date" name="end_date" placeholder="" value="{{$employerJob->end_date ?? ''}}"></input>
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Renewal Possibilities:</label>
                            <select class="nice-select" name="renewal_possibilities">
                                <option value="Yes" {{$employerJob->renewal_possibilities == 'Yes' ? 'selected' : ''}}>Yes</option>
                                <option value="No" {{$employerJob->renewal_possibilities == 'No' ? 'selected' : ''}}>No</option>
                            </select>
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-12">
                            <label for="">Salary Breakdown:</label>
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
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
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Payday Details:</label>
                            <textarea type="text" name="payday_details" placeholder="" >{{$employerJob->payday_details ?? ''}}</textarea>
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
                            <input type="text" name="student_age_group" placeholder="" value="{{$employerJob->student_age_group ?? ''}}">
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Class Size:</label>
                            <input type="text" name="class_size" placeholder="" value="{{$employerJob->class_size ?? ''}}">
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Hours/Week:</label>
                            <input type="number" name="hours_per_week" placeholder="" value="{{$employerJob->hours_per_week ?? ''}}">
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Teaching Hours/Day:</label>
                            <input type="number" name="teaching_hours_per_day" placeholder="" value="{{$employerJob->teaching_hours_per_day ?? ''}}">
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Non-Teaching Hours/Day:</label>
                            <input type="number" name="non_teaching_hours_per_day" placeholder="prep time, meetings" value="{{$employerJob->non_teaching_hours_per_day ?? ''}}">
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Break times</label>
                            <input type="text" name="break_times" placeholder="" value="{{$employerJob->break_times ?? ''}}">
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Curriculum Overview:</label>
                            <input type="text" name="curriculum_overview" placeholder="" value="{{$employerJob->curriculum_overview ?? ''}}">
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Materials & Resources Available:</label>
                            <input type="text" name="material_resources_available" placeholder="" value="{{$employerJob->material_resources_available ?? ''}}">
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Teaching Aids:</label>
                            <input type="text" name="teaching_aids" placeholder="smartboards, projectors" value="{{$employerJob->teaching_aids ?? ''}}">
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
                            <input type="text" name="monthly_salary" placeholder="" value="{{$employerJob->monthly_salary ?? ''}}">
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Housing Details:</label>
                            <textarea type="text" name="housing_details" placeholder="Size, type, furnished/unfurnished, utilities covered, etc.">{{$employerJob->housing_details ?? ''}}</textarea>
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Relocation Allowance:</label>
                            <input type="text" name="relocation_allowance" placeholder="" value="{{$employerJob->relocation_allowance ?? ''}}"></input>
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Airfare: </label>
                            <input type="text" name="airfare" placeholder="" value="{{$employerJob->airfare ?? ''}}">
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Health & Dental Insurance:</label>
                            <input type="text" name="health_dental_insurance" placeholder="prep time, meetings" value="{{$employerJob->health_dental_insurance ?? ''}}">
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Pension:</label>
                            <input type="text" name="pension" placeholder="" value="{{$employerJob->pension ?? ''}}">
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Vacation & Sick Leave:</label>
                            <input type="text" name="vacation_sick_leave" placeholder="" value="{{$employerJob->vacation_sick_leave ?? ''}}">
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">National Holidays:</label>
                            <select class="nice-select" name="national_holidays">
                                <option value="Paid" {{$employerJob->national_holidays == 'Paid' ? 'selected' : ''}}>Paid</option>
                                <option value="Unpaid" {{$employerJob->national_holidays == 'Unpaid' ? 'selected' : ''}}>Unpaid</option>
                            </select>
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Professional Development Opportunities:</label>
                            <input type="text" name="professional_development_opportunities" placeholder="" value="{{$employerJob->professional_development_opportunities ?? ''}}">
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Overtime Pay:</label>
                            <input type="text" name="overtime_pay" placeholder="" value="{{$employerJob->overtime_pay ?? ''}}">
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
                            <input type="text" name="education" placeholder="" value="{{$employerJob->education ?? ''}}">
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Teaching Certificate:</label>
                            <input type="text" name="teaching_certificate" placeholder="" value="{{$employerJob->teaching_certificate ?? ''}}"></input>
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Experience:</label>
                            <input type="text" name="experience" placeholder="" value="{{$employerJob->experience ?? ''}}"></input>
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Background Check:</label>
                            <input type="text" name="background_check" placeholder="" value="{{$employerJob->background_check ?? ''}}">
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Health Check Requirements:</label>
                            <input type="text" name="health_check_requirement" placeholder="" value="{{$employerJob->health_check_requirement ?? ''}}">
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Preferred Accent:</label>
                            <input type="text" name="preferred_accent" placeholder="" value="{{$employerJob->preferred_accent ?? ''}}">
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Visa Type:</label>
                            <input type="text" name="visa_type" placeholder="" value="{{$employerJob->visa_type ?? ''}}">
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Language Proficiency:</label>
                            <input type="text" name="language_proficiency" placeholder="" value="{{$employerJob->language_proficiency ?? ''}}">
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
                            <input type="text" name="arrival_assitance" placeholder="Airport pick-up, initial days' guidance" value="{{$employerJob->arrival_assitance ?? ''}}">
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Initial Accommodation:</label>
                            <input type="text" name="initial_accomodation" placeholder="" value="{{$employerJob->initial_accomodation ?? ''}}"></input>
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">First Week Structure:</label>
                            <input type="text" name="first_week_structure" placeholder="Orientation, training, introductions, etc." value="{{$employerJob->first_week_structure ?? ''}}"></input>
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Induction Programs:</label>
                            <input type="text" name="induction_programs" placeholder="Training, school's philosophy, methodologies, etc." value="{{$employerJob->induction_programs ?? ''}}">
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Mentorship:</label>
                            <input type="text" name="mentorship" placeholder="" value="{{$employerJob->mentorship ?? ''}}">
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
                            <input type="text" name="city_town" placeholder="" value="{{$employerJob->city_town ?? ''}}">
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Neighborhood Description:</label>
                            <input type="text" name="neighbourhood_description" placeholder="" value="{{$employerJob->mentorship ?? ''}}"></input>
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Proximity to Landmarks:</label>
                            <input type="text" name="proximity_to_landmarks" placeholder="" value="{{$employerJob->mentorship ?? ''}}"></input>
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Local Amenities:</label>
                            <input type="text" name="local_amenities" placeholder="" value="{{$employerJob->mentorship ?? ''}}">
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">School Facilities:</label>
                            <input type="text" name="school_facilities" placeholder="" value="{{$employerJob->mentorship ?? ''}}">
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Public Transport Options:</label>
                            <input type="text" name="public_transport_options" placeholder="" value="{{$employerJob->mentorship ?? ''}}">
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
                </div>
                <div class="bg-white card-box border-20 hide section" id="step8">
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
                </div>

                <div class="bg-white card-box border-20 hide section" id="step9">
                    <h4 class="dash-title-three">Application & Recruitment Process</h4>
                    <div class="row">
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Required Documents:</label>
                            <input type="text" name="required_documents" placeholder="" value="{{$employerJob->required_documents ?? ''}}">
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Interview Process:</label>
                            <input type="text" name="interview_process" placeholder="" value="{{$employerJob->interview_process ?? ''}}"></input>
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Application Deadline:</label>
                            <input type="text" name="application_deadline" placeholder="" value="{{$employerJob->application_deadline ?? ''}}"></input>
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Contract Review Process:</label>
                            <input type="text" name="contact_review_process" placeholder="" value="{{$employerJob->contact_review_process ?? ''}}">
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Decision Deadline:</label>
                            <input type="text" name="decision_deadline" placeholder="" value="{{$employerJob->decision_deadline ?? ''}}">
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
                </div>

                <div class="bg-white card-box border-20 hide section" id="step11">
                    <h4 class="dash-title-three">Reviews & Testimonials</h4>
                    <div class="row">
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Links to Teacher Testimonials or Reviews:</label>
                            <textarea type="text" name="links_to_teacher_testimonials_or_reviews" placeholder="" >{{$employerJob->links_to_teacher_testimonials_or_reviews ?? ''}}</textarea>
                        </div>
                        <div class="dash-input-wrapper mb-30 col-md-6">
                            <label for="">Option to Contact Current/Past Foreign Teachers:</label>
                            <textarea type="text" name="option_to_current_past_foreign_teachers" placeholder="" >{{$employerJob->option_to_current_past_foreign_teachers ?? ''}}</textarea>
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