<?php

use App\Http\Middleware\EnsureMasterSalonIsPaid;
use App\Http\Middleware\EnsureSalonIsPaid;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->validateCsrfTokens(except: [
            'notification',
        ]);
        $middleware->alias([
            'salon-paid' => EnsureSalonIsPaid::class,
            'master-salon-paid' => EnsureMasterSalonIsPaid::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
