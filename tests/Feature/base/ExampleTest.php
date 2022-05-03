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
        //mix erabiltzen badut:

        //mix-manifest.json fitxategia bilatzen duelako
        if (!file_exists(__DIR__ . '/../../../public/mix-manifest.json')) {
            $this->app->instance('path.public', __DIR__ . '/../../..');
        }

        $response = $this->get(route('base::test'));

        $response->assertStatus(200);
    }
}
