<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;

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
            
            $cart = new Cart();
            $min_price = Product::min('price');
            $max_price = Product::max('price');
            $view->with(compact('catsGlobal','cart' ,'min_price','max_price'));
            // $view->with(compact('catsGlobal'));
            if (Auth::guard('cus')->user()) {
                $totalCart = Cart::where('cus_id', Auth::guard('cus')->user()->id)->count();

                $carts = Cart::where('cus_id', Auth::guard('cus')->user()->id)->get();

                $check = Cart::where('cus_id', Auth::guard('cus')->user()->id)->count();

                $subTotal = $carts->sum('total_price');

                $view->with(compact('totalCart', 'carts', 'check', 'subTotal'));
            } else {
                $carts = [];
                $check = 0;
                $view->with(compact('carts', 'check'));
            }
        });
    }
}