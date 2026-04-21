<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SalidaProducto extends Model
{
    protected $table = 'salidas_productos';
    protected $fillable = [
        'producto_id',
        'cliente_id',
        'cantidad',
        'fecha',
        'usuario_nombre',
        'observacion'
    ];

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'producto_id');
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }
}