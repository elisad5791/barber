<?php

namespace App\Services\UseCases\Commands\Payment\Create;

use App\Models\Payment;
use App\Services\PaymentRepositoryInterface;
use YooKassa\Client;

class Handler
{
    const PAYMENT_AMOUNT = 500;

    public function __construct(
        private PaymentRepositoryInterface $repository,
        private Client $yooClient,
        private string $appUrl
    ) {}

    public function handle(Command $command): string
    {

        $url = $this->appUrl . '/dashboard';
        $amount = self::PAYMENT_AMOUNT;
        $data = [
            'amount' => ['value' => $amount, 'currency' => 'RUB'],
            'confirmation' => ['type' => 'redirect', 'return_url' => $url],
            'capture' => true,
        ];
        $response = $this->yooClient->createPayment($data, uniqid('', true));

        $uid = $response->getId();
        $confirmationUrl = $response->getConfirmation()->getConfirmationUrl();

        $payment = new Payment();
        $payment->uid = $uid;
        $payment->salon_id = $command->salon_id;
        $payment->status =  'pending';
        $payment->amount =  $amount;
        $this->repository->save($payment);

        return $confirmationUrl;
    }
}