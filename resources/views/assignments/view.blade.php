@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-4">📚 All Assignments</h2>
        <div class="mt-3">
            <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left me-1"></i> Back to Dashboard
            </a>
        </div>
    </div>

    @if ($assignments->count())
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Score</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($assignments as $assignment)
                        <tr>
                            <td>{{ Str::limit($assignment->title, 40) }}</td>
                            <td>
                                @if ($assignment->submissions->isNotEmpty())
                                    @php
                                        $submission = $assignment->submissions->last();
                                    @endphp

                                    @if($submission)
                                        <span class="fw-bold {{ $submission->plagiarism_score > 50 ? 'text-danger' : ($submission->plagiarism_score > 25 ? 'text-warning' : 'text-success') }}">
                                            {{ $submission->plagiarism_score }}%
                                        </span>
                                    @endif
                                @else
                                    <span class="text-muted">No submission</span>
                                @endif
                            </td>
                            <td>{{ $assignment->created_at->format('M d, Y') }}</td>
                            <td>
                                <a href="{{ route('assignments.show', $assignment->id) }}" class="btn btn-sm btn-outline-secondary">
                                    <i class="fas fa-eye me-1"></i> View
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-center mt-4">
            {{ $assignments->links('pagination::bootstrap-5') }}
        </div>

    @else
        <div class="alert alert-info">
            No assignments available yet.
        </div>
    @endif

    <div class="mt-3">
        <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left me-1"></i> Back to Dashboard
        </a>
    </div>
</div>
@endsection
