<?php

namespace App\Services\UseCases\Commands\Timeslot\Cancel;

use App\Services\TimeslotRepositoryInterface;

class Handler
{
    public function __construct(private TimeslotRepositoryInterface $timeslotRepository) {}

    public function handle(Command $command): void
    {
        $timeslot = $this->timeslotRepository->fetchById($command->timeslotId);
        $timeslot->status = 'free';
        $timeslot->user_id = null;
        $timeslot->service_id = null;
        $timeslot->comment = null;
        $this->timeslotRepository->save($timeslot);
    }
}