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
        Schema::table('job_interviews', function (Blueprint $table) {
            $table->unsignedBigInteger('rescheduled_by')->nullable();
            $table->foreign('rescheduled_by')->references('id')->on('users')->onDelete('cascade')->after('requested_to');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('job_interviews', function (Blueprint $table) {
            //
        });
    }
};
