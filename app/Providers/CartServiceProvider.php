<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\CartService;
use Illuminate\Pagination\Paginator;

class CartServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
       $this->app->singleton(CartService::class, function ($app) {
            return new CartService();
        });

    }
}

