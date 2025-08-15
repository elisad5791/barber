<?php

namespace App\Providers;

use App\Repositories\MasterRepository;
use App\Repositories\ServiceRepository;
use App\Repositories\SalonRepository;
use App\Repositories\TimeslotRepository;
use App\Repositories\UserRepository;
use App\Services\MasterRepositoryInterface;
use App\Services\ServiceRepositoryInterface;
use App\Services\SalonRepositoryInterface;
use App\Services\TimeslotRepositoryInterface;
use App\Services\UserRepositoryInterface;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

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
