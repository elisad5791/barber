<?php

namespace App\Services\UseCases\Commands\Salon\PaidUpdate;

use Exception;

class SalonNotFoundException extends Exception
{
    public function __construct(
        string $message = 'Salon not found',
        int $code = 404,
        \Throwable $previous = null,
    ) {
        parent::__construct($message, $code, $previous);
    }
}