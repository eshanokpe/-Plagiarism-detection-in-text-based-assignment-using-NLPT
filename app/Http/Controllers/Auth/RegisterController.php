<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/login'; // Redirect to login after registration

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    /**
     * Override the default register method to redirect to login after registration.
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        $user = $this->create($request->all());
        // Success message
        toastr()->success('Registration successful. Please login.');

         // Use session flash for toastr
        Session::flash('toastr', [
            [
                'type' => 'success',
                'message' => 'Registration successful. Please login.',
                'title' => 'Success!'
            ]
        ]);
        

        // Do NOT log the user in, just redirect
        return redirect()->route('login')->with('success', 'Registration successful. Please login.');
    }

    public function showRegistrationForm()
    {
        return view('auth.register'); // Make sure this points to your register Blade
    }

}
