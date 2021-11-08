<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Inertia\Inertia;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Inertia::share('errors', function (){
            return Session()->get('errors') ? Session()->get('errors')->getBag('default')->getMessages()
             : (object) [];
        });

        Inertia::share('successMessage', function (){
            return Session()->get('successMessage') ? Session()->get('successMessage') : null;
             
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
