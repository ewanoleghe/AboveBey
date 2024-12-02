<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\TakeClass; //CNA
use App\Models\TakeClassHha;
use App\Models\TakeClassMed;
use App\Models\TakeClassBlsCpr;

use App\Models\CnaEnrollment;
use App\Models\HhaEnrollment;
use App\Models\MedEnrollment;
use App\Models\BlsEnrollment;

use Inertia\Inertia;
use Carbon\Carbon;


use App\Models\User; // Assuming you're using the User model
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    protected function getClassData() {
        // Fetch class data from the relevant models
        $takeClasses = TakeClass::all();
        $takeClassHhas = TakeClassHha::all();
        $takeClassMeds = TakeClassMed::all();
        $takeClassBlsCpr = TakeClassBlsCpr::all();

        // Get today's date in the correct format
        $today = Carbon::today()->toDateString(); // This will be in 'YYYY-MM-DD' format

        // Fetch upcoming class counts
        $cnaUpcomingCount = TakeClass::where('course_start', '>', $today)->count();
        $hhaUpcomingCount = TakeClassHha::where('course_start', '>', $today)->count();
        $medUpcomingCount = TakeClassMed::where('course_start', '>', $today)->count();
        $blsUpcomingCount = TakeClassBlsCpr::where('course_start', '>', $today)->count();
        
        // Fetch counts of enrollments where read_unr is 'unread'
        $cnaUnreadCount = CnaEnrollment::where('read_unr', 'unread')->count();
        $hhaUnreadCount = HhaEnrollment::where('read_unr', 'unread')->count();
        $medUnreadCount = MedEnrollment::where('read_unr', 'unread')->count();
        $blsUnreadCount = BlsEnrollment::where('read_unr', 'unread')->count();
    
        // Fetch counts of enrollments where payment_status is 'pending'
        $cnaPaymentPendingCount = CnaEnrollment::where('payment_status', 'pending')->count();
        $hhaPaymentPendingCount = HhaEnrollment::where('payment_status', 'pending')->count();
        $medPaymentPendingCount = MedEnrollment::where('payment_status', 'pending')->count();
        $blsPaymentPendingCount = BlsEnrollment::where('payment_status', 'pending')->count();
    
        // Fetch all enrollments (if needed)
        $cnaEnrollment = CnaEnrollment::all();
        $hhaEnrollments = HhaEnrollment::all();
        $medEnrollments = MedEnrollment::all();
        $blsEnrollments = BlsEnrollment::all();
    
        // Combine and return the data
        return [
            'takeClasses' => $takeClasses,
            'takeClassHhas' => $takeClassHhas,
            'takeClassMeds' => $takeClassMeds,
            'takeClassBlsCpr' => $takeClassBlsCpr,

            'cnaUpcomingCount' => $cnaUpcomingCount,
            'hhaUpcomingCount' => $hhaUpcomingCount,
            'medUpcomingCount' => $medUpcomingCount,
            'blsUpcomingCount' => $blsUpcomingCount,
            
            'cnaEnrollment' => $cnaEnrollment,
            'hhaEnrollments' => $hhaEnrollments,
            'medEnrollments' => $medEnrollments,
            'blsEnrollments' => $blsEnrollments,

            'cnaUnreadCount' => $cnaUnreadCount,
            'hhaUnreadCount' => $hhaUnreadCount,
            'medUnreadCount' => $medUnreadCount,
            'blsUnreadCount' => $blsUnreadCount,

            'cnaPaymentPendingCount' => $cnaPaymentPendingCount,
            'hhaPaymentPendingCount' => $hhaPaymentPendingCount,
            'medPaymentPendingCount' => $medPaymentPendingCount,
            'blsPaymentPendingCount' => $blsPaymentPendingCount,
        ];
    }

    // Admin Dashboard
    public function Dashboard() {
        $classData = $this->getClassData();
        return Inertia::render('Admin/Dashboard', ['classData' => $classData]);
    }

    public function settings()
    {
        $user = Auth::user(); // Get the authenticated user
        return inertia('Admin/Settings', [
            'user' => $user, // Pass the user data to the view
        ]);
    }

    public function storeAdminSettings(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . Auth::id(),
            'password' => 'nullable|string|min:4|confirmed',
        ]);

        $user = Auth::user(); // Get the authenticated user

        // Update user details
        $user->name = $request->name;
        $user->email = $request->email;

        // Update password if provided
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password); // Hash the password
        }

        $user->save(); // Save changes

        return redirect()->route('admin.settings')->with('success', 'Settings updated successfully.');
    }
}
    
