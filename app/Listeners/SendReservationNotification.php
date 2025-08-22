<?php

namespace App\Listeners;

use App\Events\ReservationCreated;
use App\Mail\ReservationEmail;
use App\Services\UseCases\Queries\Timeslots\FetchById\Fetcher;
use App\Services\UseCases\Queries\Timeslots\FetchById\Query;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendReservationNotification implements ShouldQueue
{
    public $tries = 3;

    public function __construct(private Fetcher $fetcher)
    {}

    public function handle(ReservationCreated $event): void
    {
        $timeslotId = $event->timeslotId;
        $timeslot = $this->fetcher->fetch(new Query($timeslotId));
        $email = $timeslot->user_email;
        Mail::to($email)->send(new ReservationEmail($timeslot));
    }
}
