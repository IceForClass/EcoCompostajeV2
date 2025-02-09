<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Centro>
 */
class CentroFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->company,
            'direccion' => $this->faker->address,
            'codigo' => $this->faker->unique()->randomNumber(5), // Código aleatorio de 5 dígitos
            'tipo' => $this->faker->randomElement(['privado', 'publico']), // Enum aleatorio
            'personaResponsable' => $this->faker->optional()->name, // Puede ser nulo
        ];
    }
}
