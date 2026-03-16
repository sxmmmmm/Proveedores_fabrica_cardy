<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
   // Lista todos los proveedores
    public function index()
    {
        $proveedores = Proveedor::all();
        return view('proveedores.index', compact('proveedores'));
    }

    // Muestra el formulario para crear uno nuevo
    public function create()
    {
        return view('proveedores.create');
    }

    // Guarda el nuevo proveedor en la BD
    public function store(Request $request)
    {
        $request->validate([
            'nombre'           => 'required|string|max:255',
            'empresa'          => 'required|string|max:255',
            'documento'        => 'required|string|max:20',
            'telefono'         => 'required|string|max:20',
            'fecha_nacimiento' => 'nullable|date',
            'correo'           => 'required|email|unique:proveedores',
            'ciudad'           => 'required|string|max:100',
            'direccion'        => 'required|string|max:255',
            'mercancia'        => 'required|string|max:255',
        ]);

        Proveedor::create($request->all());

        return redirect()->route('proveedores.index')
                         ->with('success', 'Proveedor agregado correctamente');

    }
}
