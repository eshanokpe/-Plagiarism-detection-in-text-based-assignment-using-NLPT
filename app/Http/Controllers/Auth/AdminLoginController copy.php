<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
 
    public function showLoginForm()
    {
        return view('auth.admin-login');
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