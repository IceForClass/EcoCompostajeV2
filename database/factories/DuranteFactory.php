<?php

namespace Database\Factories;

use App\Models\Durante;
use Illuminate\Database\Eloquent\Factories\Factory;

class DuranteFactory extends Factory
{
    protected $model = Durante::class;

    public function definition()
    {
        return [
            'riego' => $this->faker->boolean(),
            'remover' => $this->faker->boolean(),
            'aporte_verde' => $this->faker->boolean(),
            'cantidad_aporteV' => $this->faker->numberBetween(1, 10),
            'tipo_aporteV' => $this->faker->word,
            'aporte_seco' => $this->faker->boolean(),
            'cantidad_aporteS' => $this->faker->numberBetween(1, 10),
            'tipo_aporteS' => $this->faker->word,
            'foto' => $this->faker->imageUrl(),
            'observaciones' => $this->faker->sentence,
        ];
    }
}
