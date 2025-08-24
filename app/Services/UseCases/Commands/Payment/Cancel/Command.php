<?php

namespace App\Services\UseCases\Commands\Payment\Cancel;

class Command
{
    public function __construct(
        public string $uid,
        public int $amount
    ) {}
}