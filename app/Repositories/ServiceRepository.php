<?php

namespace App\Repositories;

use App\Models\Salon;
use App\Models\Service;
use App\Services\ServiceRepositoryInterface;

class ServiceRepository implements ServiceRepositoryInterface
{
    /**
     * @return Service[]
     */
    public function fetchAll(): array
    {
        $services = Service::all()->all();
        return $services;
    }

    /**
     * @return Service[]
     */
    public function fetchBySalon(int $salonId): array
    {
        $services = Salon::findOrFail($salonId)->services->all();
        return $services;
    }

    /**
     * @return Service[]
     */
    public function fetchMissingBySalon(int $salonId): array
    {
        $salonServices = $this->fetchBySalon($salonId);
        $allServices = $this->fetchAll();
        $missingServices = array_diff($allServices, $salonServices);
        return $missingServices;
    }
}