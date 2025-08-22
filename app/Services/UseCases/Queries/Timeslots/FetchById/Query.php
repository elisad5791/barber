<?php

namespace App\Services\UseCases\Queries\Timeslots\FetchById;

class Query
{
    public function __construct(public int $timeslotId) {}
}