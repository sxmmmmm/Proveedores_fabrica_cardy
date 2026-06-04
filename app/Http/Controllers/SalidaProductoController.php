<?php

namespace App\Http\Controllers;

use App\Models\SalidaProducto;
use App\Models\Producto;
use App\Models\Cliente;
use App\Models\User;
use Illuminate\Http\Request;

class SalidaProductoController extends Controller
{
    public function index(Request $request)
    {
        $query = SalidaProducto::with(['producto', 'cliente', 'user']);

        // Filtro: búsqueda por producto
        if ($search = $request->input('search')) {
            $query->whereHas('producto', fn($q) => $q->where('nombre', 'like', "%{$search}%"));
        }

        // Filtro: usuario específico
        if ($userId = $request->input('user_id')) {
            $query->where('user_id', $userId);
        }

        // Filtro: rango de fechas
        if ($fechaDesde = $request->input('fecha_desde')) {
            $query->whereDate('created_at', '>=', $fechaDesde);
        }
        if ($fechaHasta = $request->input('fecha_hasta')) {
            $query->whereDate('created_at', '<=', $fechaHasta);
        }

        $salidas   = $query->latest()->paginate(15)->withQueryString();
        $usuarios  = User::orderBy('name')->get();
        $filters   = $request->only(['search', 'user_id', 'fecha_desde', 'fecha_hasta']);
        $productos = Producto::orderBy('nombre')->get();
        $clientes  = Cliente::orderBy('nombre')->get();

        return view('salidas_productos.index', compact('salidas', 'usuarios', 'filters', 'productos', 'clientes'));
    }

    public function create()
    {
        $productos = Producto::orderBy('nombre')->get();
        $clientes  = Cliente::orderBy('nombre')->get();
        return view('salidas_productos.create', compact('productos', 'clientes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'producto_id' => 'required|exists:productos,id',
            'cliente_id'  => 'required|exists:clientes,id',
            'cantidad'    => 'required|integer|min:1',
            'fecha'       => 'required|date',
            'observacion' => 'nullable|string',
        ]);

        $producto = Producto::findOrFail($request->producto_id);

        if ($request->cantidad > $producto->stock) {
            return back()->withErrors([
                'cantidad' => "Stock insuficiente. Disponible: {$producto->stock}"
            ])->withInput();
        }

        $producto->decrement('stock', $request->cantidad);

        SalidaProducto::create([
            'producto_id'    => $request->producto_id,
            'cliente_id'     => $request->cliente_id,
            'cantidad'       => $request->cantidad,
            'fecha'          => $request->fecha,
            'observacion'    => $request->observacion,
            'usuario_nombre' => auth()->user()->name,
            'user_id'        => auth()->id(),
        ]);

        return redirect()->route('salidas-productos.index')
                         ->with('success', 'Salida de producto registrada correctamente.');
    }
}
