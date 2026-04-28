<?php

namespace App\Exports;

use App\Models\MateriaPrima;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class MateriasPrimasExport implements FromCollection, WithHeadings, WithStyles
{
    protected array $filters;

    public function __construct(array $filters = [])
    {
        $this->filters = $filters;
    }

    public function collection()
    {
        $query = MateriaPrima::query();

        if (!empty($this->filters['search'])) {
            $s = $this->filters['search'];
            $query->where(function ($q) use ($s) {
                $q->where('nombre', 'like', "%{$s}%")
                  ->orWhere('tipo', 'like', "%{$s}%")
                  ->orWhere('color', 'like', "%{$s}%");
            });
        }

        if (!empty($this->filters['tipo'])) {
            $query->where('tipo', $this->filters['tipo']);
        }

        if (!empty($this->filters['color'])) {
            $query->where('color', $this->filters['color']);
        }

        return $query->orderBy('nombre')->get()->map(fn($m) => [
            'ID'     => $m->id,
            'Nombre' => $m->nombre,
            'Tipo'   => $m->tipo,
            'Color'  => $m->color,
            'Stock'  => $m->stock,
            'Precio' => $m->precio,
        ]);
    }

    public function headings(): array
    {
        return ['ID', 'Nombre', 'Tipo', 'Color', 'Stock', 'Precio'];
    }

    public function styles(Worksheet $sheet)
    {
        return [1 => ['font' => ['bold' => true]]];
    }
}
