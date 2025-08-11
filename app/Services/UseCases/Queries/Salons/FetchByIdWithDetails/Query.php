<?php

namespace App\Services\UseCases\Queries\Salons\FetchByIdWithDetails;

class Query
{
    public function __construct(public int $salonId) {}
}