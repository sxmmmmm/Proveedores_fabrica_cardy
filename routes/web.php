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

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    // ── Perfil (todos los usuarios autenticados) ──────────────────────────
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // ══════════════════════════════════════════════════════════════════════
    // RUTAS PARA BODEGUERO Y ADMINISTRADOR
    // ══════════════════════════════════════════════════════════════════════
    Route::middleware('role:Administrador,Bodeguero,Vendedor')->group(function () {

        // Empleados
        Route::resource('empleados', EmpleadoController::class);
        Route::post('/empleados/import', [ImportExportController::class, 'importEmpleados'])->name('empleados.import');
        Route::get('/empleados/export/excel', [ImportExportController::class, 'exportEmpleadosExcel'])->name('empleados.export.excel');
        Route::get('/empleados/export/csv',   [ImportExportController::class, 'exportEmpleadosCsv'])->name('empleados.export.csv');
        Route::get('/empleados/export/pdf',   [ImportExportController::class, 'exportEmpleadosPdf'])->name('empleados.export.pdf');

        // Materias Primas
        Route::post('/materias-primas/import', [ImportExportController::class, 'importMateriasPrimas'])->name('materias-primas.import');
        Route::get('/materias-primas/export/excel', [ImportExportController::class, 'exportMateriasPrimasExcel'])->name('materias-primas.export.excel');
        Route::get('/materias-primas/export/csv',   [ImportExportController::class, 'exportMateriasPrimasCsv'])->name('materias-primas.export.csv');
        Route::get('/materias-primas/export/pdf',   [ImportExportController::class, 'exportMateriasPrimasPdf'])->name('materias-primas.export.pdf');
        Route::resource('materias-primas', MateriaPrimaController::class)
            ->parameters(['materias-primas' => 'materiaPrima']);

        // Productos
        Route::post('/productos/import', [ImportExportController::class, 'importProductos'])->name('productos.import');
        Route::get('/productos/export/excel', [ImportExportController::class, 'exportProductosExcel'])->name('productos.export.excel');
        Route::get('/productos/export/csv',   [ImportExportController::class, 'exportProductosCsv'])->name('productos.export.csv');
        Route::get('/productos/export/pdf',   [ImportExportController::class, 'exportProductosPdf'])->name('productos.export.pdf');
        Route::resource('productos', ProductoController::class);
    });

    // ══════════════════════════════════════════════════════════════════════
    // RUTAS SOLO PARA ADMINISTRADOR
    // ══════════════════════════════════════════════════════════════════════
    Route::middleware('role:Administrador')->group(function () {

        // Clientes
        Route::post('/clientes/import', [ImportExportController::class, 'importClientes'])->name('clientes.import');
        Route::get('/clientes/export/excel', [ImportExportController::class, 'exportClientesExcel'])->name('clientes.export.excel');
        Route::get('/clientes/export/csv',   [ImportExportController::class, 'exportClientesCsv'])->name('clientes.export.csv');
        Route::get('/clientes/export/pdf',   [ImportExportController::class, 'exportClientesPdf'])->name('clientes.export.pdf');
        Route::resource('clientes', ClienteController::class);

        // Proveedores
        Route::post('/proveedores/import', [ImportExportController::class, 'importProveedores'])->name('proveedores.import');
        Route::get('/proveedores/export/excel', [ImportExportController::class, 'exportProveedoresExcel'])->name('proveedores.export.excel');
        Route::get('/proveedores/export/csv',   [ImportExportController::class, 'exportProveedoresCsv'])->name('proveedores.export.csv');
        Route::get('/proveedores/export/pdf',   [ImportExportController::class, 'exportProveedoresPdf'])->name('proveedores.export.pdf');
        Route::resource('proveedores', ProveedorController::class);

        // Entradas y Salidas
        Route::get('/entradas-materia-prima/export/excel', [ImportExportController::class, 'exportEntradasExcel'])->name('entradas.export.excel');
        Route::get('/entradas-materia-prima/export/csv',   [ImportExportController::class, 'exportEntradasCsv'])->name('entradas.export.csv');
        Route::get('/entradas-materia-prima/export/pdf',   [ImportExportController::class, 'exportEntradasPdf'])->name('entradas.export.pdf');
        Route::resource('entradas-materia-prima', \App\Http\Controllers\EntradaMateriaPrimaController::class)
            ->names('entradas-materia-prima');

        Route::get('/salidas-materia-prima/export/excel', [ImportExportController::class, 'exportSalidasMpExcel'])->name('salidas-mp.export.excel');
        Route::get('/salidas-materia-prima/export/csv',   [ImportExportController::class, 'exportSalidasMpCsv'])->name('salidas-mp.export.csv');
        Route::get('/salidas-materia-prima/export/pdf',   [ImportExportController::class, 'exportSalidasMpPdf'])->name('salidas-mp.export.pdf');
        Route::resource('salidas-materia-prima', \App\Http\Controllers\SalidaMateriaPrimaController::class)
            ->names('salidas-materia-prima');

        Route::get('/salidas-productos/export/excel', [ImportExportController::class, 'exportSalidasProductosExcel'])->name('salidas-productos.export.excel');
        Route::get('/salidas-productos/export/csv',   [ImportExportController::class, 'exportSalidasProductosCsv'])->name('salidas-productos.export.csv');
        Route::get('/salidas-productos/export/pdf',   [ImportExportController::class, 'exportSalidasProductosPdf'])->name('salidas-productos.export.pdf');
        Route::resource('salidas-productos', \App\Http\Controllers\SalidaProductoController::class)
            ->names('salidas-productos');

        // Exportaciones PDF completas
        Route::prefix('export')->name('export.')->group(function () {
            Route::get('/complete',       [ExportController::class, 'exportComplete'])->name('complete');
            Route::get('/empleados',      [ExportController::class, 'exportEmpleados'])->name('empleados');
            Route::get('/productos',      [ExportController::class, 'exportProductos'])->name('productos');
            Route::get('/materias-primas',[ExportController::class, 'exportMateriasPrimas'])->name('materias_primas');
            Route::get('/proveedores',    [ExportController::class, 'exportProveedores'])->name('proveedores');
            Route::get('/clientes',       [ExportController::class, 'exportClientes'])->name('clientes');
        });

        // Gestión de roles y usuarios
        Route::get('/roles/management', [RoleManagementController::class, 'index'])->name('roles.management');
        Route::post('/roles/{user}/update', [RoleManagementController::class, 'updateRole'])->name('roles.update');
        Route::post('/roles/{user}/reset-password', [RoleManagementController::class, 'resetPassword'])->name('roles.reset-password');
        Route::get('/users',        [RoleManagementController::class, 'index'])->name('users.index');
        Route::get('/users/create', [RoleManagementController::class, 'create'])->name('users.create');
        Route::post('/users',       [RoleManagementController::class, 'store'])->name('users.store');
    });

});

require __DIR__.'/auth.php';