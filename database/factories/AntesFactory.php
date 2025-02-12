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
        $randomTimestamp = Carbon::now()->subDays(rand(0, 30))->subHours(rand(0, 23))->subMinutes(rand(0, 59));
        return [
            'registro_id' => Registro::inRandomOrder()->first()->id ?? Registro::factory(),
            'temp_ambiente' => $this->faker->randomFloat(1, 15, 30),
            'temp_compostera' => $this->faker->randomFloat(1, 10, 40),
            'nivel_llenado' => $this->faker->randomElement([
                '0%', '12.5%', '25%', '37.5%', '50%', '62.5%', '75%', '87.5%', '100%'
            ]),
            'olor' => $this->faker->randomElement(['Sin mal olor', 'Neutral', 'Podrido', 'Otro']),
            'insectos' => $this->faker->boolean(),
            'tipos_insectos' => implode(',', $this->faker->randomElements(["larvas", "hormigas", "mosquitos", "gusanos"], 2)),
            'humedad' => $this->faker->randomElement(['Deficiente', 'Bueno', 'Excesivo']),
            'foto' => $this->faker->imageUrl(),
            'observaciones' => $this->faker->sentence(),
            'created_at' => $randomTimestamp,
            'updated_at' => $randomTimestamp->copy()->addMinutes(rand(0, 1440)),
        ];
    }
    
}