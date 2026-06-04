<?php

namespace App\Imports;

use App\Models\Producto;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\SkipsFailures;

class ProductosImport implements ToModel, WithHeadingRow, WithValidation, SkipsOnFailure
{
    use SkipsFailures;

    public int $insertados = 0;
    public int $omitidos   = 0;

    public function model(array $row)
    {
        $nombre = trim($row['nombre'] ?? '');
        if ($nombre === '') return null;

        // Duplicado por nombre exacto
        if (Producto::whereRaw('LOWER(nombre) = ?', [strtolower($nombre)])->exists()) {
            $this->omitidos++;
            return null;
        }

        $this->insertados++;
        return new Producto([
            'nombre'           => $nombre,
            'descripcion'      => isset($row['descripcion']) ? trim($row['descripcion']) : null,
            'precio'           => $row['precio'],
            'stock'            => $row['stock'],
            'materia_prima_id' => $row['materia_prima_id'] ?? null,
        ]);
    }

    public function rules(): array
    {
        return [
            'nombre' => ['required', 'string', 'max:255'],
            'precio' => ['required', 'numeric', 'min:0'],
            'stock'  => ['required', 'integer', 'min:0'],
            'materia_prima_id' => ['nullable', 'integer', 'exists:materia_primas,id'],
        ];
    }

    public function customValidationMessages(): array
    {
        return [
            'nombre.required'         => 'Fila :attribute: el campo "nombre" es obligatorio.',
            'nombre.string'           => 'Fila :attribute: el campo "nombre" debe ser texto.',
            'precio.required'         => 'Fila :attribute: el campo "precio" es obligatorio.',
            'precio.numeric'          => 'Fila :attribute: el campo "precio" debe ser un número válido.',
            'precio.min'              => 'Fila :attribute: el campo "precio" no puede ser negativo.',
            'stock.required'          => 'Fila :attribute: el campo "stock" es obligatorio.',
            'stock.integer'           => 'Fila :attribute: el campo "stock" debe ser un número entero.',
            'stock.min'               => 'Fila :attribute: el campo "stock" no puede ser negativo.',
            'materia_prima_id.exists' => 'Fila :attribute: el ID de materia prima no existe en el sistema.',
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
