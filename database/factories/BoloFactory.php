<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bolo>
 */
class BoloFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        
    
        return [
            'nombre' => $this->faker->name(),
            'descripcion' => $this->faker->text(),
            'terminado' => true,
            'final' => $this->faker->dateTimeBetween('-30 days', 'now')
        ];
    }
    
}