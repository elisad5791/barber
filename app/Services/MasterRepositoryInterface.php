<?php

namespace App\Services;

use App\Models\Master;

interface MasterRepositoryInterface
{
    public function fetchAllShort(): array;
    public function fetchById(int $masterId): Master;
    public function fetchBySalon(int $salonId): array;
    public function save(Master $master, array $serviceIds): void;
    public function delete(int $masterId): void;
}