<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PagoProveedor extends Model
{
    use HasFactory;

    protected $table = 'pagos_proveedores';

    protected $fillable = [
        'proveedor_id',
        'monto',
        'fecha_pago',
        'metodo_pago',
        'referencia',
        'concepto',
        'estado',
        'registrado_por',
    ];

    protected $casts = [
        'fecha_pago' => 'date',
        'monto'      => 'decimal:2',
    ];

    // Relación: un pago pertenece a un proveedor
    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class);
    }

    // Relación: un pago fue registrado por un usuario
    public function registrador()
    {
        return $this->belongsTo(User::class, 'registrado_por');
    }

    // Etiquetas legibles para el método de pago
    public function getMetodoPagoLabelAttribute(): string
    {
        return match($this->metodo_pago) {
            'efectivo'      => 'Efectivo',
            'transferencia' => 'Transferencia bancaria',
            'cheque'        => 'Cheque',
            'nequi'         => 'Nequi',
            'daviplata'     => 'Daviplata',
            'otro'          => 'Otro',
            default         => ucfirst($this->metodo_pago),
        };
    }
}