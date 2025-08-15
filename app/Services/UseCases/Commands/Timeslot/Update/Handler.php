<?php

namespace App\Services\UseCases\Commands\Timeslot\Update;

use App\Services\TimeslotRepositoryInterface;

class Handler
{
    public function __construct(private TimeslotRepositoryInterface $timeslotRepository) {}

    public function handle(Command $command): void
    {
        $timeslot = $this->timeslotRepository->fetchById($command->timeslotId);
        $timeslot->status = 'busy';
        $timeslot->user_id = $command->userId;
        $timeslot->service_id = $command->serviceId;
        $timeslot->comment = $command->comment;
        $this->timeslotRepository->save($timeslot);
    }
}