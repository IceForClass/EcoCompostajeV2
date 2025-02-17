<?php

namespace Database\Factories;

use App\Models\Durante;
use App\Models\Registro;
use Illuminate\Database\Eloquent\Factories\Factory;

class DuranteFactory extends Factory
{
    protected $model = Durante::class;

    public function definition(): array
    {
        // Definir los valores booleanos primero
        $aporteVerde = true;
        $aporteSeco = true;

        return [
            'registro_id' => Registro::inRandomOrder()->first()->id ?? Registro::factory(),
            'riego' => $this->faker->boolean(),
            'remover' => $this->faker->boolean(),
            'aporte_verde' => $aporteVerde,
            'cantidad_aporteVLitros' => $aporteVerde ? $this->faker->numberBetween(1, 10) : null,
            'cantidad_aporteVKilos' => $aporteVerde ? $this->faker->numberBetween(1, 10) : null,
            'tipo_aporteV' => $aporteVerde ? $this->faker->randomElement(['hojas', 'ramas', 'corteza']) : null,
            'aporte_seco' => $aporteSeco,
            'cantidad_aporteSLitros' => $aporteSeco ? $this->faker->numberBetween(1, 10) : null,
            'cantidad_aporteSKilos' => $aporteSeco ? $this->faker->numberBetween(1, 10) : null,
            'tipo_aporteS' => $aporteSeco ? $this->faker->randomElement(['paja', 'madera', 'hojarasca']) : null,
            'foto' => $this->faker->imageUrl(),
            'observaciones' => $this->faker->sentence(),
        ];
    }
}
