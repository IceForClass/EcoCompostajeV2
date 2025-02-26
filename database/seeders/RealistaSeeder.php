<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\Centro;
use App\Models\Compostera;
use App\Models\Bolo;
use App\Models\Ciclo;
use App\Models\Registro;
use App\Models\Antes;
use App\Models\Durante;
use App\Models\Despues;

class RealistaSeeder extends Seeder
{
    public function run()
    {
        // 1) Crear 4 Centros “reales” hardcodeados
        $centrosData = [
            [
                'tipo'      => 'publico',
                'nombre'    => 'Ies San Diego de Alcalá',
                'direccion' => 'Calle Primero de Mayo, 133, Puerto del Rosario, España',
            ],
            [
                'tipo'      => 'publico',
                'nombre'    => 'CEIP La Hubara',
                'direccion' => 'Calle Manuel Sánchez González, s/n, Puerto del Rosario, España',
            ],
            [
                'tipo'      => 'publico',
                'nombre'    => 'Los Pajeros',
                'direccion' => 'Calle Los Pajeros, s/n, Puerto del Rosario, España',
            ],
            [
                'tipo'      => 'publico',
                'nombre'    => 'CEIP El Tostón',
                'direccion' => 'Calle Lugar Muelle de los Pescadores, s/n, El Cotillo, España',
            ],
        ];

        foreach ($centrosData as $cd) {
            Centro::factory()->create($cd);
        }

        // 2) Para cada centro, creamos 3 ComposterAs (aporte, degradacion, maduracion)
        $centros = Centro::all();
        foreach ($centros as $centro) {
            Compostera::factory()->create([
                'centro_id' => $centro->id,
                'tipo'      => 'aporte',
            ]);
            Compostera::factory()->create([
                'centro_id' => $centro->id,
                'tipo'      => 'degradacion',
            ]);
            Compostera::factory()->create([
                'centro_id' => $centro->id,
                'tipo'      => 'maduracion',
            ]);
        }

        // 3) Creamos SOLO 10 bolos en total
        $bolos = Bolo::factory(10)->create();

        // 4) Para cada bolo, elegimos un centro random y sus 3 composteras
        foreach ($bolos as $bolo) {
            $centro = $centros->random(); // selecciona uno de los 4
            $compAporte      = $centro->composteras->where('tipo', 'aporte')->first();
            $compDegradacion = $centro->composteras->where('tipo', 'degradacion')->first();
            $compMaduracion  = $centro->composteras->where('tipo', 'maduracion')->first();

            // Fechas simuladas (para que en los gráficos se vean en orden)
            $startAporte = Carbon::now()->subDays(rand(40, 60)); // hace ~40-60 días
            $endAporte   = $startAporte->copy()->addDays(rand(5, 10));

            $startDegradacion = $endAporte->copy();
            $endDegradacion   = $startDegradacion->copy()->addDays(rand(5, 10));

            $startMaduracion  = $endDegradacion->copy();
            $endMaduracion    = $startMaduracion->copy()->addDays(rand(1, 5));

            // Creamos 3 ciclos (aporte, degrad, maduración)
            $cicloAporte = Ciclo::factory()->create([
                'bolo_id'       => $bolo->id,
                'compostera_id' => $compAporte->id,
                'final'         => $endAporte,
            ]);
            $cicloDegradacion = Ciclo::factory()->create([
                'bolo_id'       => $bolo->id,
                'compostera_id' => $compDegradacion->id,
                'final'         => $endDegradacion,
            ]);
            $cicloMaduracion = Ciclo::factory()->create([
                'bolo_id'       => $bolo->id,
                'compostera_id' => $compMaduracion->id,
                'final'         => $endMaduracion,
            ]);

            // 5) Cada ciclo → 10 registros. Cada registro → 3 fases (antes/durante/después)
            $this->crearRegistrosParaCiclo($cicloAporte, $startAporte, $endAporte);
            $this->crearRegistrosParaCiclo($cicloDegradacion, $startDegradacion, $endDegradacion);
            $this->crearRegistrosParaCiclo($cicloMaduracion, $startMaduracion, $endMaduracion);
        }
    }

    /**
     * Crea 10 registros para el ciclo con fechas entre $startDate y $endDate
     * y cada registro lleva Antes, Durante, Despues con la misma fecha de creación.
     */
    private function crearRegistrosParaCiclo(Ciclo $ciclo, Carbon $startDate, Carbon $endDate)
    {
        for ($i = 1; $i <= 10; $i++) {
            $fechaRegistro = Carbon::createFromTimestamp(
                rand($startDate->timestamp, $endDate->timestamp)
            );

            // Creas el registro
            $registro = Registro::factory()->create([
                'ciclo_id'       => $ciclo->id,
                'compostera_id'  => $ciclo->compostera_id,
                'created_at'     => $fechaRegistro,
                'updated_at'     => $fechaRegistro,
            ]);

            // Fases antes/durante/despues
            Antes::factory()->create([
                'registro_id' => $registro->id,
                'created_at'  => $fechaRegistro,
                'updated_at'  => $fechaRegistro,
            ]);
            Durante::factory()->create([
                'registro_id' => $registro->id,
                'created_at'  => $fechaRegistro,
                'updated_at'  => $fechaRegistro,
            ]);
            Despues::factory()->create([
                'registro_id' => $registro->id,
                'created_at'  => $fechaRegistro,
                'updated_at'  => $fechaRegistro,
            ]);
        }
    }
}
