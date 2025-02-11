<?php

namespace Database\Seeders;

use App\Models\Despues;
use App\Models\Registro;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DespuesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $registros = Registro::all();

        foreach ($registros as $registro) {
            Despues::factory(3)->create([
                'registro_id' => $registro->id,
            ]);
        }
    }
}