<?php

namespace Database\Factories;

use App\Models\Registro;
use Illuminate\Database\Eloquent\Factories\Factory;

class RegistroFactory extends Factory
{
    protected $model = Registro::class;

    public function definition()
    {
        $registroableTypes = [
            \App\Models\Antes::class,
            \App\Models\Durante::class,
            \App\Models\Despues::class
        ];

        return [
            'ciclo_id' => null, // Se asigna en el seeder
            'compostera_id' => null, // Se asigna en el seeder
            'user_id' => null, // Se asigna en el seeder
            'fecha' => $this->faker->date(),

            // Asignamos aleatoriamente un tipo de registro
            'registroable_id' => null, // Se asigna en el seeder
            'registroable_type' => $this->faker->randomElement($registroableTypes),
        ];
    }
}
