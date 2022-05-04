<?php

namespace Tests\Feature\base;

use Tests\TestCase;
use Amaia\Base\Models\User;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function load_welcome_route_ok()
    {
        //mix-manifest.json fitxategia bilatzen duelako
        if (!file_exists(__DIR__ . '/../../../public/mix-manifest.json')) {
            $this->app->instance('path.public', __DIR__ . '/../../..');
        }

        $response = $this->get(route('base::welcome'));

        $response->assertStatus(200);
    }

    /** @test */
    public function load_dashboad_route_ok()
    {
        $this->withoutExceptionHandling();
        $this->withoutMiddleware();

        $user = User::factory()->withPersonalTeam()->create();

        Sanctum::actingAs($user, ['*']);
        $this->actingAs($user);

        //mix-manifest.json fitxategia bilatzen duelako
        if (!file_exists(__DIR__ . '/../../../public/mix-manifest.json')) {
            $this->app->instance('path.public', __DIR__ . '/../../..');
        }

        $response = $this->get(route('base::dashboard'));

        $response->assertStatus(200);
    }

    /** @test */
    public function load_test_route_ok()
    {
        //mix-manifest.json fitxategia bilatzen duelako
        if (!file_exists(__DIR__ . '/../../../public/mix-manifest.json')) {
            $this->app->instance('path.public', __DIR__ . '/../../..');
        }

        $response = $this->get(route('base::test'));

        $response->assertStatus(200);
    }
}
