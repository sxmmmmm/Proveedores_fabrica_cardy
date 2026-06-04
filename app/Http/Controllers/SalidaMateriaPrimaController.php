<?php

namespace App\Http\Controllers;

use App\Models\SalidaMateriaPrima;
use App\Models\MateriaPrima;
use App\Models\User;
use Illuminate\Http\Request;

class SalidaMateriaPrimaController extends Controller
{
    public function index(Request $request)
    {
        $query = SalidaMateriaPrima::with(['materiaPrima', 'user']);

        if ($search = $request->input('search')) {
            $query->whereHas('materiaPrima', fn($q) => $q->where('nombre', 'like', "%{$search}%"));
        }
        if ($userId = $request->input('user_id')) {
            $query->where('user_id', $userId);
        }
        if ($fechaDesde = $request->input('fecha_desde')) {
            $query->whereDate('created_at', '>=', $fechaDesde);
        }
        if ($fechaHasta = $request->input('fecha_hasta')) {
            $query->whereDate('created_at', '<=', $fechaHasta);
        }

        $salidas        = $query->latest()->paginate(15)->withQueryString();
        $usuarios       = User::orderBy('name')->get();
        $filters        = $request->only(['search', 'user_id', 'fecha_desde', 'fecha_hasta']);
        $materiasPrimas = MateriaPrima::orderBy('nombre')->get();

        return view('salidas_materia_prima.index', compact('salidas', 'usuarios', 'filters', 'materiasPrimas'));
    }

    public function create()
    {
        $materiasPrimas = MateriaPrima::orderBy('nombre')->get();
        return view('salidas_materia_prima.create', compact('materiasPrimas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'materia_prima_id' => 'required|exists:materia_primas,id',
            'cantidad'         => 'required|integer|min:1',
            'fecha'            => 'required|date',
            'observacion'      => 'nullable|string',
        ]);

        $materia = MateriaPrima::findOrFail($request->materia_prima_id);

        if ($request->cantidad > $materia->stock) {
            return back()->withErrors([
                'cantidad' => "Stock insuficiente. Disponible: {$materia->stock}"
            ])->withInput();
        }

        $materia->decrement('stock', $request->cantidad);

        SalidaMateriaPrima::create([
            'materia_prima_id' => $request->materia_prima_id,
            'cantidad'         => $request->cantidad,
            'fecha'            => $request->fecha,
            'observacion'      => $request->observacion,
            'usuario_nombre'   => auth()->user()->name,
            'user_id'          => auth()->id(),
        ]);

        return redirect()->route('salidas-materia-prima.index')
                         ->with('success', 'Salida registrada correctamente.');
    }
}
