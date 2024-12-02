<?php

namespace App\Http\Controllers;
use App\Models\TakeClassMed;
use Inertia\Inertia;

use Illuminate\Http\Request;

class TakeMedClassController extends Controller
{
    public function index()
    {
    // Get today's date
    $today = now()->toDateString();

    // Retrieve records where course_start is greater than today, with pagination of 3 results per page
    $takeMedclass = TakeClassMed::where('course_start', '>', $today)->paginate(3);

    // Return the Inertia view with the filtered data
    return Inertia::render('MedicationAdmini', [
        'takeMedclass' => $takeMedclass,
    ]);
    }

    public function TakeallMed()
        {
            // Get today's date in YYYY-MM-DD format
            $today = now()->toDateString();

            // Retrieve records where course_start is greater than today
            $takeMedclass = TakeClassMed::where('course_start', '>', $today)->paginate(5);

            // Return the Inertia view with the filtered data
            return Inertia::render('take-a-class/Med', [
                'takeMedclass' => $takeMedclass,
            ]);
        
        }
}
