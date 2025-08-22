<?php

namespace App\Services\UseCases\Commands\Timeslot\Cancel;

use App\Events\ReservationCanceled;
use App\Services\TimeslotRepositoryInterface;

class Handler
{
    public function __construct(private TimeslotRepositoryInterface $timeslotRepository) {}

    public function handle(Command $command): void
    {
        $timeslot = $this->timeslotRepository->fetchByIdWithDetails($command->timeslotId);
        $userEmail = $timeslot->user->email;
        $salonTitle = $timeslot->master->salon->title;
        $serviceTitle = $timeslot->service->title;
        $masterName = $timeslot->master->name;

        $timeslot->status = 'free';
        $timeslot->user_id = null;
        $timeslot->service_id = null;
        $timeslot->comment = null;
        $this->timeslotRepository->save($timeslot);

        ReservationCanceled::dispatch($userEmail, $salonTitle, $serviceTitle, $masterName);
    }
}