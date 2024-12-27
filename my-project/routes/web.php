<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReporteController;
use App\Http\Middleware\AuthAdmin;

Route::get('/', [HomeController::class, 'index'])->name('home.index');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', AuthAdmin::class])->name('dashboard');

Route::middleware([AuthAdmin::class])->group(function () {
     //Verbo que usa la ruta  //Controlador       //Su metodo a activar //Nombre de la ruta
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    //Ruta para listar todos los reportes
    //Route::get('/reportes', [ReporteController::class, 'index'])->name('home.index');
    //
    Route::get('/reportes', [ReporteController::class, 'create'])->name('reportes.create');
    //Ruta para registrar reportes
    Route::post('/reportes', [ReporteController::class, 'store'])->name('reportes.store');
    //Ruta para mostrar un formulario para editar registros
    Route::get('/reportes/{id}/edit', [ReporteController::class, 'edit'])->name('reportes.edit');
    //Ruta para actualizar un registro
    Route::put('/reportes/{id}', [ReporteController::class, 'update'])->name('reportes.update');
    //Ruta para eliminar un recurso
    Route::delete('/reportes/{id}', [ReporteController::class, 'destroy'])->name('reportes.destroy');


});

require __DIR__.'/auth.php';
