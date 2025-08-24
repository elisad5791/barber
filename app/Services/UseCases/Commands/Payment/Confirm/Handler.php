<?php

namespace App\Services\UseCases\Commands\Payment\Confirm;

use App\Services\PaymentRepositoryInterface;
use App\Services\UseCases\Commands\Salon\PaidUpdate\Handler as SalonHandler;
use App\Services\UseCases\Commands\Salon\PaidUpdate\Command as SalonCommand;

class Handler
{
    const STATUS_PENDING = 'pending';
    const STATUS_SUCCEED = 'succeeded';

    public function __construct(
        private PaymentRepositoryInterface $repository,
        private SalonHandler $salonHandler,
    ) {}

    public function handle(Command $command): void
    {
        $payment = $this->repository->fetchByUid($command->uid);
        
        if (empty($payment)) {
            throw new PaymentNotFoundException();
        }
        
        if ($payment->status != self::STATUS_PENDING) {
            throw new IllegalStateTransitionException();
        }

        if ($payment->amount !== $command->amount) {
            throw new PaymentAmountNotCorrectException();
        }
        
        $payment->status = self::STATUS_SUCCEED;
        $payment->confirmed_at = now();
        $this->repository->save($payment);

        $salonId = $payment->salon_id;
        $this->salonHandler->handle(new SalonCommand($salonId));
    }
}