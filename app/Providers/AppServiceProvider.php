<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Cart; 

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //Share view
        View::composer('*', function ($view) {
            $user = auth()->user();
            $view->with('user', $user);

            if ($user) {
                $cart = Cart::where('user_id', $user->id)->get();
                $view->with('cart', $cart);
            }
        });
    }
}
