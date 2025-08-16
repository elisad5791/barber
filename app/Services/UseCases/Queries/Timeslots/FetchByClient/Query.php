<?php

namespace App\Services\UseCases\Queries\Timeslots\FetchByClient;

class Query
{
    public function __construct(public int $userId) {}
}