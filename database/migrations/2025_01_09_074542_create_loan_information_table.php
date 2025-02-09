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
        Schema::create('loan_information', function (Blueprint $table) {
            $table->id();
            $table->foreignId('loan_id');
            $table->string('photo_path')->nullable();
            $table->string('lastname')->nullable();
            $table->string('firstname')->nullable();
            $table->string('middlename')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('birthdate')->nullable();
            $table->string('spouse_lastname')->nullable();
            $table->string('spouse_firstname')->nullable();
            $table->string('spouse_middlename')->nullable();
            $table->string('spouse_birthdate')->nullable();
            $table->string('purok')->nullable();
            $table->string('brgy')->nullable();
            $table->string('city')->nullable();
            $table->string('province')->nullable();
            $table->string('home')->nullable();
            $table->string('civil_status')->nullable();
            $table->string('gross_income')->nullable();
            $table->string('spouse_income')->nullable();
            $table->string('total_expense')->nullable();
            $table->string('total_uncommitted_income')->nullable();
            $table->json('agriculture')->nullable();
            $table->json('microfinance')->nullable();
            $table->json('business')->nullable();
            $table->json('farming')->nullable();
            $table->string('house_sketch_path')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loan_information');
    }
};
