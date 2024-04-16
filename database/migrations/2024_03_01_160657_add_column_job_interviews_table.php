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
            $table->datetime('reschedule_date')->nullable();
            $table->time('reschedule_time')->nullable();
            $table->longText('reschedule_meeting')->nullable();
            $table->integer('reschedule_status')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('job_interviews', function (Blueprint $table) {
            $table->dropColumn('reschedule_date');
            $table->dropColumn('reschedule_time');
            $table->dropColumn('reschedule_meeting');
            $table->dropColumn('reschedule_status');
        });
    }
};
