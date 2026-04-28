<?php

namespace App\Http\Controllers;

use App\Models\EntradaMateriaPrima;
use App\Models\MateriaPrima;
use App\Models\User;
use Illuminate\Http\Request;

class EntradaMateriaPrimaController extends Controller
{
    public function index(Request $request)
    {
        $query = EntradaMateriaPrima::with(['materiaPrima', 'user']);

        // Filtro: búsqueda por materia prima
        if ($search = $request->input('search')) {
            $query->whereHas('materiaPrima', fn($q) => $q->where('nombre', 'like', "%{$search}%"));
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

        $entradas = $query->latest()->paginate(15)->withQueryString();
        $usuarios = User::orderBy('name')->get();
        $filters  = $request->only(['search', 'user_id', 'fecha_desde', 'fecha_hasta']);

        return view('entradas_materia_prima.index', compact('entradas', 'usuarios', 'filters'));
    }

    public function create()
    {
        $materiasPrimas = MateriaPrima::orderBy('nombre')->get();
        return view('entradas_materia_prima.create', compact('materiasPrimas'));
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
        $materia->increment('stock', $request->cantidad);

        EntradaMateriaPrima::create([
            'materia_prima_id' => $request->materia_prima_id,
            'cantidad'         => $request->cantidad,
            'fecha'            => $request->fecha,
            'observacion'      => $request->observacion,
            'usuario_nombre'   => auth()->user()->name,
            'user_id'          => auth()->id(),
        ]);

        return redirect()->route('entradas-materia-prima.index')
                         ->with('success', 'Entrada registrada correctamente.');
    }
}
