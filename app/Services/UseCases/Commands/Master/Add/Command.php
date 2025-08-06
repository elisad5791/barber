<?php

namespace App\Services\UseCases\Commands\Master\Add;

class Command
{
    public function __construct(
        public int $salonId,
        public string $name,
        public string $phone,
        public array $serviceIds,
    ) {}
}