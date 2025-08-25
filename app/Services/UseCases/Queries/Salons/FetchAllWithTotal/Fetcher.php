<?php

namespace App\Services\UseCases\Queries\Salons\FetchAllWithTotal;

use App\Services\SalonRepositoryInterface;
use Illuminate\Support\Carbon;

class Fetcher
{
    public function __construct(
        private SalonRepositoryInterface $salonRepository,
    ) {}

    public function fetch(): array
    {
        $salonObjects = $this->salonRepository->fetchAllWithPayments();

        $salons = [];
        foreach ($salonObjects as $salon) {
            $paidUpto = $salon->paid_upto ? Carbon::parse($salon->paid_upto)->format('d.m.Y') : '-';
            $payments = $salon->payments;
            $total = 0;
            foreach ($payments as $payment) {
                $total += $payment->amount;
            }

            $salons[] = new Dto(
                $salon->id,
                $total,
                $paidUpto,
                $salon->title,
            );
        }
        
        return $salons;
    }
}