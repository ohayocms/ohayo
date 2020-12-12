<?php

namespace App\Providers;

use App\Http\Repositories\CurrencyRepository;
use App\Http\Repositories\GameRepository;
use App\Http\Repositories\Interfaces\CurrencyRepositoryInterface;
use App\Http\Repositories\Interfaces\GameRepositoryInterface;
use App\Http\Repositories\Interfaces\ModRepositoryInterface;
use App\Http\Repositories\Interfaces\OrderRepositoryInterface;
use App\Http\Repositories\Interfaces\ServerRepositoryInterface;
use App\Http\Repositories\Interfaces\StoreItemRepositoryInterface;
use App\Http\Repositories\Interfaces\StoreItemTypeRepositoryInterface;
use App\Http\Repositories\ModRepository;
use App\Http\Repositories\OrderRepository;
use App\Http\Repositories\ServerRepository;
use App\Http\Repositories\StoreItemRepository;
use App\Http\Repositories\StoreItemTypeRepository;
use App\Http\Services\CurrencyService;
use App\Http\Services\GameService;
use App\Http\Services\Interfaces\CurrencyServiceInterface;
use App\Http\Services\Interfaces\GameServiceInterface;
use App\Http\Services\Interfaces\ModServiceInterface;
use App\Http\Services\Interfaces\OrderServiceInterface;
use App\Http\Services\Interfaces\ServerServiceInterface;
use App\Http\Services\Interfaces\StoreItemServiceInterface;
use App\Http\Services\Interfaces\StoreItemTypeServiceInterface;
use App\Http\Services\ModService;
use App\Http\Services\OrderService;
use App\Http\Services\ServerService;
use App\Http\Services\StoreItemService;
use App\Http\Services\StoreItemTypeService;
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

        $this->app->bind(
            CurrencyServiceInterface::class,
            CurrencyService::class
        );

        $this->app->bind(
            CurrencyRepositoryInterface::class,
            CurrencyRepository::class
        );

        $this->app->bind(
            StoreItemServiceInterface::class,
            StoreItemService::class
        );

        $this->app->bind(
            StoreItemRepositoryInterface::class,
            StoreItemRepository::class
        );

        $this->app->bind(
            StoreItemTypeServiceInterface::class,
            StoreItemTypeService::class
        );

        $this->app->bind(
            StoreItemTypeRepositoryInterface::class,
            StoreItemTypeRepository::class
        );

        $this->app->bind(
            OrderServiceInterface::class,
            OrderService::class
        );

        $this->app->bind(
            OrderRepositoryInterface::class,
            OrderRepository::class
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
