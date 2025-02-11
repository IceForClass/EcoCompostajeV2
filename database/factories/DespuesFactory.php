<?php

namespace Database\Factories;

use App\Models\Despues;
use Illuminate\Database\Eloquent\Factories\Factory;

class DespuesFactory extends Factory
{
    protected $model = Despues::class;

    public function definition()
    {
        return [
            'nivel_llenado' => $this->faker->randomElement(['0%', '12.5%', '25%', '50%', '75%', '100%']),
            'foto' => $this->faker->imageUrl(),
            'observaciones' => $this->faker->sentence,
        ];
    }
}
