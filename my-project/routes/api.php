<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiReporteController;
use App\Http\Controllers\ApiBrigadistaController;
use App\Http\Controllers\ApiSeguimientoController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Ruta de recurso que hace uso de los verbos get put post delete (CRUB)
Route::apiResources([
    'reportes' => ApiReporteController::class,
]);
Route::patch('/listado-reportes/{id}', [ApiBrigadistaController::class, 'update'])->name('brigadista.update');
Route::apiResources([
    'seguimientos' => ApiSeguimientoController::class,
]);
