<?php

namespace App\Services\UseCases\Queries\Services\FetchMissingBySalon;

class Query
{
    public function __construct(public int $salonId) {}
}