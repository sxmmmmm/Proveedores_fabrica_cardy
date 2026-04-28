<?php

namespace App\Imports;

use App\Models\Empleado;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsErrors;

class EmpleadosImport implements ToModel, WithHeadingRow, SkipsOnError
{
    use SkipsErrors;

    public function model(array $row)
    {
        return new Empleado([
            'nombre'     => $row['nombre'],
            'documento'  => $row['documento'] ?? null,
            'telefono'   => $row['telefono'] ?? null,
            'correo'     => $row['correo'] ?? null,
            'cargo'      => $row['cargo'] ?? null,
            'direccion'  => $row['direccion'] ?? null,
            'ciudad'     => $row['ciudad'] ?? null,
        ]);
    }
}
