<?php

namespace App\Repositories;

use App\Models\Payment;
use App\Services\PaymentRepositoryInterface;

class PaymentRepository implements PaymentRepositoryInterface
{
    public function save(Payment $payment): void
    {
        $payment->save();
    }

    public function fetchByUid(string $uid): Payment
    {
        $payment = Payment::where('uid', $uid)->first();
        return $payment;
    }
}