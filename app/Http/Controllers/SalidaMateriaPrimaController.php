<?php
namespace App\Http\Controllers;
use App\Models\SalidaMateriaPrima;
use App\Models\MateriaPrima;
use Illuminate\Http\Request;

class SalidaMateriaPrimaController extends Controller
{
    public function index()
    {
        $salidas = SalidaMateriaPrima::with('materiaPrima')->latest()->paginate(10);
        return view('salidas_materia_prima.index', compact('salidas'));
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
            'usuario_nombre'   => 'required|string|max:100',
            'observacion'      => 'nullable|string',
        ]);
        $materia = MateriaPrima::findOrFail($request->materia_prima_id);
        if ($request->cantidad > $materia->stock) {
            return back()->withErrors([
                'cantidad' => "Stock insuficiente. Disponible: {$materia->stock}"
            ])->withInput();
        }
        $materia->decrement('stock', $request->cantidad);
        SalidaMateriaPrima::create($request->all());
        return redirect()->route('salidas-materia-prima.index')
                         ->with('success', 'Salida registrada correctamente.');
    }
}
