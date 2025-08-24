<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Exception;
use Illuminate\Support\Facades\Log;
use App\Services\UseCases\Commands\Payment\Create\Command as CreateCommand;
use App\Services\UseCases\Commands\Payment\Create\Handler as CreateHandler;

class PaymentController extends Controller
{
    public function __construct(
        private CreateHandler $storeHandler
    ) {}

    public function store(int $salonId): RedirectResponse
    {
        try {
            $confirmationUrl = $this->storeHandler->handle(new CreateCommand($salonId));
            return redirect($confirmationUrl);
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back();
        }
    }
}
