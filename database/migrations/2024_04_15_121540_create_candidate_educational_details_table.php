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
        Schema::create('candidate_educational_details', function (Blueprint $table) {
            $table->id();
            $table->text('degree')->nullable();
            $table->text('field_of_study')->nullable();
            $table->text('institute_name')->nullable();
            $table->unsignedBigInteger('institute_place')->nullable();
            $table->integer('year_of_study')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidate_educational_details');
    }
};
