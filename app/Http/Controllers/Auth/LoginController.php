<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\RecentActivity;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */ 

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    } 

    public function login(Request $request)
    {
        // dd('login');
        // ✅ Validate input
        $this->validate($request, [
            'matricNo' => 'required|string',
            'password' => 'required|string',
        ]);

        // ✅ Attempt login
        if (Auth::attempt(
            ['matricNo' => $request->matricNo, 'password' => $request->password],
            $request->filled('remember')
        )) {
            // Regenerate session to prevent fixation
            $request->session()->regenerate();

            return redirect()->intended($this->redirectPath());
        }

        // ❌ If login fails, throw error
        throw ValidationException::withMessages([
            'email' => [trans('auth.failed')],
        ]);
    }
    

    public function username()
    {
        return 'matricNo';
    }


    public function logout(Request $request)
    {
        $student = Auth::user();

        // Log recent activity
        if ($student) {
            RecentActivity::create([
                'user_type'   => 'user',
                'user_id'     => $student->id,
                'action'      => 'logout',
                'description' => 'Student ' . $student->name . ' logged out.',
            ]);
        }

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Logged out successfully.');
    }
}
