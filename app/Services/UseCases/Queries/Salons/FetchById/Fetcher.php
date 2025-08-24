<?php

namespace App\Services\UseCases\Queries\Salons\FetchById;

use App\Services\SalonRepositoryInterface;
use Illuminate\Support\Carbon;

class Fetcher
{
    public function __construct(
        private SalonRepositoryInterface $salonRepository,
    ) {}

    public function fetch(Query $query): Dto
    {
        $salon = $this->salonRepository->fetchById($query->salonId);
        $paidUpto = $salon->paid_upto ? Carbon::parse($salon->paid_upto) : null;

        $salonDto = new Dto(
            $salon->id,
            $salon->user_id,
            $salon->title,
            $salon->description,
            $paidUpto,
            $salon->created_at,
            $salon->updated_at
        );

        return $salonDto;
    }
}