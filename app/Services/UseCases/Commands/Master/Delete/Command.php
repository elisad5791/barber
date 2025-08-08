<?php

namespace App\Services\UseCases\Commands\Master\Delete;

class Command
{
    public function __construct(
        public int $masterId,
    ) {}
}