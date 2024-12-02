<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TakeClassBlsCpr;
use Inertia\Inertia;


class TakeBlsClassController extends Controller
{
    public function index()
{
    // Get today's date
    $today = now()->toDateString();

    // Retrieve records where course_start is greater than today, with pagination of 3 results per page
    $blsclass = TakeClassBlsCpr::where('course_start', '>', $today)->paginate(3);

    // Return the Inertia view with the filtered data
    return Inertia::render('BlsCpr', [
        'blsclass' => $blsclass,
    ]);
}

public function TakeallBls()
{
    // Get today's date in YYYY-MM-DD format
    $today = now()->toDateString();

    // Retrieve records where course_start is greater than today
    $blsclass = TakeClassBlsCpr::where('course_start', '>', $today)->paginate(5);

    // Return the Inertia view with the filtered data
    return Inertia::render('take-a-class/Bls', [
        'takeblsclass' => $blsclass,
    ]);
}

}
