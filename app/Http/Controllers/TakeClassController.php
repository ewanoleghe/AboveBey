<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TakeClass;
use Inertia\Inertia;


class TakeClassController extends Controller
{
    public function index()
    {
        // Get today's date
        $today = now()->toDateString();

        // Retrieve records where course_start is greater than today, with pagination of 3 results per page
        $cnaclass = TakeClass::where('course_start', '>', $today)->paginate(3);

        // Return the Inertia view with the filtered data
        return Inertia::render('NurseAssistant', [
            'cnaclass' => $cnaclass,
        ]);
    }

public function Takeall()
    {
        // Get today's date in YYYY-MM-DD format
        $today = now()->toDateString();

        // Retrieve records where course_start is greater than today
        $takeclass = TakeClass::where('course_start', '>', $today)->paginate(5);

        // Return the Inertia view with the filtered data
        return Inertia::render('take-a-class/Cna', [
            'takeclass' => $takeclass,
        ]);
    }

    
}
