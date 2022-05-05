<?php

namespace Tests\Unit\base\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Amaia\Base\Models\Note;

class NoteTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function a_note_has_a_name()
    {
        // $note = Note::factory()->create(['name' => 'Fake Name']);
        // $this->assertEquals('Fake Name', $note->name);
    }
}
