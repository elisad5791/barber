<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Services\UseCases\Queries\Salons\FetchAll\Fetcher as SalonFetcher;

class WelcomeController extends Controller
{
    public function __construct(
        private SalonFetcher $salonFetcher,
    ) {}

    public function index(): View
    {
        $salons = $this->salonFetcher->fetch();

        return view('welcome', ['salons' => $salons]);
    }
}
