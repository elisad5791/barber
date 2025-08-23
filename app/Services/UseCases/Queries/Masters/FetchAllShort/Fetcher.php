<?php

namespace App\Services\UseCases\Queries\Masters\FetchAllShort;

use App\Services\MasterRepositoryInterface;

class Fetcher
{
    public function __construct(
        private MasterRepositoryInterface $masterRepository,
    ) {}

    public function fetch(): array
    {
        $masterObjects = $this->masterRepository->fetchAllShort();

        $masters = [];
        foreach ($masterObjects as $master) {
            $masters[] = new Dto(
                $master->id,
                $master->name
            );
        }
        
        return $masters;
    }
}