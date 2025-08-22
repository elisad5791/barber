<?php

namespace App\Services\UseCases\Queries\Timeslots\FetchById;

use Illuminate\Support\Carbon;

class Dto
{
    public function __construct(
        public int $id,
        public Carbon $start,
        public Carbon $finish,
        public string $master_name,
        public string $salon_title,
        public ?string $service_title,
        public ?string $user_email
    ) {}
}