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
        Schema::table('candidate_documents', function (Blueprint $table) {
            $table->enum('status' , ['pending' , 'verified' , 'rejected' , 'ineligible'])->default('pending')->after('document_type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('candidate_documents', function (Blueprint $table) {
            //
        });
    }
};
