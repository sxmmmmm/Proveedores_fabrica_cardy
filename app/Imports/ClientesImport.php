<?php

namespace App\Imports;

use App\Models\Cliente;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsErrors;

class ClientesImport implements ToModel, WithHeadingRow, SkipsOnError
{
    use SkipsErrors;

    public function model(array $row)
    {
        return new Cliente([
            'nombre'     => $row['nombre'],
            'documento'  => $row['documento'] ?? null,
            'telefono'   => $row['telefono'] ?? null,
            'correo'     => $row['correo'] ?? null,
            'ciudad'     => $row['ciudad'] ?? null,
            'direccion'  => $row['direccion'] ?? null,
        ]);
    }
}
