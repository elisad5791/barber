<?php

namespace App\Services\UseCases\Commands\Payment\Cancel;

class PaymentAmountNotCorrectException extends \RuntimeException
{

    public function __construct(
        string $message = 'Не совпадает сумма платежа',
        int $code = 400,
        \Throwable $previous = null,
    ) 
    {
        parent::__construct($message, $code, $previous);
    }
}