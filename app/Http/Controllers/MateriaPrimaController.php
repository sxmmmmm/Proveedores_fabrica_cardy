<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MateriaPrima;
use App\Models\Empleado;

class MateriaPrimaController extends Controller
{
    public function index(Request $request)
    {
        $query = MateriaPrima::with('empleado');

        if ($search = $request->input('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('nombre', 'like', "%{$search}%")
                  ->orWhere('tipo', 'like', "%{$search}%")
                  ->orWhere('color', 'like', "%{$search}%");
            });
        }

        if ($tipo = $request->input('tipo')) {
            $query->where('tipo', $tipo);
        }

        if ($color = $request->input('color')) {
            $query->where('color', $color);
        }

        $materias = $query->orderBy('nombre')->paginate(15)->withQueryString();
        $tipos    = MateriaPrima::select('tipo')->whereNotNull('tipo')->distinct()->orderBy('tipo')->pluck('tipo');
        $colores  = MateriaPrima::select('color')->whereNotNull('color')->distinct()->orderBy('color')->pluck('color');
        $filters  = $request->only(['search', 'tipo', 'color']);
        $empleados = Empleado::orderBy('nombre')->get();

        return view('materias_primas.index', compact('materias', 'tipos', 'colores', 'filters', 'empleados'));
    }

    public function create()
    {
        $empleados = Empleado::orderBy('nombre')->get();
        return view('materias_primas.create', compact('empleados'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre'      => 'required',
            'tipo'        => 'required',
            'color'       => 'required',
            'stock'       => 'required|numeric',
            'precio'      => 'required|numeric',
            'empleado_id' => 'required|exists:empleados,id',
        ]);

        MateriaPrima::create($request->only(['nombre', 'tipo', 'color', 'stock', 'precio', 'empleado_id']));

        return redirect()->route('materias-primas.index')->with('success', 'Materia prima creada correctamente');
    }

    public function edit(MateriaPrima $materiaPrima)
    {
        $empleados = Empleado::orderBy('nombre')->get();
        return view('materias_primas.edit', compact('materiaPrima', 'empleados'));
    }

    public function update(Request $request, MateriaPrima $materiaPrima)
    {
        $request->validate([
            'nombre'      => 'required',
            'tipo'        => 'required',
            'color'       => 'required',
            'stock'       => 'required|numeric',
            'precio'      => 'required|numeric',
            'empleado_id' => 'required|exists:empleados,id',
        ]);

        $materiaPrima->update($request->only(['nombre', 'tipo', 'color', 'stock', 'precio', 'empleado_id']));

        return redirect()->route('materias-primas.index')->with('success', 'Materia prima actualizada correctamente');
    }

    public function destroy(MateriaPrima $materiaPrima)
    {
        $materiaPrima->delete();
        return redirect()->route('materias-primas.index')->with('success', 'Materia prima eliminada correctamente');
    }
}
