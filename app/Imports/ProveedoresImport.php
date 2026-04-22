<?php

namespace App\Imports;

use App\Models\Proveedor;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsErrors;

class ProveedoresImport implements ToModel, WithHeadingRow, SkipsOnError
{
    use SkipsErrors;

    public function model(array $row)
    {
        return new Proveedor([
            'nombre'           => $row['nombre'],
            'empresa'          => $row['empresa'] ?? null,
            'documento'        => $row['documento'] ?? null,
            'telefono'         => $row['telefono'] ?? null,
            'fecha_nacimiento' => $row['fecha_nacimiento'] ?? null,
            'correo'           => $row['correo'] ?? null,
            'ciudad'           => $row['ciudad'] ?? null,
            'direccion'        => $row['direccion'] ?? null,
            'mercancia'        => $row['mercancia'] ?? null,
        ]);
    }
}
