<?php

namespace App\Imports;

use App\Models\Cliente;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\SkipsFailures;

class ClientesImport implements ToModel, WithHeadingRow, WithValidation, SkipsOnFailure
{
    use SkipsFailures;

    /** Cuenta registros insertados y omitidos */
    public int $insertados = 0;
    public int $omitidos   = 0;

    public function model(array $row)
    {
        $nombre = trim($row['nombre'] ?? '');
        if ($nombre === '') return null;

        // Evitar duplicado por nombre exacto
        $existe = Cliente::whereRaw('LOWER(nombre) = ?', [strtolower($nombre)])->exists();
        if ($existe) {
            $this->omitidos++;
            return null;
        }

        $this->insertados++;
        return new Cliente([
            'nombre'    => $nombre,
            'documento' => isset($row['documento']) ? trim($row['documento']) : null,
            'telefono'  => isset($row['telefono'])  ? trim($row['telefono'])  : null,
            'correo'    => isset($row['correo'])     ? trim($row['correo'])    : null,
            'ciudad'    => isset($row['ciudad'])     ? trim($row['ciudad'])    : null,
            'direccion' => isset($row['direccion'])  ? trim($row['direccion']) : null,
        ]);
    }

    public function rules(): array
    {
        return [
            'nombre'   => ['required', 'string', 'max:255'],
            'correo'   => ['nullable', 'email', 'max:255'],
            'telefono' => ['nullable', 'string', 'max:30'],
        ];
    }

    public function customValidationMessages(): array
    {
        return [
            'nombre.required' => 'Fila :attribute: el campo "nombre" es obligatorio.',
            'nombre.string'   => 'Fila :attribute: el campo "nombre" debe ser texto.',
            'correo.email'    => 'Fila :attribute: el campo "correo" no tiene formato de email válido.',
            'telefono.string' => 'Fila :attribute: el campo "teléfono" debe ser texto.',
        ];
    }

    public function customValidationAttributes(): array
    {
        return [
            'nombre'   => 'Nombre',
            'correo'   => 'Correo',
            'telefono' => 'Teléfono',
        ];
    }
}
