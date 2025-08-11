<?php

namespace App\Services\UseCases\Queries\Salons\FetchByIdWithDetails;

class MasterDto
{
    public function __construct(
        public int $id,
        public string $name,
    ) {}
}