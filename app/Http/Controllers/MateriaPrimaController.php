<?php

namespace App\Http\Controllers;

use App\Models\MateriaPrima;
use App\Models\Proveedor;
use Illuminate\Http\Request;

class MateriaPrimaController extends Controller
{
    public function index()
    {
        $materias = MateriaPrima::all();
        return view('materias_primas.index', compact('materias'));
    }

    public function create()
    {
        return view('materias_primas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'tipo' => 'required|string|max:100',
            'color' => 'nullable|string|max:100',
            'stock' => 'required|integer',
            'precio' => 'required|numeric'
        ]);

        MateriaPrima::create($request->only(['nombre', 'tipo', 'color', 'stock', 'precio']));

        return redirect()->route('materias-primas.index')
                         ->with('success', 'Materia prima creada correctamente');
    }

    public function edit(MateriaPrima $materiaPrima)
    {
        return view('materias_primas.edit', compact('materiaPrima'));
    }

    public function update(Request $request, MateriaPrima $materiaPrima)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'tipo' => 'required|string|max:100',
            'color' => 'nullable|string|max:100',
            'stock' => 'required|integer',
            'precio' => 'required|numeric'
        ]);

        $materiaPrima->update($request->only(['nombre', 'tipo', 'color', 'stock', 'precio']));

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