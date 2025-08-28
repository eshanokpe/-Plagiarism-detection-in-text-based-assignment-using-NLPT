<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Storage;


class StudentController extends Controller
{
    public function index(){
        $user = auth()->user();
        return view('students.dashboard', compact('user'));
    }
        
    
}
