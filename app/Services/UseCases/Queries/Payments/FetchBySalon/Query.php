<?php

namespace   App\Services\UseCases\Queries\Payments\FetchBySalon;

class Query
{
    public function __construct(public int $salonId) {}
}