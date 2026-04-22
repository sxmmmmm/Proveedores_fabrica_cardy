<?php

use App\Http\Controllers\ExportController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MateriaPrimaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\RoleManagementController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes - Proyecto Cardy
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::resource('clientes', ClienteController::class);
    Route::resource('proveedores', ProveedorController::class);
    Route::resource('empleados', EmpleadoController::class);
    Route::resource('productos', ProductoController::class);

    Route::resource('materias-primas', MateriaPrimaController::class)
        ->parameters(['materias-primas' => 'materiaPrima']);

    Route::get('/export/complete', [ExportController::class, 'exportComplete'])->name('export.complete');
    Route::get('/export/empleados', [ExportController::class, 'exportEmpleados'])->name('export.empleados');
    Route::get('/export/productos', [ExportController::class, 'exportProductos'])->name('export.productos');
    Route::get('/export/materias-primas', [ExportController::class, 'exportMateriasPrimas'])->name('export.materias_primas');
    Route::get('/export/proveedores', [ExportController::class, 'exportProveedores'])->name('export.proveedores');
    Route::get('/export/clientes', [ExportController::class, 'exportClientes'])->name('export.clientes');

    Route::get('/roles/management', [RoleManagementController::class, 'index'])->name('roles.management');
    Route::post('/roles/{user}/update', [RoleManagementController::class, 'updateRole'])->name('roles.update');


    // --- RUTAS DE EXPORTACIÓN (Reportes) ---
    Route::prefix('export')->name('export.')->group(function () {
        Route::get('/complete', [ExportController::class, 'exportComplete'])->name('complete');
        Route::get('/empleados', [ExportController::class, 'exportEmpleados'])->name('empleados');
        Route::get('/productos', [ExportController::class, 'exportProductos'])->name('productos');
        Route::get('/materias-primas', [ExportController::class, 'exportMateriasPrimas'])->name('materias_primas');
        Route::get('/proveedores', [ExportController::class, 'exportProveedores'])->name('proveedores');
        Route::get('/clientes', [ExportController::class, 'exportClientes'])->name('clientes');
    });


    // --- PERFIL DE USUARIO ---
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

require __DIR__.'/auth.php';