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
        $niveles = ['ciclo1', 'ciclo2', 'ciclo3', 'terminado'];
        $nivelSeleccionado = $this->faker->numberBetween(1, count($niveles));
        $ciclos = array_slice($niveles, 0, $nivelSeleccionado);
    
        return [
            'nombre' => $this->faker->name(),
            'descripcion' => $this->faker->text(),
            'ciclos' => implode(',', $ciclos),
        ];
    }
    
}