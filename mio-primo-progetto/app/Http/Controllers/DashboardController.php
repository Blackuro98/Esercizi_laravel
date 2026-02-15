<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
class DashboardController extends Controller
{
  public function index()
  {
    $user = auth()->user();

    // Eager loading per evitare N+1 (coerente con Mod. 6)
    $projects = $user->projects()->with(['tasks','publications'])->get();
    $tasks = $projects->pluck('tasks')->flatten();
    $publications = $projects->pluck('publications')->flatten();

    return view('dashboard', compact('user','projects','tasks','publications'));
  }
}