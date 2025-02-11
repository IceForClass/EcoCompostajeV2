<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Centro;
use App\Models\Compostera;

class ComposteraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tipos = ["aporte", "degradacion", "maduracion"];

        Centro::all()->each(function ($centro) use ($tipos) {
            foreach ($tipos as $tipo) {
                Compostera::create([
                    'centro_id' => $centro->id,
                    'tipo' => $tipo,
                    'ocupada' => true,
                ]);
            }
        });
    }
}