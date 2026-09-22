@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Daftar Project</h1>
    <a href="{{ route('projects.create') }}" class="btn btn-primary mb-3">Tambah Project</a>
    @if(count($projects) > 0)
        @foreach ($projects as $project)
            <div class="well">
                <h3><a href="{{ route('projects.show', $project->id) }}">{{$project->title}}</a></h3>
            </div>
        @endforeach
    @else
        <h3>Tidak ada data.</h3>
    @endif
</div>
@endsection