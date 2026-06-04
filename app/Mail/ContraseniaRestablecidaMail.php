<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContraseniaRestablecidaMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public string $nombreUsuario,
        public string $nuevaContrasenia
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: '🔐 Tu contraseña ha sido restablecida — Cardy'
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.contrasenia-restablecida',
        );
    }
}
