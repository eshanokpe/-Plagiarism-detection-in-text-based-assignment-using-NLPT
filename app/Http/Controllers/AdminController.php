<?php

namespace App\Http\Controllers;

use App\Models\Submission;
use App\Models\Assignment;
use App\Models\Lecturer;
use App\Models\User;
use App\Models\RecentActivity;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    public function dashboard()
    {
        $admin = Auth::user();
        $userCount = User::count();
        $lecturerCount = Lecturer::count();
        $submissionCount = Submission::count();
        $submissionCount = Submission::count();
        $users = User::latest()->paginate(10);
       

        return view('admin.users', compact(
            'users', 'submissionCount',
            'userCount', 'lecturerCount', 
            'submissionCount'
        ));
    }

    public function users()
    {
        $admin = Auth::user();
        $userCount = User::count();
        $lecturerCount = Lecturer::count();
        $submissionCount = Submission::count();
        $submissionCount = Submission::count();
        $users = User::latest()->paginate(10);
       

        return view('admin.users', compact(
            'users', 'submissionCount',
            'userCount', 'lecturerCount', 
            'submissionCount'
        ));
    }

    public function lectures()
    {
        $admin = Auth::user();
        $userCount = User::count();
        $lecturerCount = Lecturer::count();
        $submissionCount = Submission::count();
        $submissionCount = Submission::count();
        $users = User::latest()->paginate(10);
        $lectures = Lecturer::latest()->paginate(10);
       

        return view('admin.lecturer.index', compact(
            'users', 'lectures',
            'submissionCount',
            'userCount', 'lecturerCount', 
            'submissionCount'
        ));
    }

    public function lecturesStore(Request $request)
    {
        // Validate input
        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:lecturers,email',
            'password' => 'required|string|min:8',
        ]);

        // Create Lecturer
        $lecturer = Lecturer::create([
            'name'     => $validated['name'],
            'email'    => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);
        RecentActivity::create([
            'user_type'   => 'lecturer',
            'user_id'     => $lecturer->id,
            'action'      => 'created',
            'description' => 'Lecturer ' . $lecturer->name . ' was created by admin ID ' . (Auth::user() ? Auth::user()->id : 'system'),
        ]);

        // Redirect back with success
        return redirect()
            ->route('admin.lectures.index')
            ->with('success', 'Lecturer created successfully!');
    }

    public function assignments(){

        return view('admin.submissions.index');
    }

   
    public function showSubmission($id)
    {
        $submission = Submission::with(['user', 'assignment'])
            ->findOrFail($id);

        return view('admin.submissions.show', compact('submission'));
    }

    public function deleteSubmit($id)
    {
        $assignment = Submission::findOrFail($id);
        $assignment->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Assignment deleted successfully.');
    }
}
