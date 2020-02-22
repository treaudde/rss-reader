<?php

namespace App\Domain\RssFeed\Infrastructure\Routes;

use Illuminate\Support\Facades\Route;

class RssFeedRoutes
{
    const CONTROLLER_PATH = '\App\Domain\RssFeed\Application\Http\Controllers\RssFeedController';

    public static function routes()
    {
        Route::resource('rss-feeds', self::CONTROLLER_PATH);
    }

}
