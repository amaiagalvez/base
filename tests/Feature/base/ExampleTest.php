<?php

namespace Tests\Feature\base;

use Tests\TestCase;
use Amaia\Base\Models\User;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Jetstream\Http\Livewire\NavigationMenu;
use Livewire\Livewire;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function load_home_route_redirect_login_if_guest()
    {
        $response = $this->get(route('base::home'));

        $response->assertStatus(302);
        $response->assertRedirect('bas/login');

        $this->assertGuest();
    }

    /** @test */
    public function load_home_route_load_ok_if_auth()
    {
        $this->actingAs($user = User::factory()->withPersonalTeam()->create());

        $response = $this->get(route('base::home'));

        $response->assertStatus(302);
        $response->assertRedirect('bas/login');

        $this->assertAuthenticated();
        $response->assertSessionHasNoErrors();
    }

    /** @test */
    public function load_dashboad_route_ok()
    {
        setPathPublic($this->app);

        $this->actingAs($user = User::factory()->withPersonalTeam()->create());

        $response = $this->get('home');

        $response->assertStatus(200);
    }

    /** @test */
    public function load_test_card_route_ok()
    {
        setPathPublic($this->app);

        $response = $this->get(route('base::test.cards'));

        $response->assertStatus(200);
    }

    /** @test */

    public function load_test_home_route_ok()
    {
        setPathPublic($this->app);

        $response = $this->get(route('base::test.home'));

        $response->assertStatus(200);
    }
}
