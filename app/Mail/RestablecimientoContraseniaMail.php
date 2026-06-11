<?php
namespace App\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
class RestablecimientoContraseniaMail extends Mailable
{
    use Queueable, SerializesModels;
    public function __construct(
        public string $nombreUsuario,
        public string $resetUrl
    ) {}
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Restablecer contrasena - Fabrica Cardy'
        );
    }
    public function content(): Content
    {
        return new Content(
            view: 'emails.restablecimiento-contrasenia',
            with: [
                'nombreUsuario' => $this->nombreUsuario,
                'resetUrl' => $this->resetUrl,
            ]
        );
    }
}
