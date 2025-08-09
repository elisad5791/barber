<?php

namespace App\Services\UseCases\Commands\Timeslot\Delete;

use App\Services\TimeslotRepositoryInterface;


class Handler
{
    public function __construct(private TimeslotRepositoryInterface $timeslotRepository) {}

    public function handle(Command $command): void
    {
        $this->timeslotRepository->delete($command->masterId, $command->start);
    }
}