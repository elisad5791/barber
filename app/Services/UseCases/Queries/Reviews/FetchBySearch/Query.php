<?php

namespace App\Services\UseCases\Queries\Reviews\FetchBySearch;

class Query
{
    public function __construct(
        public int $salonId,
        public int $serviceId,
        public int $masterId
    ) {}
}