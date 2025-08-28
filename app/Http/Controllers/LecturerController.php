<?php

namespace App\Http\Controllers;

use App\Models\Submission;
use App\Models\Assignment;
use App\Models\User;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LecturerController extends Controller
{
    /**
     * Show lecturer dashboard.
     */
    public function dashboard()
    {
        $lecturer = Auth::user(); 
        $submissions = Submission::with(['user', 'assignment']) // preload related models
        ->latest()
        ->paginate(10); 
        
        return view('lecturer.dashboard', compact('lecturer', 'submissions'));
    }

    /**
     * Show lecturer profile.
     */
    public function profile()
    {
        $lecturer = Auth::user();
        return view('lecturer.profile', compact('lecturer'));
    }

    /**
     * Update lecturer profile.
     */
    public function updateProfile(Request $request)
    {
        $lecturer = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => "required|email|unique:users,email,{$lecturer->id}",
            'password' => 'nullable|min:6|confirmed',
        ]);

        $lecturer->name = $request->name;
        $lecturer->email = $request->email;

        if ($request->password) {
            $lecturer->password = Hash::make($request->password);
        }

        $lecturer->save();

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }

    /**
     * Show form to create assignment.
     */
    public function createAssignment()
    {
        return view('lecturer.assignments.create');
    }

    /**
     * Store a new assignment.
     */
    public function storeAssignment(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'due_date' => 'required|date',
        ]);

        Assignment::create([
            'lecturer_id' => Auth::id(),
            'title' => $request->title,
            'description' => $request->description,
            'due_date' => $request->due_date,
        ]);

        return redirect()->route('lecturer.dashboard')->with('success', 'Assignment created successfully.');
    }

    public function assignments($id)
    {
        // Find assignment
        $assignment = Assignment::with('submissions.user')->findOrFail($id);

        // Pass to view
        return view('assignments.show', compact('assignment'));
    }

     public function show($id)
    {
        $submission = Submission::with(['user', 'assignment'])
            ->findOrFail($id);

        return view('lecturer.submissions.show', compact('submission'));
    }
   
    /**
     * Delete assignment.
     */
    public function deleteSubmit($id)
    {
        $assignment = Submission::findOrFail($id);
        $assignment->delete();

        return redirect()->route('lecturer.dashboard')->with('success', 'Assignment deleted successfully.');
    }
}
