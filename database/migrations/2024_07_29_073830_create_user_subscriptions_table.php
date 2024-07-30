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
        Schema::create('user_subscriptions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('plan_id');
            $table->unsignedBigInteger('approved_by')->nullable();
            $table->enum('payment_type' , ['bank-transfer' , 'card-payment']);
            $table->date('starts_from')->nullable();
            $table->date('ends_at')->nullable();
            $table->integer('duration');
            $table->longText('reciept')->nullable();
            $table->string('mobile_number')->nullable();
            $table->integer('is_approved')->default(0);
            $table->foreign('approved_by')->references('id')->on('users');
            $table->foreign('plan_id')->references('id')->on('plans');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_subscriptions');
    }
};
