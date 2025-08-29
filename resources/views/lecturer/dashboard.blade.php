@extends('lecturer.app')

@section('title', 'Lecturer Dashboard')

@section('content')
 <div class="main-content">
        <div class="topbar">
            <h1>📚 Lecturer Dashboard</h1>
            <div class="admin-profile">
                <div class="admin-avatar">
                    <!-- Display admin initials -->
                    <?php 
                        $adminInitials = 'AU';
                        if (isset($adminlecture) && !empty($adminlecture->name)) {
                            $names = explode(' ', $adminlecture->name);
                            $initials = '';
                            foreach ($names as $name) {
                                $initials .= strtoupper(substr($name, 0, 1));
                            }
                            $adminInitials = substr($initials, 0, 2);
                        }
                        echo $adminInitials;
                    ?>
                </div>
                <div>
                    <div class="fw-bold">
                        <?php echo isset($adminlecture) ? $adminlecture->name : 'Admin lecture'; ?>
                    </div>
                    <div class="small text-muted">Lectures</div>
                </div>
            </div>
        </div>
        @include('lecturer.navbar')
       
        
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <i class="bi bi-list-check me-2"></i> Assignments Log
                    </div>
                    <div class="card-body">
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
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
