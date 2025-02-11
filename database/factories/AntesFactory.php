<?php

namespace Database\Factories;

use App\Models\Antes;
use Illuminate\Database\Eloquent\Factories\Factory;

class AntesFactory extends Factory
{
    protected $model = Antes::class;

    public function definition()
    {
        return [
            'temp_ambiente' => $this->faker->randomFloat(1, 15, 30),
            'temp_compostera' => $this->faker->randomFloat(1, 25, 70),
            'nivel_llenado' => $this->faker->randomElement(['0%', '12.5%', '25%', '50%', '75%', '100%']),
            'olor' => $this->faker->randomElement(['Sin mal olor', 'Neutral', 'Podrido', 'Otro']),
            'insectos' => $this->faker->boolean(50),
            'tipos_insectos' => implode(',', $this->faker->randomElements(['larvas', 'hormigas', 'mosquitos', 'gusanos'], rand(0, 4))),
            'humedad' => $this->faker->randomElement(['Deficiente', 'Bueno', 'Excesivo']),
            'foto' => $this->faker->imageUrl(),
            'observaciones' => $this->faker->sentence,
        ];
    }
}
