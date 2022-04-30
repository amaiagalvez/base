<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class Bas_DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);

        if (config('app.env') == 'local') {
            $this->call(Bas_DevelopmnetSeeder::class);
        }
    }
}
