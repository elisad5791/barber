<?php

namespace App\Services\UseCases\Queries\Payments\FetchBySalon;

use Illuminate\Support\Carbon;

class Dto
{
    public function __construct(
        public int $id,
        public int $amount,
        public string $status,
        public string $status_name,
        public ?Carbon $created_at,
    ) {}
}