<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;

    protected $table = 'proveedores';
    
    protected $fillable = [
        'nombre',
        'empresa',
        'documento',
        'telefono',
        'fecha_nacimiento',
        'correo',
        'ciudad',
        'direccion',
        'mercancia'
    ];
}
