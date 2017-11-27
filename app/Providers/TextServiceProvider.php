<?php

namespace App\Providers;

use App\Helpers\Text;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class TextServiceProvider extends ServiceProvider
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
        App::bind('text', function() {
            return new Text();
        });
    }

    /**
     * @return array
     */
    public function provides()
    {
        return [
            'text',
        ];
    }
}
