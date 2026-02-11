<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{ProjectController,PublicationController,TaskController};

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth'])->group(function () {
  Route::resource('projects', ProjectController::class);
  Route::resource('publications', PublicationController::class);
  Route::resource('tasks', TaskController::class);

  // (Opzionale) proteggi anche la diagnostica JSON del Modulo 6:
  // Route::get('/projects/json', [ProjectController::class, 'index']);
});

Route::delete('/projects/{project}', [ProjectController::class, 'destroy'])
    ->middleware(['auth', 'role:admin,pi']);