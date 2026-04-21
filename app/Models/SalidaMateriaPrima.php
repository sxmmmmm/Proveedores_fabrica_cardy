<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SalidaMateriaPrima extends Model
{
    protected $table = 'salidas_materia_prima';
    protected $fillable = [
        'materia_prima_id',
        'cantidad',
        'fecha',
        'usuario_nombre',
        'observacion'
    ];

    public function materiaPrima()
    {
        return $this->belongsTo(MateriaPrima::class, 'materia_prima_id');
    }
}