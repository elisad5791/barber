<?php

namespace App\Http\Controllers;

use App\Http\Requests\Timeslot\DeleteRequest;
use App\Http\Requests\Timeslot\StoreRequest;
use App\Services\UseCases\Commands\Timeslot\Add\Command as StoreCommand;
use App\Services\UseCases\Commands\Timeslot\Add\Handler as StoreHandler;
use App\Services\UseCases\Commands\Timeslot\Delete\Command as DeleteCommand;
use App\Services\UseCases\Commands\Timeslot\Delete\Handler as DeleteHandler;
use App\Services\UseCases\Queries\Timeslots\FetchByMaster\Fetcher as TimeslotFetcher;
use App\Services\UseCases\Queries\Timeslots\FetchByMaster\Query as TimeslotQuery;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;

class TimeslotController extends Controller
{
    public function __construct(
        private TimeslotFetcher $timeslotFetcher,
        private StoreHandler $storeHandler,
        private DeleteHandler $deleteHandler
    ) {
    }

    public function getTimeslots(int $masterId): JsonResponse
    {
        $timeslots = $this->timeslotFetcher->fetch(new TimeslotQuery($masterId));
        $data = array_map(function ($timeslot) {
            $status = $timeslot->status;
            $title = $status == 'free' ? 'Свободно' : 'Занято - ' . $timeslot->service_title;
            $color = $status == 'free' ? '#0099ff' : '#ff3399';
            return [
                'id' => $timeslot->id,
                'title' => $title,
                'start' => $timeslot->start,
                'end' => $timeslot->finish,
                'color' => $color,
            ];
        }, $timeslots);

        return response()->json($data);
    }

    public function store(StoreRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $command = new StoreCommand($data['master_id'], $data['start'], $data['finish']);
        $this->storeHandler->handle($command);

        return redirect()->route('dashboard.master.schedule', $data['master_id']);
    }

    public function delete(DeleteRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $command = new DeleteCommand($data['master_id'], $data['start']);
        $this->deleteHandler->handle($command);
        return redirect()->route('dashboard.master.schedule', $data['master_id']);
    }
}
