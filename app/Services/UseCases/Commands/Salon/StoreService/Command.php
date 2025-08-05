<?php

namespace App\Services\UseCases\Commands\Salon\StoreService;

class Command
{
    public function __construct(
        public int $salonId,
        public int $serviceId,
    ) {}
}