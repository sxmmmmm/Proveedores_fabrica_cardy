<?php
namespace App\Http\Controllers;
use App\Models\EntradaMateriaPrima;
use App\Models\MateriaPrima;
use Illuminate\Http\Request;

class EntradaMateriaPrimaController extends Controller
{
    public function index()
    {
        $entradas = EntradaMateriaPrima::with('materiaPrima')->latest()->paginate(10);
        return view('entradas_materia_prima.index', compact('entradas'));
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
            'usuario_nombre'   => 'required|string|max:100',
            'observacion'      => 'nullable|string',
        ]);
        $materia = MateriaPrima::findOrFail($request->materia_prima_id);
        $materia->increment('stock', $request->cantidad);
        EntradaMateriaPrima::create($request->all());
        return redirect()->route('entradas-materia-prima.index')
                         ->with('success', 'Entrada registrada correctamente.');
    }
}
