<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model

{   
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
