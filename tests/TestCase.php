<?php

namespace Tests;

use Amaia\Base\BaseServiceProvider;
use Amaia\Base\BaseRouteServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        //
    }

    protected function getPackageProviders($app)
    {
        return [
            BaseServiceProvider::class,
            BaseRouteServiceProvider::class
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        // perform environment setup
    }
}
