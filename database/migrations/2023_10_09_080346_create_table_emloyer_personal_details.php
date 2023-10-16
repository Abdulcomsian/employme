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
        Schema::create('emloyer_personal_details', function (Blueprint $table) {
            $table->id();
            $table->text('institution_name')->nullable();
            $table->unsignedBigInteger('school_type_id')->nullable();
            $table->text('address')->nullable();
            $table->string('postal_code')->nullable();
            $table->text('province')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('second_contact_number')->nullable();
            $table->string('email')->nullable();
            $table->integer('number_of_students')->nullable();
            $table->integer('number_of_teachers')->nullable();
            $table->integer('administrative_strength')->nullable();
            $table->integer('year_established')->nullable();
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
        Schema::dropIfExists('table_emloyer_personal_details');
    }
};
