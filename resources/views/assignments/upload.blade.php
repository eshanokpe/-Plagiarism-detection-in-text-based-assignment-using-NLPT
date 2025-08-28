@extends('layouts.app')

@section('content')
<div class="card">
  {{-- Flash success or error messages --}}
  @if(session('ok'))
    <div class="card" style="border-left:6px solid #22c55e">{{ session('ok') }}</div>
  @endif
  @if(session('err'))
    <div class="card" style="border-left:6px solid #ef4444">{{ session('err') }}</div>
  @endif

  {{-- Validation error summary --}}
  @if($errors->any())
    <div class="card" style="border-left:6px solid #ef4444">
      <ul>
        @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <h3>Upload or Paste Assignment</h3>

  <form method="POST" action="{{ route('assignments.store') }}" enctype="multipart/form-data">
    @csrf
  

    {{-- User ID --}}
    <div style="margin:12px 0">
      <label>User ID</label><br>
      <input name="user_id" type="number" value="{{ old('user_id') }}" required
             style="padding:8px;border:1px solid #ddd;border-radius:8px;width:240px">
      @error('user_id')
        <div style="color:red;font-size:0.9em">{{ $message }}</div>
      @enderror
    </div>

    {{-- File Upload --}}
    <div style="margin:12px 0">
      <label>Upload File (PDF/DOC/DOCX/TXT)</label><br>
      <input name="file" type="file" accept=".pdf,.doc,.docx,.txt">
      <p class="muted">Optional — you can upload a file OR paste text below.</p>
      @error('file')
        <div style="color:red;font-size:0.9em">{{ $message }}</div>
      @enderror
    </div>

    {{-- Pasted Text --}}
    <div style="margin:12px 0">
      <label>Or Paste Text</label><br>
      <textarea name="pasted_text" rows="10"
        style="width:100%;padding:10px;border:1px solid #ddd;border-radius:8px;"
        placeholder="Paste assignment text here...">{{ old('pasted_text') }}</textarea>
      @error('pasted_text')
        <div style="color:red;font-size:0.9em">{{ $message }}</div>
      @enderror
    </div>

    <button class="btn">Submit</button>
    <a class="btn secondary" href="{{ route('assignments.index') }}">Back</a>
  </form>
</div>
@endsection
