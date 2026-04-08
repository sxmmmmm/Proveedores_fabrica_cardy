<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'stock',
        'materia_prima_id'
    ];

    // Relación con materia prima
    public function materiaPrima()
    {
        return $this->belongsTo(MateriaPrima::class, 'materia_prima_id');
    }
}