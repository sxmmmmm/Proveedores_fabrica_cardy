<?php
namespace App\Http\Controllers;

use App\Models\SalidaProducto;
use App\Models\Producto;
use App\Models\Cliente;
use Illuminate\Http\Request;

class SalidaProductoController extends Controller
{
    public function index()
    {
        $salidas = SalidaProducto::with(['producto', 'cliente'])->latest()->paginate(10);
        return view('salidas_productos.index', compact('salidas'));
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
            'producto_id'    => 'required|exists:productos,id',
            'cliente_id'     => 'required|exists:clientes,id',
            'cantidad'       => 'required|integer|min:1',
            'fecha'          => 'required|date',
            'usuario_nombre' => 'required|string|max:100',
            'observacion'    => 'nullable|string',
        ]);

        $producto = Producto::findOrFail($request->producto_id);

        // Validar stock suficiente
        if ($request->cantidad > $producto->stock) {
            return back()->withErrors([
                'cantidad' => "Stock insuficiente. Disponible: {$producto->stock}"
            ])->withInput();
        }

        $producto->decrement('stock', $request->cantidad);

        SalidaProducto::create($request->all());

        return redirect()->route('salidas-productos.index')
                         ->with('success', 'Salida de producto registrada correctamente.');
    }
}