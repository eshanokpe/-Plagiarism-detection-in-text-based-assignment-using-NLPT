@extends('layouts.app')

@section('content')
<div class="card">
  <h2>👋 Welcome, {{ $user->name }}</h2>
  <p class="muted">This is your student dashboard. You can manage your assignments here.</p>

  <div style="margin-top:20px">
    <a href="{{ route('assignments.index') }}" class="btn">📚 Go to Assignments</a>
  </div>
</div>
@endsection
