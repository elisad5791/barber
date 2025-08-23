<?php

namespace App\Services\UseCases\Queries\Reviews\FetchByClient;

class Query
{
    public function __construct(public int $userId) {}
}