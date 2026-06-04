<?php

namespace App\Imports;

use App\Models\MateriaPrima;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\SkipsFailures;

class MateriasPrimasImport implements ToModel, WithHeadingRow, WithValidation, SkipsOnFailure
{
    use SkipsFailures;

    public int $insertados = 0;
    public int $omitidos   = 0;

    public function model(array $row)
    {
        $nombre = trim($row['nombre'] ?? '');
        if ($nombre === '') return null;

        // Duplicado por nombre exacto
        if (MateriaPrima::whereRaw('LOWER(nombre) = ?', [strtolower($nombre)])->exists()) {
            $this->omitidos++;
            return null;
        }

        $this->insertados++;
        return new MateriaPrima([
            'nombre'      => $nombre,
            'tipo'        => isset($row['tipo'])        ? trim($row['tipo'])        : null,
            'color'       => isset($row['color'])       ? trim($row['color'])       : null,
            'stock'       => $row['stock'],
            'precio'      => $row['precio'],
            'empleado_id' => $row['empleado_id'] ?? null,
        ]);
    }

    public function rules(): array
    {
        return [
            'nombre'      => ['required', 'string', 'max:255'],
            'stock'       => ['required', 'integer', 'min:0'],
            'precio'      => ['required', 'numeric', 'min:0'],
            'empleado_id' => ['nullable', 'integer', 'exists:empleados,id'],
        ];
    }

    public function customValidationMessages(): array
    {
        return [
            'nombre.required'    => 'Fila :attribute: el campo "nombre" es obligatorio.',
            'nombre.string'      => 'Fila :attribute: el campo "nombre" debe ser texto.',
            'stock.required'     => 'Fila :attribute: el campo "stock" es obligatorio.',
            'stock.integer'      => 'Fila :attribute: el campo "stock" debe ser un número entero.',
            'stock.min'          => 'Fila :attribute: el campo "stock" no puede ser negativo.',
            'precio.required'    => 'Fila :attribute: el campo "precio" es obligatorio.',
            'precio.numeric'     => 'Fila :attribute: el campo "precio" debe ser un número válido.',
            'precio.min'         => 'Fila :attribute: el campo "precio" no puede ser negativo.',
            'empleado_id.exists' => 'Fila :attribute: el ID de empleado no existe en el sistema.',
        ];
    }

    public function customValidationAttributes(): array
    {
        return [
            'nombre'      => 'Nombre',
            'stock'       => 'Stock',
            'precio'      => 'Precio',
            'empleado_id' => 'Empleado ID',
        ];
    }
}
