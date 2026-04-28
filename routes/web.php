<?php

use App\Http\Controllers\ExportController;
use App\Http\Controllers\ImportExportController;
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

    Route::get('/roles/management', [RoleManagementController::class, 'index'])->name('roles.management');
    Route::post('/roles/{user}/update', [RoleManagementController::class, 'updateRole'])->name('roles.update');

    // --- GESTIÓN DE USUARIOS (Registro desde panel admin) ---
    Route::get('/users', [RoleManagementController::class, 'index'])->name('users.index');
    Route::get('/users/create', [RoleManagementController::class, 'create'])->name('users.create');
    Route::post('/users', [RoleManagementController::class, 'store'])->name('users.store');


    // --- RUTAS DE EXPORTACIÃ“N (Reportes) ---
    Route::prefix('export')->name('export.')->group(function () {
        Route::get('/complete', [ExportController::class, 'exportComplete'])->name('complete');
        Route::get('/empleados', [ExportController::class, 'exportEmpleados'])->name('empleados');
        Route::get('/productos', [ExportController::class, 'exportProductos'])->name('productos');
        Route::get('/materias-primas', [ExportController::class, 'exportMateriasPrimas'])->name('materias_primas');
        Route::get('/proveedores', [ExportController::class, 'exportProveedores'])->name('proveedores');
        Route::get('/clientes', [ExportController::class, 'exportClientes'])->name('clientes');
    });


    
    // --- SALIDAS ---
    Route::resource('salidas-materia-prima', \App\Http\Controllers\SalidaMateriaPrimaController::class)->names('salidas-materia-prima');
    Route::resource('salidas-productos', \App\Http\Controllers\SalidaProductoController::class)->names('salidas-productos');

    
    // --- ENTRADAS Y SALIDAS ---
    Route::resource('entradas-materia-prima', \App\Http\Controllers\EntradaMateriaPrimaController::class)->names('entradas-materia-prima');
    Route::resource('salidas-materia-prima', \App\Http\Controllers\SalidaMateriaPrimaController::class)->names('salidas-materia-prima');
    Route::resource('salidas-productos', \App\Http\Controllers\SalidaProductoController::class)->names('salidas-productos');

    // --- PERFIL DE USUARIO ---
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // --- IMPORT / EXPORT ---
    Route::post('/productos/import', [ImportExportController::class, 'importProductos'])->name('productos.import');
    Route::get('/productos/export/excel', [ImportExportController::class, 'exportProductosExcel'])->name('productos.export.excel');
    Route::get('/productos/export/csv', [ImportExportController::class, 'exportProductosCsv'])->name('productos.export.csv');
    Route::get('/productos/export/pdf', [ImportExportController::class, 'exportProductosPdf'])->name('productos.export.pdf');

    Route::post('/materias-primas/import', [ImportExportController::class, 'importMateriasPrimas'])->name('materias-primas.import');
    Route::get('/materias-primas/export/excel', [ImportExportController::class, 'exportMateriasPrimasExcel'])->name('materias-primas.export.excel');
    Route::get('/materias-primas/export/csv', [ImportExportController::class, 'exportMateriasPrimasCsv'])->name('materias-primas.export.csv');
    Route::get('/materias-primas/export/pdf', [ImportExportController::class, 'exportMateriasPrimasPdf'])->name('materias-primas.export.pdf');

    Route::post('/clientes/import', [ImportExportController::class, 'importClientes'])->name('clientes.import');
    Route::get('/clientes/export/excel', [ImportExportController::class, 'exportClientesExcel'])->name('clientes.export.excel');
    Route::get('/clientes/export/csv', [ImportExportController::class, 'exportClientesCsv'])->name('clientes.export.csv');
    Route::get('/clientes/export/pdf', [ImportExportController::class, 'exportClientesPdf'])->name('clientes.export.pdf');

    Route::post('/proveedores/import', [ImportExportController::class, 'importProveedores'])->name('proveedores.import');
    Route::get('/proveedores/export/excel', [ImportExportController::class, 'exportProveedoresExcel'])->name('proveedores.export.excel');
    Route::get('/proveedores/export/csv', [ImportExportController::class, 'exportProveedoresCsv'])->name('proveedores.export.csv');
    Route::get('/proveedores/export/pdf', [ImportExportController::class, 'exportProveedoresPdf'])->name('proveedores.export.pdf');

    Route::post('/empleados/import', [ImportExportController::class, 'importEmpleados'])->name('empleados.import');
    Route::get('/empleados/export/excel', [ImportExportController::class, 'exportEmpleadosExcel'])->name('empleados.export.excel');
    Route::get('/empleados/export/csv', [ImportExportController::class, 'exportEmpleadosCsv'])->name('empleados.export.csv');
    Route::get('/empleados/export/pdf', [ImportExportController::class, 'exportEmpleadosPdf'])->name('empleados.export.pdf');

});


require __DIR__.'/auth.php';

