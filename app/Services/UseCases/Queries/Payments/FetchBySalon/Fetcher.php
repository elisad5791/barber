<?php

namespace App\Services\UseCases\Queries\Payments\FetchBySalon;

use App\Services\PaymentRepositoryInterface;

class Fetcher
{
    const STATUS_NAMES = [
        'pending' => 'В обработке',
        'succeeded' => 'Выполнен',
        'canceled' => 'Отменен',
    ];

    public function __construct(
        private PaymentRepositoryInterface $repository,
    ) {}

    /**
     * @return Dto[]
     */
    public function fetch(Query $query): array
    {
        $payments = $this->repository->fetchBySalon($query->salonId);
        $payments = array_map(function($item) {
            $statusName = self::STATUS_NAMES[$item->status];
            return new Dto($item->id, $item->amount, $item->status, $statusName, $item->created_at);
        }, $payments);

        return $payments;
    }
}