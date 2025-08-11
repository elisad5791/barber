<?php

namespace App\Services\UseCases\Queries\Salons\FetchAll;

use App\Services\SalonRepositoryInterface;

class Fetcher
{
    public function __construct(
        private SalonRepositoryInterface $salonRepository,
    ) {}

    public function fetch(): array
    {
        $salonObjects = $this->salonRepository->fetchAll();

        $salons = [];
        foreach ($salonObjects as $salon) {
            $salons[] = new Dto(
                $salon->id,
                $salon->user_id,
                $salon->title,
                $salon->services->all(),
                $salon->description,
                $salon->created_at,
                $salon->updated_at
            );
        }
        
        return $salons;
    }
}