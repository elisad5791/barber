<?php

namespace App\Http\Controllers;

use App\Services\UseCases\Queries\Reviews\FetchBySearch\Fetcher;
use App\Services\UseCases\Queries\Reviews\FetchBySearch\Query;
use App\Services\UseCases\Queries\Salons\FetchAllShort\Fetcher as SalonFetcher;
use App\Services\UseCases\Queries\Services\FetchAllShort\Fetcher as ServiceFetcher;
use App\Services\UseCases\Queries\Masters\FetchAllShort\Fetcher as MasterFetcher;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ReviewController extends Controller
{
    public function __construct(
        private Fetcher $fetcher,
        private SalonFetcher $salonFetcher,
        private ServiceFetcher $serviceFetcher,
        private MasterFetcher $masterFetcher,
    ) {}

    public function index(Request $request): View
    {
        $salonId = (int) $request->get('salon', 0);
        $serviceId = (int) $request->get('service', 0);
        $masterId = (int) $request->get('master', 0);

        $reviews = $this->fetcher->fetch(new Query($salonId, $serviceId, $masterId));
        $salons = $this->salonFetcher->fetch();
        $services = $this->serviceFetcher->fetch();
        $masters = $this->masterFetcher->fetch();

        return view('review.index', [
            'reviews' => $reviews,
            'salons' => $salons,
            'services' => $services,
            'masters' => $masters,
            'salonId' => $salonId,
            'serviceId' => $serviceId,
            'masterId' => $masterId
        ]);
    }
}