<?php

namespace App\Repositories;

use App\Models\User;
use App\Services\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    public function save(User $user): int
    {
        $user->save();
        $userId = $user->id;
        return $userId;
    }
}