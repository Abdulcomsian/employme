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
        Schema::create('job_applications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employer_job_id');
            $table->unsignedBigInteger('candidate_id');
            $table->foreign('employer_job_id')->references('id')->on('employer_jobs')->onDelete('cascade');
            $table->foreign('candidate_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('application_status')->nullable();
            $table->longText('cover_letter')->nullable();
            $table->dateTime('application_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_applications');
    }
};
