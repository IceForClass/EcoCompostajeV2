<?php

namespace Database\Seeders;

use App\Models\Bolo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BoloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Bolo::create([
            'nombre' => 'Bolo A',
            'descripcion' => 'Descripción del Bolo A',
            'ciclos' => 'ciclo1',
        ]);

        Bolo::create([
            'nombre' => 'Bolo B',
            'descripcion' => 'Descripción del Bolo B',
            'ciclos' => 'ciclo2',
        ]);

        Bolo::create([
            'nombre' => 'Bolo C',
            'descripcion' => 'Descripción del Bolo C',
            'ciclos' => 'ciclo3',
        ]);

        Bolo::create([
            'nombre' => 'Bolo D',
            'descripcion' => 'Descripción del Bolo D',
            'ciclos' => 'terminado',
        ]);

        $bolos = [];

        foreach (range('E', 'Z') as $letter) {
            $bolos[] = [
                'nombre' => "Bolo $letter",
                'descripcion' => "Descripción del Bolo $letter",
                'ciclos' => "terminado", // Todos los bolos en estado "terminado"
            ];
        }

        Bolo::insert($bolos);

    }
}