<?php

namespace App\Services\UseCases\Commands\Review\Delete;

use App\Services\ReviewRepositoryInterface;

class Handler
{
    public function __construct(private ReviewRepositoryInterface $reviewRepository) {}

    public function handle(Command $command): void
    {
        $this->reviewRepository->delete($command->reviewId);
    }
}