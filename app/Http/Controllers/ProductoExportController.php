<?php
namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoExportController extends Controller
{
    // Exportar CSV
    public function exportCsv()
    {
        $productos = Producto::with('materiaPrima')->get();

        $filename = 'productos_' . now()->format('Y-m-d') . '.csv';

        $headers = [
            'Content-Type'        => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"$filename\"",
        ];

        $callback = function () use ($productos) {
            $file = fopen('php://output', 'w');

            // Cabecera
            fputcsv($file, ['ID', 'Nombre', 'Precio', 'Stock', 'Materia Prima', 'Fecha Creación']);

            foreach ($productos as $p) {
                fputcsv($file, [
                    $p->id,
                    $p->nombre,
                    $p->precio,
                    $p->stock,
                    $p->materiaPrima->nombre ?? 'N/A',
                    $p->created_at->format('Y-m-d'),
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    // Exportar PDF
    public function exportPdf()
    {
        $productos = Producto::with('materiaPrima')->get();
        return view('productos.export_pdf', compact('productos'));
    }
}