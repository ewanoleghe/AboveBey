<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Models\TakeClass;
use App\Models\TakeClassHha;
use App\Models\TakeClassMed;
use App\Models\TakeClassBlsCpr;

use Inertia\Inertia;

use Illuminate\Http\Request;

class MakeNewClassController extends Controller
{
    public function StoreRegisterCnaClass(Request $request)
    {
        // Validation logic
        $validatedData = $request->validate([
            'program_name' => 'required|string',
            'course_start' => 'required|date',
            'course_end' => 'required|date',
            'time_start' => 'required|string',
            'time_end' => 'required|string',
            'training_code' => 'required|string',
            'location' => 'required|string',
            'class_type' => 'required|string',
            'total_hours' => 'required|numeric',
            'application_fee' => 'required|numeric',
        ]);

        // Format the dates
    $validatedData['course_start'] = $this->formatDate($validatedData['course_start']);
    $validatedData['course_end'] = $this->formatDate($validatedData['course_end']);

    // Format the times
    $validatedData['time_start'] = $this->formatTime($validatedData['time_start']);
    $validatedData['time_end'] = $this->formatTime($validatedData['time_end']);

    // Store the data in the database
    TakeClass::create($validatedData); // Adjust this line based on your actual model and fields

    // Redirect back with a success message
    return redirect()->route('admin.dashboard')->with('flash', [
        'message' => 'CNA class registered successfully!',
    ]);
    }


    private function formatDate($date)
    {
        return date('Y-m-d', strtotime($date)); // Convert to Y-m-d format
    }

    private function formatTime($time)
    {
        // Convert '12:20 AM' or '12:20 PM' to 'HH:MM:SS'
        return date('H:i:s', strtotime($time)); // Use strtotime to parse the time
    }


    public function StoreRegisterHhaClass(Request $request)
    {
        // Validation logic
        $validatedData = $request->validate([
            'program_name' => 'required|string',
            'course_start' => 'required|date',
            'course_end' => 'required|date',
            'time_start' => 'required|string',
            'time_end' => 'required|string',
            'training_code' => 'required|string',
            'location' => 'required|string',
            'class_type' => 'required|string',
            'total_hours' => 'required|numeric',
            'application_fee' => 'required|numeric',
        ]);

        // Format the dates
    $validatedData['course_start'] = $this->formatDate($validatedData['course_start']);
    $validatedData['course_end'] = $this->formatDate($validatedData['course_end']);

    // Format the times
    $validatedData['time_start'] = $this->formatTime($validatedData['time_start']);
    $validatedData['time_end'] = $this->formatTime($validatedData['time_end']);

    // Store the data in the database
    TakeClassHha::create($validatedData); // Adjust this line based on your actual model and fields

    // Redirect back with a success message
    return redirect()->route('admin.dashboard')->with('flash', [
        'message' => 'HHA class registered successfully!',
    ]);
    }

    public function StoreRegisterMedClass(Request $request)
    {
        // Validation logic
        $validatedData = $request->validate([
            'program_name' => 'required|string',
            'course_start' => 'required|date',
            'course_end' => 'required|date',
            'time_start' => 'required|string',
            'time_end' => 'required|string',
            'training_code' => 'required|string',
            'location' => 'required|string',
            'class_type' => 'required|string',
            'total_hours' => 'required|numeric',
            'application_fee' => 'required|numeric',
        ]);

        // Format the dates
    $validatedData['course_start'] = $this->formatDate($validatedData['course_start']);
    $validatedData['course_end'] = $this->formatDate($validatedData['course_end']);

    // Format the times
    $validatedData['time_start'] = $this->formatTime($validatedData['time_start']);
    $validatedData['time_end'] = $this->formatTime($validatedData['time_end']);

    // Store the data in the database
    TakeClassMed::create($validatedData); // Adjust this line based on your actual model and fields

    // Redirect back with a success message
    return redirect()->route('admin.dashboard')->with('flash', [
        'message' => 'CMA class registered successfully!',
    ]);
    }

    public function StoreRegisterBlsClass(Request $request)
    {
        // Validation logic
        $validatedData = $request->validate([
            'program_name' => 'required|string',
            'course_start' => 'required|date',
            'course_end' => 'required|date',
            'time_start' => 'required|string',
            'time_end' => 'required|string',
            'training_code' => 'required|string',
            'location' => 'required|string',
            'class_type' => 'required|string',
            'total_hours' => 'required|numeric',
            'application_fee' => 'required|numeric',
        ]);

        // Format the dates
    $validatedData['course_start'] = $this->formatDate($validatedData['course_start']);
    $validatedData['course_end'] = $this->formatDate($validatedData['course_end']);

    // Format the times
    $validatedData['time_start'] = $this->formatTime($validatedData['time_start']);
    $validatedData['time_end'] = $this->formatTime($validatedData['time_end']);

    // Store the data in the database
    TakeClassBlsCpr::create($validatedData); // Adjust this line based on your actual model and fields

    // Redirect back with a success message
    return redirect()->route('admin.dashboard')->with('flash', [
        'message' => 'CMA class registered successfully!',
    ]);
    }


}
