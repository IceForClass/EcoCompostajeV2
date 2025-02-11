<?php

namespace Database\Factories;

use App\Models\Despues;
use App\Models\Registro;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Despues>
 */
class DespuesFactory extends Factory
{
    protected $model = Despues::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'registro_id' => Registro::inRandomOrder()->first()->id ?? Registro::factory(),
            'nivel_llenado' => $this->faker->randomElement([
                '0%', '12.5%', '25%', '37.5%', '50%', '62.5%', '75%', '87.5%', '100%'
            ]),
            'foto' => $this->faker->imageUrl(),
            'observaciones' => $this->faker->sentence(),
        ];
    }
}