<?php

namespace App\Services\UseCases\Queries\Masters\FetchBySalon;

class Query
{
    public function __construct(public int $salonId) {}
}