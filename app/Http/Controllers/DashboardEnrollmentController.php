<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

// use App\Models\TakeClass; //CNA
// use App\Models\TakeClassHha;
// use App\Models\TakeClassMed;
// use App\Models\TakeClassBlsCpr;

use App\Models\CnaEnrollment;

use Inertia\Inertia;
use Carbon\Carbon;

class DashboardEnrollmentController extends Controller
{
    // All Registration CNA
    public function ViewCnaReg(Request $request) {
        $request->validate([
            'search' => 'nullable|string|max:255',
        ]);
    
        $AllCnaRegistration = CnaEnrollment::when($request->search, function($query) use ($request) {
            $query->where('first_name', 'like', '%' . $request->search . '%')
                  ->orWhere('last_name', 'like', '%' . $request->search . '%')
                  ->orWhere('email', 'like', '%' . $request->search . '%')
                  ->orWhere('phone', 'like', '%' . $request->search . '%')
                  ->orWhere('postcode', 'like', '%' . $request->search . '%')
                  ->orWhere('payment_status', 'like', '%' . $request->search . '%');
        })
        ->orderBy('created_at', 'desc') // Change 'created_at' to your desired column
        ->paginate(10)
        ->withQueryString();
    
        return Inertia::render('Admin/CnaReg', [
            'AllCnaRegistration' => $AllCnaRegistration,
            'searchTerm' => $request->search,
        ]);
    }

    public function updatePaymentStatus(Request $request)
    {
        // Validate the incoming request
        $validated = $request->validate([
            'id' => 'required|integer|exists:cna_enrollments,id',
        ]);

        // Find the record and toggle the payment status
        $cnaEnrollment = CnaEnrollment::find($validated['id']);
        $cnaEnrollment->payment_status = $cnaEnrollment->payment_status === 'paid' ? 'pending' : 'paid';
        $cnaEnrollment->save();

        return redirect()->back()->with('message', 'Payment status updated successfully!');
    }

    public function updateReadStatus(Request $request)
    {
        // Validate the incoming request
        $validated = $request->validate([
            'id' => 'required|integer|exists:cna_enrollments,id',
        ]);

        // Find the record and toggle the read status
        $cnaEnrollment = CnaEnrollment::find($validated['id']);
        $cnaEnrollment->read_unr = $cnaEnrollment->read_unr === 'read' ? 'unread' : 'read';
        $cnaEnrollment->save();

        // Redirect back to the previous page or to a specific page with a success message
        return redirect()->back()->with('message', 'Read status updated successfully!');
    }
    
    public function deleteApplication(Request $request)
    {
        // Validate the incoming request
        $validated = Validator::make($request->all(), [
            'id' => 'required|integer|exists:cna_enrollments,id',
        ]);

        if ($validated->fails()) {
            return redirect()->back()->withErrors($validated)->withInput();
        }

        // Perform the deletion
        CnaEnrollment::destroy($request->id);

        // Optionally, redirect back with a success message
        return redirect()->route('cna_all_registration')->with('message', 'Application deleted successfully.');
    }

    public function viewApplication(Request $request)
    {
        // Validate the incoming request
        $validated = Validator::make($request->all(), [
            'id' => 'required|integer|exists:cna_enrollments,id',
        ]);
    
        if ($validated->fails()) {
            // Redirect to the dashboard if validation fails
            return redirect()->route('admin.dashboard') // Change this to your actual dashboard route name
                             ->withErrors($validated)
                             ->withInput();
        }
    
        // Retrieve the application record
        $cnaApplication = CnaEnrollment::find($request->id);

        // Update the 'read_unr' field to 'read'
        $cnaApplication->update(['read_unr' => 'read']);
    
        // Return a view with the application data
        return Inertia::render('Admin/ViewCnaReg', compact('cnaApplication'));
    }

    public function updatePaymentStatusView(Request $request)
    {
        // Validate the incoming request
        $validated = $request->validate([
            'id' => 'required|integer|exists:cna_enrollments,id',
        ]);

        // Find the record and toggle the payment status
        $cnaEnrollment = CnaEnrollment::find($validated['id']);
        $cnaEnrollment->payment_status = $cnaEnrollment->payment_status === 'paid' ? 'pending' : 'paid';
        $cnaEnrollment->save();

        // Redirect to the user profile view after updating
        return redirect()->route('admin.update_cna_payment_status', ['id' => $validated['id']])
                        ->with('message', 'Payment status updated successfully!');
    }

    public function showApplication($id)
    {
        // Optionally, validate the ID or retrieve the application
        return Inertia::render('Admin/ViewCnaReg', [
            'id' => $id, // Pass any necessary data
        ]);
    }

    // All Registration CNA
    public function ViewAllUnread(Request $request) {
        $request->validate([
            'search' => 'nullable|string|max:255',
        ]);
    
        $unReadRegistration = CnaEnrollment::when($request->search, function($query) use ($request) {
            $query->where('first_name', 'like', '%' . $request->search . '%')
                  ->orWhere('last_name', 'like', '%' . $request->search . '%')
                  ->orWhere('email', 'like', '%' . $request->search . '%')
                  ->orWhere('phone', 'like', '%' . $request->search . '%')
                  ->orWhere('postcode', 'like', '%' . $request->search . '%');
        })
        ->where('read_unr', 'unread') // <-- Added condition to filter unread registrations
        ->orderBy('created_at', 'desc') // Change 'created_at' to your desired column
        ->paginate(10)
        ->withQueryString();
    
        return Inertia::render('Admin/ViewAllUnread', [
            'unReadRegistration' => $unReadRegistration,
            'searchTerm' => $request->search,
        ]);
    }

    // All Pending Payment
    public function ViewAllPaymentPending(Request $request) {
        $request->validate([
            'search' => 'nullable|string|max:255',
        ]);
    
        $pendingPayments = CnaEnrollment::when($request->search, function($query) use ($request) {
            $query->where('first_name', 'like', '%' . $request->search . '%')
                  ->orWhere('last_name', 'like', '%' . $request->search . '%')
                  ->orWhere('email', 'like', '%' . $request->search . '%')
                  ->orWhere('phone', 'like', '%' . $request->search . '%')
                  ->orWhere('postcode', 'like', '%' . $request->search . '%');
        })
        ->where('payment_status', 'pending') // <-- Added condition to filter registrations with pending payments
        ->orderBy('created_at', 'desc') // Change 'created_at' to your desired column
        ->paginate(10)
        ->withQueryString();
    
        return Inertia::render('Admin/CnaPendingPayment', [
            'pendingPayments' => $pendingPayments,
            'searchTerm' => $request->search,
        ]);
    }



    
}
