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
        Schema::create('candidate_personal_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nationality')->nullable();
            $table->unsignedBigInteger('passport')->nullable();
            $table->enum('current_visa_status', ['No Visa', 'Tourist Visa', 'Student Visa','E2 Teaching Visa'])->default('No Visa');
            $table->enum('criminal_record', ['Yes', 'No'])->default('No');
            $table->enum('is_healthy', ['Yes', 'No'])->default('Yes');
            $table->text('graduation')->nullable();
            $table->longText('note')->nullable();
            $table->longText('profile_picture')->nullable();
            $table->longText('date_of_birth')->nullable();
            $table->text('current_location')->nullable();
            $table->longText('introduction')->nullable();
            $table->longText('why_interested_teaching_in_korea')->nullable();
            $table->longText('language_proficiency')->nullable();
            $table->longText('health_declaration')->nullable();
            $table->longText('terms_and_conditions')->nullable();
            $table->longText('criminal_background')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidate_personal_details');
    }
};
