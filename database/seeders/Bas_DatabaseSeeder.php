<?php

namespace Amaia\Base\Database\Seeders;

use Illuminate\Database\Seeder;
use Amaia\Base\Database\Seeders\UsersTableSeeder;
use Amaia\Base\Database\Seeders\Bas_DevelopmnetSeeder;

class Bas_DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);

        if (config('app.env') == 'local') {
            $this->call(Bas_DevelopmnetSeeder::class);
        }
    }
}
