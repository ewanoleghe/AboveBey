<?php

namespace App\Http\Controllers;
use Inertia\Inertia; // Import the Inertia facade
use App\Models\TakeClass;
use App\Models\TakeClassHha;
use App\Models\TakeClassMed;
use App\Models\TakeClassBlsCpr;

use Illuminate\Http\Request;

class ApplyController extends Controller
{
    //CNA
    public function CnaApplicationForm(Request $request)
    {
        $id = $request->query('id'); // Get the ID from the query parameter

        // Fetch the relevant data from the database
        $cnaClass = TakeClass::findOrFail($id); // the Model 'TakeClass' where the id came from 

        // Check if the class exists
        if (!$cnaClass) {
            return redirect()->route('some.error.page')->with('error', 'Class not found');
        }

        // Pass the data to the view
        return Inertia::render('take-a-class/Forms/Application', [
            'cnaClass' => $cnaClass,
        ]);
    }

    // HHA Application
    public function HhaApplicationForm(Request $request)
    {
        $id = $request->query('id'); // Get the ID from the query parameter

        // Fetch the relevant data from the database
        $HhaClass = TakeClassHha::findOrFail($id); // the Model 'TakeClassHha' where the id came from 

        // Check if the class exists
        if (!$HhaClass) {
            return redirect()->route('some.error.page')->with('error', 'Class not found');
        }

        // Pass the data to the view
        return Inertia::render('take-a-class/Forms/ApplicationHha', [
            'HhaClass' => $HhaClass,
        ]);
    }

    // Medical Admin
    public function MedApplicationForm(Request $request)
    {
        $id = $request->query('id'); // Get the ID from the query parameter

        // Fetch the relevant data from the database
        $MedClass = TakeClassMed::findOrFail($id); // the Model 'TakeClassMed' where the id came from 

        // Check if the class exists
        if (!$MedClass) {
            return redirect()->route('some.error.page')->with('error', 'Class not found');
        }

        // Pass the data to the view
        return Inertia::render('take-a-class/Forms/ApplicationMed', [
            'MedClass' => $MedClass,
        ]);
    }

    public function BlsApplicationForm(Request $request)
    {
        $id = $request->query('id'); // Get the ID from the query parameter

        // Fetch the relevant data from the database
        $BlsClass = TakeClassBlsCpr::findOrFail($id); // the Model 'TakeClassBlsCpr' where the id came from 

        // Check if the class exists
        if (!$BlsClass) {
            return redirect()->route('some.error.page')->with('error', 'Class not found');
        }

        // Pass the data to the view
        return Inertia::render('take-a-class/Forms/ApplicationBls', [
            'BlsClass' => $BlsClass,
        ]);
    }


public function applyCna(Request $request, $id)
{
    // Handle the form submission
    // Validate the request
    $validatedData = $request->validate([
        // Add validation rules
        'field1' => 'required|string',
        'field2' => 'required|email',
        // ...
    ]);

    // Process the application logic
    // ...

    return redirect()->back()->with('success', 'Application submitted successfully!');
}

}
