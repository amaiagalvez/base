<?php

namespace Tests;

use Amaia\Base\BaseRouteServiceProvider;
use Amaia\Base\BaseServiceProvider;
use Amaia\Base\Providers\AuthServiceProvider;
use Amaia\Base\Providers\FortifyServiceProvider;
use Amaia\Base\Providers\JetstreamServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
  public function setUp(): void
  {
    parent::setUp();
    // additional setup
  }

  protected function getPackageProviders($app)
  {
    return [
      BaseServiceProvider::class,
      BaseRouteServiceProvider::class,
      AuthServiceProvider::class,
      FortifyServiceProvider::class,
      JetstreamServiceProvider::class
    ];
  }

  protected function getEnvironmentSetUp($app)
  {
    // perform environment setup
  }
}
