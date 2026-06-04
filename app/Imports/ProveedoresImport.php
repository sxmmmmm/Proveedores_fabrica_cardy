<?php

namespace App\Imports;

use App\Models\Proveedor;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\WithTransactions;

class ProveedoresImport implements ToModel, WithHeadingRow, WithValidation, SkipsOnFailure, WithTransactions
{
    use SkipsFailures;

    public function model(array $row)
    {
        return new Proveedor([
            'nombre'           => trim($row['nombre']),
            'empresa'          => isset($row['empresa']) ? trim($row['empresa']) : null,
            'documento'        => isset($row['documento']) ? trim($row['documento']) : null,
            'telefono'         => isset($row['telefono']) ? trim($row['telefono']) : null,
            'fecha_nacimiento' => isset($row['fecha_nacimiento']) && $row['fecha_nacimiento'] !== '' ? $row['fecha_nacimiento'] : null,
            'correo'           => isset($row['correo']) ? trim($row['correo']) : null,
            'ciudad'           => isset($row['ciudad']) ? trim($row['ciudad']) : null,
            'direccion'        => isset($row['direccion']) ? trim($row['direccion']) : null,
            'mercancia'        => isset($row['mercancia']) ? trim($row['mercancia']) : null,
        ]);
    }

    public function rules(): array
    {
        return [
            'nombre'   => ['required', 'string', 'max:255'],
            'correo'   => ['nullable', 'email', 'max:255', 'unique:proveedores,correo'],
            'telefono' => ['nullable', 'string', 'max:30'],
            'fecha_nacimiento' => ['nullable', 'date'],
        ];
    }

    public function customValidationMessages(): array
    {
        return [
            'nombre.required'         => 'La fila :attribute: el campo "nombre" es obligatorio.',
            'nombre.string'           => 'La fila :attribute: el campo "nombre" debe ser texto.',
            'correo.email'            => 'La fila :attribute: el campo "correo" no tiene un formato de email válido.',
            'correo.unique'           => 'La fila :attribute: el correo ":input" ya existe en el sistema (duplicado).',
            'fecha_nacimiento.date'   => 'La fila :attribute: el campo "fecha_nacimiento" no es una fecha válida.',
        ];
    }

    public function customValidationAttributes(): array
    {
        return [
            'nombre'           => 'Nombre',
            'correo'           => 'Correo',
            'telefono'         => 'Teléfono',
            'fecha_nacimiento' => 'Fecha de Nacimiento',
        ];
    }
}
