<?php

namespace App\Services\UseCases\Queries\Masters\FetchById;

class Dto
{
    public function __construct(
        public int $id,
        public string $name,
        public string $phone,
        public array $services
    ) {}
}