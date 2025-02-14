<?php

namespace Database\Seeders;

use App\Models\Durante;
use App\Models\Registro;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DuranteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 3; $i++) { 
            Durante::factory()->create([
                'registro_id' => $i,
            ]);
        }
    }
}