@extends('admin.app')

@section('content') 
<div class="main-content container py-4">

    {{-- Topbar --}}
    <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-3">
        <h1 class="h3 mb-0">Admin Dashboard</h1>
        <div class="d-flex align-items-center">
            <div class="bg-primary text-white rounded-circle d-flex justify-content-center align-items-center" style="width: 40px; height: 40px; font-weight: bold;">
                {{ strtoupper(substr($adminUser->name ?? 'Admin', 0, 2)) }}
            </div>
            <div class="ms-2">
                <div class="fw-bold">{{ $adminUser->name ?? 'Admin User' }}</div>
                <div class="small text-muted">Administrator</div>
            </div>
        </div>
    </div>

    {{-- Navigation --}}
    @include('admin.navbar')
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif


    {{-- Lecturers Log --}}
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header bg-light d-flex justify-content-between align-items-center">
                    <h5 class="mb-0"><i class="bi bi-person-badge me-2"></i>Lecturers Log</h5>
                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#createLecturerModal">
                        <i class="bi bi-plus-circle me-1"></i> Add Lecturer
                    </button>
                </div> 

                <div class="card-body">
                    @if ($lectures->isEmpty())
                        <p class="text-muted">No lecturers found.</p>
                    @else
                        <div class="table-responsive">
                            <table class="table table-hover align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Registered</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($lectures as $index => $lecture)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $lecture->name }}</td>
                                            <td>{{ $lecture->email }}</td>
                                            <td>{{ $lecture->created_at->diffForHumans() }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Create Lecturer Modal -->
    <div class="modal fade" id="createLecturerModal" tabindex="-1" aria-labelledby="createLecturerModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form method="POST" action="{{ route('admin.lecturer.store') }}">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createLecturerModalLabel">Add New Lecturer</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="lecturerName" class="form-label">Name</label>
                            <input type="text" class="form-control" id="lecturerName" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="lecturerEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="lecturerEmail" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="lecturerPassword" class="form-label">Password</label>
                            <input type="password" class="form-control" id="lecturerPassword" name="password" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Create Lecturer</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection
