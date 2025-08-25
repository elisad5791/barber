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

    public function fetchBySalon(int $salonId): array
    {
        $payments = Payment::where('salon_id', $salonId)
            ->orderBy('id', 'desc')
            ->get()->all();
        return $payments;
    }
}