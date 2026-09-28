@extends('layouts.app')

@section('title', 'Add Project')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Add Project</h1>
    
    <form action="{{ route('projects.store') }}" method="POST">
        @csrf
        
        <div class="form-group mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required>
            
            {{-- Pesan error untuk title --}}
            @error('title')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="form-group mb-4">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control" rows="5" required>{{ old('description') }}</textarea>
            
            {{-- Pesan error untuk description --}}
            @error('description')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{ route('projects.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection