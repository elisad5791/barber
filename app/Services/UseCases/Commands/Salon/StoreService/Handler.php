<?php

namespace App\Services\UseCases\Commands\Salon\StoreService;

use App\Services\SalonRepositoryInterface;

class Handler
{
    public function __construct(private SalonRepositoryInterface $salonRepository) {}

    public function handle(Command $command): void
    {
        $salon = $this->salonRepository->fetchById($command->salonId);

        if (!$salon) {
            throw new SalonNotFoundException();
        }

        $salon->services()->attach($command->serviceId);
        $this->salonRepository->save($salon);
    }
}