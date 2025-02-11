<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Registro;
use App\Models\Antes;

class AntesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $registros = Registro::all();

        foreach ($registros as $registro) {
            Antes::factory(3)->create([
                'registro_id' => $registro->id,
            ]);
        }
    }
}