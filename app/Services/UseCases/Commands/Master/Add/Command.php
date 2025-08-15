<?php

namespace App\Services\UseCases\Commands\Master\Add;

class Command
{
    public function __construct(
        public int $salonId,
        public string $name,
        public string $email,
        public string $phone,
        public string $password,
        public array $serviceIds,
    ) {}
}