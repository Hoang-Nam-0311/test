<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Helper\Cart;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap(); // bs3
        // Paginator::useBootstrapFive(); // b5
        // Paginator::useBootstrapFour(); // b4

        view()->composer('*',function($view) {
            $catsGlobal = Category::isActive()->get();
            $view->with(compact('catsGlobal'));
            $cart = new Cart();
            $view->with(compact('catsGlobal','cart'));
        });
    }
}