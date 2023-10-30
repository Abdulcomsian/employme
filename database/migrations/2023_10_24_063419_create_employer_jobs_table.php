<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('employer_jobs', function (Blueprint $table) {
            $table->id();
            $table->text('school_vision')->nullable();
            $table->text('unique_selling_point')->nullable();
            $table->text('job_description')->nullable();
            $table->text('ideal_candidate_profile')->nullable();
            $table->longText('job_title')->nullable();
            $table->text('job_type')->nullable();
            $table->string('contract_duration')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->text('renewal_possibilities')->nullable();
            $table->string('base_pay')->nullable();
            $table->text('allownces_other_incentives')->nullable();
            $table->string('specify')->nullable();
            $table->string('tax_deductions')->nullable();
            $table->text('bonuses')->nullable();
            $table->text('payday_details')->nullable();
            $table->text('student_age_group')->nullable();
            $table->text('class_size')->nullable();
            $table->integer('hours_per_week')->nullable();
            $table->integer('teaching_hours_per_day')->nullable();
            $table->integer('non_teaching_hours_per_day')->nullable();
            $table->text('break_times')->nullable();
            $table->text('curriculum_overview')->nullable();
            $table->text('material_resources_available')->nullable();
            $table->text('teaching_aids')->nullable();
            $table->string('monthly_salary')->nullable();
            $table->text('housing_details')->nullable();
            $table->string('relocation_allowance')->nullable();
            $table->text('health_dental_insurance')->nullable();
            $table->text('airfare')->nullable();
            $table->string('pension')->nullable();
            $table->text('vacation_sick_leave')->nullable();
            $table->text('national_holidays')->nullable();
            $table->text('professional_development_opportunities')->nullable();
            $table->text('overtime_pay')->nullable();
            $table->text('education')->nullable();
            $table->text('teaching_certificate')->nullable();
            $table->text('experience')->nullable();
            $table->text('background_check')->nullable();
            $table->text('health_check_requirement')->nullable();
            $table->text('preferred_accent')->nullable();
            $table->text('visa_type')->nullable();
            $table->text('language_proficiency')->nullable();
            $table->text('arrival_assitance')->nullable();
            $table->text('initial_accomodation')->nullable();
            $table->text('first_week_structure')->nullable();
            $table->text('induction_programs')->nullable();
            $table->text('mentorship')->nullable();
            $table->text('city_town')->nullable();
            $table->text('neighbourhood_description')->nullable();
            $table->text('proximity_to_landmarks')->nullable();
            $table->text('local_amenities')->nullable();
            $table->text('school_facilities')->nullable();
            $table->text('public_transport_options')->nullable();
            $table->text('work_enviroment_and_culture')->nullable();
            $table->text('co_assistant_teachers_availability')->nullable();
            $table->text('orientation_and_training')->nullable();
            $table->text('culture_assimilation_program')->nullable();
            $table->text('language_courses_or_asistance')->nullable();
            $table->text('local_bank_account_assistance')->nullable();
            $table->text('emergency_contacts_and_support')->nullable();
            $table->text('required_documents')->nullable();
            $table->text('interview_process')->nullable();
            $table->text('application_deadline')->nullable();
            $table->text('contact_review_process')->nullable();
            $table->text('decision_deadline')->nullable();
            $table->text('extracurricular_duties')->nullable();
            $table->text('performance_evaluation')->nullable();
            $table->text('advancement_opportunities')->nullable();
            $table->text('school_values_and_teaching_philosophy')->nullable();
            $table->text('links_to_teacher_testimonials_or_reviews')->nullable();
            $table->text('option_to_current_past_foreign_teachers')->nullable();
            $table->integer('job_status')->nullable();
            $table->unsignedInteger('posted_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employer_jobs');
    }
};
