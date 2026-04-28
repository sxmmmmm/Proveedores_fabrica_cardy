<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    public function index(Request $request)
    {
        $query = Proveedor::query();

        if ($search = $request->input('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('nombre', 'like', "%{$search}%")
                  ->orWhere('empresa', 'like', "%{$search}%")
                  ->orWhere('documento', 'like', "%{$search}%")
                  ->orWhere('correo', 'like', "%{$search}%");
            });
        }

        if ($ciudad = $request->input('ciudad')) {
            $query->where('ciudad', $ciudad);
        }

        if ($mercancia = $request->input('mercancia')) {
            $query->where('mercancia', $mercancia);
        }

        $proveedores = $query->orderBy('nombre')->paginate(15)->withQueryString();
        $ciudades    = Proveedor::select('ciudad')->whereNotNull('ciudad')->distinct()->orderBy('ciudad')->pluck('ciudad');
        $mercancias  = Proveedor::select('mercancia')->whereNotNull('mercancia')->distinct()->orderBy('mercancia')->pluck('mercancia');
        $filters     = $request->only(['search', 'ciudad', 'mercancia']);

        return view('proveedores.index', compact('proveedores', 'ciudades', 'mercancias', 'filters'));
    }

    public function create()
    {
        return view('proveedores.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre'           => 'required|string|max:255',
            'empresa'          => 'required|string|max:255',
            'documento'        => 'required|string|max:20',
            'telefono'         => 'required|string|max:20',
            'fecha_nacimiento' => 'nullable|date',
            'correo'           => 'required|email|unique:proveedores',
            'ciudad'           => 'required|string|max:100',
            'direccion'        => 'required|string|max:255',
            'mercancia'        => 'required|string|max:255',
        ]);

        Proveedor::create($request->all());

        return redirect()->route('proveedores.index')->with('success', 'Proveedor agregado correctamente');
    }

    public function edit(Proveedor $proveedore)
    {
        return view('proveedores.edit', compact('proveedore'));
    }

    public function update(Request $request, Proveedor $proveedore)
    {
        $proveedore->update($request->all());
        return redirect()->route('proveedores.index')->with('success', 'Proveedor actualizado correctamente');
    }

    public function destroy(Proveedor $proveedore)
    {
        $proveedore->delete();
        return redirect()->route('proveedores.index')->with('success', 'Proveedor eliminado correctamente');
    }
}
