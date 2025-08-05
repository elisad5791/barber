<?php

namespace App\Repositories;

use App\Models\Salon;
use App\Services\SalonRepositoryInterface;

class SalonRepository implements SalonRepositoryInterface
{
    public function fetchById(int $salonId): Salon
    {
        $salon = Salon::findOrFail($salonId);
        return $salon;
    }
}