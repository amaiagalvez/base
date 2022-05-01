<?php

namespace Tests\Feature\base;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function example()
    {
        $this->assertEquals('OK', 'OK');
    }

    /** @test */
    public function load_test_route_ok()
    {
        //mix-manifest.json fitxategia bilatzen duelako

        $this->app->instance('path.public', __DIR__ . '/../../..');

        $response = $this->get(route('base::test'));

        $response->assertStatus(200);
    }
}
