<?php

namespace Amaia\Base\Tests;

use Amaia\Base\BaseRouteServiceProvider;
use Amaia\Base\BaseServiceProvider;

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
      BaseRouteServiceProvider::class
    ];
  }

  protected function getEnvironmentSetUp($app)
  {
    // perform environment setup
  }
}
