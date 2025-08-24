<?php

namespace App\Http\Middleware;

use App\Services\UseCases\Queries\Salons\FetchById\Fetcher;
use App\Services\UseCases\Queries\Salons\FetchById\Query;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Symfony\Component\HttpFoundation\Response;

class EnsureSalonIsPaid
{
    public function __construct(private Fetcher $fetcher) {}

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $salonId = $request->route('salonId');
        $salon = $this->fetcher->fetch(new Query($salonId));
        $paidUpto = $salon->paid_upto ? Carbon::parse($salon->paid_upto) : null;
        $isPaid = $paidUpto && $paidUpto >= now();

        if (!$isPaid) {
            return redirect()->route('welcome');
        }

        return $next($request);
    }
}
