<?php

namespace Amaia\Base\Database\Seeders;

use Faker\Factory;
use Amaia\Base\Models\Team;
use Amaia\Base\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //INFO: 1. has eta ondoren create

        if (!User::whereId(1)->first()) {
            $user = User::factory()
                ->create(
                    [
                        'id' => 1,
                        'name' => 'Amaia',
                        'email' => 'info@amaia.eus',
                        'email_verified_at' => now(),
                        'password' => '$2y$10$MesS2PwYSC71yviyzmFcoevvxoWXSvCumChwxWIDzaYwnnOY6jJR.', //123456
                        'remember_token' => Str::random(10),
                        'current_team_id' => 1
                    ]
                );

            // $team = Team::factory()->create(
            //     [
            //         'user_id' => $user->id,
            //         'name' => "Amaia's Team"
            //     ]
            // );
        }
    }
}
