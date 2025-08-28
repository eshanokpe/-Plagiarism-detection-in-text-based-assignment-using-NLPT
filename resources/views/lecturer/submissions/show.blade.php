@extends('layouts.app')

@section('title', 'Submission Details')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">
                <i class="fas fa-file-alt me-2"></i> Submission Details
            </h5>
        </div>
        <div class="card-body">
            
            {{-- Assignment Info --}}
            <h6 class="text-muted mb-2">Assignment</h6>
            <p><strong>{{ $submission->title ?? 'Untitled' }}</strong></p>
            <p class="text-muted">{{ $submission->description }}</p>
            <hr>

            {{-- Student Info --}}
            <h6 class="text-muted mb-2">Submitted By</h6>
            <p>
                <i class="fas fa-user me-2"></i> 
                {{ $submission->user->name }} ({{ $submission->user->email }})
            </p>
            <hr>

            {{-- Submission Info --}}
            <h6 class="text-muted mb-2">Submission Details</h6>
            <p>
                <i class="fas fa-clock me-2"></i> Submitted on 
                {{ $submission->created_at->format('d M Y, h:i A') }}
            </p>
            @if($submission->file_path)
                <p>
                    <i class="fas fa-paperclip me-2"></i>
                    <a href="{{ asset('storage/' . $submission->file_path) }}" 
                       target="_blank" 
                       class="btn btn-sm btn-outline-success">
                        <i class="fas fa-download me-1"></i> Download File
                    </a>
                </p>
            @endif

            {{-- Feedback / Grade (Optional if implemented later) --}}
            @if($submission->grade || $submission->feedback)
                <hr>
                <h6 class="text-muted mb-2">Lecturer Feedback</h6>
                <p><strong>Grade:</strong> {{ $submission->grade ?? 'Not Graded Yet' }}</p>
                <p><strong>Feedback:</strong> {{ $submission->feedback ?? 'No feedback yet' }}</p>
            @endif

        </div>
        <div class="card-footer text-end">
            <a href="{{ route('lecturer.dashboard') }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left me-2"></i> Back to Submissions
            </a>
        </div>
    </div>
</div>
@endsection
