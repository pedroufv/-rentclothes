<?php

namespace App\Providers;

use App\Helpers\Date;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class DateServiceProvider extends ServiceProvider
{
    protected $defer = true;

     /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }


    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        App::bind('date', function() {
            return new Date();
        });
    }

    /**
     * @return array
     */
    public function provides()
    {
        return [
            'date',
        ];
    }
}
