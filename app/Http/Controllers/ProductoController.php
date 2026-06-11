<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\MateriaPrima;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index(Request $request)
    {
        $query = Producto::with('materiaPrima');

        if ($search = $request->input('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('nombre', 'like', "%{$search}%")
                  ->orWhere('descripcion', 'like', "%{$search}%");
            });
        }

        if ($request->filled('stock_min')) {
            $query->where('stock', '>=', $request->input('stock_min'));
        }

        if ($request->filled('precio_max')) {
            $query->where('precio', '<=', $request->input('precio_max'));
        }

        if ($materia = $request->input('materia_prima_id')) {
            $query->where('materia_prima_id', $materia);
        }

        $productos = $query->orderBy('nombre')->paginate(15)->withQueryString();
        $materias  = MateriaPrima::orderBy('nombre')->get();
        $filters   = $request->only(['search', 'stock_min', 'precio_max', 'materia_prima_id']);

        // Items con stock bajo (< 50) para el botón de notificaciones
        $stockBajo = Producto::where('stock', '<', 50)->orderBy('stock')->get();

        return view('productos.index', compact('productos', 'materias', 'filters', 'stockBajo'));
    }

    public function create()
    {
        return redirect()->route('productos.index', ['open_modal' => 1]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre'           => 'required|string|max:255',
            'descripcion'      => 'nullable|string',
            'precio'           => 'required|numeric|min:0',
            'stock'            => 'required|integer|min:0',
            'materia_prima_id' => 'required|exists:materia_primas,id',
        ]);

        Producto::create($data);

        return redirect()->route('productos.index')->with('success', 'Producto creado correctamente');
    }

    public function edit(Producto $producto)
    {
        $materias = MateriaPrima::all();
        return view('productos.edit', compact('producto', 'materias'));
    }

    public function update(Request $request, Producto $producto)
    {
        $data = $request->validate([
            'nombre'           => 'required|string|max:255',
            'descripcion'      => 'nullable|string',
            'precio'           => 'required|numeric|min:0',
            'stock'            => 'required|integer|min:0',
            'materia_prima_id' => 'required|exists:materia_primas,id',
        ]);

        $producto->update($data);

        return redirect()->route('productos.index')->with('success', 'Producto actualizado correctamente');
    }

    public function destroy(Producto $producto)
    {
        $producto->delete();
        return redirect()->route('productos.index')->with('success', 'Producto eliminado correctamente');
    }
}
