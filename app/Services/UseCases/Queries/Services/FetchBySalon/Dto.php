<?php

namespace App\Services\UseCases\Queries\Services\FetchBySalon;

class Dto
{
    public function __construct(
        public int $id,
        public string $title,
    ) {}
}