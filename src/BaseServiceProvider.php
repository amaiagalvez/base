<?php

namespace Amaia\Base;

use Livewire\Livewire;
use Amaia\Base\Classes\Calculator;
use Amaia\Base\View\Components\Card;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Amaia\Base\View\Components\AppLayout;
use Amaia\Base\View\Components\GuestLayout;
use Illuminate\Console\Scheduling\Schedule;
use Amaia\Base\Providers\AuthServiceProvider;
use Amaia\Base\Providers\FortifyServiceProvider;
use Amaia\Base\Providers\JetstreamServiceProvider;
use Amaia\Base\Console\Commands\InstallBasePackage;
use Amaia\Base\Console\Commands\Stubs\MakeViewCommand;
use Amaia\Base\Console\Commands\Stubs\MakeAllFilesCommand;
use Amaia\Base\Console\Commands\Stubs\MakePresenterCommand;
use Amaia\Base\Console\Commands\Stubs\MakeDocumentationCommand;
use Laravel\Sanctum\SanctumServiceProvider;

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

            // Config

            $this->publishes([
                __DIR__ . '/../config' => config_path(''),
            ], 'amaia-base-config');

            // Migrations

            if (!class_exists('CreateNotesTable')) {
                $this->publishes([
                    __DIR__ . '/../database/migrations' => database_path('migrations'),
                    // you can add any number of migrations here
                ], 'amaia-base-migrations');
            }

            /* Files */

            $this->publishes(
                [
                    __DIR__ . '/../base_files_projects' => base_path('')
                ],
                'amaia-base-files'
            );

            /* Stubs */

            $this->publishes(
                [
                    __DIR__ . '/../stubs' => base_path('stubs')
                ],
                'amaia-base-stubs'
            );

            /* Tests */

            $this->publishes(
                [
                    __DIR__ . '/../tests/Feature/base' => base_path('tests/Feature/base'),
                    __DIR__ . '/../tests/Unit/base' => base_path('tests/Unit/base'),
                ],
                'amaia-base-tests'
            );
        }

        // Routes 

        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
        $this->loadRoutesFrom(__DIR__ . '/../routes/base.php');
        $this->loadRoutesFrom(__DIR__ . '/../routes/_test.php');

        // Migrations

        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        // Views

        $this->loadViewsFrom((__DIR__ . '/../resources/views'), 'base');
        $this->loadViewsFrom((__DIR__ . '/../resources/views'), '');

        // ViewComponents

        Blade::component('app-layout', AppLayout::class);
        Blade::component('guest-layout', GuestLayout::class);
        Blade::component('card', Card::class);

        // Livewire

        //Livewire::component('navigation-menu', NavigationMenu::class);

        // Providers

        $this->app->register(AuthServiceProvider::class);
        $this->app->register(FortifyServiceProvider::class);
        $this->app->register(JetstreamServiceProvider::class);
        $this->app->register(SanctumServiceProvider::class);

        // Register the command if we are using the application via the CLI

        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallBasePackage::class,
                MakeAllFilesCommand::class,
                MakeDocumentationCommand::class,
                MakePresenterCommand::class,
                MakeViewCommand::class
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
