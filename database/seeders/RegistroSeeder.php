<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Registro;
use App\Models\Ciclo;
use App\Models\User;
use App\Models\Compostera;

class RegistroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ciclos = Ciclo::all();
        $usuarios = User::all();
        $composteras = Compostera::all();

        foreach ($ciclos as $ciclo) {
            for ($i = 0; $i < 5; $i++) {
                Registro::create([
                    'user_id' => $usuarios->random()->id,
                    'ciclo_id' => $ciclo->id,
                    'compostera_id' => $composteras->random()->id,
                    'fecha' => now()->subDays(rand(1, 30)),
                ]);
            }
        }
    }
}