<?php

namespace App\Services\UseCases\Commands\Salon\PaidUpdate;

class Command
{
    public function __construct(
        public int $salon_id,
    ) {}
}