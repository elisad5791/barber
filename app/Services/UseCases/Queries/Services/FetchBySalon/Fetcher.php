<?php

namespace App\Services\UseCases\Queries\Services\FetchBySalon;

use App\Services\ServiceRepositoryInterface;

class Fetcher
{
    public function __construct(
        private ServiceRepositoryInterface $serviceRepository,
    ) {}

     /**
     * @return Dto[]
     */
    public function fetch(Query $query): array
    {
        $services = $this->serviceRepository->fetchBySalon($query->salonId);
        $services = array_map(function($item) {
            return new Dto($item->id, $item->title);
        }, $services);

        return $services;
    }
}