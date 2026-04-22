<?php

namespace App\Imports;

use App\Models\MateriaPrima;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsErrors;

class MateriasPrimasImport implements ToModel, WithHeadingRow, SkipsOnError
{
    use SkipsErrors;

    public function model(array $row)
    {
        return new MateriaPrima([
            'nombre'      => $row['nombre'],
            'tipo'        => $row['tipo'] ?? null,
            'color'       => $row['color'] ?? null,
            'stock'       => $row['stock'],
            'precio'      => $row['precio'],
            'empleado_id' => $row['empleado_id'] ?? null,
        ]);
    }
}
