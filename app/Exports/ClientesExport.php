<?php

namespace App\Exports;

use App\Models\Cliente;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ClientesExport implements FromCollection, WithHeadings, WithStyles
{
    public function collection()
    {
        return Cliente::all()->map(function ($c) {
            return [
                'ID'        => $c->id,
                'Nombre'    => $c->nombre,
                'Documento' => $c->documento,
                'Teléfono'  => $c->telefono,
                'Correo'    => $c->correo,
                'Ciudad'    => $c->ciudad,
                'Dirección' => $c->direccion,
            ];
        });
    }

    public function headings(): array
    {
        return ['ID', 'Nombre', 'Documento', 'Teléfono', 'Correo', 'Ciudad', 'Dirección'];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]],
        ];
    }
}
