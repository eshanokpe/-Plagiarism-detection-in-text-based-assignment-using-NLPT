@extends('layouts.app')

@section('content')
<div class="main-wrapper">
    <div class="sidebar">
        <div class="sidebar-header">
            <h4>Student Dashboard</h4>
        </div> 
        <ul class="sidebar-menu">
            <li>
                <a href="{{ route('dashboard') }}" >
                    <i class="fas fa-tachometer-alt"></i>
                    <span class="menu-text">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('assignments.index') }}" class="active">
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

            <!-- Header Counts Section -->
            <div class="row mb-4">
                <div class="col-md-3">
                    <div class="card text-center shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Total Assignments</h5>
                            <p class="display-6">{{ $counts['total'] ?? 0 }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-center shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Completed Checks</h5>
                            <p class="display-6 text-success">{{ $counts['completed'] ?? 0 }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-center shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Pending Checks</h5>
                            <p class="display-6 text-warning">{{ $counts['pending'] ?? 0 }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-center shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Failed Checks</h5>
                            <p class="display-6 text-danger">{{ $counts['failed'] ?? 0 }}</p>
                        </div>
                    </div>
                </div>
            </div>
            @if(session('error'))
                <div class="alert alert-error">
                    {{ session('error') }}
                </div>
            @endif
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @foreach (['success', 'error', 'warning', 'info'] as $msg)
                @if(session($msg))
                    <div class="alert alert-{{ $msg }}">
                        {{ session($msg) }}
                    </div>
                @endif
            @endforeach

            <!-- Upload / Paste Form -->
            <div class="row mb-4">
                <div class="col">
                    <div class="dashboard-card p-4">
                        <form action="{{ route('assignments.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="title" class="form-label">Assignment Title</label>
                                <input type="text" class="form-control" name="title" required>
                            </div>
                            <div class="mb-3">
                                <label for="file" class="form-label">Upload File (PDF, DOCX, TXT)</label>
                                <input type="file" class="form-control" name="file">
                            </div>
                            <div class="mb-3">
                                <label for="pasted_text" class="form-label">Or Paste Text</label>
                                <textarea class="form-control" name="pasted_text" rows="6"></textarea>
                            </div>
                            <p class="text-danger">Character must be more than 100</p>
                            <button type="submit" class="btn btn-primary">Check Plagiarism</button>
                        </form>
                    </div>
                </div>
            </div>

            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            @if(session('error'))
                <div class="alert alert-error">
                    {{ session('error') }}
                </div>
            @endif
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @foreach (['success', 'error', 'warning', 'info'] as $msg)
                @if(session($msg))
                    <div class="alert alert-{{ $msg }}">
                        {{ session($msg) }}
                    </div>
                @endif
            @endforeach

            @if($result)
                {{-- Results UI --}}
                @include('assignments.result', ['assignment' => $assignment, 'result' => $result])
            @endif

        </div>
    </div>
</div>
@endsection
