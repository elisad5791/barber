<?php

namespace App\Http\Controllers;

use App\Http\Requests\Review\StoreRequest;
use App\Services\UseCases\Queries\Reviews\FetchBySearch\Fetcher;
use App\Services\UseCases\Queries\Reviews\FetchBySearch\Query;
use App\Services\UseCases\Queries\Salons\FetchAllShort\Fetcher as SalonFetcher;
use App\Services\UseCases\Queries\Services\FetchAllShort\Fetcher as ServiceFetcher;
use App\Services\UseCases\Queries\Masters\FetchAllShort\Fetcher as MasterFetcher;
use App\Services\UseCases\Commands\Review\Add\Command as ReviewCommand;
use App\Services\UseCases\Commands\Review\Add\Handler as ReviewHandler;
use App\Services\UseCases\Commands\Review\Delete\Command as DeleteReviewCommand;
use App\Services\UseCases\Commands\Review\Delete\Handler as DeleteReviewHandler;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ReviewController extends Controller
{
    public function __construct(
        private Fetcher $fetcher,
        private SalonFetcher $salonFetcher,
        private ServiceFetcher $serviceFetcher,
        private MasterFetcher $masterFetcher,
        private ReviewHandler $reviewHandler,
        private DeleteReviewHandler $deleteReviewHandler,
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

    public function store(StoreRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $userId = auth()->id();

        $command = new ReviewCommand($userId, $data['salon'], $data['service'], $data['master'], $data['content']);
        $this->reviewHandler->handle($command);

        return redirect()->route('reviews.index');
    }

    public function delete(int $reviewId): RedirectResponse
    {
        $this->deleteReviewHandler->handle(new DeleteReviewCommand($reviewId));
        return redirect()->route('cabinet.reviews');
    }
}