<?php

namespace App\Services\UseCases\Queries\Salons\FetchAll;

use App\Services\SalonRepositoryInterface;
use Illuminate\Support\Carbon;

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
            $paidUpto = $salon->paid_upto ? Carbon::parse($salon->paid_upto) : null;
            $isPaid = $paidUpto && $paidUpto >= now();

            $salons[] = new Dto(
                $salon->id,
                $salon->user_id,
                $isPaid,
                $salon->title,
                $salon->description,
                $salon->services->all(),
                $salon->created_at,
                $salon->updated_at
            );
        }
        
        return $salons;
    }
}