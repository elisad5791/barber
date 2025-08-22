<?php

namespace App\Services\UseCases\Queries\Timeslots\FetchById;

use App\Services\TimeslotRepositoryInterface;
use Illuminate\Support\Carbon;

class Fetcher
{
    public function __construct(
        private TimeslotRepositoryInterface $timeslotRepository,
    ) {}

    public function fetch(Query $query): Dto
    {
        $timeslot = $this->timeslotRepository->fetchByIdWithDetails($query->timeslotId);
        $dto =  new Dto(
            $timeslot->id,
            Carbon::parse($timeslot->start),
            Carbon::parse($timeslot->finish),
            $timeslot->master->name,
            $timeslot->master->salon->title,
            $timeslot->service->title,
            $timeslot->user->email
        );

        return $dto;
    }
}