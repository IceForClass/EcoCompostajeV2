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


        $bolos = [];

        foreach (range('A', 'Z') as $letter) {
            $bolos[] = [
                'nombre' => "Bolo $letter",
                'descripcion' => "Descripción del Bolo $letter",
            ];
        }

        Bolo::insert($bolos);

    }
}