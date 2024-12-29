<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReporteBrigadistaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\SeguimientoController;
use App\Http\Middleware\AuthAdmin;
use App\Http\Middleware\AuthBrigadista;

//Verbos HTTP: 
//GET: Recupera los recursos
//POST: Crea un recurso
//PUT: Actualiza por completo un recurso existente
//PATCH: Actualiza solo una partre del recurso existente, por ejemplo, de un usuario, solo se actualizaria el correo.
//DELETE: Elimina un recurso existente

//Ruta principal
Route::get('/', [HomeController::class, 'index'])->name('home.index');

//Ruta que mostrará la vista dashboard.
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', AuthAdmin::class])->name('dashboard');

//Rutas protegidas con un mecanismo de seguridad HTTP (Middleware). rutas visibles solo para el usuario con rol admin
Route::middleware([AuthAdmin::class])->group(function () {
    //Rutas para los reportes
    //Route::get('/reportes', [ReporteController::class, 'index'])->name('home.index');
    //Ruta que mostrará el formulario que se usará para crear nuevos registros
     //Verbo que usa la ruta  //Controlador       //Su metodo a activar //Nombre de la ruta
    Route::get('/reportes', [ReporteController::class, 'create'])->name('reportes.create');
    //Ruta que almacenará los registros que se crearon usando el formulario
    Route::post('/reportes', [ReporteController::class, 'store'])->name('reportes.store');
    //Ruta que mostrará el formulario para editar un recurso
    Route::get('/reportes/{id}/edit', [ReporteController::class, 'edit'])->name('reportes.edit');
    //Ruta que actualizará el registro editado en el formulario
    Route::put('/reportes/{id}', [ReporteController::class, 'update'])->name('reportes.update');
    //Ruta para eliminar un registro
    Route::delete('/reportes/{id}', [ReporteController::class, 'destroy'])->name('reportes.destroy');

    //Rutas para los seguimientos
    //Ruta que mostrará el formulario que se usará para crear nuevos registros
    Route::get('/seguimientos', [SeguimientoController::class, 'create'])->name('seguimientos.create');
    //Ruta que almacenará los registros que se crearon usando el formulario
    Route::post('/seguimientos', [SeguimientoController::class, 'store'])->name('seguimientos.store');
    //Ruta que mostrará el formulario para editar un recurso
    Route::get('/seguimientos/{id}/edit', [SeguimientoController::class, 'edit'])->name('seguimientos.edit');
    //Ruta que actualizará el registro editado en el formulario
    Route::put('/seguimientos/{id}', [SeguimientoController::class, 'update'])->name('seguimientos.update');
    //Ruta para eliminar un registro
    Route::delete('/seguimientos/{id}', [SeguimientoController::class, 'destroy'])->name('seguimientos.destroy');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Rutas protegidas con un mecanismo de seguridad HTTP (Middleware). rutas visibles solo para el usuario con rol brigadista
Route::middleware([AuthBrigadista::class])->group(function () {
    //Rutas para listar los reportes al brigadista
    Route::get('/listado-reportes', [ReporteBrigadistaController::class, 'index'])->name('brigadista.index');
    //Ruta para actualizar el estado del reporte.
    Route::patch('/listado-reportes/{id}', [ReporteBrigadistaController::class, 'update'])->name('brigadista.update');
});



require __DIR__.'/auth.php';
