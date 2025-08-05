<?php

namespace App\Services\UseCases\Queries\Masters\FetchBySalon;

use App\Services\MasterRepositoryInterface;

class Fetcher
{
    public function __construct(
        private MasterRepositoryInterface $masterRepository,
    ) {}

    /**
     * @return Dto[]
     */
    public function fetch(Query $query): array
    {
        $masters = $this->masterRepository->fetchBySalon($query->salonId);
        $masters = array_map(function($item) {
            return new Dto($item->id, $item->name);
        }, $masters);

        return $masters;
    }
}