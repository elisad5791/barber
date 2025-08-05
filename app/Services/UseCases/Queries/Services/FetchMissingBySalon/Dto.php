<?php

namespace App\Services\UseCases\Queries\Services\FetchMissingBySalon;

class Dto
{
    public function __construct(
        public int $id,
        public string $title,
    ) {}   
}