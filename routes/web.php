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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Todas las rutas dentro de este grupo requieren estar logueado
Route::middleware('auth')->group(function () {
    
    // --- GESTIÓN DE USUARIOS (Solo Administrador) ---
    
    // Lista de usuarios (con doble nombre para evitar errores de Sidebar/Botones)
    Route::get('/usuarios/gestion', [RoleManagementController::class, 'index'])->name('roles.management');
    Route::get('/usuarios/lista', [RoleManagementController::class, 'index'])->name('users.index');

    // Formulario de creación de nuevo usuario
    Route::get('/usuarios/crear', [RoleManagementController::class, 'create'])->name('users.create');
    Route::post('/usuarios/guardar', [RoleManagementController::class, 'store'])->name('users.store');

    // Actualización de roles
    Route::post('/usuarios/gestion/{user}', [RoleManagementController::class, 'updateRole'])->name('roles.update');
    Route::post('/usuarios/gestion-update/{user}', [RoleManagementController::class, 'updateRole'])->name('users.update');


    // --- RECURSOS DEL SISTEMA ---
    Route::resource('clientes', ClienteController::class);
    Route::resource('proveedores', ProveedorController::class);
    Route::resource('empleados', EmpleadoController::class);
    Route::resource('productos', ProductoController::class);
    Route::resource('materias-primas', MateriaPrimaController::class)
        ->parameters(['materias-primas' => 'materiaPrima']);


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