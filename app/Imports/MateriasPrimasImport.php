<?php

namespace App\Imports;

use App\Models\MateriaPrima;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\WithTransactions;

class MateriasPrimasImport implements ToModel, WithHeadingRow, WithValidation, SkipsOnFailure, WithTransactions
{
    use SkipsFailures;

    public function model(array $row)
    {
        return new MateriaPrima([
            'nombre'      => trim($row['nombre']),
            'tipo'        => isset($row['tipo']) ? trim($row['tipo']) : null,
            'color'       => isset($row['color']) ? trim($row['color']) : null,
            'stock'       => $row['stock'],
            'precio'      => $row['precio'],
            'empleado_id' => $row['empleado_id'] ?? null,
        ]);
    }

    public function rules(): array
    {
        return [
            'nombre' => ['required', 'string', 'max:255'],
            'stock'  => ['required', 'integer', 'min:0'],
            'precio' => ['required', 'numeric', 'min:0'],
            'empleado_id' => ['nullable', 'integer', 'exists:empleados,id'],
        ];
    }

    public function customValidationMessages(): array
    {
        return [
            'nombre.required'      => 'La fila :attribute: el campo "nombre" es obligatorio.',
            'nombre.string'        => 'La fila :attribute: el campo "nombre" debe ser texto.',
            'stock.required'       => 'La fila :attribute: el campo "stock" es obligatorio.',
            'stock.integer'        => 'La fila :attribute: el campo "stock" debe ser un número entero.',
            'stock.min'            => 'La fila :attribute: el campo "stock" no puede ser negativo.',
            'precio.required'      => 'La fila :attribute: el campo "precio" es obligatorio.',
            'precio.numeric'       => 'La fila :attribute: el campo "precio" debe ser un número válido.',
            'precio.min'           => 'La fila :attribute: el campo "precio" no puede ser negativo.',
            'empleado_id.exists'   => 'La fila :attribute: el ID de empleado indicado no existe en el sistema.',
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
