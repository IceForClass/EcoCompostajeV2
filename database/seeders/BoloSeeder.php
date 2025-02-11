<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Bolo;

class BoloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Bolo::create([
            'nombre' => 'Bolo A',
            'descripcion' => 'Descripcion del Bolo A',
            'ciclos' => implode(',', ["ciclo1", "ciclo2", "ciclo3", "terminado"]) // Convertir a string
        ]);
        
        Bolo::create([
            'nombre' => 'Bolo B',
            'descripcion' => 'Descripcion del Bolo B',
            'ciclos' => implode(',', ["ciclo1", "ciclo2", "ciclo3", "terminado"]) // Convertir a string
        ]);
        
        Bolo::create([
            'nombre' => 'Bolo C',
            'descripcion' => 'Descripcion del Bolo C',
            'ciclos' => implode(',', ["ciclo1", "ciclo2"]) // Convertir a string
        ]);
        
    }
}
