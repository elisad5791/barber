<?php

namespace App\Listeners;

use App\Events\ReservationCanceled;
use App\Mail\CancelEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendCancelNotification implements ShouldQueue
{
    public $tries = 3;

    public function handle(ReservationCanceled $event): void
    {
        $email = $event->user_email;
        $masterName = $event->master_name;
        $serviceTitle = $event->service_title;
        $salonTitle = $event->salon_title;

        Mail::to($email)->send(new CancelEmail($salonTitle, $serviceTitle, $masterName));
    }
}
