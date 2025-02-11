<?php

namespace Database\Factories;

use App\Models\Compostera;
use Illuminate\Database\Eloquent\Factories\Factory;

class ComposteraFactory extends Factory
{
    protected $model = Compostera::class;

    public function definition()
    {
        return [
            'tipo' => $this->faker->randomElement(['aporte', 'degradacion', 'maduracion']),
            'centro_id' => null, // Se asigna en el seeder
            'ocupada' => $this->faker->boolean(30), // 30% de probabilidad de estar ocupada
        ];
    }
}
