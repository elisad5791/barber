<?php

namespace App\Services\UseCases\Queries\Salons\FetchAll;

use Illuminate\Support\Carbon;

class Dto
{
    public function __construct(
        public int $id,
        public int $user_id,
        public bool $is_paid,
        public ?string $title = null,
        public ?string $description = null,
        public ?array $services = [],
        public ?Carbon $created_at = null,
        public ?Carbon $updated_at = null,
    ) {}
}