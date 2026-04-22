<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MateriaPrima extends Model
{
    use HasFactory;

    protected $table = 'materia_primas';

    protected $fillable = [
        'nombre',
        'tipo',
        'color',
        'stock',
        'precio',
        'empleado_id'
    ];

    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'empleado_id', 'id');
    }
}