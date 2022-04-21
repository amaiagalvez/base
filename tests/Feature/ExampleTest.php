<?php

namespace Amaia\Base\Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Amaia\Base\Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function example()
    {
        $this->assertEquals('OK', 'OK');
    }
}
