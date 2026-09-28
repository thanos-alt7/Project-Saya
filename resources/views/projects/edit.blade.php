@extends('layouts.app')

@section('title', 'Edit Project')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Edit Project</h1>

    <form action="{{ route('projects.update', $project->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title" value="{{ old('title', $project->title) }}" class="form-control" required>

            {{-- Menampilkan pesan error validasi input title --}}
            @error('title')
            <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-4">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control" rows="5" required>{{ old('description', $project->description) }}</textarea>

            {{-- Menampilkan pesan error validasi input description --}}
            @error('description')
            <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('projects.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection