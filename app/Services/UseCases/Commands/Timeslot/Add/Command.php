<?php

namespace App\Services\UseCases\Commands\Timeslot\Add;

class Command
{
    public function __construct(
        public int $masterId,
        public string $start,
        public string $finish,
    ) {}
}