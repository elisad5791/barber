<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Exception;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use App\Services\UseCases\Commands\Payment\Create\Command as CreateCommand;
use App\Services\UseCases\Commands\Payment\Create\Handler as CreateHandler;
use App\Services\UseCases\Commands\Payment\Confirm\Command as ConfirmCommand;
use App\Services\UseCases\Commands\Payment\Confirm\Handler as ConfirmHandler;
use App\Services\UseCases\Commands\Payment\Cancel\Command as CancelCommand;
use App\Services\UseCases\Commands\Payment\Cancel\Handler as CancelHandler;

class PaymentController extends Controller
{
    const STATUS_SUCCEED = 'succeeded';
    const STATUS_CANCELED = 'canceled';

    public function __construct(
        private CreateHandler $storeHandler,
        private ConfirmHandler $confirmHandler,
        private CancelHandler $cancelHandler,
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

    public function update(): Response
    {
        $resp = file_get_contents('php://input');
        $response = json_decode($resp, true);

        $paymentUid = $response['object']['id'] ?? '';
        $paymentEvent = $response['event'] ?? '';
        $paymentStatus = explode('.', $paymentEvent)[1] ?? '';
        $paymentAmount = (int) ($response['object']['amount']['value'] ?? 0);

        if (empty($paymentUid) || empty($paymentStatus) || empty($paymentAmount)) {
            return response('', 400);
        }

        if ($paymentStatus == self::STATUS_SUCCEED) {
            $command = new ConfirmCommand($paymentUid, $paymentAmount);
            $this->confirmHandler ->handle($command);
        } elseif ($paymentStatus == self::STATUS_CANCELED) {
            $command = new CancelCommand($paymentUid, $paymentAmount);
            $this->cancelHandler->handle($command);
        }

        return response('', 200);
    }
}
