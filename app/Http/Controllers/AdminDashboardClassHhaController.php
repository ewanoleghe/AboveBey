<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\TakeClassHha;
use App\Models\HhaEnrollment;

use Inertia\Inertia;
use Carbon\Carbon;

class AdminDashboardClassHhaController extends Controller
{
    public function ViewHhaClass(Request $request) {
        // Get all registrations without search functionality. Count the no of enrollments per class
        $AllHhaClass = TakeClassHha::withCount('enrollments') // Count enrollments using Eloquent
                ->orderBy('id', 'desc') // Change to your desired ordering column
                ->paginate(10)
                ->withQueryString();
                
       
            return Inertia::render('Admin/class/hha/AllHha', [
                'hhaData' => $AllHhaClass,
            ]);
            
    }

    public function deleteClass(Request $request)
    {
        // Validate the incoming request
        $validated = Validator::make($request->all(), [
            'id' => 'required|integer|exists:take_class_hhas,id', // Ensure this matches your table name
        ]);

        if ($validated->fails()) {
            return redirect()->back()->withErrors($validated)->withInput();
        }

        // Perform the deletion
        TakeClassHha::destroy($request->id);

        // Optionally, redirect back with a success message
        return redirect()->back()->with('message', 'Application deleted successfully.');
    }

    public function ViewHhaUpComingClass(Request $request) {
        // Get all registrations where course_start is greater than today
        $AllHhaUpClass = TakeClassHha::withCount('enrollments') // Count enrollments
            ->where('course_start', '>', now()) // Use 'now()' for current date and time
            ->orderBy('id', 'desc') // Change to your desired ordering column
            ->paginate(10)
            ->withQueryString();
    
            return Inertia::render('Admin/class/hha/AllUpComingHha', [
                'hhaUpData' => $AllHhaUpClass,
            ]);
    }

    public function ViewHhaEnrolByClassClass(Request $request) {
        // Validate the class ID from the route parameter
        $validatedId = $request->validate([
            'id' => 'required|integer|exists:take_class_hhas,id',
        ])['id']; // This will work as the ID is now passed as a parameter
        
        $request->validate([
            'search' => 'nullable|string|max:255',
        ]);

        // Start building the query for enrollments
        $HhaclassEnrollments = HhaEnrollment::where('cna_class_id', $validatedId)
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

    return Inertia::render('Admin/class/hha/AllHhaEnrolByClass', [
        'dataEnrolHha' => $HhaclassEnrollments,
        'searchTerm' => $request->search,
    ]);
    
    }
    
}