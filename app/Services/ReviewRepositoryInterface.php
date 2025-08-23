<?php

namespace App\Services;

use App\Models\Review;

interface ReviewRepositoryInterface
{
    public function fetchBySearch(int $salonId, int $serviceId, int $masterId): array;
    public function fetchByClient(int $userId): array;
    public function save(Review $review): void;
    public function delete(int $reviewId): void;
}