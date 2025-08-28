<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Exception;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use App\Models\Assignment;
use Smalot\PdfParser\Parser as PdfParser;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    { 
        $user = auth()->user();
        $assignments = Assignment::where('user_id', $user->id)->latest()->paginate(10);
        $assignments_count = $assignments->total();
        $counts = $this->getAssignmentCounts($user->id);
       
        $recent_assignments = Assignment::where('user_id', $user->id)
                                        ->orderBy('created_at', 'desc')
                                        ->take(5)
                                        ->get();
         
        return view('home', compact(
            'user', 'assignments','assignments_count',
            'recent_assignments', 'counts'
        ));
    }

    private function getAssignmentCounts($userId)
    {
        $query = Assignment::where('user_id', $userId);

        // Based on the current implementation, all assignments stored in the database
        // are from successful API checks, so they are all considered 'completed'.
        return [
            'total'     => $query->count(),
            'completed' => $query->count(),
            'pending'   => 0,
            'failed'    => 0,
        ];
    }

    public function profile()
    {
        // Get the currently authenticated user
        $user = Auth::user();

        return view('users.profile', compact('user'));
    }
}
