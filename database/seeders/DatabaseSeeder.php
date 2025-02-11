<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Centro;
use App\Models\Bolo;
use App\Models\Compostera;
use App\Models\Ciclo;
use App\Models\Registro;
use App\Models\Antes;
use App\Models\Durante;
use App\Models\Despues;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Crear 5 centros (3 públicos y 2 privados)
        $tipos = ['publico', 'publico', 'publico', 'privado', 'privado'];
        foreach ($tipos as $tipo) {
            $centro = Centro::factory()->create(['tipo' => $tipo]);

            // Crear 3 usuarios por centro
            $usuarios = User::factory(3)->create(['centro_id' => $centro->id]);

            // Crear 3 composteras por centro
            $composteras = collect();
            foreach (['aporte', 'degradacion', 'maduracion'] as $tipoCompostera) {
                $composteras->push(Compostera::factory()->create([
                    'centro_id' => $centro->id,
                    'tipo' => $tipoCompostera
                ]));
            }

            // Crear 3 bolos por centro
            foreach (['terminado', 'ciclo2', 'ciclo1'] as $estadoCiclo) {
                $bolo = Bolo::factory()->create(['ciclos' => $estadoCiclo]);

                // Crear ciclo relacionado
                $ciclo = Ciclo::factory()->create([
                    'bolo_id' => $bolo->id,
                    'terminado' => $estadoCiclo === 'terminado'
                ]);

                // Crear 4 registros por bolo
                for ($j = 0; $j < 4; $j++) {
                    // Seleccionar aleatoriamente el tipo de registro
                    $registroableType = $faker->randomElement([
                        Antes::class,
                        Durante::class,
                        Despues::class
                    ]);
                
                    // Crear primero el registroable (Antes, Durante o Despues)
                    $registroable = $registroableType::factory()->create();
                
                    // Ahora creamos el registro y le asignamos correctamente el `registroable_id`
                    $registro = Registro::factory()->create([
                        'ciclo_id' => $ciclo->id,
                        'compostera_id' => $composteras->random()->id,
                        'user_id' => $usuarios->random()->id,
                        'registroable_id' => $registroable->id, // Se enlaza correctamente
                        'registroable_type' => $registroableType,
                    ]);
                }
                
            }
        }
    }
}
