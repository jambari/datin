<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class CsvAutoloadServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        require base_path('vendor/csv/autoload.php');
    }
}
