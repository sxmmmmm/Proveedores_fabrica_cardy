<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index(Request $request)
    {
        $query = Cliente::query();

        if ($search = $request->input('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('nombre', 'like', "%{$search}%")
                  ->orWhere('documento', 'like', "%{$search}%")
                  ->orWhere('correo', 'like', "%{$search}%");
            });
        }

        if ($ciudad = $request->input('ciudad')) {
            $query->where('ciudad', $ciudad);
        }

        $clientes  = $query->orderBy('nombre')->paginate(15)->withQueryString();
        $ciudades  = Cliente::select('ciudad')->whereNotNull('ciudad')->distinct()->orderBy('ciudad')->pluck('ciudad');
        $filters   = $request->only(['search', 'ciudad']);

        return view('clientes.index', compact('clientes', 'ciudades', 'filters'));
    }

    public function create()
    {
        return view('clientes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre'    => 'required|string|max:255',
            'documento' => 'nullable|string|max:50',
            'telefono'  => 'nullable|string|max:50',
            'correo'    => 'nullable|email|unique:clientes',
            'ciudad'    => 'nullable|string|max:100',
            'direccion' => 'nullable|string|max:255',
        ]);

        Cliente::create($request->all());

        return redirect()->route('clientes.index')->with('success', 'Cliente creado correctamente');
    }

    public function edit(Cliente $cliente)
    {
        return view('clientes.edit', compact('cliente'));
    }

    public function update(Request $request, Cliente $cliente)
    {
        $request->validate([
            'nombre'    => 'required|string|max:255',
            'documento' => 'nullable|string|max:50',
            'telefono'  => 'nullable|string|max:50',
            'correo'    => 'nullable|email|unique:clientes,correo,' . $cliente->id,
            'ciudad'    => 'nullable|string|max:100',
            'direccion' => 'nullable|string|max:255',
        ]);

        $cliente->update($request->all());

        return redirect()->route('clientes.index')->with('success', 'Cliente actualizado correctamente');
    }

    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
        return redirect()->route('clientes.index')->with('success', 'Cliente eliminado correctamente');
    }
}
