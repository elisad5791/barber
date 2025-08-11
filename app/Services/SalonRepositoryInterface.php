<?php

namespace App\Services;

use App\Models\Salon;

interface SalonRepositoryInterface
{
    public function fetchAll(): array;
    public function fetchById(int $salonId): Salon;
    public function fetchByIdWithDetails(int $salonId): Salon;
    public function save(Salon $salon): void;
}