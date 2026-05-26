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


    public function pagos()
    {
        return $this->hasMany(PagoProveedor::class);
    }

    // Total pagado a este proveedor
    public function getTotalPagadoAttribute(): float
    {
        return $this->pagos()->where('estado', 'completado')->sum('monto');
    }
}


    