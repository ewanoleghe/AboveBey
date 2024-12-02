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
        Schema::create('med_enrollments', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 255);
            $table->string('last_name', 255);
            $table->string('ssn', 11);
            $table->string('email', 255);
            $table->string('phone', 15);
            $table->string('city', 255);
            $table->string('address', 255);
            $table->string('county', 100);
            $table->string('postcode', 10);
            $table->text('signature');
            $table->string('cna_class_id');
            $table->string('program_name', 255);
            $table->string('training_code', 255);
            $table->string('class_type', 255);
            $table->date('course_start');
            $table->date('course_end');
            $table->string('time_start');
            $table->string('time_end');
            $table->decimal('application_fee', 10, 2);
            $table->string('read_unr', 255);
            $table->string('payment_status', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('med_enrollments');
    }
};
