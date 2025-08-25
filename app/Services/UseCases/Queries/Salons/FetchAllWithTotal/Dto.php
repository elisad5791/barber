<?php

namespace App\Services\UseCases\Queries\Salons\FetchAllWithTotal;

class Dto
{
    public function __construct(
        public int $id,
        public int $total,
        public string $paid_upto,
        public ?string $title = null,
    ) {}
}