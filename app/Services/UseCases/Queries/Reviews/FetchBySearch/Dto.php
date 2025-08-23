<?php

namespace App\Services\UseCases\Queries\Reviews\FetchBySearch;

use Illuminate\Support\Carbon;

class Dto
{
    public function __construct(
        public int $id,
        public string $content,
        public string $user_name,
        public string $salon_title,
        public string $service_title,
        public string $master_name,
        public ?Carbon $created_at
    ) {}
}