<?php

namespace App\Services;

use App\Models\Payment;

interface PaymentRepositoryInterface
{
    public function save(Payment $payment): void;
}