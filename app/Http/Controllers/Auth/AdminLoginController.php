<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RecentActivity;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth.admin');
    // }

    public function showLoginForm()
    {
        return view('auth.admin-login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        // Debugging: Display the input credentials
        \Log::debug('Login attempt with credentials:', $credentials);
        
        // Find the admin record
        $admin = \App\Models\Admin::where('email', $credentials['email'])->first();

        if (!$admin) {
            \Log::debug('No admin found with this email');
            return back()->withErrors(['error' => 'No admin account found with this email']);
        }
 
        // Debugging: Display the admin record found
        \Log::debug('Admin record found:', $admin->toArray());
            // dd('successful');
        
        // Check if password matches
        if (!\Hash::check($credentials['password'], $admin->password)) {
            \Log::debug('Password mismatch');
            \Log::debug('Input password: '.$credentials['password']);
            \Log::debug('Stored hash: '.$admin->password);
            return back()->withErrors(['error' => 'Incorrect password']);
        }

        // Attempt login
        if (Auth::guard('admin')->attempt($credentials)) {
            \Log::debug('Login successful');
            // Log recent activity
            RecentActivity::create([
                'user_type'   => 'admin',
                'user_id'     => $admin->id,
                'action'      => 'login',
                'description' => 'Admin ' . $admin->name . ' logged in.',
            ]);
            // dd('successful');
            return redirect()->route('admin.dashboard.index');
        }

        \Log::debug('Login failed for unknown reason');
        return back()->withErrors(['error' => 'Invalid login credentials']);
    }
    

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function show($id)
    {
        // Your submission show logic here
        return view('admin.submissions.show', compact('id'));
    }

    public function assignments($id)
    {
        // Your assignment show logic here
        return view('admin.assignments.show', compact('id'));
    }

    public function deleteSubmit($id)
    {
        // Your delete submission logic here
        return redirect()->back()->with('success', 'Submission deleted successfully');
    }
}