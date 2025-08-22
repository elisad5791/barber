<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CancelEmail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public string $salon_title, 
        public string $service_title, 
        public string $master_name
    )
    {}

    public function envelope(): Envelope
    {
        return new Envelope(subject: 'Отмена записи в парикмахерскую');
    }

    public function content(): Content
    {
        return new Content(view: 'emails.cancel');
    }

    public function attachments(): array
    {
        return [];
    }
}
