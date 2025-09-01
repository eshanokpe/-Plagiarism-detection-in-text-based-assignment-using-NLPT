@extends('lecturer.app')

@section('content')
<div class="main-content container py-4">
    
    {{-- Topbar --}}
    <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-3">
        <h1 class="h3 mb-0">Submission Details</h1>
        
        {{-- Admin Profile --}}
        <div class="d-flex align-items-center">
            <div class="bg-primary text-white rounded-circle d-flex justify-content-center align-items-center" style="width: 40px; height: 40px; font-weight: bold;">
                {{ isset($adminUser->name) ? strtoupper(substr($adminUser->name, 0, 1)) : 'A' }}
            </div>
            <div class="ms-2">
                <div class="fw-bold">{{ $adminUser->name ?? 'Admin User' }}</div>
                <div class="small text-muted">Administrator</div>
            </div>
        </div>
    </div>

    {{-- Include navigation --}}
    @include('lecturer.navbar')

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
                    <strong>Student MatricNo:</strong> {{ $submission->user->matricNo ?? 'N/A' }}
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
@endsection
