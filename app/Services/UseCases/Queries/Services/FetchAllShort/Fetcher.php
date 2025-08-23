<?php

namespace App\Services\UseCases\Queries\Services\FetchAllShort;

use App\Services\ServiceRepositoryInterface;

class Fetcher
{
    public function __construct(
        private ServiceRepositoryInterface $serviceRepository,
    ) {}

    public function fetch(): array
    {
        $serviceObjects = $this->serviceRepository->fetchAllShort();

        $services = [];
        foreach ($serviceObjects as $service) {
            $services[] = new Dto(
                $service->id,
                $service->title
            );
        }
        
        return $services;
    }
}