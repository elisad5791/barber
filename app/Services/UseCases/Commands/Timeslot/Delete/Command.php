<?php

namespace App\Services\UseCases\Commands\Timeslot\Delete;

class Command
{
    public function __construct(
        public int $masterId,
        public string $start
    ) {}
}