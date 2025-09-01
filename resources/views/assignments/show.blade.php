@extends('layouts.app')

@section('content')
<div class="main-wrapper"> 
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-header">
            <h4>Student Dashboard</h4>
        </div> 
        <ul class="sidebar-menu">
            <li>
                <a href="{{ route('dashboard') }}" class="active">
                    <i class="fas fa-tachometer-alt"></i>
                    <span class="menu-text">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('assignments.index') }}" >
                    <i class="fas fa-file-alt"></i>
                    <span class="menu-text">Assignments</span>
                </a>
            </li>
           
            <li>
                <a href="{{ route('profile') }}">
                    <i class="fas fa-user-cog"></i>
                    <span class="menu-text">Profile</span>
                </a>
            </li> 
            <li>
                <a href="{{ route('student.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i>
                    <span class="menu-text">Logout</span>
                </a>
                <form id="logout-form" action="{{ route('student.logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
    <div class="main-content container py-4">
        
        {{-- Topbar --}}
        <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-3">
            <h1 class="h3 mb-0">Submission Details</h1>
            
            
        </div>

       
        {{-- Submission Info Card --}}
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-light">
                <h5 class="mb-0">Assignment Submission Information</h5>
            </div>
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-md-6">
                        <strong>Student Email:</strong> {{ $submission->user->email ?? 'N/A' }}
                    </div> 
                    <div class="col-md-6">
                        <strong>Matric_No:</strong> {{ $submission->user->matricNo ?? 'N/A' }}
                    </div>
                    <div class="col-md-6">
                        <strong>Assignment Title:</strong> {{ $submission->title ?? 'N/A' }}
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-6">
                        <strong>Submitted At:</strong> {{ $submission->created_at->toDayDateTimeString() }}
                    </div>
                
                </div>
                <div class="row mb-2">
                <div class="col-md-4">
                        <strong>Plagiarism Score:</strong>
                        <span class="
                            {{ $submission->plagiarism_score > 50 ? 'text-danger' : 
                            ($submission->plagiarism_score > 25 ? 'text-warning' : 'text-success') }}
                            fw-bold">
                            {{ $submission->plagiarism_score }}%
                        </span>
                    </div>
                    <div class="col-md-4">
                        <strong>Total Words:</strong> {{ $submission->total_words }}
                    </div>
                    <div class="col-md-4">
                        <strong>Plagiarized Words:</strong> {{ $submission->plagiarized_words }}
                    </div>
                </div>

                @if ($submission->uploaded_file)
                    <div class="mb-3">
                        <strong>Uploaded File:</strong>
                        <a href="{{ asset('storage/' . $submission->uploaded_file) }}" target="_blank" class="btn btn-sm btn-outline-primary ms-2">
                            Download File
                        </a>
                    </div>
                @endif

                <div class="mb-3">
                    <strong>Pasted Text:</strong>
                    <div class="border rounded bg-light p-3 mt-2" style="white-space: pre-wrap;">
                        {{ $submission->pasted_text }}
                    </div>
                </div>
            </div>
        </div>

        {{-- Optional: Back Button --}}
        <a href="{{ url()->previous() }}" class="btn btn-secondary">
            ← Back
        </a>

    </div>
</div>
@endsection
