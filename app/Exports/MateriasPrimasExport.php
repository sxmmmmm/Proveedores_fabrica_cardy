<?php

namespace App\Exports;

use App\Models\MateriaPrima;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class MateriasPrimasExport implements FromCollection, WithHeadings, WithStyles
{
    public function collection()
    {
        return MateriaPrima::all()->map(function ($m) {
            return [
                'ID'     => $m->id,
                'Nombre' => $m->nombre,
                'Tipo'   => $m->tipo,
                'Color'  => $m->color,
                'Stock'  => $m->stock,
                'Precio' => $m->precio,
            ];
        });
    }

    public function headings(): array
    {
        return ['ID', 'Nombre', 'Tipo', 'Color', 'Stock', 'Precio'];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]],
        ];
    }
}
