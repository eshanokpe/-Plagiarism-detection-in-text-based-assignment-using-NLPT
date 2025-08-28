<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LecturerLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.lecturer-login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email'    => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('lecturer')->attempt($request->only('email', 'password'), $request->filled('remember'))) {
            return redirect()->intended(route('lecturer.dashboard'));
        }

        return back()->withErrors(['email' => 'Invalid credentials'])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::guard('lecturer')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('lecturer.login');
    }
}
