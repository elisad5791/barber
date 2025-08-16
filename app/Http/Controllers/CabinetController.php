<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Services\UseCases\Queries\Timeslots\FetchByClient\Fetcher;
use App\Services\UseCases\Queries\Timeslots\FetchByClient\Query;

class CabinetController extends Controller
{
    public function __construct(
        private Fetcher $fetcher
    ) {}

    public function index(): View
    {
        $userId = auth()->id();
        $timeslots = $this->fetcher->fetch(new Query($userId));
        return view('cabinet.index', ['timeslots' => $timeslots]);
    }
}
