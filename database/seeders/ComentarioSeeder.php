<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Comentario;

class ComentarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    // ESTAMOS CREANDO EN CADA POST, 3 COMENTARIOS ALEATORIOS CREADOS POR USUARIOS ALEATORIOS
    public function run(): void
    {
        $posts = Post::all();
        $posts->each(function ($post) {
            Comentario::factory()->count(3)->create([
                'id_post' => $post->id,
            ]);
        });
    }
}
