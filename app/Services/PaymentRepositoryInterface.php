<?php

namespace App\Services;

use App\Models\Payment;

interface PaymentRepositoryInterface
{
    public function fetchByUid(string $uid): Payment;
    public function save(Payment $payment): void;
}