<?php

namespace App\Services\UseCases\Commands\Salon\Update;

class Command
{
    public function __construct(
        public int $salonId,
        public string $title,
        public string $description
    ) {}
}