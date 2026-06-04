<?php

namespace App\Imports;

use App\Models\Proveedor;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\SkipsFailures;

class ProveedoresImport implements ToModel, WithHeadingRow, WithValidation, SkipsOnFailure
{
    use SkipsFailures;

    public int $insertados = 0;
    public int $omitidos   = 0;

    public function model(array $row)
    {
        $nombre = trim($row['nombre'] ?? '');
        if ($nombre === '') return null;

        // Duplicado por documento (si viene) o por nombre+empresa
        $documento = isset($row['documento']) ? trim($row['documento']) : null;
        $correo    = isset($row['correo'])     ? trim($row['correo'])    : null;

        if ($documento && Proveedor::where('documento', $documento)->exists()) {
            $this->omitidos++;
            return null;
        }

        if ($correo && Proveedor::where('correo', $correo)->exists()) {
            $this->omitidos++;
            return null;
        }

        $this->insertados++;
        return new Proveedor([
            'nombre'           => $nombre,
            'empresa'          => isset($row['empresa'])          ? trim($row['empresa'])          : null,
            'documento'        => $documento,
            'telefono'         => isset($row['telefono'])         ? trim($row['telefono'])         : null,
            'fecha_nacimiento' => ($row['fecha_nacimiento'] ?? '') !== '' ? $row['fecha_nacimiento'] : null,
            'correo'           => $correo,
            'ciudad'           => isset($row['ciudad'])           ? trim($row['ciudad'])           : null,
            'direccion'        => isset($row['direccion'])        ? trim($row['direccion'])        : null,
            'mercancia'        => isset($row['mercancia'])        ? trim($row['mercancia'])        : null,
        ]);
    }

    public function rules(): array
    {
        return [
            'nombre'           => ['required', 'string', 'max:255'],
            'correo'           => ['nullable', 'email', 'max:255'],
            'telefono'         => ['nullable', 'string', 'max:30'],
            'fecha_nacimiento' => ['nullable', 'date'],
        ];
    }

    public function customValidationMessages(): array
    {
        return [
            'nombre.required'       => 'Fila :attribute: el campo "nombre" es obligatorio.',
            'nombre.string'         => 'Fila :attribute: el campo "nombre" debe ser texto.',
            'correo.email'          => 'Fila :attribute: el campo "correo" no tiene formato de email válido.',
            'fecha_nacimiento.date' => 'Fila :attribute: el campo "fecha_nacimiento" no es una fecha válida.',
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
