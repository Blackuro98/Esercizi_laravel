<?php

use App\Http\Controllers\Api\ProjectApiController;
use App\Http\Controllers\Api\PublicationApiController;
use Illuminate\Http\Request;

// Endpoint pubblico di diagnostica
Route::get('/health', function () {
  return response()->json(['status' => 'ok']);
});

Route::prefix('v1')->middleware('auth:sanctum')->group(function () {
  Route::apiResource('projects', ProjectApiController::class);
  Route::apiResource('publications', PublicationApiController::class);

  // Profilo utente autenticato
  Route::get('/user', function (Request $r) {
    return $r->user();
  });
});