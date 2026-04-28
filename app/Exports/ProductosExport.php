<?php

namespace App\Exports;

use App\Models\Producto;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ProductosExport implements FromCollection, WithHeadings, WithStyles
{
    protected array $filters;

    public function __construct(array $filters = [])
    {
        $this->filters = $filters;
    }

    public function collection()
    {
        $query = Producto::with('materiaPrima');

        if (!empty($this->filters['search'])) {
            $s = $this->filters['search'];
            $query->where(function ($q) use ($s) {
                $q->where('nombre', 'like', "%{$s}%")
                  ->orWhere('descripcion', 'like', "%{$s}%");
            });
        }

        if (!empty($this->filters['stock_min'])) {
            $query->where('stock', '>=', $this->filters['stock_min']);
        }

        if (!empty($this->filters['precio_max'])) {
            $query->where('precio', '<=', $this->filters['precio_max']);
        }

        if (!empty($this->filters['materia_prima_id'])) {
            $query->where('materia_prima_id', $this->filters['materia_prima_id']);
        }

        return $query->orderBy('nombre')->get()->map(fn($p) => [
            'ID'            => $p->id,
            'Nombre'        => $p->nombre,
            'Descripción'   => $p->descripcion,
            'Precio'        => $p->precio,
            'Stock'         => $p->stock,
            'Materia Prima' => $p->materiaPrima->nombre ?? '-',
        ]);
    }

    public function headings(): array
    {
        return ['ID', 'Nombre', 'Descripción', 'Precio', 'Stock', 'Materia Prima'];
    }

    public function styles(Worksheet $sheet)
    {
        return [1 => ['font' => ['bold' => true]]];
    }
}
