<?php

namespace App\Http\Controllers;

use App\Http\Requests\Master\StoreRequest;
use App\Services\UseCases\Queries\Services\FetchBySalon\Fetcher;
use App\Services\UseCases\Queries\Masters\FetchById\Fetcher as MasterFetcher;
use App\Services\UseCases\Queries\Services\FetchBySalon\Query;
use App\Services\UseCases\Queries\Masters\FetchById\Query as MasterQuery;
use App\Services\UseCases\Commands\Master\Add\Command;
use App\Services\UseCases\Commands\Master\Delete\Command as DeleteCommand;
use App\Services\UseCases\Commands\Master\Add\Handler;
use App\Services\UseCases\Commands\Master\Delete\Handler as DeleteHandler;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class MasterController extends Controller
{
    public function __construct(
        private Fetcher $serviceFetcher,
        private MasterFetcher $masterFetcher,
        private Handler $storeHandler,
        private DeleteHandler $deleteHandler
    ) {}

    public function create(): View
    {
        $salonId = auth()->user()->salon->id;
        $services = $this->serviceFetcher->fetch(new Query($salonId));

        return view('admin.master.create', ['services' => $services]);
    }

    public function store(StoreRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $salonId = auth()->user()->salon->id;

        $command = new Command($salonId, $data['name'], $data['phone'], $data['service_ids']);
        $this->storeHandler->handle($command);

        return redirect()->route('dashboard');
    }

    public function show(int $masterId): View
    {
        $master = $this->masterFetcher->fetch(new MasterQuery($masterId));

        return view('admin.master.show', [
            'name' => $master->name, 
            'phone' => $master->phone,
            'services' => $master->services
        ]);
    }

    public function schedule(int $masterId): View
    {
        $master = $this->masterFetcher->fetch(new MasterQuery($masterId));

        return view('admin.master.schedule', ['name' => $master->name]);
    }

    public function delete(int $masterId): RedirectResponse
    {
        $command = new DeleteCommand($masterId);
        $this->deleteHandler->handle($command);
        return redirect()->route('dashboard');
    }
}
