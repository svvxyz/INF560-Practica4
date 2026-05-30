<?php

namespace Database\Factories;

use App\Models\Note;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Note>
 */
class NoteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categories = ['Personal', 'Trabajo', 'Estudio', 'Ideas'];

        return [
            'titulo' => fake()->sentence(3),
            'contenido' => fake()->paragraph(1),
            'categoria' => fake()->randomElement($categories),
            'fijada' => fake()->boolean(20)
        ];
    }
}
