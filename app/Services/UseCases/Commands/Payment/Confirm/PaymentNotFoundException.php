<?php

namespace App\Services\UseCases\Commands\Payment\Confirm;

class PaymentNotFoundException extends \RuntimeException
{

    public function __construct(
        string $message = 'Платеж не найден',
        int $code = 404,
        \Throwable $previous = null,
    ) 
    {
        parent::__construct($message, $code, $previous);
    }
}