<?php

namespace Database\Factories;

use Amaia\Base\Models\Note;
use Amaia\Base\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class NoteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Note::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence(),
            'notes' => $this->faker->paragraph(2),
            'tags' => ['1' => $this->faker->word(), '2' => $this->faker->word()],
            'created_by' => User::first()->id ??  User::factory(),
            'updated_by' => User::first()->id ??  User::factory(),
        ];
    }
}
