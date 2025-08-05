<?php

namespace App\Services\UseCases\Queries\Salons\FetchById;

class Query
{
    public function __construct(public int $salonId) {}
}