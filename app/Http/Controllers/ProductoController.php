<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\MateriaPrima;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::with('materiaPrima')->get();
        return view('productos.index', compact('productos'));
    }

    public function create()
    {
        $materias = MateriaPrima::all();
        return view('productos.create', compact('materias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'nullable',
            'precio' => 'required|numeric',
            'stock' => 'required|integer',
            'materia_prima_id' => 'required|exists:materias_primas,id'
        ]);

        Producto::create($request->all());

        return redirect()->route('productos.index')
            ->with('success', 'Producto creado correctamente');
    }

    public function edit(Producto $producto)
    {
        $materias = MateriaPrima::all();
        return view('productos.edit', compact('producto', 'materias'));
    }

    public function update(Request $request, Producto $producto)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'nullable',
            'precio' => 'required|numeric',
            'stock' => 'required|integer',
            'materia_prima_id' => 'required|exists:materias_primas,id'
        ]);

        $producto->update($request->all());

        return redirect()->route('productos.index')
            ->with('success', 'Producto actualizado correctamente');
    }

    public function destroy(Producto $producto)
    {
        $producto->delete();

        return redirect()->route('productos.index')
            ->with('success', 'Producto eliminado correctamente');
    }
}