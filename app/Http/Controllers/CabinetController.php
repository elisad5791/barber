<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Services\UseCases\Queries\Timeslots\FetchByClient\Fetcher;
use App\Services\UseCases\Queries\Timeslots\FetchByClient\Query;
use App\Services\UseCases\Queries\Reviews\FetchByClient\Fetcher as ClientFetcher;
use App\Services\UseCases\Queries\Reviews\FetchByClient\Query as ClientQuery;

class CabinetController extends Controller
{
    public function __construct(
        private Fetcher $fetcher,
        private ClientFetcher $clientFetcher
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
}
