<?php

namespace App\Http\Controllers;

use App\Http\Requests\Salon\UpdateRequest;
use App\Services\UseCases\Commands\Salon\Update\Command;
use App\Services\UseCases\Commands\Salon\Update\Handler;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Services\UseCases\Queries\Salons\FetchById\Fetcher;
use App\Services\UseCases\Queries\Salons\FetchById\Query;

class SalonController extends Controller
{
    public function __construct(
        private Fetcher $salonFetcher,
        private Handler $updateHandler
    ) {}

    public function edit(): View
    {
        $salonId = auth()->user()->salon->id;
        $salon = $this->salonFetcher->fetch(new Query($salonId));

        return view('admin.salon.edit', ['title' => $salon->title, 'description' => $salon->description]);
    }

    public function update(UpdateRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $salonId = auth()->user()->salon->id;

        $command = new Command($salonId, $data['title'], $data['description']);
        $this->updateHandler->handle($command);

        return redirect()->route('dashboard');
    }
}
