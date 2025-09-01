@extends('layouts.app')

@section('title', 'My Profile')
@section('content')
<div class="main-wrapper">
    <div class="sidebar">
        <div class="sidebar-header">
            <h4>My Profile</h4>
        </div> 
        <ul class="sidebar-menu">
            <li>
                <a href="{{ route('dashboard') }}">
                    <i class="fas fa-tachometer-alt"></i>
                    <span class="menu-text">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('assignments.index') }}">
                    <i class="fas fa-file-alt"></i>
                    <span class="menu-text">Assignments</span>
                </a>
            </li>
            <li>
                <a href="{{ route('profile') }}" class="active">
                    <i class="fas fa-user-cog"></i>
                    <span class="menu-text">Profile</span>
                </a>
            </li>
            <li>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i>
                    <span class="menu-text">Logout</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
   
    <div class="main-content">
        <div class="container-fluid">

            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="row mb-4">
                <div class="col">
                    <div class="dashboard-card p-4">
                        <div class="card shadow-sm border-0 rounded-3">
                            <div class="card-header bg-primary text-white text-center">
                                <h4 class="mb-0"><i class="fas fa-user-circle me-2"></i>My Profile</h4>
                            </div>

                            <div class="card-body">
                                <div class="text-center mb-4">
                                    <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&size=120&background=random" 
                                         alt="Profile Picture" 
                                         class="rounded-circle shadow">
                                    <h5 class="mt-3">{{ $user->name }}</h5>
                                    <p class="text-muted mb-1">{{ $user->email }}</p>
                                    <p class="text-muted">{{ $user->created_at->format('M d, Y') }} (Joined)</p>
                                </div>

                                <hr>

                                <div class="mb-3">
                                    <strong>Name:</strong> {{ $user->name }}
                                </div>
                                <div class="mb-3">
                                    <strong>Email:</strong> {{ $user->email }}
                                </div>

                                @if(!empty($user->phone))
                                <div class="mb-3">
                                    <strong>Phone:</strong> {{ $user->phone }}
                                </div>
                                @endif

                                <!-- Change Password Section -->
                                <hr>
                                <div class="card shadow-sm border-0 rounded-3 mt-4">
                                    <div class="card-header bg-warning text-white text-center">
                                        <h4 class="mb-0"><i class="fas fa-lock me-2"></i>Change Password</h4>
                                    </div>
                                    <div class="card-body">
                                        <form action="{{ route('password.update') }}" method="POST">
                                            @csrf
    
                                            <div class="form-group">
                                                <label>Current Password</label>
                                                <input type="password" name="current_password" class="form-control" required>
                                            </div>

                                            <div class="form-group mt-3">
                                                <label>New Password</label>
                                                <input type="password" name="password" class="form-control" required>
                                            </div>

                                            <div class="form-group mt-3">
                                                <label>Confirm New Password</label>
                                                <input type="password" name="password_confirmation" class="form-control" required>
                                            </div>

                                            <button type="submit" class="mt-3 btn btn-primary">Update Password</button>
                                    </form>

                                    </div>
                                </div>

                                <!-- Profile Actions -->
                                <div class="d-grid gap-2 mt-4">
                                    <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary">
                                        <i class="fas fa-arrow-left me-2"></i> Back to Dashboard
                                    </a>
                                    <a href="{{ route('logout') }}" 
                                       class="btn btn-danger"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt me-2"></i> Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
