<?php

namespace App\Services\UseCases\Commands\Payment\Cancel;

use App\Services\PaymentRepositoryInterface;

class Handler
{
    const STATUS_PENDING = 'pending';
    const STATUS_SUCCEED = 'succeeded';
    const STATUS_CANCELED = 'canceled';

    public function __construct(
        private PaymentRepositoryInterface $repository
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

        $payment->status = self::STATUS_CANCELED;
        $this->repository->save($payment);
    }
}