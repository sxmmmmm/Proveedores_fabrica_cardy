<?php

namespace App\Imports;

use App\Models\Producto;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithTransactions;

class ProductosImport implements ToModel, WithHeadingRow, WithValidation, SkipsOnFailure, WithTransactions
{
    use SkipsFailures;

    public function model(array $row)
    {
        return new Producto([
            'nombre'           => trim($row['nombre']),
            'descripcion'      => isset($row['descripcion']) ? trim($row['descripcion']) : null,
            'precio'           => $row['precio'],
            'stock'            => $row['stock'],
            'materia_prima_id' => $row['materia_prima_id'] ?? null,
        ]);
    }

    public function rules(): array
    {
        return [
            'nombre'  => ['required', 'string', 'max:255'],
            'precio'  => ['required', 'numeric', 'min:0'],
            'stock'   => ['required', 'integer', 'min:0'],
            'materia_prima_id' => ['nullable', 'integer', 'exists:materia_primas,id'],
        ];
    }

    public function customValidationMessages(): array
    {
        return [
            'nombre.required'           => 'La fila :attribute: el campo "nombre" es obligatorio.',
            'nombre.string'             => 'La fila :attribute: el campo "nombre" debe ser texto.',
            'precio.required'           => 'La fila :attribute: el campo "precio" es obligatorio.',
            'precio.numeric'            => 'La fila :attribute: el campo "precio" debe ser un número válido.',
            'precio.min'                => 'La fila :attribute: el campo "precio" no puede ser negativo.',
            'stock.required'            => 'La fila :attribute: el campo "stock" es obligatorio.',
            'stock.integer'             => 'La fila :attribute: el campo "stock" debe ser un número entero.',
            'stock.min'                 => 'La fila :attribute: el campo "stock" no puede ser negativo.',
            'materia_prima_id.exists'   => 'La fila :attribute: el ID de materia prima indicado no existe en el sistema.',
        ];
    }

    public function customValidationAttributes(): array
    {
        return [
            'nombre'           => 'Nombre',
            'precio'           => 'Precio',
            'stock'            => 'Stock',
            'materia_prima_id' => 'Materia Prima ID',
        ];
    }
}
