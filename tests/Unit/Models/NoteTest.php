<?php

namespace Amaia\Base\Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Amaia\Base\Tests\TestCase;
use Amaia\Base\Models\Note;

class NoteTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function a_note_has_a_name()
    {
        $note = Note::factory()->create(['name' => 'Fake Name']);
        $this->assertEquals('Fake Name', $note->name);
    }
}
