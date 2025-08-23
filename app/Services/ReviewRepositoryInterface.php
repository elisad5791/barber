<?php

namespace App\Services;

interface ReviewRepositoryInterface
{
    public function fetchBySearch(int $salonId, int $serviceId, int $masterId): array;
}