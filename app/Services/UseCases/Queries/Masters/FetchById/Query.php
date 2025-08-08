<?php

namespace App\Services\UseCases\Queries\Masters\FetchById;

class Query
{
    public function __construct(public int $masterId) {}
}