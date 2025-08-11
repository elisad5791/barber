<?php

namespace App\Services\UseCases\Queries\Salons\FetchAll;

use Illuminate\Support\Carbon;

class Dto
{
    public function __construct(
        public int $id,
        public int $user_id,
        public string $title,
        public ?array $services = [],
        public ?string $description = null,
        public ?Carbon $created_at = null,
        public ?Carbon $updated_at = null,
    ) {}
}