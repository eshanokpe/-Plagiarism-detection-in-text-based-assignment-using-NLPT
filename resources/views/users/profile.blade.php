@extends('layouts.app')

@section('title', 'My Profile')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

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
@endsection
