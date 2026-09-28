<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        return view('projects.index', ['projects' => Project::all()]);
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {
        // validasi min=5 dan min=10
        $validatedData = $request->validate([
            'title' => 'required|max:200|min:5',
            'description' => 'required|min:10'
        ]);

        Project::create($validatedData);

        // flash message dengan with()
        return redirect()->route('projects.index')
            ->with('success', 'Project berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        return view('projects.show', ['project' => Project::find($id)]);
    }

    public function edit(string $id)
    {
        // Mengambil data spesifik berdasarkan ID untuk ditampilkan di form edit
        $project = Project::findOrFail($id);
        return view('projects.edit', compact('project'));
    }

    public function update(Request $request, string $id)
    {
        // Validasi yang sama diterapkan saat melakukan update
        $validatedData = $request->validate([
            'title' => 'required|max:200|min:5',
            'description' => 'required|min:10'
        ]);

        $project = Project::findOrFail($id);
        $project->update($validatedData);

        return redirect()->route('projects.index')
            ->with('success', 'Project berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $project = Project::findOrFail($id);
        $project->delete();

        return redirect()->route('projects.index')
            ->with('success', 'Project berhasil dihapus.');
    }
}
