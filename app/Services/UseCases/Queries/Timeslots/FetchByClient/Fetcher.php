<?php

namespace App\Services\UseCases\Queries\Timeslots\FetchByClient;

use App\Services\TimeslotRepositoryInterface;
use Illuminate\Support\Carbon;

class Fetcher
{
    public function __construct(
        private TimeslotRepositoryInterface $timeslotRepository,
    ) {}

    /**
     * @return Dto[]
     */
    public function fetch(Query $query): array
    {
        $timeslots = $this->timeslotRepository->fetchByClient($query->userId);
        $timeslots = array_map(function($item) {
            return new Dto(
                $item->id,
                Carbon::parse($item->start),
                Carbon::parse($item->finish),
                $item->master->name,
                $item->service->title
            );
        }, $timeslots);

        return $timeslots;
    }
}