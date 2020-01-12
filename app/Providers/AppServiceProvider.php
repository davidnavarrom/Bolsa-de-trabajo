<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;


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

        /**
         * SI VAS A UTILIZAR XAMPP Y UNA VERSIÓN MYSQL IGUAL O INFERIOR  A LA  5.7.7 DESCOMENTA ESTA LINEA
         */
        //Schema::defaultStringLength(191);

    }
}
