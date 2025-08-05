<?php

namespace App\Services;

interface MasterRepositoryInterface
{
    public function fetchBySalon(int $salonId): array;
}