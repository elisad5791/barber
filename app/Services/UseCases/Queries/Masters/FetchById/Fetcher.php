<?php

namespace App\Services\UseCases\Queries\Masters\FetchById;

use App\Services\MasterRepositoryInterface;

class Fetcher
{
    public function __construct(
        private MasterRepositoryInterface $masterRepository,
    ) {}

    public function fetch(Query $query): Dto
    {
        $master = $this->masterRepository->fetchById($query->masterId);

        $services = $master->services
            ->map(fn($item) => new ServiceDto($item->id, $item->title))
            ->all();

        $masterDto = new Dto(
            $master->id,
            $master->name,
            $master->phone,
            $master->user->email,
            $master->salon_id,
            $services
        );

        return $masterDto;
    }
}