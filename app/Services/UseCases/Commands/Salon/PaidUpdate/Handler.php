<?php

namespace App\Services\UseCases\Commands\Salon\PaidUpdate;

use App\Services\SalonRepositoryInterface;

class Handler
{
    public function __construct(private SalonRepositoryInterface $salonRepository) {}

    public function handle(Command $command): void
    {
        $salon = $this->salonRepository->fetchById($command->salon_id);

        if (!$salon) {
            throw new SalonNotFoundException();
        }

        $salon->paid_upto = now();
        $this->salonRepository->save($salon);
    }
}