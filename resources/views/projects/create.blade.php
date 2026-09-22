@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Add Project</h1>
    
    <form action="{{ route('projects.store') }}" method="POST">
        @csrf
        
        <div class="form-group mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>
        
        <div class="form-group mb-4">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control" rows="5" required></textarea>
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection