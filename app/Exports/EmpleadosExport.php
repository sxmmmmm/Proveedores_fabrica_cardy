<?php

namespace App\Exports;

use App\Models\Empleado;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class EmpleadosExport implements FromCollection, WithHeadings, WithStyles
{
    protected array $filters;

    public function __construct(array $filters = [])
    {
        $this->filters = $filters;
    }

    public function collection()
    {
        $query = Empleado::query();

        if (!empty($this->filters['search'])) {
            $s = $this->filters['search'];
            $query->where(function ($q) use ($s) {
                $q->where('nombre', 'like', "%{$s}%")
                  ->orWhere('documento', 'like', "%{$s}%")
                  ->orWhere('correo', 'like', "%{$s}%");
            });
        }

        if (!empty($this->filters['cargo'])) {
            $query->where('cargo', $this->filters['cargo']);
        }

        if (!empty($this->filters['ciudad'])) {
            $query->where('ciudad', $this->filters['ciudad']);
        }

        return $query->orderBy('nombre')->get()->map(fn($e) => [
            'ID'        => $e->id,
            'Nombre'    => $e->nombre,
            'Documento' => $e->documento,
            'Teléfono'  => $e->telefono,
            'Correo'    => $e->correo,
            'Cargo'     => $e->cargo,
            'Dirección' => $e->direccion,
            'Ciudad'    => $e->ciudad,
        ]);
    }

    public function headings(): array
    {
        return ['ID', 'Nombre', 'Documento', 'Teléfono', 'Correo', 'Cargo', 'Dirección', 'Ciudad'];
    }

    public function styles(Worksheet $sheet)
    {
        return [1 => ['font' => ['bold' => true]]];
    }
}
