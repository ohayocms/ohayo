<?php

namespace App\Providers;

use App\Http\Repositories\GameRepository;
use App\Http\Repositories\Interfaces\GameRepositoryInterface;
use App\Http\Services\GameService;
use App\Http\Services\Interfaces\GameServiceInterface;
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
