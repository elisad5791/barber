<?php

namespace App\Services\UseCases\Queries\Timeslots\FetchByMaster;

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
        $timeslots = $this->timeslotRepository->fetchByMaster($query->masterId);
        $timeslots = array_map(function($item) {
            $serviceTitle = $item->service ? $item->service->title : null;
            return new Dto(
                $item->id,
                Carbon::parse($item->start),
                Carbon::parse($item->finish),
                $item->status,
                $item->comment,
                $serviceTitle
            );
        }, $timeslots);

        return $timeslots;
    }
}