@extends('layouts.app')

@section('title', 'Lecturer Dashboard')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4 fw-bold">📚 Lecturer Dashboard</h2>

    <div class="card shadow-sm border-0 rounded-3">
        <div class="card-header bg-primary text-white fw-semibold">
            Submitted Assignments
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Student</th>
                            <th>Assignment Title</th>
                            <th>Submission Date</th>
                            <th>Plagiarism Score</th>
                            <th>Status</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($submissions as $submission)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $submission->user->name ?? 'Unknown' }}</td>
                                <td>{{ $submission->title ?? 'Untitled' }}</td>
                                <td>{{ $submission->created_at->format('d M, Y h:i A') }}</td>
                                <td>
                                    <span class="fw-bold 
                                        {{ $submission->plagiarism_score > 50 ? 'text-danger' : 
                                           ($submission->plagiarism_score > 25 ? 'text-warning' : 'text-success') }}">
                                        {{ $submission->plagiarism_score }}%
                                    </span>
                                </td>
                                <td>
                                    @if ($submission->plagiarism_score > 50)
                                        <span class="badge bg-danger">Highly Plagiarized</span>
                                    @elseif ($submission->plagiarism_score > 25)
                                        <span class="badge bg-warning text-dark">Moderate</span>
                                    @else
                                        <span class="badge bg-success">Clean</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('lecturer.submissions.delete', $submission->id) }}"
                                        class="btn btn-sm btn-outline-primary me-1"
                                        onclick="return confirm('Are you sure you want to delete this submission?');">
                                            <i class="fas fa-eye"></i> Delete
                                        </a>

                                    <a href="{{ route('lecturer.submissions.show', $submission->id) }}" 
                                       class="btn btn-sm btn-outline-secondary">
                                        <i class="fas fa-eye"></i> Submission
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center text-muted py-4">
                                    No assignments submitted yet.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card-footer bg-light">
            <div class="d-flex justify-content-center mt-4">
                {{ $submissions->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
</div>
@endsection
