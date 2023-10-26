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
        Schema::create('candidate_education', function (Blueprint $table) {
            $table->id();
            $table->text('highest_degree')->nullable();
            $table->text('field_of_study')->nullable();
            $table->string('teaching_experiance')->nullable();
            $table->text('institute_name')->nullable();
            $table->text('institute_place')->nullable();
            $table->enum('tefl_tesol_clarification',['Yes','No'])->default('No');
            $table->text('clarification_details_if_yes')->nullable();
            $table->enum('prevous_teaching_in_korea',['Yes','No'])->default('No');
            $table->text('experiance_description_if_yes')->nullable();
            $table->json('educational_details')->nullable();
            $table->json('professional_details')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidate_education');
    }
};
