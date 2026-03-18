<?php

namespace App\Http\Controllers;

use App\Models\MateriaPrima;
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
            'precio' => 'required|numeric',
            'proveedor_id' => 'nullable|integer'
        ]);

        MateriaPrima::create($request->all());

        return redirect()->route('materias-primas.index')
                         ->with('success', 'Materia prima creada correctamente');
    }
}