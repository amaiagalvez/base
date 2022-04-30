<?php

namespace Tests\Feature\Stubs;

use Tests\TestCase;

class MakeViewTest extends TestCase
{
    /** @test */

    public function make_view_ok()
    {
        $this->artisan('make:view name')->assertExitCode(0);

        if (file_exists('app/Models/Name.php')) {
            //INFO: garbitu sotutako fitxategiak
            unlink(base_path('resources/views/name/index.blade.php'));
            unlink(base_path('resources/views/name/form.blade.php'));
            rmdir(base_path('resources/views/name'));
        }
    }
}
