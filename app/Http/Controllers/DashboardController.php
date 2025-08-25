<?php

namespace App\Http\Controllers;

use App\Http\Requests\Salon\ServiceStoreRequest;
use App\Services\UseCases\Commands\Salon\StoreService\Command;
use App\Services\UseCases\Queries\Services\FetchMissingBySalon\Fetcher as MissingServiceFetcher;
use App\Services\UseCases\Queries\Services\FetchBySalon\Fetcher as ServiceFetcher;
use App\Services\UseCases\Queries\Masters\FetchBySalon\Fetcher as MasterFetcher;
use App\Services\UseCases\Queries\Salons\FetchById\Fetcher as SalonFetcher;
use App\Services\UseCases\Queries\Services\FetchBySalon\Query as ServiceQuery;
use App\Services\UseCases\Queries\Services\FetchMissingBySalon\Query as MissingServiceQuery;
use App\Services\UseCases\Queries\Masters\FetchBySalon\Query as MasterQuery;
use App\Services\UseCases\Queries\Salons\FetchById\Query as SalonQuery;
use App\Services\UseCases\Commands\Salon\StoreService\Handler;
use App\Services\UseCases\Queries\Salons\FetchAllWithTotal\Fetcher as SalonAdminFetcher;

class DashboardController extends Controller
{
    public function __construct(
        private ServiceFetcher $serviceFetcher,
        private MissingServiceFetcher $missingServiceFetcher,
        private MasterFetcher $masterFetcher,
        private SalonFetcher $salonFetcher,
        private Handler $salonHandler,
        private SalonAdminFetcher $salonAdminFetcher
    ) {}

    public function index()
    {
        $user = auth()->user();
        
        if ($user->hasRole('owner')) {
            $salonId = $user->salon->id;
        } elseif ($user->hasRole('master')) {
            $salonId = $user->master->salon->id;
        } else {
            return redirect()->route('welcome');
        }

        $salon = $this->salonFetcher->fetch(new SalonQuery($salonId));

        $services = $this->serviceFetcher->fetch(new ServiceQuery($salonId));
        $missingServices = $this->missingServiceFetcher->fetch(new MissingServiceQuery($salonId));
        $masters = $this->masterFetcher->fetch(new MasterQuery($salonId));

        $paidUpto = $salon->paid_upto ? $salon->paid_upto->format('d.m.Y') : '-';
        $newPaidBegin = $salon->paid_upto && $salon->paid_upto >= now() 
            ? $salon->paid_upto->copy()->addDays(1) 
            : now();
        $newPaidEnd = $newPaidBegin->copy()->addDays(29);

        return view('dashboard', [
            'salonId' => $salon->id,
            'title' => $salon->title ?? 'Название не задано',
            'description' => $salon->description ?? 'Описание не задано',
            'services' => $services,
            'missingServices' => $missingServices,
            'masters' => $masters,
            'paidUpto' => $paidUpto,
            'newPaidBegin' => $newPaidBegin->format('d.m.Y'),
            'newPaidEnd' => $newPaidEnd->format('d.m.Y')
        ]);
    }

    public function storeService(ServiceStoreRequest $request)
    {
        $data = $request->validated();
        $serviceId = $data['service_id'];

        $salonId = auth()->user()->salon->id;

        $this->salonHandler->handle(new Command($salonId, $serviceId));
        
        return redirect()->route('dashboard');
    }

    public function admin()
    {
        $salons = $this->salonAdminFetcher->fetch();
        return view('dashboard-admin', ['salons' => $salons]);
    }
}
