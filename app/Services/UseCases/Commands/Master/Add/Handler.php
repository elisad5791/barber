<?php

namespace App\Services\UseCases\Commands\Master\Add;

use App\Models\Master;
use App\Models\User;
use App\Services\MasterRepositoryInterface;
use App\Services\UserRepositoryInterface;
use Illuminate\Support\Facades\Hash;

class Handler
{
    public function __construct(
        private MasterRepositoryInterface $masterRepository,
        private UserRepositoryInterface $userRepository
    ) {}

    public function handle(Command $command): void
    {
        $user = new User();
        $user->name = $command->name;
        $user->email = $command->email;
        $user->password = Hash::make($command->password);
        $userId = $this->userRepository->save($user);
        $user->assignRole('master');

        $master = new Master();
        $master->salon_id = $command->salonId;
        $master->user_id = $userId;
        $master->name = $command->name;
        $master->phone = $command->phone;
        $this->masterRepository->save($master, $command->serviceIds);
    }
}