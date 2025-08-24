<?php

namespace App\Services\UseCases\Commands\Payment\Create;

class Command
{
    public function __construct(public int $salon_id) {}
}