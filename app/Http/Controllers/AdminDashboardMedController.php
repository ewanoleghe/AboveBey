<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;
use App\Models\MedEnrollment;

use Inertia\Inertia;
use Carbon\Carbon;


class AdminDashboardMedController extends Controller
{
    // All Registration MED
    public function ViewMedAll(Request $request) {
        $request->validate([
            'search' => 'nullable|string|max:255',
        ]);
    
        $AllMedRegistration = MedEnrollment::when($request->search, function($query) use ($request) {
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
    
        return Inertia::render('Admin/med/AllMed', [
            'medData' => $AllMedRegistration,
            'searchTerm' => $request->search,
        ]);
    }

    public function updatePaymentStatus(Request $request)
    {
        // Validate the incoming request
        $validated = $request->validate([
            'id' => 'required|integer|exists:med_enrollments,id',
        ]);

        // Find the record and toggle the payment status
        $MedEnrollment = MedEnrollment::find($validated['id']);
        $MedEnrollment->payment_status = $MedEnrollment->payment_status === 'paid' ? 'pending' : 'paid';
        $MedEnrollment->save();

        return redirect()->back()->with('message', 'Payment status updated successfully!');
    }

    public function updateReadStatus(Request $request)
    {
        // Validate the incoming request
        $validated = $request->validate([
            'id' => 'required|integer|exists:med_enrollments,id',
        ]);

        // Find the record and toggle the read status
        $MedEnrollment = MedEnrollment::find($validated['id']);
        $MedEnrollment->read_unr = $MedEnrollment->read_unr === 'read' ? 'unread' : 'read';
        $MedEnrollment->save();

        // Redirect back to the previous page or to a specific page with a success message
        return redirect()->back()->with('message', 'Read status updated successfully!');
    }
    
    public function deleteApplication(Request $request)
    {
        // Validate the incoming request
        $validated = Validator::make($request->all(), [
            'id' => 'required|integer|exists:med_enrollments,id',
        ]);

        if ($validated->fails()) {
            return redirect()->back()->withErrors($validated)->withInput();
        }

        // Perform the deletion
        MedEnrollment::destroy($request->id);

        // Optionally, redirect back with a success message
        return redirect()->route('admin.med_all_registration')->with('message', 'Application deleted successfully.');
    }

    public function viewApplication(Request $request)
    {
        // Validate the incoming request
        $validated = Validator::make($request->all(), [
            'id' => 'required|integer|exists:med_enrollments,id',
        ]);
    
        if ($validated->fails()) {
            // Redirect to the dashboard if validation fails
            return redirect()->route('admin.dashboard') // Change this to your actual dashboard route name
                             ->withErrors($validated)
                             ->withInput();
        }
    
        // Retrieve the application record
        $medApplication = MedEnrollment::find($request->id);

        // Update the 'read_unr' field to 'read'
        $medApplication->update(['read_unr' => 'read']);
    
        // Return a view with the application data
        return Inertia::render('Admin/med/ViewMedReg', compact('medApplication'));
    }

    public function updatePaymentStatusView(Request $request)
    {
        // Validate the incoming request
        $validated = $request->validate([
            'id' => 'required|integer|exists:med_enrollments,id',
        ]);

        // Find the record and toggle the payment status
        $MedEnrollment = MedEnrollment::find($validated['id']);
        $MedEnrollment->payment_status = $MedEnrollment->payment_status === 'paid' ? 'pending' : 'paid';
        $MedEnrollment->save();

        // Redirect to the user profile view after updating
        return redirect()->route('admin.update_med_payment_status', ['id' => $validated['id']])
                        ->with('message', 'Payment status updated successfully!');
    }

    public function showApplication($id)
    {
        // Optionally, validate the ID or retrieve the application
        return Inertia::render('Admin/med/ViewMedReg', [
            'id' => $id, // Pass any necessary data
        ]);
    }

    // All Registration hha
    public function ViewAllUnread(Request $request) {
        $request->validate([
            'search' => 'nullable|string|max:255',
        ]);
    
        $unReadRegistration = MedEnrollment::when($request->search, function($query) use ($request) {
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
    
        return Inertia::render('Admin/med/ViewAllUnread', [
            'unReadRegistration' => $unReadRegistration,
            'searchTerm' => $request->search,
        ]);
    }

    // All Pending Payment
    public function ViewAllPaymentPending(Request $request) {
        $request->validate([
            'search' => 'nullable|string|max:255',
        ]);
    
        $pendingPayments = MedEnrollment::when($request->search, function($query) use ($request) {
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
    
        return Inertia::render('Admin/med/PendingPayment', [
            'pendingPayments' => $pendingPayments,
            'searchTerm' => $request->search,
        ]);
    }
}
