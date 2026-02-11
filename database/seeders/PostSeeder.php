<?php

namespace Database\Seeders;

use App\Models\Usuario;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usuarios = Usuario::all();
        $usuarios->each(function ($usuario) {
            Post::factory()->count(3)->create([
                'id_usuario' => $usuario->id
            ]);
        });
    }
}
