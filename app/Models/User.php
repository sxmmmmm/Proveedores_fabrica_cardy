<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function hasRole($role): bool
    {
        if (is_string($role)) {
            return $this->role && $this->role->name === $role;
        }
        return $this->role_id === $role->id;
    }

    public function hasPermission($permission): bool
    {
        if (!$this->role) {
            return false;
        }
        return $this->role->hasPermission($permission);
    }

    public function hasAnyRole($roles): bool
    {
        return collect($roles)->contains(fn($role) => $this->hasRole($role));
    }

    public function isAdmin(): bool
    {
        return $this->role && in_array($this->role->name, ['admin', 'Administrador']);
    }

    public function isEmployee(): bool
    {
        // Bodeguero tiene acceso a Empleados, Materias Primas y Productos
        return $this->role && in_array($this->role->name, ['employee', 'Empleado', 'Bodeguero', 'Vendedor']);
    }
}
