<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CicloSeeder extends Seeder
{
    public function run()
    {
        $bolos = DB::table('bolos')->get(); // Obtener todos los bolos

        foreach ($bolos as $bolo) {
            $ciclos = ['ciclo1', 'ciclo2', 'ciclo3'];
            $estadoCiclos = [];

            foreach ($ciclos as $index => $ciclo) {
                // Insertar el ciclo
                DB::table('ciclos')->insert([
                    'bolo_id' => $bolo->id,
                    'final' => Carbon::now()->addDays($index * 7), // Simula que cada ciclo tarda 7 días
                    'terminado' => $index == 2 ? 1 : 0, // Marca como terminado solo el último ciclo
                ]);

                // Añadir el ciclo al conjunto del bolo
                $estadoCiclos[] = $ciclo;

                // Si ya ha pasado por los 3 ciclos, marcarlo como terminado
                if (count($estadoCiclos) === 3) {
                    $estadoCiclos[] = 'terminado';
                }

                // Actualizar el campo `ciclos` del bolo
                DB::table('bolos')
                    ->where('id', $bolo->id)
                    ->update(['ciclos' => implode(',', $estadoCiclos)]);
            }
        }
    }
}
