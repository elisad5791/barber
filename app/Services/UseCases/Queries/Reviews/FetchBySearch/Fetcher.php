<?php

namespace App\Services\UseCases\Queries\Reviews\FetchBySearch;

use App\Services\ReviewRepositoryInterface;
use Illuminate\Support\Carbon;

class Fetcher
{
    public function __construct(
        private ReviewRepositoryInterface $reviewRepository,
    ) {}

    /**
     * @return Dto[]
     */
    public function fetch(Query $query): array
    {

        $reviews = $this->reviewRepository->fetchBySearch($query->salonId, $query->serviceId, $query->masterId);
        $reviews = array_map(function($item) {
            return new Dto(
                $item->id,
                $item->content,
                $item->user->name,
                $item->salon->title,
                $item->service->title,
                $item->master->name,
                Carbon::parse($item->created_at),
            );
        }, $reviews);

        return $reviews;
    }
}