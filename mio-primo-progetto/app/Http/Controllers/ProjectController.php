<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $projects = Project::with(['milestones','tags','publications'])->latest()->get();
        return view('projects.index', ['projects' => $projects]);

        return response()->json($projects, 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
        'title' => 'required|min:3|max:255',
        'description' => 'nullable',
        'file' => 'nullable|mimes:pdf|max:2048', // max 2MB
    ]);

    if ($request->hasFile('file')) {
        $path = $request->file('file')->store('projects', 'public');
        $validated['file_path'] = $path;
    }

    Project::create($validated);

    return redirect('/projects')->with('success', 'Progetto creato con successo!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        $project->load(['milestones','publications.authors.user','tags','attachments','comments.user']);
        return view('projects.show', ['project' => $project]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
{
    if ($project->file_path) {
        Storage::disk('public')->delete($project->file_path);
    }

    $project->delete();

    return redirect('/projects')->with('success', 'Progetto eliminato con successo!');
}

    public function html()
    {
        $projects = \App\Models\Project::orderBy('title')->get(['title','status']);
        $out = '<h2>Progetti</h2><ul>';
        foreach($projects as $p){ $out .= '<li><strong>'.$p->title.'</strong> ('.($p->status ?? 'n/d').')</li>'; }
        $out .= '</ul>';
        return $out;
    }


}
