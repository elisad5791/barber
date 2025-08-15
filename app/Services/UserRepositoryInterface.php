<?php

namespace App\Services;

use App\Models\User;

interface UserRepositoryInterface
{
    public function save(User $user): int;
}