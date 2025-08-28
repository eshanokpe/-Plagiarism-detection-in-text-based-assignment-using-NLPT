@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow-lg border-0">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">📘 Assignment Details</h4>
            <a href="{{ route('assignments.index') }}" class="btn btn-light btn-sm">
                <i class="fas fa-arrow-left"></i> Back
            </a>
        </div>
        <div class="card-body">
            <h5 class="card-title text-primary">{{ $assignment->title }}</h5>
            
            <p class="card-text">
                <strong>Description:</strong><br>
                {!! nl2br(e($assignment->description)) !!}
            </p>

            <p class="card-text">
                <strong>Deadline:</strong> 
                <span class="badge bg-danger">
                    {{ \Carbon\Carbon::parse($assignment->deadline)->format('d M, Y h:i A') }}
                </span>
            </p>

            @if($assignment->file)
                <p class="card-text">
                    <strong>Attachment:</strong> 
                    <a href="{{ asset('storage/' . $assignment->file) }}" 
                       target="_blank" class="btn btn-sm btn-outline-success">
                        <i class="fas fa-download"></i> Download File
                    </a>
                </p>
            @endif
        </div>
    </div>
</div>
@endsection
