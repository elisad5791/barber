<?php

namespace App\Services\UseCases\Queries\Salons\FetchAllShort;

use App\Services\SalonRepositoryInterface;

class Fetcher
{
    public function __construct(
        private SalonRepositoryInterface $salonRepository,
    ) {}

    public function fetch(): array
    {
        $salonObjects = $this->salonRepository->fetchAllShort();

        $salons = [];
        foreach ($salonObjects as $salon) {
            $salons[] = new Dto(
                $salon->id,
                $salon->title
            );
        }
        
        return $salons;
    }
}