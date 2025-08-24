<?php

namespace App\Http\Middleware;

use App\Services\UseCases\Queries\Salons\FetchById\Fetcher as SalonFetcher;
use App\Services\UseCases\Queries\Salons\FetchById\Query as SalonQuery;
use App\Services\UseCases\Queries\Masters\FetchById\Fetcher as MasterFetcher;
use App\Services\UseCases\Queries\Masters\FetchById\Query as MasterQuery;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Symfony\Component\HttpFoundation\Response;

class EnsureMasterSalonIsPaid
{
    public function __construct(
        private SalonFetcher $salonFetcher,
        private MasterFetcher $masterFetcher,
    ) {}

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $masterId = $request->route('masterId');
        $master = $this->masterFetcher->fetch(new MasterQuery($masterId));
        $salonId = $master->salon_id;

        $salon = $this->salonFetcher->fetch(new SalonQuery($salonId));
        $paidUpto = $salon->paid_upto ? Carbon::parse($salon->paid_upto) : null;
        $isPaid = $paidUpto && $paidUpto >= now();

        if (!$isPaid) {
            return redirect()->route('welcome');
        }

        return $next($request);
    }
}
