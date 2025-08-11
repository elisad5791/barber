<?php

namespace App\Services\UseCases\Queries\Salons\FetchByIdWithDetails;

use App\Services\SalonRepositoryInterface;

class Fetcher
{
    public function __construct(
        private SalonRepositoryInterface $salonRepository,
    ) {}

    public function fetch(Query $query): SalonDto
    {
        $salon = $this->salonRepository->fetchByIdWithDetails($query->salonId);

        $masterData = $salon->masters->all();
        $masters = [];
        foreach ($masterData as $master) {
            $serviceIds = $master->services->pluck('id')->all();
            foreach ($serviceIds as $serviceId) {
                if (!isset($masters[$serviceId])) {
                    $masters[$serviceId] = [];
                }
                $masters[$serviceId][] = new MasterDto($master->id, $master->name);
            }
        }
        
        $serviceData = $salon->services->all();
        $services = [];
        foreach ($serviceData as $service) {
            $services[] = new ServiceDto(
                $service->id,
                $service->title,
                $masters[$service->id] ?? []
            );
        }
        
        $salonDto = new SalonDto(
            $salon->id,
            $salon->user_id,
            $salon->title,
            $salon->description,
            $services,
            $salon->created_at,
            $salon->updated_at
        );

        return $salonDto;
    }
}