<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProjectResource;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectApiController extends Controller {
/* 
public function index(Request $r) {
   // $query = Project::with('users','tasks','publications');
   // if ($r->has('status')) $query->where('status',$r->status);
    //if ($r->has('funder')) $query->where('funder','like','%'.$r->funder.'%');
   // return ProjectResource::collection($query->get());
   $progetti = \App\Models\Project::with('users')->get();
    return ProjectResource::collection($progetti);
  }
*/
public function index(\Illuminate\Http\Request $request)
{
    $query = \App\Models\Project::with('users');
    if ($request->has('status')) {
        $query->where('status', $request->query('status'));
    }
    if ($request->has('funder')) {
        $query->where('funder', $request->query('funder'));
    }
    $progetti = $query->get();
    return \App\Http\Resources\ProjectResource::collection($progetti);
}



  public function show($id) {
    $project = Project::with('users','tasks','publications')->find($id);
    if (!$project) {
      return response()->json(['error' => 'Project not found'], 404);
    }
    return new ProjectResource($project);
  }

  public function store(Request $r) {
    $validated = $r->validate([
      'title' => 'required|min:3|max:255',
      'status' => 'required|in:active,completed,on_hold',
      'start_date' => 'nullable|date',
    ]);
    $project = Project::create($validated);
    return new ProjectResource($project);
  }

  public function update(Request $r, Project $project) {
    $validated = $r->validate([
      'title' => 'sometimes|min:3|max:255',
      'status' => 'sometimes|in:active,completed,on_hold',
    ]);
    $project->update($validated);
    return new ProjectResource($project);
  }

  public function destroy(Project $project) {
    $project->delete();
    return response()->json(['message' => 'Project deleted'], 204);
  }
}
