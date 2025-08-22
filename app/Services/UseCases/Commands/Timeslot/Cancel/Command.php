<?php

namespace App\Services\UseCases\Commands\Timeslot\Cancel;

class Command
{
    public function __construct(
        public int $timeslotId,
    ) {}
}