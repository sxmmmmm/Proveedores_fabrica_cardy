<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    private function buildQuery(Request $request)
    {
        $query = Proveedor::query();

        if ($s = $request->get('search')) {
            $query->where(function ($q) use ($s) {
                $q->where('nombre', 'like', "%$s%")
                  ->orWhere('empresa', 'like', "%$s%")
                  ->orWhere('documento', 'like', "%$s%")
                  ->orWhere('correo', 'like', "%$s%")
                  ->orWhere('ciudad', 'like', "%$s%")
                  ->orWhere('mercancia', 'like', "%$s%");
            });
        }
        if ($ciudad = $request->get('ciudad')) {
            $query->where('ciudad', 'like', "%$ciudad%");
        }
        if ($mercancia = $request->get('mercancia')) {
            $query->where('mercancia', 'like', "%$mercancia%");
        }

        return $query;
    }

    public function index(Request $request)
    {
        $perPage     = in_array($request->get('per_page'), [15, 25, 50, 100]) ? $request->get('per_page') : 15;
        $proveedores = $this->buildQuery($request)->orderBy('nombre')->paginate($perPage)->withQueryString();
        $ciudades    = Proveedor::select('ciudad')->whereNotNull('ciudad')->distinct()->orderBy('ciudad')->pluck('ciudad');
        $mercancias  = Proveedor::select('mercancia')->whereNotNull('mercancia')->distinct()->orderBy('mercancia')->pluck('mercancia');

        return view('proveedores.index', compact('proveedores', 'ciudades', 'mercancias'));
    }

    public function create()
    {
        return redirect()->route('proveedores.index', ['open_modal' => 1]);
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
