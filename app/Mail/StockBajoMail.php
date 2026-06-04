<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Collection;

class StockBajoMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public string $entidad,
        public Collection $items
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: "⚠️ Alerta de stock bajo — {$this->entidad} — Cardy"
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.stock-bajo',
        );
    }
}
