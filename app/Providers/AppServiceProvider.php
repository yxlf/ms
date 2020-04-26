<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Imtigger\LaravelCustomLog\CustomLog;

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
        //
        if ($this->app->environment() == "local") {
            \DB::listen(function ($query) {
                CustomLog::debug("sql", $query->time, ['sql' => $query->sql, 'bindings' => $query->bindings]);
            });
        }
    }
}
