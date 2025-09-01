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
                        if (isset($adminUser) && !empty($adminUser->name)) {
                            $names = explode(' ', $adminUser->name);
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
                       Admin User
                    </div>
                    <div class="small text-muted">Administrator</div>
                </div>
            </div>
        </div> 
        
        @include('admin.navbar')
        
        <div class="row">
            <div class="col-12">
                <div class="card">
                    
                    <div class="card-header bg-light d-flex justify-content-between align-items-center">
                        <h5 class="mb-0"><i class="bi bi-person-badge me-2"></i>Students Log</h5>
                        <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#createLecturerModal">
                            <i class="bi bi-plus-circle me-1"></i> Add Student
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr> 
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Matric No</th>
                                        <th>Email</th>
                                        <th>Registered</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($users as $index => $user)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->matricNo }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->created_at->diffForHumans() }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4">No users found.</td>
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

<!-- Create Lecturer Modal -->
    <div class="modal fade" id="createLecturerModal" tabindex="-1" aria-labelledby="createLecturerModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form method="POST" action="{{ route('admin.user.store') }}">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createLecturerModalLabel">Add New Student</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="lecturerName" class="form-label">Name</label>
                            <input type="text" class="form-control" id="lecturerName" name="name" required autocomplete="">
                        </div>
                        <div class="mb-3">
                            <label for="lecturerEmail" class="form-label">Matric No.</label>
                            <input type="text" class="form-control" id="matricNo" name="matricNo" required >
                        </div>
                        <div class="mb-3">
                            <label for="lecturerEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="lecturerEmail" name="email" required >
                        </div>
                        <div class="mb-3">
                            <label for="lecturerPassword" class="form-label">Password</label>
                            <input type="password" class="form-control" id="lecturerPassword" name="password" required >
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Create Student</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection