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
        Schema::create('employer_business_licenses', function (Blueprint $table) {
            $table->id();
            $table->text('license_number')->nullable();
            $table->longText('license_file')->nullable();
            $table->integer('approval_status')->nullable();
            $table->unsignedBigInteger('employer_id');
            $table->foreign('employer_id')->references('id')->on('users')->cascadeOnDelete();
            $table->unsignedBigInteger('approved_by')->nullable();
            $table->foreign('approved_by')->references('id')->on('users')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employer_business_licenses');
    }
};
