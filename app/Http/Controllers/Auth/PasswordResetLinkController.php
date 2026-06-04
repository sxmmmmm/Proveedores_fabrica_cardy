<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\PasswordResetRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PasswordResetLinkController extends Controller
{
    /**
     * Muestra la vista (usada solo como fallback directo a /forgot-password).
     * En el flujo normal la petición llega desde el modal del login.
     */
    public function create(): View
    {
        return view('auth.forgot-password');
    }

    /**
     * Intercepta la petición de reset.
     * NO envía token ni cambia la contraseña.
     * Registra una solicitud pendiente para que el administrador la gestione.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        $user = User::where('email', $request->email)->first();

        // Siempre mostramos el mismo mensaje para no revelar si el email existe
        if (!$user) {
            return back()->with(
                'status',
                'Si ese correo está registrado, el administrador recibirá una notificación y te contactará pronto.'
            );
        }

        // Evitar solicitudes duplicadas pendientes del mismo usuario
        $yaTiene = PasswordResetRequest::where('user_id', $user->id)
            ->whereNull('resolved_at')
            ->exists();

        if (!$yaTiene) {
            PasswordResetRequest::create([
                'user_id'      => $user->id,
                'requested_at' => now(),
            ]);
        }

        return back()->with(
            'status',
            'Tu solicitud fue registrada. El administrador del sistema te asignará una nueva contraseña y recibirás un correo con las instrucciones.'
        );
    }
}
