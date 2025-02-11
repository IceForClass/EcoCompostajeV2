<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Registro;
use App\Models\User;
use App\Models\Ciclo;
use App\Models\Compostera;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Registro>
 */
class RegistroFactory extends Factory
{
    protected $model = Registro::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id ?? User::factory(),
            'ciclo_id' => Ciclo::inRandomOrder()->first()->id ?? Ciclo::factory(),
            'compostera_id' => Compostera::inRandomOrder()->first()->id ?? Compostera::factory(),
            'fecha' => $this->faker->dateTimeBetween('-1 month', 'now'),
        ];
    }
}