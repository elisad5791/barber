<?php

namespace App\Mail;

use App\Services\UseCases\Queries\Timeslots\FetchById\Dto;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ReservationEmail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public Dto $timeslot)
    {}

    public function envelope(): Envelope
    {
        return new Envelope(subject: 'Запись в парикмахерскую');
    }

    public function content(): Content
    {
        return new Content(view: 'emails.reservation');
    }

    public function attachments(): array
    {
        return [];
    }
}
