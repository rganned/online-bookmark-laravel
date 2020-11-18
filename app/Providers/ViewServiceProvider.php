<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Collection;
use Auth;

class ViewServiceProvider extends ServiceProvider
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
        view()->composer('dashboard.sidebar', function ($view) {
            $user_id = Auth::user()->id;
            
            $collections = Collection::where('user_id', $user_id)->get();

            $view->with('collections', $collections);
        });
    }
}
