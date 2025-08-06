<?php

namespace App\Services\UseCases\Commands\Master\Add;

use App\Models\Master;
use App\Services\MasterRepositoryInterface;

class Handler
{
    public function __construct(private MasterRepositoryInterface $masterRepository) {}

    public function handle(Command $command): void
    {
        $master = new Master();
        $master->salon_id = $command->salonId;
        $master->name = $command->name;
        $master->phone = $command->phone;

        $this->masterRepository->save($master, $command->serviceIds);
    }
}