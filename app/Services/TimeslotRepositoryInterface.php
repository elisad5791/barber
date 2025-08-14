<?php

namespace App\Services;

use App\Models\Timeslot;

interface TimeslotRepositoryInterface
{
    public function fetchByMaster(int $masterId): array;
    public function fetchExistingStarts(array $starts, int $masterId): array;
    public function fetchById(int $timeslotId): Timeslot;
    public function save(Timeslot $timeslot): void;
    public function delete(int $masterId, string $start): void;
}