<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ImportacionExitosaMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public string $entidad,
        public string $nombreUsuario
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: "✅ Importación de {$this->entidad} completada — Cardy"
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.importacion-exitosa',
        );
    }
}
