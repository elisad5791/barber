<?php

namespace App\Services;

interface ServiceRepositoryInterface
{
    public function fetchAll(): array;
    public function fetchAllShort(): array;
    public function fetchBySalon(int $salonId): array;
    public function fetchMissingBySalon(int $salonId): array;
}