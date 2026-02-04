<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProjectController;

//Route::get('/', function () {return view('welcome');});
//prova11111111111111111111111111111111111111111111111111111111111111


Route::get('/projects/html', [ProjectController::class, 'html']);

Route::get('/', [PageController::class, 'home']);

Route::get('/about', function () {
        return 'Pagina informativa del Gestionale.';
    })->name('about.page');

Route::get('/contact', [PageController::class, 'contact']);

Route::get('/projects/{name}', [PageController::class, 'showProject']);


Route::prefix('admin')->group(function () {
    Route::get('/projects', function () {
        return '<h2>Gestione Progetti (Area Admin)</h2><p>Elenco e gestione dei progetti di ricerca.</p>';
    });

    Route::get('/users', function () {
        return '<h2>Gestione Utenti (Area Admin)</h2><p>Gestione dei membri del gruppo di ricerca.</p>';
    });
});

// rotta di diagnostica JSON (v2.7)
Route::get('/projects/json', [ProjectController::class, 'index']);

