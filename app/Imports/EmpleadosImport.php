<?php

namespace App\Imports;

use App\Models\Empleado;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\WithTransactions;

class EmpleadosImport implements ToModel, WithHeadingRow, WithValidation, SkipsOnFailure, WithTransactions
{
    use SkipsFailures;

    public function model(array $row)
    {
        return new Empleado([
            'nombre'    => trim($row['nombre']),
            'documento' => isset($row['documento']) ? trim($row['documento']) : null,
            'telefono'  => isset($row['telefono']) ? trim($row['telefono']) : null,
            'correo'    => isset($row['correo']) ? trim($row['correo']) : null,
            'cargo'     => isset($row['cargo']) ? trim($row['cargo']) : null,
            'direccion' => isset($row['direccion']) ? trim($row['direccion']) : null,
            'ciudad'    => isset($row['ciudad']) ? trim($row['ciudad']) : null,
        ]);
    }

    public function rules(): array
    {
        return [
            'nombre'   => ['required', 'string', 'max:255'],
            'correo'   => ['nullable', 'email', 'max:255'],
            'cargo'    => ['nullable', 'string', 'max:255'],
            'telefono' => ['nullable', 'string', 'max:30'],
        ];
    }

    public function customValidationMessages(): array
    {
        return [
            'nombre.required' => 'La fila :attribute: el campo "nombre" es obligatorio.',
            'nombre.string'   => 'La fila :attribute: el campo "nombre" debe ser texto.',
            'correo.email'    => 'La fila :attribute: el campo "correo" no tiene un formato de email válido.',
            'cargo.string'    => 'La fila :attribute: el campo "cargo" debe ser texto.',
            'telefono.string' => 'La fila :attribute: el campo "teléfono" debe ser texto.',
        ];
    }

    public function customValidationAttributes(): array
    {
        return [
            'nombre'   => 'Nombre',
            'correo'   => 'Correo',
            'cargo'    => 'Cargo',
            'telefono' => 'Teléfono',
        ];
    }
}
