<?php

namespace Database\Factories;

use Amaia\Base\Models\Team;
use Amaia\Base\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TeamFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Team::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user = User::get()->random()->first() ?? User::factory()->create();

        return [
            'name' => $user->name . "'s team",
            'user_id' => $user,
            'personal_team' => true,
        ];
    }
}
