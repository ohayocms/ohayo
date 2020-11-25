<?php

namespace App\Providers;

use App\Http\Repositories\GameRepository;
use App\Http\Repositories\Interfaces\GameRepositoryInterface;
use App\Http\Repositories\Interfaces\ModRepositoryInterface;
use App\Http\Repositories\Interfaces\ServerRepositoryInterface;
use App\Http\Repositories\ModRepository;
use App\Http\Repositories\ServerRepository;
use App\Http\Services\GameService;
use App\Http\Services\Interfaces\GameServiceInterface;
use App\Http\Services\Interfaces\ModServiceInterface;
use App\Http\Services\Interfaces\ServerServiceInterface;
use App\Http\Services\ModService;
use App\Http\Services\ServerService;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            GameServiceInterface::class,
            GameService::class
        );

        $this->app->bind(
            GameRepositoryInterface::class,
            GameRepository::class
        );

        $this->app->bind(
            ModServiceInterface::class,
            ModService::class
        );

        $this->app->bind(
            ModRepositoryInterface::class,
            ModRepository::class
        );

        $this->app->bind(
            ServerServiceInterface::class,
            ServerService::class
        );

        $this->app->bind(
            ServerRepositoryInterface::class,
            ServerRepository::class
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
