<?php

namespace App\Repositories;

use App\Models\Review;
use App\Services\ReviewRepositoryInterface;

class ReviewRepository implements ReviewRepositoryInterface
{
    /**
     * @return \App\Models\Review[]
     */
    public function fetchBySearch(int $salonId, int $serviceId, int $masterId): array
    {
        $builder = Review::with(['user', 'salon', 'service', 'master'])->orderBy('created_at', 'desc');

        if ($salonId > 0) {
            $builder->where('salon_id', $salonId);
        }
        if ($serviceId > 0) {
            $builder->where('service_id', $serviceId);
        }
        if ($masterId > 0) {
            $builder->where('master_id', $masterId);
        }

        $reviews = $builder->get()->all();
        return $reviews;
    }

    public function save(Review $review): void
    {
        $review->save();
    }
}