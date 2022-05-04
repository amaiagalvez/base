<?php

namespace Amaia\Base;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class BaseRouteServiceProvider extends ServiceProvider
{
    public const HOME = '/bas/dashboard';

    public function map()
    {
        Route::pattern('id', '\d+');

        $this->webRoutes();
        $this->baseRoutes();
        $this->testRoutes();
    }

    protected function webRoutes()
    {
        Route::middleware('web')
            ->name('base::')
            ->group(__DIR__ . '/../routes/web.php');
    }

    protected function baseRoutes()
    {
        Route::middleware(['web', 'auth:sanctum', config('jetstream.auth_session'), 'verified'])
            ->prefix('bas')
            ->name('base::')
            ->group(__DIR__ . '/../routes/base.php');
    }

    protected function testRoutes()
    {
        Route::middleware('web')
            ->prefix('bas')
            ->name('base::')
            ->group(__DIR__ . '/../routes/_test.php');
    }
}
