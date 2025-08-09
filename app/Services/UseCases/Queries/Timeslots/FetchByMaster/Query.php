<?php

namespace App\Services\UseCases\Queries\Timeslots\FetchByMaster;

class Query
{
    public function __construct(public int $masterId) {}
}