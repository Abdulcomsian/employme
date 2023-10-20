<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployerDetails extends Model
{
    use HasFactory;
    protected $fillable = [
        'institution',
        'institution_type',
        'address_line_1',
        'address_line_2',
        'country_id',
        'state_id',
        'city_id',
        'zip_code',
        'phone_number',
        'second_contact_number',
        'email',
        'number_of_teachers',
        'number_of_students',
        'number_of_administrative_staff',
        'established_date',
        'school_vision_and_mission',
        'instruction_languages_used',
        'accredition_or_certification',
        'international_accredition_or_certification',
        'employed_foreign_staff_and_roles',
        'available_technical_resources',
        'subscription_plan_id',
        'terms_and_conditions_acceptance',
        'registration_business_license_proof',
        'south_korea_laws_acknowledgement',
        'legal_disputes_confirmation_document',
        'ability_willingness_assurance',
        'financial_health',
        'foreign_teachers_in_3_years',
        'foreign_teachers_retention_rate',
        'reason_contract_termination',
        'current_past_teacher_references',
        'teaching_management_recognition_award',
        'past_ongoing_training_program',
        'institution_development_opportunities',
        'new_hiree_orientation',
        'skculture_programs_resource',
        'storage_processing',
        'user_id',

    ];
}
