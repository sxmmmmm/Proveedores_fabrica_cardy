<?php

namespace App\Exports;

use App\Models\Proveedor;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ProveedoresExport implements FromCollection, WithHeadings, WithStyles
{
    public function collection()
    {
        return Proveedor::all()->map(function ($p) {
            return [
                'ID'               => $p->id,
                'Nombre'           => $p->nombre,
                'Empresa'          => $p->empresa,
                'Documento'        => $p->documento,
                'Teléfono'         => $p->telefono,
                'Correo'           => $p->correo,
                'Ciudad'           => $p->ciudad,
                'Dirección'        => $p->direccion,
                'Mercancía'        => $p->mercancia,
            ];
        });
    }

    public function headings(): array
    {
        return ['ID', 'Nombre', 'Empresa', 'Documento', 'Teléfono', 'Correo', 'Ciudad', 'Dirección', 'Mercancía'];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]],
        ];
    }
}
