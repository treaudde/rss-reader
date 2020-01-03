<?php

namespace App\Domain\Vue\Routes;

use Illuminate\Support\Facades\Route;

class AppRoutes
{
    const CONTROLLER_PATH = '\App\Domain\Vue\Http\Controllers\AppController';

    public static function routes()
    {
        Route::get('/', self::CONTROLLER_PATH.'@index');
        Route::get('/mockups', self::CONTROLLER_PATH.'@viewMockups');
    }

}
