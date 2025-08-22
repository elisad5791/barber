<?php

namespace App\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ReservationCanceled
{
    use Dispatchable, SerializesModels;

    public function __construct(
        public string $user_email, 
        public string $salon_title, 
        public string $service_title, 
        public string $master_name
    ) {}
}