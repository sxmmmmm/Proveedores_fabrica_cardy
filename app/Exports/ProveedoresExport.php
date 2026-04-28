<?php

namespace App\Exports;

use App\Models\Proveedor;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ProveedoresExport implements FromCollection, WithHeadings, WithStyles
{
    protected array $filters;

    public function __construct(array $filters = [])
    {
        $this->filters = $filters;
    }

    public function collection()
    {
        $query = Proveedor::query();

        if (!empty($this->filters['search'])) {
            $s = $this->filters['search'];
            $query->where(function ($q) use ($s) {
                $q->where('nombre', 'like', "%{$s}%")
                  ->orWhere('empresa', 'like', "%{$s}%")
                  ->orWhere('documento', 'like', "%{$s}%")
                  ->orWhere('correo', 'like', "%{$s}%");
            });
        }

        if (!empty($this->filters['ciudad'])) {
            $query->where('ciudad', $this->filters['ciudad']);
        }

        if (!empty($this->filters['mercancia'])) {
            $query->where('mercancia', $this->filters['mercancia']);
        }

        return $query->orderBy('nombre')->get()->map(fn($p) => [
            'ID'        => $p->id,
            'Nombre'    => $p->nombre,
            'Empresa'   => $p->empresa,
            'Documento' => $p->documento,
            'Teléfono'  => $p->telefono,
            'Correo'    => $p->correo,
            'Ciudad'    => $p->ciudad,
            'Dirección' => $p->direccion,
            'Mercancía' => $p->mercancia,
        ]);
    }

    public function headings(): array
    {
        return ['ID', 'Nombre', 'Empresa', 'Documento', 'Teléfono', 'Correo', 'Ciudad', 'Dirección', 'Mercancía'];
    }

    public function styles(Worksheet $sheet)
    {
        return [1 => ['font' => ['bold' => true]]];
    }
}
