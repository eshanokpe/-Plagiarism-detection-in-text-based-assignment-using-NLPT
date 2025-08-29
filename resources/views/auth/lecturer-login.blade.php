@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    Lecturer Login
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('lecturer.login.submit') }}">
                        @csrf
                        <div class="mb-3">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" required autofocus>
                        </div>
                        <div class="mb-3">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Login</button>
                    </form>
                    <div class="alert alert-info text-center" role="alert">
                        <small>
                            <a href="{{ route('login') }}" class="text-black text-center" id="switch-to-register">Home Page</a></p>

                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
