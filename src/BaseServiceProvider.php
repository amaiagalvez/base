<?php

namespace Amaia\Base;

use Amaia\Base\Classes\Calculator;
use Amaia\Base\Console\Commands\InstallBasePackage;
use Illuminate\Support\ServiceProvider;

class BaseServiceProvider extends ServiceProvider
{
    public function register()
    {
        // Config

        $this->mergeConfigFrom(__DIR__ . '/../config/base.php', 'amaia-base-config');

        // Facades 

        $this->app->bind('calculator', function ($app) {
            return new Calculator();
        });
    }

    public function boot()
    {
        if ($this->app->runningInConsole()) {

            $this->publishes([
                __DIR__ . '/../config/base.php' => config_path('base.php'),
            ], 'amaia-base-config');
        }

        // Register the command if we are using the application via the CLI

        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallBasePackage::class,
            ]);
        }

        // Schedule the command if we are using the application via the CLI

        // if ($this->app->runningInConsole()) {
        //     $this->app->booted(function () {
        //         $schedule = $this->app->make(Schedule::class);
        //         $schedule->command('some:command')->everyMinute();
        //     });
        // }
    }
}
