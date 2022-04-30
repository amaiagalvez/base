<?php

namespace Amaia\Base\Database\Seeders;

use Faker\Factory;
use Amaia\Base\Models\Note;
use Amaia\Base\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class Bas_DevelopmnetSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        Note::truncate();

        Schema::enableForeignKeyConstraints();

        User::factory()->has(Note::factory()->count(5), 'notes')
            ->count(10)
            ->create();

        /*
        $entities = Entity::factory()->count(10)->create();

        $entity = Entity::first();
        $entity->address = new AddressValueObject('C1', 'C2', 'C3', 'C4');
        $entity->save();
        */
    }
}
