<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalidaMateriaPrima extends Model
{
    use HasFactory;

    protected $table = 'salidas_materia_prima';

    protected $fillable = [
        'materia_prima_id',
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

    public function materiaPrima()
    {
        return $this->belongsTo(MateriaPrima::class, 'materia_prima_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
