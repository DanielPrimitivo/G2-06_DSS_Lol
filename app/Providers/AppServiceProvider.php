<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        if (config('database.default') == 'sqlite') {
            $db = app()->make('db');
            $db->connection()->getPdo()->exec("PRAGMA foreign_keys = ON");
        }
    }
}
