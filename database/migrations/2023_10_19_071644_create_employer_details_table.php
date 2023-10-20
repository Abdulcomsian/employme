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
        Schema::create('employer_details', function (Blueprint $table) {
            $table->id();
            $table->text('institution')->nullable();
            $table->text('institution_type')->nullable();
            $table->text('address_line_1')->nullable();
            $table->text('address_line_2')->nullable();
            $table->unsignedInteger('country_id')->nullable();
            $table->unsignedInteger('state_id')->nullable();
            $table->unsignedInteger('city_id')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('second_contact_number')->nullable();
            $table->text('email')->nullable();
            $table->integer('number_of_teachers')->nullable();
            $table->integer('number_of_students')->nullable();
            $table->integer('number_of_administrative_staff')->nullable();
            $table->date('established_date')->nullable();
            $table->text('school_vision_and_mission')->nullable();
            $table->text('instruction_languages_used')->nullable();
            $table->longText('accredition_or_certification')->nullable();
            $table->text('international_accredition_or_certification')->nullable();
            $table->text('employed_foreign_staff_and_roles')->nullable();
            $table->text('available_technical_resources')->nullable();
            $table->unsignedInteger('subscription_plan_id')->nullable();
            $table->text('terms_and_conditions_acceptance')->nullable();
            $table->text('registration_business_license_proof')->nullable();
            $table->text('south_korea_laws_acknowledgement')->nullable();
            $table->text('legal_disputes_confirmation_document')->nullable();
            $table->text('ability_willingness_assurance')->nullable();
            $table->text('financial_health')->nullable();
            $table->integer('foreign_teachers_in_3_years')->nullable();
            $table->text('foreign_teachers_retention_rate')->nullable();
            $table->text('reason_contract_termination')->nullable();
            $table->text('current_past_teacher_references')->nullable();
            $table->text('teaching_management_recognition_award')->nullable();
            $table->text('past_ongoing_training_program')->nullable();
            $table->text('institution_development_opportunities')->nullable();
            $table->text('new_hiree_orientation')->nullable();
            $table->text('sk_cultural_programs')->nullable();
            $table->text('languages_resources_foreign_staff')->nullable();
            $table->text('agreement_period_checks_updates')->nullable();
            $table->text('storage_processing_consent')->nullable();
            $table->unsignedInteger('user_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employer_details');
    }
};
