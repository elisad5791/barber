<?php

namespace App\Services;

use App\Models\Salon;

interface SalonRepositoryInterface
{
    public function fetchById(int $salonId): Salon;
    public function save(Salon $salon): void;
}