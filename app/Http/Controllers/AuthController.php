<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth; // Add this line
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\AuthCode; // Make sure to import your AuthCode model
use Illuminate\Http\RedirectResponse; // Ensure you're importing this class

use Inertia\Inertia;

class AuthController extends Controller
{
    public function register(Request $request) {
        // Validate the request
        $data = $request->validate([
            'name' => ['required', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed'],
            'authcode' => ['required', 'string'], // Validate the authcode
        ]);

        // Check if the authcode exists in the auth_codes table
        $authCodeExists = AuthCode::where('authcode', $data['authcode'])->exists();

        if (!$authCodeExists) {
            // If authcode is not valid, return an error
            return back()->withErrors(['authcode' => 'The provided auth code is invalid.'])->withInput();
        }

        // Register the user
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']), // Ensure to hash the password
        ]);

        // Login the user
        Auth::login($user);

        // Redirect to the admin index page using Inertia
        return Inertia::render('Admin/Dashboard', [
            'user' => $user,
            'authCodeValid' => $authCodeExists, // Optional: pass the auth code validity as a prop
        ]);
    }

    public function login(Request $request) {
        // Validate the incoming request data
        $data = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
    
        // Attempt to log the user in
        if (Auth::attempt($data, $request->input('remember', false))) {
            $request->session()->regenerate(); // Regenerate the session to prevent fixation
    
           // Redirect to Admin/Dashboard
           return redirect()->intended('/admin/dashboard');
            
        }
    
        // If authentication fails, redirect back with an error
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email'); // Retain the email input
        }    
    
    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken(); 
        return redirect()->route('login')->with('success', 'Logged out successfully.');
    }
    
    
    
}
