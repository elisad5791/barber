<?php

namespace App\Services\UseCases\Commands\Master\Delete;

use App\Services\MasterRepositoryInterface;

class Handler
{
    public function __construct(private MasterRepositoryInterface $masterRepository) {}

    public function handle(Command $command): void
    {
        $this->masterRepository->delete($command->masterId);
    }
}