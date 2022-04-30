<?php

namespace Tests\Feature\Stubs;

use Tests\TestCase;

class MakeDocumentationTest extends TestCase
{
    /** @test */

    public function make_documentation_ok()
    {
        $this->artisan('make:documentation name')->assertExitCode(0);

        if (file_exists('app/Models/Name.php')) {
            //INFO: garbitu sotutako fitxategiak
            unlink(base_path('resources/docs/1.0/name.md'));
        }
    }
}
