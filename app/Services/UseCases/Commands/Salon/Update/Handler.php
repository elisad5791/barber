<?php

namespace App\Services\UseCases\Commands\Salon\Update;

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

        $salon->title = $command->title;
        $salon->description = $command->description;
        $salon->updated_at = now();
        $this->salonRepository->save($salon);
    }
}