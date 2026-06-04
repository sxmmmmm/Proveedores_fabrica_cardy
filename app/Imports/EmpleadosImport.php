<?php

namespace App\Imports;

use App\Models\Empleado;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\SkipsFailures;

class EmpleadosImport implements ToModel, WithHeadingRow, WithValidation, SkipsOnFailure
{
    use SkipsFailures;

    public int $insertados = 0;
    public int $omitidos   = 0;

    public function model(array $row)
    {
        $nombre = trim($row['nombre'] ?? '');
        if ($nombre === '') return null;

        $documento = isset($row['documento']) ? trim($row['documento']) : null;

        // Duplicado por documento (si viene) o por nombre exacto
        if ($documento && Empleado::where('documento', $documento)->exists()) {
            $this->omitidos++;
            return null;
        }

        if (!$documento && Empleado::whereRaw('LOWER(nombre) = ?', [strtolower($nombre)])->exists()) {
            $this->omitidos++;
            return null;
        }

        $this->insertados++;
        return new Empleado([
            'nombre'    => $nombre,
            'documento' => $documento,
            'telefono'  => isset($row['telefono'])  ? trim($row['telefono'])  : null,
            'correo'    => isset($row['correo'])     ? trim($row['correo'])    : null,
            'cargo'     => isset($row['cargo'])      ? trim($row['cargo'])     : null,
            'direccion' => isset($row['direccion'])  ? trim($row['direccion']) : null,
            'ciudad'    => isset($row['ciudad'])     ? trim($row['ciudad'])    : null,
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
            'nombre.required' => 'Fila :attribute: el campo "nombre" es obligatorio.',
            'nombre.string'   => 'Fila :attribute: el campo "nombre" debe ser texto.',
            'correo.email'    => 'Fila :attribute: el campo "correo" no tiene formato de email válido.',
            'cargo.string'    => 'Fila :attribute: el campo "cargo" debe ser texto.',
            'telefono.string' => 'Fila :attribute: el campo "teléfono" debe ser texto.',
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
