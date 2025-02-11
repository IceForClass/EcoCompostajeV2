<?php

namespace Database\Factories;

use App\Models\Durante;
use App\Models\Registro;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Durante>
 */
class DuranteFactory extends Factory
{
    protected $model = Durante::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'registro_id' => Registro::inRandomOrder()->first()->id ?? Registro::factory(),
            'riego' => $this->faker->boolean(),
            'remover' => $this->faker->boolean(),
            'aporte_verde' => $this->faker->boolean(),
            'cantidad_aporteV' => $this->faker->numberBetween(1, 10),
            'tipo_aporteV' => $this->faker->randomElement(['hojas', 'ramas', 'corteza']),
            'aporte_seco' => $this->faker->boolean(),
            'cantidad_aporteS' => $this->faker->numberBetween(1, 10), 
            'tipo_aporteS' => $this->faker->randomElement(['paja', 'madera', 'hojarasca']), 
            'foto' => $this->faker->imageUrl(),
            'observaciones' => $this->faker->sentence(),
        ];
    }
}