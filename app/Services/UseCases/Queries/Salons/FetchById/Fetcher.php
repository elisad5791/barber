<?php

namespace App\Services\UseCases\Queries\Salons\FetchById;

use App\Services\SalonRepositoryInterface;

class Fetcher
{
    public function __construct(
        private SalonRepositoryInterface $salonRepository,
    ) {}

    public function fetch(Query $query): Dto
    {
        $salon = $this->salonRepository->fetchById($query->salonId);
        $salonDto = new Dto(
            $salon->id,
            $salon->user_id,
            $salon->title,
            $salon->description,
            $salon->created_at,
            $salon->updated_at
        );

        return $salonDto;
    }
}