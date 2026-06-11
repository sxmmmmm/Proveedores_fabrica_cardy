<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    public function index(Request $request)
    {
        $query = Empleado::query();

        if ($search = $request->input('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('nombre', 'like', "%{$search}%")
                  ->orWhere('documento', 'like', "%{$search}%")
                  ->orWhere('correo', 'like', "%{$search}%");
            });
        }

        if ($cargo = $request->input('cargo')) {
            $query->where('cargo', $cargo);
        }

        if ($ciudad = $request->input('ciudad')) {
            $query->where('ciudad', $ciudad);
        }

        $empleados = $query->orderBy('nombre')->paginate(15)->withQueryString();
        $cargos    = Empleado::select('cargo')->whereNotNull('cargo')->distinct()->orderBy('cargo')->pluck('cargo');
        $ciudades  = Empleado::select('ciudad')->whereNotNull('ciudad')->distinct()->orderBy('ciudad')->pluck('ciudad');
        $filters   = $request->only(['search', 'cargo', 'ciudad']);

        return view('empleados.index', compact('empleados', 'cargos', 'ciudades', 'filters'));
    }

    public function create()
    {
        return redirect()->route('empleados.index', ['open_modal' => 1]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre'    => 'required|string|max:255',
            'documento' => 'required|string|max:50|unique:empleados,documento',
            'telefono'  => 'nullable|string|max:50',
            'correo'    => 'nullable|email|unique:empleados,correo',
            'cargo'     => 'nullable|string|max:100',
            'ciudad'    => 'nullable|string|max:100',
            'direccion' => 'nullable|string|max:255',
        ]);

        Empleado::create($request->all());

        return redirect()->route('empleados.index')->with('success', 'Empleado creado correctamente');
    }

    public function edit(Empleado $empleado)
    {
        return view('empleados.edit', compact('empleado'));
    }

    public function update(Request $request, Empleado $empleado)
    {
        $request->validate([
            'nombre'    => 'required|string|max:255',
            'documento' => 'required|string|max:50|unique:empleados,documento,' . $empleado->id,
            'telefono'  => 'nullable|string|max:50',
            'correo'    => 'nullable|email|unique:empleados,correo,' . $empleado->id,
            'cargo'     => 'nullable|string|max:100',
            'ciudad'    => 'nullable|string|max:100',
            'direccion' => 'nullable|string|max:255',
        ]);

        $empleado->update($request->all());

        return redirect()->route('empleados.index')->with('success', 'Empleado actualizado correctamente');
    }

    public function destroy(Empleado $empleado)
    {
        $empleado->delete();
        return redirect()->route('empleados.index')->with('success', 'Empleado eliminado correctamente');
    }
}
