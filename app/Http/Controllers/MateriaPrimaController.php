<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MateriaPrima;
use App\Models\Empleado;

class MateriaPrimaController extends Controller
{
    public function index()
    {
        $materias = MateriaPrima::with('empleado')->get();
        return view('materias_primas.index', compact('materias'));
    }

    public function create()
    {
        $empleados = \App\Models\Empleado::all();
        return view('materias_primas.create', compact('empleados'));
    }

public function store(Request $request)
{
    $request->validate([
        'nombre' => 'required',
        'tipo' => 'required',
        'color' => 'required',
        'stock' => 'required|numeric',
        'precio' => 'required|numeric',
        'empleado_id' => 'required|exists:empleados,id',
    ]);

    MateriaPrima::create([
        'nombre' => $request->nombre,
        'tipo' => $request->tipo,
        'color' => $request->color,
        'stock' => $request->stock,
        'precio' => $request->precio,
        'empleado_id' => $request->empleado_id,
    ]);

    return redirect()->route('materias-primas.index')
        ->with('success', 'Materia prima creada correctamente');
}

    public function edit(MateriaPrima $materiaPrima)
    {
        $empleados = \App\Models\Empleado::all();
        return view('materias-primas.edit', compact('materiaPrima', 'empleados'));
    }
public function update(Request $request, $id)
{
    $request->validate([
        'nombre' => 'required',
        'tipo' => 'required',
        'color' => 'required',
        'stock' => 'required|numeric',
        'precio' => 'required|numeric',
        'empleado_id' => 'required|exists:empleados,id',
    ]);

    $materia = MateriaPrima::findOrFail($id);

    $materia->update([
        'nombre' => $request->nombre,
        'tipo' => $request->tipo,
        'color' => $request->color,
        'stock' => $request->stock,
        'precio' => $request->precio,
        'empleado_id' => $request->empleado_id,
    ]);

    return redirect()->route('materias-primas.index')
        ->with('success', 'Materia prima actualizada correctamente');
}

    public function destroy($id)
    {
        MateriaPrima::destroy($id);
        return redirect()->route('materia_primas.index');
    }
}