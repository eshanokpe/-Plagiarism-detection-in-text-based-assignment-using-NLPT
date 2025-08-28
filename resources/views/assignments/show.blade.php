@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>{{ $assignment->title }}</h2>
    <p class="text-muted">Uploaded by: {{ $assignment->user->name ?? 'Unknown' }}</p>

    <hr>

    <h4>📝 Submissions</h4>
    @if ($assignment->submissions->count())
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Uploaded Text</th>
                    <th>Plagiarism Score</th>
                    <th>Total Words</th>
                    <th>Plagiarized Words</th>
                    {{-- <th>Report</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($assignment->submissions as $index => $submission)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ Str::limit($assignment->extracted_text, 100) }}</td>
                        <td class="{{ $submission->plagiarism_score > 50 ? 'text-danger fw-bold' : 
                                     ($submission->plagiarism_score > 25 ? 'text-warning fw-bold' : 'text-success fw-bold') }}">
                            {{ $submission->plagiarism_score ?? 0}}%
                        </td> 
                        <th>{{ $submission->total_words ?? 0 }} </th>
                        <th>{{ $submission->plagiarized_words ?? 0 }} </th>

                        {{-- <td>
                            <a href="{{ $submission->plagiarism_report }}" target="_blank" class="btn btn-sm btn-outline-info">
                                View Report
                            </a>
                        </td> --}}
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="alert alert-warning">No submissions for this assignment yet.</div>
    @endif

    <div class="mt-3">
        <a href="{{ route('lecturer.dashboard') }}" class="btn btn-outline-primary">
            <i class="fas fa-arrow-left me-1"></i> Back to Assignments
        </a>
    </div>
</div>
@endsection
