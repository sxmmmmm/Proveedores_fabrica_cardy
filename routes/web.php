<?php

use App\Http\Controllers\ProfileController;
 Login
use App\Http\Controllers\ProveedorController;

use App\Http\Controllers\ClienteController;
 main
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


// RUTAS DE CLIENTES
Route::resource('clientes', ClienteController::class);


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('proveedores', ProveedorController::class);
});

require __DIR__.'/auth.php';