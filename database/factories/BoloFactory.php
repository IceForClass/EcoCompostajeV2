<?php

namespace Database\Factories;

use App\Models\Bolo;
use Illuminate\Database\Eloquent\Factories\Factory;

class BoloFactory extends Factory
{
    protected $model = Bolo::class;

    public function definition()
    {
        return [
            'nombre' => $this->faker->word,
            'descripcion' => $this->faker->sentence,
            'ciclos' => 'ciclo1', // Se ajusta en el seeder
        ];
    }
}
