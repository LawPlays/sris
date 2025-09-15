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
        Schema::create('enrollments', function (Blueprint $table) {
            $table->id();

            // Relationship fields
            $table->bigInteger('student_id')->unsigned()->nullable();
            $table->bigInteger('user_id')->unsigned()->nullable();

            // Personal info
            $table->string('last_name');
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->date('birthdate')->nullable();
            $table->string('place_of_birth')->nullable();
            $table->enum('sex', ['Male', 'Female'])->nullable();
            $table->string('ip_community')->nullable();

            // Address
            $table->string('current_address');
            $table->string('permanent_address')->nullable();

            // Family info
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('guardian_name')->nullable();

            // Flags
            $table->boolean('is_4ps_beneficiary')->default(false);
            $table->boolean('is_pwd')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enrollments');
    }
};
