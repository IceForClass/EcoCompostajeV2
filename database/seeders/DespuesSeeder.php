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
        for ($i = 1; $i <= 3; $i++) { 
            Despues::factory()->create([
                'registro_id' => $i,
            ]);
        }
    }
}