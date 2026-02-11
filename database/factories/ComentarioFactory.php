<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Usuario;
use App\Models\Post;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comentario>
 */
class ComentarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'contenido' => $this->faker->sentence(),
            'id_usuario' => Usuario::inRandomOrder()->first()->id,
            'id_post' => Post::inRandomOrder()->first()->id
        ];
    }
}
