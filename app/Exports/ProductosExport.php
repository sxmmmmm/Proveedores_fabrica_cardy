<?php

namespace App\Exports;

use App\Models\Producto;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ProductosExport implements FromCollection, WithHeadings, WithStyles
{
    public function collection()
    {
        return Producto::with('materiaPrima')->get()->map(function ($p) {
            return [
                'ID'              => $p->id,
                'Nombre'          => $p->nombre,
                'Descripción'     => $p->descripcion,
                'Precio'          => $p->precio,
                'Stock'           => $p->stock,
                'Materia Prima'   => $p->materiaPrima->nombre ?? '-',
            ];
        });
    }

    public function headings(): array
    {
        return ['ID', 'Nombre', 'Descripción', 'Precio', 'Stock', 'Materia Prima'];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]],
        ];
    }
}
