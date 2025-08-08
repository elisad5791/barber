<?php

namespace App\Services\UseCases\Queries\Masters\FetchById;

class ServiceDto
{
    public function __construct(
        public int $id,
        public string $title
    ) {}
}