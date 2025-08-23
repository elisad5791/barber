<?php

namespace App\Services\UseCases\Commands\Review\Add;

use App\Models\Review;
use App\Services\ReviewRepositoryInterface;

class Handler
{
    public function __construct(
        private ReviewRepositoryInterface $reviewRepository
    ) {}

    public function handle(Command $command): void
    {
        $review = new Review();
        $review->user_id = $command->userId;
        $review->salon_id = $command->salonId;
        $review->service_id = $command->serviceId;
        $review->master_id = $command->masterId;
        $review->content = $command->content;
        $review->created_at = now();
        $this->reviewRepository->save($review);
    }
}