<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Services\UseCases\Queries\Salons\FetchAll\Fetcher as SalonFetcher;
use App\Services\UseCases\Queries\Salons\FetchByIdWithDetails\Fetcher as SalonByIdFetcher;
use App\Services\UseCases\Queries\Salons\FetchByIdWithDetails\Query as SalonByIdQuery;

class WelcomeController extends Controller
{
    public function __construct(
        private SalonFetcher $salonFetcher,
        private SalonByIdFetcher $salonByIdFetcher
    ) {}

    public function index(): View
    {
        $salons = $this->salonFetcher->fetch();

        return view('welcome', ['salons' => $salons]);
    }

    public function showSalon(int $salonId): View
    {
        $salon = $this->salonByIdFetcher->fetch(new SalonByIdQuery($salonId));
        return view('reservation.salon', [
            'title' => $salon->title,
            'description' => $salon->description,
            'services' => $salon->services
        ]);
    }
}
