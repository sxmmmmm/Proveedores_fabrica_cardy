<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $fillable = [
        'nombre',
        'documento',
        'telefono',
        'correo',
        'cargo'
    ];

    // Relación con materia prima
    public function materias()
    {
        return $this->hasMany(MateriaPrima::class);
    }
}