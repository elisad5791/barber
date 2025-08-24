<?php

namespace App\Services\UseCases\Queries\Salons\FetchById;

use Illuminate\Support\Carbon;

class Dto
{
    public function __construct(
        public int $id,
        public int $user_id,
        public ?string $title = null,
        public ?string $description = null,
        public ?Carbon $paid_upto = null,
        public ?Carbon $created_at = null,
        public ?Carbon $updated_at = null,
    ) {}
}