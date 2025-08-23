<?php

namespace App\Services\UseCases\Commands\Review\Delete;

class Command
{
    public function __construct(
        public int $reviewId,
    ) {}
}