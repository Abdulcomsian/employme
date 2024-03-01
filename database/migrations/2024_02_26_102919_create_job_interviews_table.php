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
        Schema::create('job_interviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employer_job_id')->nullable();
            $table->longText('job_link')->nullable();
            $table->datetime('interview_date')->nullable();
            $table->time('interview_time')->nullable();
            $table->datetime('reschedule_date')->nullable();
            $table->time('reschedule_time')->nullable();
            $table->longText('reschedule_meeting')->nullable();
            $table->integer('reschedule_status')->default(0);
            $table->longText('meeting_media')->nullable();
            $table->foreign('employer_job_id')->references('id')->on('employer_jobs')->cascadeOnDelete();
            $table->unsignedBigInteger('requested_from');
            $table->foreign('requested_from')->references('id')->on('users')->cascadeOnDelete();
            $table->unsignedBigInteger('requested_to');
            $table->foreign('requested_to')->references('id')->on('users')->cascadeOnDelete();
            $table->integer('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_interviews');
    }
};
