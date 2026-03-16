<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProveedorController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('proveedores', ProveedorController::class);