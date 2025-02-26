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
        // 1) Crear Centros "reales" hardcodeados
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

        // 2) Para cada centro, creamos 3 ComposterAs de tipo aporte, degradacion y maduracion
        $centros = Centro::all();
        $tipos   = ['aporte', 'degradacion', 'maduracion'];

        foreach ($centros as $centro) {
            foreach ($tipos as $tipo) {
                Compostera::factory()->create([
                    'centro_id' => $centro->id,
                    'tipo'      => $tipo,
                ]);
            }
        }

        // 3) Por cada centro, creamos 5 Bolos
        foreach ($centros as $centro) {
            // Generamos 5 bolos (sin centro_id, porque no existe en la tabla bolos)
            $bolos = Bolo::factory(5)->create();

            // Obtenemos las 3 composteras de este centro
            $compAporte      = $centro->composteras->where('tipo', 'aporte')->first();
            $compDegradacion = $centro->composteras->where('tipo', 'degradacion')->first();
            $compMaduracion  = $centro->composteras->where('tipo', 'maduracion')->first();

            // 4) Por cada Bolo, creamos 3 Ciclos
            foreach ($bolos as $bolo) {
                // Fechas simuladas para cada ciclo
                $startAporte = Carbon::now()->subDays(rand(40, 60));
                $endAporte   = $startAporte->copy()->addDays(rand(5, 10));

                $startDegradacion = $endAporte->copy();
                $endDegradacion   = $startDegradacion->copy()->addDays(rand(5, 10));

                $startMaduracion  = $endDegradacion->copy();
                $endMaduracion    = $startMaduracion->copy()->addDays(rand(1, 5));

                // Ciclo aporte
                $cicloAporte = Ciclo::factory()->create([
                    'bolo_id'       => $bolo->id,
                    'compostera_id' => $compAporte->id,
                    'final'         => $endAporte,    // Este campo sí existe en la migración
                ]);

                // Ciclo degradacion
                $cicloDegradacion = Ciclo::factory()->create([
                    'bolo_id'       => $bolo->id,
                    'compostera_id' => $compDegradacion->id,
                    'final'         => $endDegradacion,
                ]);

                // Ciclo maduracion
                $cicloMaduracion = Ciclo::factory()->create([
                    'bolo_id'       => $bolo->id,
                    'compostera_id' => $compMaduracion->id,
                    'final'         => $endMaduracion,
                ]);

                // 5) Para cada ciclo, creamos 10 Registros con sus tres fases (antes/durante/después)
                $this->crearRegistrosParaCiclo($cicloAporte, $startAporte, $endAporte);
                $this->crearRegistrosParaCiclo($cicloDegradacion, $startDegradacion, $endDegradacion);
                $this->crearRegistrosParaCiclo($cicloMaduracion, $startMaduracion, $endMaduracion);
            }
        }
    }

    /**
     * Función auxiliar: crea 10 registros dentro del rango de fechas y su "antes, durante, después".
     */
    private function crearRegistrosParaCiclo(Ciclo $ciclo, Carbon $startDate, Carbon $endDate)
    {
        for ($i = 1; $i <= 10; $i++) {
            $fechaRegistro = Carbon::createFromTimestamp(
                rand($startDate->timestamp, $endDate->timestamp)
            );

            $registro = Registro::factory()->create([
                'ciclo_id'       => $ciclo->id,
                'compostera_id'  => $ciclo->compostera_id,
                // Forzamos las fechas en created/updated
                'created_at'     => $fechaRegistro,
                'updated_at'     => $fechaRegistro,
            ]);

            // Creamos las 3 fases con la misma fecha
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
