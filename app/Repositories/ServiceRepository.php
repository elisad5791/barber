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
        $salonServicesIds = array_column($this->fetchBySalon($salonId), 'id');
        $allServicesIds = array_column($this->fetchAll(), 'id');
        $missingServicesIds = array_diff($allServicesIds, $salonServicesIds);

        $missingServices = Service::whereIn('id', $missingServicesIds)->get()->all();
        return $missingServices;
    }
}