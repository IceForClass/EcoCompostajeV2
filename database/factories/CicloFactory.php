<?php

namespace Database\Factories;

use App\Models\Ciclo;
use Illuminate\Database\Eloquent\Factories\Factory;

class CicloFactory extends Factory
{
    protected $model = Ciclo::class;

    public function definition()
    {
        return [
            'bolo_id' => null, // Se asigna en el seeder
            'final' => $this->faker->optional()->date(), // Puede ser nulo o una fecha aleatoria
            'terminado' => false, // Se actualiza en el seeder según el estado del bolo
        ];
    }
}
