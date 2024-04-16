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
            $table->double('minimum_salary' , 10 , 2)->nullable();
            $table->double('maximum_salary', 10 , 2)->nullable();
            $table->enum('experience_level',['No Experience','0-1 Year','1-3 Years','3-5 Years','5-7 Years' ,'7-10 Years','10+'])->nullable();
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
