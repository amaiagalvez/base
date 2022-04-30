<?php

namespace Amaia\Base;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class BaseRouteServiceProvider extends ServiceProvider
{
    public function map()
    {
        Route::pattern('id', '\d+');

        $this->testRoutes();
    }

    protected function testRoutes()
    {
        Route::middleware('web')
            ->prefix('bas')
            ->name('base::')
            ->group(__DIR__ . '/../routes/_test.php');
    }
}
