<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TakeClassesMedTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Define the course details
        $courseDetails = [
            'course_start' => '2025-10-15', // Course start date    
            'course_end' => '2026-11-10',   // Course end date
            'time_start' => '10:00:00',     // Start time (10:00 AM)
            'time_end' => '13:00:00',       // End time (1:00 PM)
            'program_name' => 'Medication Admin',
            'training_code' => 'Medication Admin/CMA-BL-r.21',
            'location' => 'Woodbridge Township',
            'class_type' => 'In-Person',
            'total_hours' => '60',
            'application_fee' => 250.00,     // Course price
        ];

        // Generate 10 entries with the same details
        for ($i = 0; $i < 10; $i++) {
            DB::table('take_class_meds')->insert(array_merge($courseDetails, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }
    }
}
