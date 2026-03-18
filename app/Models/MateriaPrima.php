<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MateriaPrima extends Model
{
    protected $table = 'materias_primas';

    protected $fillable = [
        'nombre',
        'tipo',
        'color',
        'stock',
        'precio',
        'proveedor_id'
    ];
}