<?php

namespace Tests\Feature\Stubs;

use Tests\TestCase;

class MakeAllFilesTest extends TestCase
{
    /** @test */

    public function make_all_files_ok()
    {
        $this->artisan('make:allfiles -mcrfswtd Name')->assertExitCode(0);

        //INFO: garbitu sotutako fitxategiak

        unlink(base_path('app/Http/Controllers/NameController.php'));
        unlink(base_path('app/Models/Name.php'));
        unlink(base_path('database/factories/NameFactory.php'));
        foreach (glob("database/migrations/*create*name*.php") as $filename) {
            unlink($filename);
        }
        unlink(base_path('database/seeders/NameSeeder.php'));
        unlink(base_path('resources/views/name/index.blade.php'));
        unlink(base_path('resources/views/name/form.blade.php'));
        rmdir(base_path('resources/views/name'));
        unlink(base_path('resources/docs/1.0/name.md'));
        unlink(base_path('tests/Feature/Name/CreateTest.php'));
        unlink(base_path('tests/Feature/Name/StoreTest.php'));
        unlink(base_path('tests/Feature/Name/EditTest.php'));
        unlink(base_path('tests/Feature/Name/UpdateTest.php'));
        unlink(base_path('tests/Feature/Name/DeleteTest.php'));
        rmdir(base_path('tests/Feature/Name'));
        unlink(base_path('tests/Unit/Models/NameTest.php'));
    }
}
