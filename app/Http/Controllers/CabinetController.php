<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Services\UseCases\Queries\Timeslots\FetchByClient\Fetcher;
use App\Services\UseCases\Queries\Timeslots\FetchByClient\Query;
use App\Services\UseCases\Queries\Reviews\FetchByClient\Fetcher as ClientFetcher;
use App\Services\UseCases\Queries\Reviews\FetchByClient\Query as ClientQuery;
use App\Services\UseCases\Queries\Payments\FetchBySalon\Fetcher as PaymentFetcher;
use App\Services\UseCases\Queries\Payments\FetchBySalon\Query as PaymentQuery;

class CabinetController extends Controller
{
    public function __construct(
        private Fetcher $fetcher,
        private ClientFetcher $clientFetcher,
        private PaymentFetcher $paymentFetcher
    ) {}

    public function index(): View
    {
        $userId = auth()->id();
        $timeslots = $this->fetcher->fetch(new Query($userId));
        return view('cabinet.index', ['timeslots' => $timeslots]);
    }

    public function reviews(): View
    {
        $userId = auth()->id();
        $reviews = $this->clientFetcher->fetch(new ClientQuery($userId));
        return view('cabinet.reviews', ['reviews' => $reviews]);
    }

    public function payments(): View
    {
        $user = auth()->user();
        $salonId = $user->salon->id;
        $payments = $this->paymentFetcher->fetch(new PaymentQuery($salonId));
        return view('cabinet.payments', ['payments' => $payments]);
    }
}
