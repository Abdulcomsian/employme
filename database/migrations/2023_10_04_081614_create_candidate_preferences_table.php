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
        Schema::create('candidate_preferences', function (Blueprint $table) {
            $table->id();
            $table->json('skills')->nullable();
            $table->text('preferred_city_region')->nullable();
            $table->text('school_type')->nullable();
            $table->text('age_group')->nullable();
            $table->longText('video_url')->nullable();
            $table->longText('other_platform_video_url')->nullable();
            $table->string('expected_salary')->nullable();
            $table->integer('minimum_salary')->nullable();
            $table->integer('maximum_salary')->nullable();
            $table->enum('experience_level',['Fresher','Intermediate','No-Experience','Expert','Internship'])->nullable();
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
        Schema::dropIfExists('candidate_preferences');
    }
};
