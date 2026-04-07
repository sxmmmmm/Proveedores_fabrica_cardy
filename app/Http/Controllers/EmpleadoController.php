<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    public function index()
    {
        $empleados = Empleado::all();
        return view('empleados.index', compact('empleados'));
    }

    public function create()
    {
        return view('empleados.create');
    }

    public function store(Request $request)
    {
$request->validate([
    'nombre' => 'required|string|max:255',
    'documento' => 'required|string|max:50|unique:empleados,documento',
    'telefono' => 'nullable|string|max:50',
    'correo' => 'nullable|email|unique:empleados,correo',
    'cargo' => 'nullable|string|max:100',
    'ciudad' => 'nullable|string|max:100',
    'direccion' => 'nullable|string|max:255',
]);

        Empleado::create($request->all());

        return redirect()->route('empleados.index')
            ->with('success', 'Empleado creado correctamente');
    }

    public function edit(Empleado $empleado)
    {
        return view('empleados.edit', compact('empleado'));
    }

    public function update(Request $request, Empleado $empleado)
    {
$request->validate([
    'nombre' => 'required|string|max:255',
    'documento' => 'required|string|max:50|unique:empleados,documento,'.$empleado->id,
    'telefono' => 'nullable|string|max:50',
    'correo' => 'nullable|email|unique:empleados,correo,'.$empleado->id,
    'cargo' => 'nullable|string|max:100',
    'ciudad' => 'nullable|string|max:100',
    'direccion' => 'nullable|string|max:255',
]);

        $empleado->update($request->all());

        return redirect()->route('empleados.index')
            ->with('success', 'Empleado actualizado correctamente');
    }

    public function destroy(Empleado $empleado)
    {
        $empleado->delete();

        return redirect()->route('empleados.index')
            ->with('success', 'Empleado eliminado correctamente');
    }
}