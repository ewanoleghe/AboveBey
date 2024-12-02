<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TakeClassHha;
use Inertia\Inertia;


class TakeHhaClassController extends Controller
{
    public function index()
    {
    // Get today's date
    $today = now()->toDateString();

    // Retrieve records where course_start is greater than today, with pagination of 3 results per page
    $hhaclass = TakeClassHha::where('course_start', '>', $today)->paginate(3);

    // Return the Inertia view with the filtered data
    return Inertia::render('HomeHealthAid', [
        'hhaclass' => $hhaclass,
    ]);
    }

    public function TakeallHha()
    {
        // Get today's date in YYYY-MM-DD format
        $today = now()->toDateString();

        // Retrieve records where course_start is greater than today
        $takeHhaclass = TakeClassHha::where('course_start', '>', $today)->paginate(5);

        // Return the Inertia view with the filtered data
        return Inertia::render('take-a-class/Hha', [
            'takeHhaclass' => $takeHhaclass,
        ]);
    }

}
