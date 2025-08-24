<?php

namespace App\Providers;

use App\Repositories\MasterRepository;
use App\Repositories\PaymentRepository;
use App\Repositories\ReviewRepository;
use App\Repositories\ServiceRepository;
use App\Repositories\SalonRepository;
use App\Repositories\TimeslotRepository;
use App\Repositories\UserRepository;
use App\Services\MasterRepositoryInterface;
use App\Services\PaymentRepositoryInterface;
use App\Services\ReviewRepositoryInterface;
use App\Services\ServiceRepositoryInterface;
use App\Services\SalonRepositoryInterface;
use App\Services\TimeslotRepositoryInterface;
use App\Services\UseCases\Commands\Payment\Create\Handler;
use App\Services\UserRepositoryInterface;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use YooKassa\Client;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ServiceRepositoryInterface::class, ServiceRepository::class);
        $this->app->bind(MasterRepositoryInterface::class, MasterRepository::class);
        $this->app->bind(SalonRepositoryInterface::class, SalonRepository::class);
        $this->app->bind(TimeslotRepositoryInterface::class, TimeslotRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(ReviewRepositoryInterface::class, ReviewRepository::class);
        $this->app->bind(PaymentRepositoryInterface::class, PaymentRepository::class);

        $this->app->bind(Client::class, function() {
            $client = new Client();
            $client->setAuth(config('custom.yookassaId'), config('custom.yookassaSecret'));
            return $client;
        });

        $this->app->bind(Handler::class, function ($app) {
            return new Handler(
                $app->make(PaymentRepositoryInterface::class),
                $app->make(Client::class),
                config('app.url')
            );
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::before(function ($user, $ability) {
            return $user->hasRole('admin') ? true : null;
        });
    }
}
