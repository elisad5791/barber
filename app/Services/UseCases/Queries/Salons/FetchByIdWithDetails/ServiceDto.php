<?php

namespace App\Services\UseCases\Queries\Salons\FetchByIdWithDetails;

class ServiceDto
{
    public function __construct(
        public int $id,
        public string $title,
        public ?array $masters = [],
    ) {}
}