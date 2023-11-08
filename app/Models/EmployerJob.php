<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmployerJob extends Model
{
    use SoftDeletes , HasFactory;
    protected $fillable =
    [
        'school_vision',
        'unique_selling_point',
        'ideal_candidate_profile',
        'experience_level',
        'housing_included',
        'Insurance_included',
        'job_title',
        'job_type',
        'contract_duration',
        'start_date',
        'end_date',
        'job_description',
        'renewal_possibilities',
        'base_pay',
        'allownces_other_incentives',
        'specify',
        'tax_deductions',
        'bonuses',
        'payday_details',
        'student_age_group',
        'class_size',
        'hours_per_week',
        'teaching_hours_per_day',
        'non_teaching_hours_per_day',
        'break_times',
        'curriculum_overview',
        'material_resources_available',
        'teaching_aids',
        'monthly_salary',
        'housing_details',
        'relocation_allowance',
        'health_dental_insurance',
        'pension',
        'airfare',
        'vacation_sick_leave',
        'national_holidays',
        'professional_development_opportunities',
        'overtime_pay',
        'education',
        'teaching_certificate',
        'experience',
        'background_check',
        'health_check_requirement',
        'preferred_accent',
        'visa_type',
        'language_proficiency',
        'arrival_assitance',
        'initial_accomodation',
        'first_week_structure',
        'induction_programs',
        'mentorship',
        'city_town',
        'neighbourhood_description',
        'proximity_to_landmarks',
        'local_amenities',
        'school_facilities',
        'public_transport_options',
        'work_enviroment_and_culture',
        'co_assistant_teachers_availability',
        'orientation_and_training',
        'culture_assimilation_program',
        'language_courses_or_asistance',
        'local_bank_account_assistance',
        'emergency_contacts_and_support',
        'required_documents',
        'interview_process',
        'application_deadline',
        'contact_review_process',
        'decision_deadline',
        'extracurricular_duties',
        'performance_evaluation',
        'advancement_opportunities',
        'school_values_and_teaching_philosophy',
        'links_to_teacher_testimonials_or_reviews',
        'option_to_current_past_foreign_teachers',
        'job_status',
        'posted_by',
    ];

    public function employerDetails()
    {
        return $this->belongsTo(EmployerDetails::class,'posted_by','user_id');
    }
    public function employerInfo()
    {
        return $this->belongsTo(User::class,'posted_by','id');
    }
    public function jobApplicants()
    {
        return $this->belongsToMany(User::class, 'job_applications', 'employer_job_id', 'candidate_id');
    }
    public function savedJobs()
    {
        return $this->belongsToMany(User::class, 'saved_jobs', 'employer_job_id', 'user_id');
    }


}
