<?php

namespace App\Imports;

use App\Models\Producto;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsErrors;

class ProductosImport implements ToModel, WithHeadingRow, SkipsOnError
{
    use SkipsErrors;

    public function model(array $row)
    {
        return new Producto([
            'nombre'          => $row['nombre'],
            'descripcion'     => $row['descripcion'] ?? null,
            'precio'          => $row['precio'],
            'stock'           => $row['stock'],
            'materia_prima_id'=> $row['materia_prima_id'] ?? null,
        ]);
    }
}
