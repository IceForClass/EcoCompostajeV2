<?php

namespace Database\Factories;

use App\Models\Centro;
use Illuminate\Database\Eloquent\Factories\Factory;

class CentroFactory extends Factory
{
    protected $model = Centro::class;

    public function definition()
    {
        return [
            'nombre' => $this->faker->company,
            'direccion' => $this->faker->address,
            'tipo' => $this->faker->randomElement(['publico', 'privado']),
            'personaResponsable' => $this->faker->name,
        ];
    }
}
