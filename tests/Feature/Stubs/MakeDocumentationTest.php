<?php

namespace Tests\Feature\Stubs;

use Tests\TestCase;

class MakeDocumentationTest extends TestCase
{
    /** @test */

    public function make_documentation_ok()
    {
        $this->artisan('make:documentation name')->assertExitCode(0);

        //INFO: garbitu sotutako fitxategiak
        unlink(base_path('resources/docs/1.0/name.md'));
    }
}
