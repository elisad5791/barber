<?php

namespace App\Services\UseCases\Queries\Timeslots\FetchByMaster;

use Illuminate\Support\Carbon;

class Dto
{
    public function __construct(
        public int $id,
        public Carbon $start,
        public Carbon $finish,
        public string $status,
        public ?string $comment,
        public ?string $service_title,
    ) {}
}