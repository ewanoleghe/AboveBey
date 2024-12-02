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
        Schema::create('take_class_bls_cprs', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID
            $table->date('course_start'); // Date of the course
            $table->date('course_end'); // Date of the course
            $table->time('time_start'); // Time of the course
            $table->time('time_end'); // Time of the course
            $table->string('program_name'); // Program title
            $table->string('training_code'); // Training title
            $table->string('location'); // Location of the training
            $table->string('class_type'); // Inperson or Online
            $table->string('total_hours'); // Inperson or Online
            $table->decimal('application_fee', 8, 2); // Price with 2 decimal places
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('take_class_bls_cprs');
    }
};
