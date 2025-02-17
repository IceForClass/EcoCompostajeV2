<?php

namespace Database\Factories;

use App\Models\Antes;
use App\Models\Registro;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Antes>
 */
class AntesFactory extends Factory
{
    protected $model = Antes::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        static $lastTimestamp = null;

        // Si es la primera vez, empezamos desde hoy
        if (!$lastTimestamp) {
            $lastTimestamp = Carbon::now();
        } else {
            // Incrementamos la última fecha generada
            $lastTimestamp = $lastTimestamp->copy()->addDays(rand(0, 3))->addHours(rand(0, 12))->addMinutes(rand(0, 59));
        }

        // Determinar si hay animales
        $animales = $this->faker->boolean();
        
        return [
            'registro_id' => Registro::inRandomOrder()->first()->id ?? Registro::factory(),
            'temp_ambiente' => $this->faker->randomFloat(1, 15, 30),
            'temp_compostera' => $this->faker->randomFloat(1, 10, 40),
            'nivel_llenado' => $this->faker->randomElement([
                '0%', '12.5%', '25%', '37.5%', '50%', '62.5%', '75%', '87.5%', '100%'
            ]),
            'olor' => $this->faker->randomElement(['sin olor', 'cuadra', 'agradable', 'desagradable']),
            'animales' => $animales,
            'tipo_animal' => $animales ? implode(',', $this->faker->randomElements(["mosca", "mosquita", "raton", "cucaracha", "larvas", "otro"], rand(1, 3))) : null,
            'humedad' => $this->faker->randomElement(['Defecto', 'Buena', 'Exceso']),
            'foto' => $this->faker->imageUrl(),
            'observaciones' => $this->faker->sentence(),
            'created_at' => $lastTimestamp,
            'updated_at' => $lastTimestamp->copy()->addMinutes(rand(0, 1440)),
        ];
    }
}
