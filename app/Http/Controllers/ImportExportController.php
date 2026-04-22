<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

use App\Models\Producto;
use App\Models\MateriaPrima;
use App\Models\Cliente;
use App\Models\Proveedor;

use App\Imports\ProductosImport;
use App\Imports\MateriasPrimasImport;
use App\Imports\ClientesImport;
use App\Imports\ProveedoresImport;

use App\Exports\ProductosExport;
use App\Exports\MateriasPrimasExport;
use App\Exports\ClientesExport;
use App\Exports\ProveedoresExport;

class ImportExportController extends Controller
{
    // ==================== PRODUCTOS ====================

    public function importProductos(Request $request)
    {
        $request->validate(['archivo' => 'required|file|mimes:xlsx,xls,csv']);
        Excel::import(new ProductosImport, $request->file('archivo'));
        return back()->with('success', 'Productos importados correctamente.');
    }

    public function exportProductosExcel()
    {
        return Excel::download(new ProductosExport, 'productos.xlsx');
    }

    public function exportProductosCsv()
    {
        return Excel::download(new ProductosExport, 'productos.csv', \Maatwebsite\Excel\Excel::CSV);
    }

    public function exportProductosPdf()
    {
        $productos = Producto::with('materiaPrima')->get();
        $pdf = Pdf::loadView('pdf.productos-pdf', compact('productos'))->setPaper('a4', 'landscape');
        return $pdf->download('productos.pdf');
    }

    // ==================== MATERIAS PRIMAS ====================

    public function importMateriasPrimas(Request $request)
    {
        $request->validate(['archivo' => 'required|file|mimes:xlsx,xls,csv']);
        Excel::import(new MateriasPrimasImport, $request->file('archivo'));
        return back()->with('success', 'Materias primas importadas correctamente.');
    }

    public function exportMateriasPrimasExcel()
    {
        return Excel::download(new MateriasPrimasExport, 'materias_primas.xlsx');
    }

    public function exportMateriasPrimasCsv()
    {
        return Excel::download(new MateriasPrimasExport, 'materias_primas.csv', \Maatwebsite\Excel\Excel::CSV);
    }

    public function exportMateriasPrimasPdf()
    {
        $materias = MateriaPrima::all();
        $pdf = Pdf::loadView('pdf.materias-primas-pdf', compact('materias'))->setPaper('a4', 'landscape');
        return $pdf->download('materias_primas.pdf');
    }

    // ==================== CLIENTES ====================

    public function importClientes(Request $request)
    {
        $request->validate(['archivo' => 'required|file|mimes:xlsx,xls,csv']);
        Excel::import(new ClientesImport, $request->file('archivo'));
        return back()->with('success', 'Clientes importados correctamente.');
    }

    public function exportClientesExcel()
    {
        return Excel::download(new ClientesExport, 'clientes.xlsx');
    }

    public function exportClientesCsv()
    {
        return Excel::download(new ClientesExport, 'clientes.csv', \Maatwebsite\Excel\Excel::CSV);
    }

    public function exportClientesPdf()
    {
        $clientes = Cliente::all();
        $pdf = Pdf::loadView('pdf.clientes-pdf', compact('clientes'))->setPaper('a4', 'landscape');
        return $pdf->download('clientes.pdf');
    }

    // ==================== PROVEEDORES ====================

    public function importProveedores(Request $request)
    {
        $request->validate(['archivo' => 'required|file|mimes:xlsx,xls,csv']);
        Excel::import(new ProveedoresImport, $request->file('archivo'));
        return back()->with('success', 'Proveedores importados correctamente.');
    }

    public function exportProveedoresExcel()
    {
        return Excel::download(new ProveedoresExport, 'proveedores.xlsx');
    }

    public function exportProveedoresCsv()
    {
        return Excel::download(new ProveedoresExport, 'proveedores.csv', \Maatwebsite\Excel\Excel::CSV);
    }

    public function exportProveedoresPdf()
    {
        $proveedores = Proveedor::all();
        $pdf = Pdf::loadView('pdf.proveedores-pdf', compact('proveedores'))->setPaper('a4', 'landscape');
        return $pdf->download('proveedores.pdf');
    }
}
