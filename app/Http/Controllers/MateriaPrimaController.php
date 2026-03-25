<?php

namespace App\Http\Controllers;

use App\Models\MateriaPrima;
use App\Models\Proveedor;
use Illuminate\Http\Request;

class MateriaPrimaController extends Controller
{
    public function index()
    {
        $materias = MateriaPrima::with('proveedor')->get();
        return view('materias_primas.index', compact('materias'));
    }

    public function create()
    {
        $proveedores = Proveedor::all();
        return view('materias_primas.create', compact('proveedores'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'tipo' => 'required|string|max:100',
            'color' => 'nullable|string|max:100',
            'stock' => 'required|integer',
            'precio' => 'required|numeric',
            'proveedor_id' => 'nullable|integer|exists:proveedores,id'
        ]);

        MateriaPrima::create($request->all());

        return redirect()->route('materias-primas.index')
                         ->with('success', 'Materia prima creada correctamente');
    }

    public function edit(MateriaPrima $materiaPrima)
    {
        $proveedores = Proveedor::all();
        return view('materias_primas.edit', compact('materiaPrima', 'proveedores'));
    }

    public function update(Request $request, MateriaPrima $materiaPrima)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'tipo' => 'required|string|max:100',
            'color' => 'nullable|string|max:100',
            'stock' => 'required|integer',
            'precio' => 'required|numeric',
            'proveedor_id' => 'nullable|integer|exists:proveedores,id'
        ]);

        $materiaPrima->update($request->all());

        return redirect()->route('materias-primas.index')
                         ->with('success', 'Materia prima actualizada correctamente');
    }

    public function destroy(MateriaPrima $materiaPrima)
    {
        $materiaPrima->delete();

        return redirect()->route('materias-primas.index')
                         ->with('success', 'Materia prima eliminada correctamente');
    }
}