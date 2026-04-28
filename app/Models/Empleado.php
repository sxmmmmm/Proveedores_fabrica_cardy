<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'documento',
        'telefono',
        'correo',
        'cargo',
        'direccion',
        'ciudad'
    ];

    // Relación con materia prima
    public function materiasPrimas()
    {
        return $this->hasMany(MateriaPrima::class);
    }
}