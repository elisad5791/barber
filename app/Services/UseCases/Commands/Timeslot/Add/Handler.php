<?php

namespace App\Services\UseCases\Commands\Timeslot\Add;

use App\Models\Timeslot;
use App\Services\TimeslotRepositoryInterface;
use Illuminate\Support\Carbon;

class Handler
{
    public function __construct(private TimeslotRepositoryInterface $timeslotRepository) {}

    public function handle(Command $command): void
    {
        $start = Carbon::parse($command->start)->setTimezone('UTC')->toImmutable();
        $finish = Carbon::parse($command->finish)->setTimezone('UTC')->toImmutable();
        $diff = $start->diffInHours($finish);

        $startArr = [];
        $finishArr = [];
        for ($i = 1; $i <= $diff; $i++) {
            $startArr[] = $start->addHours($i - 1);
            $finishArr[] = $start->addHours($i);
        }

        $existStarts = $this->timeslotRepository->fetchExistingStarts($startArr, $command->masterId);

        for ($i = 0; $i < count($startArr); $i++) {
            $currentStart = $startArr[$i];
            $currentFinish = $finishArr[$i];

            if (in_array($currentStart, $existStarts)) {
                continue;
            }

            $timeslot = new Timeslot();
            $timeslot->master_id = $command->masterId;
            $timeslot->start = $currentStart;
            $timeslot->finish = $currentFinish;

            $this->timeslotRepository->save($timeslot);
        }
    }
}