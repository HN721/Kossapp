<?php

namespace App\Providers;

use App\Interfaces\BoardingHouseRepositoryInterfaces;
use App\Interfaces\CategoryRepositoryInterfaces;
use App\Interfaces\CityRepositoryInterfaces;
use App\Interfaces\TransactionRepositoryInterfaces;
use App\Repository\BoardingRepository;
use App\Repository\CategoryRepository;
use App\Repository\CityRepository;
use App\Repository\TransactionRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            CityRepositoryInterfaces::class,
            CityRepository::class
        );

        $this->app->bind(
            CategoryRepositoryInterfaces::class,
            CategoryRepository::class
        );

        $this->app->bind(
            BoardingHouseRepositoryInterfaces::class,
            BoardingRepository::class
        );
        $this->app->bind(
            TransactionRepositoryInterfaces::class,
            TransactionRepository::class
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
