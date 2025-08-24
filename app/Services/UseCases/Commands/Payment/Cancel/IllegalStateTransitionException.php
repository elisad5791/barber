<?php

namespace App\Services\UseCases\Commands\Payment\Cancel;

class IllegalStateTransitionException extends \RuntimeException
{

    public function __construct(
        string $message = 'Некорректное изменение статуса',
        int $code = 400,
        \Throwable $previous = null,
    ) 
    {
        parent::__construct($message, $code, $previous);
    }
}