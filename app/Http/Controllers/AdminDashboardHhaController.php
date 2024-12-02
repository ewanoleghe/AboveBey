<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;
use App\Models\HhaEnrollment;

use Inertia\Inertia;
use Carbon\Carbon;

class AdminDashboardHhaController extends Controller
{
    // All Registration HHA
    public function ViewHhaAll(Request $request) {
        $request->validate([
            'search' => 'nullable|string|max:255',
        ]);
    
        $AllHhaRegistration = HhaEnrollment::when($request->search, function($query) use ($request) {
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
    
        return Inertia::render('Admin/hha/AllHha', [
            'hhaData' => $AllHhaRegistration,
            'searchTerm' => $request->search,
        ]);
    }

    public function updatePaymentStatus(Request $request)
    {
        // Validate the incoming request
        $validated = $request->validate([
            'id' => 'required|integer|exists:hha_enrollments,id',
        ]);

        // Find the record and toggle the payment status
        $HhaEnrollment = HhaEnrollment::find($validated['id']);
        $HhaEnrollment->payment_status = $HhaEnrollment->payment_status === 'paid' ? 'pending' : 'paid';
        $HhaEnrollment->save();

        return redirect()->back()->with('message', 'Payment status updated successfully!');
    }

    public function updateReadStatus(Request $request)
    {
        // Validate the incoming request
        $validated = $request->validate([
            'id' => 'required|integer|exists:hha_enrollments,id',
        ]);

        // Find the record and toggle the read status
        $HhaEnrollment = HhaEnrollment::find($validated['id']);
        $HhaEnrollment->read_unr = $HhaEnrollment->read_unr === 'read' ? 'unread' : 'read';
        $HhaEnrollment->save();

        // Redirect back to the previous page or to a specific page with a success message
        return redirect()->back()->with('message', 'Read status updated successfully!');
    }
    
    public function deleteApplication(Request $request)
    {
        // Validate the incoming request
        $validated = Validator::make($request->all(), [
            'id' => 'required|integer|exists:hha_enrollments,id',
        ]);

        if ($validated->fails()) {
            return redirect()->back()->withErrors($validated)->withInput();
        }

        // Perform the deletion
        HhaEnrollment::destroy($request->id);

        // Optionally, redirect back with a success message
        return redirect()->route('admin.hha_all_registration')->with('message', 'Application deleted successfully.');
    }

    public function viewApplication(Request $request)
    {
        // Validate the incoming request
        $validated = Validator::make($request->all(), [
            'id' => 'required|integer|exists:hha_enrollments,id',
        ]);
    
        if ($validated->fails()) {
            // Redirect to the dashboard if validation fails
            return redirect()->route('admin.dashboard') // Change this to your actual dashboard route name
                             ->withErrors($validated)
                             ->withInput();
        }
    
        // Retrieve the application record
        $hhaApplication = HhaEnrollment::find($request->id);

        // Update the 'read_unr' field to 'read'
        $hhaApplication->update(['read_unr' => 'read']);
    
        // Return a view with the application data
        return Inertia::render('Admin/hha/ViewhhaReg', compact('hhaApplication'));
    }

    public function updatePaymentStatusView(Request $request)
    {
        // Validate the incoming request
        $validated = $request->validate([
            'id' => 'required|integer|exists:hha_enrollments,id',
        ]);

        // Find the record and toggle the payment status
        $HhaEnrollment = HhaEnrollment::find($validated['id']);
        $HhaEnrollment->payment_status = $HhaEnrollment->payment_status === 'paid' ? 'pending' : 'paid';
        $HhaEnrollment->save();

        // Redirect to the user profile view after updating
        return redirect()->route('admin.update_hha_payment_status', ['id' => $validated['id']])
                        ->with('message', 'Payment status updated successfully!');
    }

    public function showApplication($id)
    {
        // Optionally, validate the ID or retrieve the application
        return Inertia::render('Admin/hha/ViewhhaReg', [
            'id' => $id, // Pass any necessary data
        ]);
    }

    // All Registration hha
    public function ViewAllUnread(Request $request) {
        $request->validate([
            'search' => 'nullable|string|max:255',
        ]);
    
        $unReadRegistration = HhaEnrollment::when($request->search, function($query) use ($request) {
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
    
        return Inertia::render('Admin/hha/ViewAllUnread', [
            'unReadRegistration' => $unReadRegistration,
            'searchTerm' => $request->search,
        ]);
    }

    // All Pending Payment
    public function ViewAllPaymentPending(Request $request) {
        $request->validate([
            'search' => 'nullable|string|max:255',
        ]);
    
        $pendingPayments = HhaEnrollment::when($request->search, function($query) use ($request) {
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
    
        return Inertia::render('Admin/hha/PendingPayment', [
            'pendingPayments' => $pendingPayments,
            'searchTerm' => $request->search,
        ]);
    }
}
