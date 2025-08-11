<?php

namespace App\Repositories;

use App\Models\Salon;
use App\Services\SalonRepositoryInterface;

class SalonRepository implements SalonRepositoryInterface
{
    public function fetchAll(): array
    {
        $salons = Salon::with(['services'])->get()->all();
        return $salons;
    }

    public function fetchById(int $salonId): Salon
    {
        $salon = Salon::findOrFail($salonId);
        return $salon;
    }

    public function fetchByIdWithDetails(int $salonId): Salon
    {
        $salon = Salon::with(['services', 'masters.services'])->findOrFail($salonId);
        return $salon;
    }

    public function save(Salon $salon): void
    {
        $salon->save();
    }
}