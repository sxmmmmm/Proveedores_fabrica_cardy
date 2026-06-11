<?php

namespace App\Notifications;

use Illuminate\Auth\Notifications\ResetPassword as BaseResetPassword;
use Illuminate\Notifications\Messages\MailMessage;
use App\Mail\RestablecimientoContraseniaMail;
use Illuminate\Support\Facades\Mail;

class ResetPasswordNotification extends BaseResetPassword
{
    /**
     * Envía la notificación usando nuestra plantilla corporativa de Cardy.
     */
    public function toMail($notifiable): \Illuminate\Mail\Mailable
    {
        $url = $this->resetUrl($notifiable);

        return (new RestablecimientoContraseniaMail(
            nombreUsuario: $notifiable->name ?? 'Usuario',
            resetUrl: $url
        ))->to($notifiable->email);
    }
}

