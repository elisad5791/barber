<?php

namespace App\Services\UseCases\Commands\Timeslot\Update;

class Command
{
    public function __construct(
        public int $timeslotId,
        public int $userId,
        public int $serviceId,
        public string $comment,
    ) {}
}