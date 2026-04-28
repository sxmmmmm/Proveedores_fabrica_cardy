<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalidaProducto extends Model
{
    use HasFactory;

    protected $table = 'salidas_productos';

    protected $fillable = [
        'producto_id',
        'cliente_id',
        'cantidad',
        'fecha',
        'usuario_nombre',
        'observacion',
        'user_id',
    ];

    protected $casts = [
        'fecha'      => 'date',
        'created_at' => 'datetime',
    ];

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'producto_id');
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
