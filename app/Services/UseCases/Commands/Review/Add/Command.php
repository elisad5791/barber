<?php

namespace App\Services\UseCases\Commands\Review\Add;

class Command
{
    public function __construct(
        public int $userId,
        public int $salonId,
        public int $serviceId,
        public int $masterId,
        public string $content
    ) {}
}