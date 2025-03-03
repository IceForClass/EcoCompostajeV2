<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ciclo>
 */
class CicloFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'bolo_id' => \App\Models\Bolo::pluck('id')->random(),
            'final' => $this->faker->dateTimeThisYear,
            'compostera_id' => \App\Models\Compostera::pluck('id')->random()
        ];
    }
}