<?php

namespace App\Domain\RssFeed\Routes;

use Illuminate\Support\Facades\Route;

class RssFeedRoutes
{
    const CONTROLLER_PATH = '\App\Domain\RssFeed\Http\Controllers\RssFeedController';

    public static function routes()
    {
        Route::resource('rss-feeds', self::CONTROLLER_PATH);
    }

}
