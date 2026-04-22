<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\MateriaPrima;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        // Cargar relación correctamente
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
        // Validación
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'materia_prima_id' => 'required|exists:materia_primas,id'
        ]);

        // Crear producto
        Producto::create($data);

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
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'materia_prima_id' => 'required|exists:materia_primas,id'
        ]);

        $producto->update($data);

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