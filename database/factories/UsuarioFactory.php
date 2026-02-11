<?php

namespace Database\Factories;

use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class UsuarioFactory extends Factory
{
    protected $model = Usuario::class;

    public function definition(): array
    {
        $login = $this->faker->unique()->userName();

        return [
            'login' => $login,
            'email' => $this->faker->unique()->safeEmail(),
            'password' => Hash::make($login), // password = login encriptado
        ];
    }
}

