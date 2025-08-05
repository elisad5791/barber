<?php

namespace App\Repositories;

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
}