<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Proveedor;

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

    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class);
    }
}