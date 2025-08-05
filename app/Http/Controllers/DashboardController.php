<?php

namespace App\Http\Controllers;

use App\Services\UseCases\Queries\Services\FetchMissingBySalon\Fetcher as MissingServiceFetcher;
use App\Services\UseCases\Queries\Services\FetchBySalon\Fetcher as ServiceFetcher;
use App\Services\UseCases\Queries\Masters\FetchBySalon\Fetcher as MasterFetcher;
use App\Services\UseCases\Queries\Services\FetchBySalon\Query as ServiceQuery;
use App\Services\UseCases\Queries\Services\FetchMissingBySalon\Query as MissingServiceQuery;
use App\Services\UseCases\Queries\Masters\FetchBySalon\Query as MasterQuery;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct(
        private ServiceFetcher $serviceFetcher,
        private MissingServiceFetcher $missingServiceFetcher,
        private MasterFetcher $masterFetcher
    ) {}

    public function index()
    {
        $salonId = auth()->user()->salon->id;

        $services = $this->serviceFetcher->fetch(new ServiceQuery($salonId));
        $missingServices = $this->missingServiceFetcher->fetch(new MissingServiceQuery($salonId));
        $masters = $this->masterFetcher->fetch(new MasterQuery($salonId));

        return view('dashboard', [
            'services' => $services,
            'missingServices' => $missingServices,
            'masters' => $masters,
        ]);
    }

    public function storeSalonService()
    {
        
    }
}
