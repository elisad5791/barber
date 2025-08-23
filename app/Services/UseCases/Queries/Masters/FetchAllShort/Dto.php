<?php

namespace App\Services\UseCases\Queries\Masters\FetchAllShort;

class Dto
{
    public function __construct(
        public int $id,
        public string $name,
    ) {}
}