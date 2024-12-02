<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\TakeClassMed;
use App\Models\MedEnrollment;

use Inertia\Inertia;
use Carbon\Carbon;

class AdminDashboardClassMedController extends Controller
{
    public function ViewMedClass(Request $request) {
        // Get all registrations without search functionality
        $AllMedClass = TakeClassMed::withCount('enrollments') // Count enrollments using Eloquent
                ->orderBy('id', 'desc') // Change to your desired ordering column
                ->paginate(10)
                ->withQueryString();
                
       
            return Inertia::render('Admin/class/cma/AllMed', [
                'medData' => $AllMedClass,
            ]);
    }

    public function deleteClass(Request $request)
    {
        // Validate the incoming request
        $validated = Validator::make($request->all(), [
            'id' => 'required|integer|exists:take_class_meds,id', // Ensure this matches your table name
        ]);

        if ($validated->fails()) {
            return redirect()->back()->withErrors($validated)->withInput();
        }

        // Perform the deletion
        TakeClassMed::destroy($request->id);

        // Optionally, redirect back with a success message
        return redirect()->back()->with('message', 'Application deleted successfully.');
    }

    public function ViewMedUpComingClass(Request $request) {
        // Get all registrations where course_start is greater than today
        $AllMedUpClass = TakeClassMed::withCount('enrollments') // Count enrollments
            ->where('course_start', '>', now()) // Use 'now()' for current date and time
            ->orderBy('id', 'desc') // Change to your desired ordering column
            ->paginate(10)
            ->withQueryString();
    
            return Inertia::render('Admin/class/cma/AllUpComingMed', [
                'medUpData' => $AllMedUpClass,
            ]);
    }

    public function ViewMedEnrolByClass(Request $request) {
        // Validate the class ID from the route parameter
        $validatedId = $request->validate([
            'id' => 'required|integer|exists:take_class_meds,id',
        ])['id']; // This will work as the ID is now passed as a parameter
        
        $request->validate([
            'search' => 'nullable|string|max:255',
        ]);

        // Start building the query for enrollments
        $MedclassEnrollments = MedEnrollment::where('cna_class_id', $validatedId)
        ->when($request->search, function ($query) use ($request) {
            $query->where('first_name', 'like', '%' . $request->search . '%')
                ->orWhere('last_name', 'like', '%' . $request->search . '%')
                ->orWhere('email', 'like', '%' . $request->search . '%')
                ->orWhere('phone', 'like', '%' . $request->search . '%')
                ->orWhere('postcode', 'like', '%' . $request->search . '%');
        })
        ->orderBy('created_at', 'desc') // Order by created_at
        ->paginate(10) // Pagination
        ->withQueryString(); // Maintain query string for pagination

    return Inertia::render('Admin/class/cma/AllMedEnrolByClass', [
        'dataEnrolMed' => $MedclassEnrollments,
        'searchTerm' => $request->search,
    ]);
    
    }
}
