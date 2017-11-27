<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class Date extends Facade {
    protected static function getFacadeAccessor()
    {
        return 'date';
    }
}