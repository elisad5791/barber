<?php

namespace App\Services\UseCases\Queries\Salons\FetchByIdWithDetails;
use Illuminate\Support\Carbon;

class SalonDto
{
    public function __construct(
        public int $id,
        public int $user_id,
        public ?string $title = null,
        public ?string $description = null,
        public ?array $services = [],
        public ?Carbon $created_at = null,
        public ?Carbon $updated_at = null,
    ) {}
}