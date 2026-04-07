<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Empleado;
use App\Models\MateriaPrima;
use App\Models\Producto;
use App\Models\Proveedor;
use Barryvdh\DomPDF\Facade\Pdf;

class ExportController extends Controller
{
    public function exportComplete()
    {
        $data = [
            'empleados' => Empleado::all(),
            'productos' => Producto::all(),
            'materias_primas' => MateriaPrima::all(),
            'proveedores' => Proveedor::all(),
            'clientes' => Cliente::all(),
            'generatedAt' => now()->format('d/m/Y H:i'),
        ];

        $pdf = Pdf::loadView('exports.complete-pdf', $data);
        return $pdf->download('reporte-completo-cardy-'.date('Y-m-d').'.pdf');
    }

    public function exportEmpleados()
    {
        $data = [
            'empleados' => Empleado::all(),
            'title' => 'Reporte de Empleados',
            'generatedAt' => now()->format('d/m/Y H:i'),
        ];

        $pdf = Pdf::loadView('exports.empleados-pdf', $data);
        return $pdf->download('reporte-empleados-'.date('Y-m-d').'.pdf');
    }

    public function exportProductos()
    {
        $data = [
            'productos' => Producto::all(),
            'title' => 'Reporte de Productos',
            'generatedAt' => now()->format('d/m/Y H:i'),
        ];

        $pdf = Pdf::loadView('exports.productos-pdf', $data);
        return $pdf->download('reporte-productos-'.date('Y-m-d').'.pdf');
    }

    public function exportMateriasPrimas()
    {
        $data = [
            'materias_primas' => MateriaPrima::all(),
            'title' => 'Reporte de Materias Primas',
            'generatedAt' => now()->format('d/m/Y H:i'),
        ];

        $pdf = Pdf::loadView('exports.materias-primas-pdf', $data);
        return $pdf->download('reporte-materias-primas-'.date('Y-m-d').'.pdf');
    }

    public function exportProveedores()
    {
        $data = [
            'proveedores' => Proveedor::all(),
            'title' => 'Reporte de Proveedores',
            'generatedAt' => now()->format('d/m/Y H:i'),
        ];

        $pdf = Pdf::loadView('exports.proveedores-pdf', $data);
        return $pdf->download('reporte-proveedores-'.date('Y-m-d').'.pdf');
    }

    public function exportClientes()
    {
        $data = [
            'clientes' => Cliente::all(),
            'title' => 'Reporte de Clientes',
            'generatedAt' => now()->format('d/m/Y H:i'),
        ];

        $pdf = Pdf::loadView('exports.clientes-pdf', $data);
        return $pdf->download('reporte-clientes-'.date('Y-m-d').'.pdf');
    }
}

