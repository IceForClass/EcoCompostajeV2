<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Antes;
use App\Models\Registro;

class AntesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Genera un before para cada registro existente
        $registros = Registro::all();
        foreach ($registros as $registro) {
            Antes::factory()->create(['registro_id' => $registro->id]);
        }
    }
}
