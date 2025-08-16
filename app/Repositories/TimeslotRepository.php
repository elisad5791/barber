<?php

namespace App\Repositories;

use App\Models\Master;
use App\Services\TimeslotRepositoryInterface;
use App\Models\Timeslot;

class TimeslotRepository implements TimeslotRepositoryInterface
{
    /**
     * @return Timeslot[]
     */
    public function fetchByMaster(int $masterId): array
    {
        $timeslots = Master::findOrFail($masterId)->timeslots->all();
        return $timeslots;
    }

    /**
     * @return Timeslot[]
     */
    public function fetchByClient(int $userId): array
    {
        $timeslots = Timeslot::with(['service', 'master'])
            ->where('user_id', $userId)
            ->orderBy('start', 'desc')
            ->get()
            ->all();
        return $timeslots;
    }

    /**
     * @return string[]
     */
    public function fetchExistingStarts(array $starts, int $masterId): array
    {
        $result = Timeslot::where('master_id', $masterId)
            ->whereIn('start', $starts)
            ->get()
            ->pluck('start')
            ->all();

        return $result;
    }

    public function fetchById(int $timeslotId): Timeslot
    {
        $timeslot = Timeslot::findOrFail($timeslotId);
        return $timeslot;
    }

    public function save(Timeslot $timeslot): void
    {
        $timeslot->save();
    }

    public function delete(int $masterId, string $start): void
    {
        Timeslot::where('master_id', $masterId)
            ->where('start', $start)
            ->delete();
    }
}