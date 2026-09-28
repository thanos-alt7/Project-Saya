@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Daftar Project</h1>
    <a href="{{ route('projects.create') }}" class="btn btn-primary mb-3">Tambah Project</a>

    {{-- Menangkap dan menampilkan Flash Message --}}
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    @if(count($projects) > 0)
    @foreach ($projects as $project)
    <div class="well border p-3 mb-3">
        <h3><a href="{{ route('projects.show', $project->id) }}">{{$project->title}}</a></h3>

        {{-- Tombol Edit --}}
        <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-sm btn-warning">Edit</a>

        {{-- Form Delete dengan konfirmasi JavaScript --}}
        <form action="{{ route('projects.destroy', $project->id) }}" method="POST" style="display:inline" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-danger text-red-600 hover:text-red-800">Delete</button>
        </form>
    </div>
    @endforeach
    @else
    <h3>Tidak ada data.</h3>
    @endif
</div>
@endsection