<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PasswordResetRequest extends Model
{
    public $timestamps = false;

    protected $table = 'password_reset_requests';

    protected $fillable = [
        'user_id',
        'requested_at',
        'resolved_at',
        'resolved_by',
    ];

    protected $casts = [
        'requested_at' => 'datetime',
        'resolved_at'  => 'datetime',
    ];

    /** Usuario que hizo la solicitud */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /** Administrador que la resolvió */
    public function resolver()
    {
        return $this->belongsTo(User::class, 'resolved_by');
    }

    /** Scope: solo solicitudes pendientes */
    public function scopePendientes($query)
    {
        return $query->whereNull('resolved_at');
    }
}
