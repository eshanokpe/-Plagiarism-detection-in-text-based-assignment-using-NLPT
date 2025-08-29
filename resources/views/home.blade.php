@extends('layouts.app')

@section('content')
<div class="main-wrapper"> 
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-header">
            <h4>Student Dashboard</h4>
        </div> 
        <ul class="sidebar-menu">
            <li>
                <a href="{{ route('dashboard') }}" class="active">
                    <i class="fas fa-tachometer-alt"></i>
                    <span class="menu-text">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('assignments.index') }}" >
                    <i class="fas fa-file-alt"></i>
                    <span class="menu-text">Assignments</span>
                </a>
            </li>
           
            <li>
                <a href="{{ route('profile') }}">
                    <i class="fas fa-user-cog"></i>
                    <span class="menu-text">Profile</span>
                </a>
            </li> 
            <li>
                <a href="{{ route('student.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i>
                    <span class="menu-text">Logout</span>
                </a>
                <form id="logout-form" action="{{ route('student.logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
    

    <!-- Main Content -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="row mb-4">
                <div class="col">
                    <h2>My Assignments</h2>
                    <p class="text-muted">View all your plagiarism checks</p>
                </div>
                <div class="col-auto">
                    <a href="{{ route('assignments.index') }}" class="btn btn-primary">
                        <i class="fas fa-plus me-2"></i>New Check
                    </a>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="row mb-4">
                <div class="col-md-6">
                    <div class="dashboard-card stat-card">
                        <div class="stat-number">{{ $counts['total'] ?? 0 }}</div>
                        <div class="stat-label">Total Checks</div>
                    </div>
                </div>
                {{-- <div class="col-md-4">
                    <div class="dashboard-card stat-card">
                        <div class="stat-number">{{ $counts['completed'] ?? 0 }}</div>
                        <div class="stat-label">Completed Checks</div>
                    </div>
                </div> --}}
                <div class="col-md-6">
                    <div class="dashboard-card stat-card">
                        <div class="stat-number">{{ $counts['submitted'] ?? 0 }}</div>
                        <div class="stat-label">Submitted Checks</div>
                    </div>
                </div>
                
            </div>

            <!-- Recent Assignments -->
            <div class="row mb-4">
                <div class="col-md-8">
                    <div class="dashboard-card">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h4>Recent Checks</h4>
                           
                        </div>
                         
                        @if($recent_assignments->count() > 0)
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
                                        @foreach($recent_assignments as $submission)
                                            <tr>
                                                <td>{{ Str::limit($submission->title, 40) }}</td>
                                                <td>
                                                
                                                    <span class="fw-bold {{ $submission->plagiarism_score > 50 ? 'text-danger' : ($submission->plagiarism_score > 25 ? 'text-warning' : 'text-success') }}">
                                                        {{ $submission->plagiarism_score }}%
                                                    </span>
                                                    
                                                </td>
                                                <td>{{ $submission->created_at->format('M d, Y') }}</td>
                                                <td>
                                                    <a href="{{ route('assignments.show', $submission->id) }}" class="btn btn-sm btn-outline-secondary">
                                                        <i class="fas fa-eye me-1"></i> View
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach 
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="text-center py-4">
                                <i class="fas fa-search fa-3x text-muted mb-3"></i>
                                <h5>No recent checks found.</h5>
                                <p class="text-muted">Start by submitting a new assignment for a plagiarism check.</p>
                            </div>
                        @endif
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="dashboard-card">
                        <h4>All Assignments</h4>
                        <p class="text-muted">You have {{ $assignments_count }} total plagiarism checks</p>
                        
                        <div class="d-grid gap-2">
                            <a href="{{ route('assignments.view') }}" class="btn btn-outline-primary">
                                <i class="fas fa-list me-2"></i>View All Assignments
                            </a>
                        </div>
                    </div>
                    
                    <div class="dashboard-card mt-4">
                        <h4>Quick Actions</h4>
                        <div class="d-grid gap-2">
                            <a href="{{ route('assignments.index') }}" class="btn btn-primary">
                                <i class="fas fa-upload me-2"></i>New Plagiarism Check
                            </a>
                            <a href="{{ route('profile') }}" class="btn btn-outline-secondary">
                                <i class="fas fa-user-cog me-2"></i>Update Profile
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .stat-card {
        text-align: center;
        padding: 20px;
    }
    .stat-number {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 5px;
    }
    .stat-label {
        color: #6c757d;
        font-size: 14px;
    }
    .table th {
        border-top: none;
        font-weight: 600;
        color: #6c757d;
    }
</style>
@endsection