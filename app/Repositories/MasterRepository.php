<?php

namespace App\Repositories;

use App\Models\Master;
use App\Models\Salon;
use App\Services\MasterRepositoryInterface;
use App\Models\Service;

class MasterRepository implements MasterRepositoryInterface
{
    /**
     * @return Service[]
     */
    public function fetchBySalon(int $salonId): array
    {
        $masters = Salon::findOrFail($salonId)->masters->all();
        return $masters;
    }

    public function save(Master $master, array $serviceIds): void
    {
        $master->save();
        $master->services()->sync($serviceIds);
    }

    public function fetchById(int $masterId): Master
    {
        $master = Master::with('services')->findOrFail($masterId);
        return $master;
    }

    public function delete(int $masterId): void
    {
        $master = $this->fetchById($masterId);
        $master->services()->detach();
        $master->delete();
    }
}