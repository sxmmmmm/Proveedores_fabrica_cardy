<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;
use App\Models\PagoProveedor;

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

    public function pago(Proveedor $proveedor)
    {
        $pagos = $proveedor->pagos()
                           ->latest('fecha_pago')
                           ->get();

        return view('proveedores.pago', compact('proveedor', 'pagos'));
    }

    
    public function storePago(Request $request, Proveedor $proveedor)
    {
        $request->validate([
            'monto'       => 'required|numeric|min:0.01',
            'fecha_pago'  => 'required|date',
            'metodo_pago' => 'required|in:efectivo,transferencia,cheque,nequi,daviplata,otro',
            'referencia'  => 'nullable|string|max:100',
            'concepto'    => 'nullable|string|max:500',
        ]);

        PagoProveedor::create([
            'proveedor_id'   => $proveedor->id,
            'monto'          => $request->monto,
            'fecha_pago'     => $request->fecha_pago,
            'metodo_pago'    => $request->metodo_pago,
            'referencia'     => $request->referencia,
            'concepto'       => $request->concepto,
            'estado'         => 'completado',
            'registrado_por' => auth()->id(),
        ]);

        return redirect()
            ->route('proveedores.pago', $proveedor)
            ->with('success', 'Pago registrado correctamente.');
    }
}
