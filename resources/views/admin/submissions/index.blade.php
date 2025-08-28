 @extends('admin.app')

@section('content') 
 <div class="main-content">
        <div class="topbar">
            <h1>Dashboard</h1>
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
                    <div class="small text-muted">Administrator</div>
                </div>
            </div>
        </div>
        @include('admin.navbar')
       
        
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <i class="bi bi-list-check me-2"></i> Assignments Log
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>User Email</th>
                                        <th>Assignment Title</th>
                                        <th>Submitted At</th>
                                        <th>Plagiarism Score</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($submissions as $index => $submission)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $submission->user->email ?? 'N/A' }}</td>
                                            <td>{{ $submission->title ?? 'N/A' }}</td>
                                            <td>{{ $submission->created_at->diffForHumans() }}</td>
                                            <td>
                                                <span class="fw-bold 
                                                    {{ $submission->plagiarism_score > 50 ? 'text-danger' : 
                                                    ($submission->plagiarism_score > 25 ? 'text-warning' : 'text-success') }}">
                                                    {{ $submission->plagiarism_score }}%
                                                </span> 
                                            </td>
                                            <td>
                                               <a href="{{ route('admin.submissions.show', $submission->id) }}" title="View">
                                                    <i class="fas fa-eye text-primary"></i>
                                                </a>
                                                <a href="{{ route('admin.submissions.delete', $submission->id) }}"
                                                title="Delete"
                                                onclick="return confirm('Are you sure you want to delete this submission?');">
                                                    <i class="fas fa-trash text-danger ms-2"></i>
                                                </a>

                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6">No submissions found.</td>
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