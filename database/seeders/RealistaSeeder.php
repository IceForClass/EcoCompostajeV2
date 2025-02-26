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

        // 2) A cada centro, crear 3 ComposterAs (aporte, degradación, maduración)
        $centros = Centro::all();
        foreach ($centros as $centro) {
            Compostera::factory()->create([
                'centro_id' => $centro->id,
                'tipo'      => 'aporte',
                'ocupada'   => false,
            ]);
            Compostera::factory()->create([
                'centro_id' => $centro->id,
                'tipo'      => 'degradacion',
                'ocupada'   => false,
            ]);
            Compostera::factory()->create([
                'centro_id' => $centro->id,
                'tipo'      => 'maduracion',
                'ocupada'   => false,
            ]);
        }

        // 3) Creamos SOLO 10 bolos en total (no 5 por cada centro)
        $bolos = Bolo::factory(10)->create();

        // 4) Para cada bolo, elegimos un centro aleatorio y creamos 3 ciclos
        foreach ($bolos as $bolo) {
            // Selecciona un centro al azar
            $centro = $centros->random();

            // Obtenemos sus 3 composteras
            $compAporte      = $centro->composteras->where('tipo', 'aporte')->first();
            $compDegradacion = $centro->composteras->where('tipo', 'degradacion')->first();
            $compMaduracion  = $centro->composteras->where('tipo', 'maduracion')->first();

            // Fechas simuladas para los ciclos
            $startAporte = Carbon::now()->subDays(rand(40, 60)); // hace 40-60 días
            $endAporte   = $startAporte->copy()->addDays(rand(5, 10));

            $startDegradacion = $endAporte->copy();
            $endDegradacion   = $startDegradacion->copy()->addDays(rand(5, 10));

            $startMaduracion  = $endDegradacion->copy();
            $endMaduracion    = $startMaduracion->copy()->addDays(rand(1, 5));

            // Ciclo aporte
            $cicloAporte = Ciclo::factory()->create([
                'bolo_id'       => $bolo->id,
                'compostera_id' => $compAporte->id,
                'final'         => $endAporte,
            ]);
            // Ciclo degradación
            $cicloDegradacion = Ciclo::factory()->create([
                'bolo_id'       => $bolo->id,
                'compostera_id' => $compDegradacion->id,
                'final'         => $endDegradacion,
            ]);
            // Ciclo maduración
            $cicloMaduracion = Ciclo::factory()->create([
                'bolo_id'       => $bolo->id,
                'compostera_id' => $compMaduracion->id,
                'final'         => $endMaduracion,
            ]);

            // 5) Cada Ciclo → 10 registros, con fechas cada 3 días
            $this->crearRegistrosParaCiclo($cicloAporte, $startAporte, $endAporte);
            $this->crearRegistrosParaCiclo($cicloDegradacion, $startDegradacion, $endDegradacion);
            $this->crearRegistrosParaCiclo($cicloMaduracion, $startMaduracion, $endMaduracion);
        }
    }

    /**
     * Crea hasta 10 registros para el ciclo, espaciados 3 días.
     * Si $fechaActual se pasa de $endDate, paramos.
     */
    private function crearRegistrosParaCiclo(Ciclo $ciclo, Carbon $startDate, Carbon $endDate)
    {
        $numRegistros = 10;
        $fechaActual = $startDate->copy();

        for ($i = 1; $i <= $numRegistros; $i++) {
            // Si sobrepasamos la fecha final, rompemos el bucle
            if ($fechaActual->greaterThan($endDate)) {
                break;
            }

            // Creamos el registro en la fecha actual
            $registro = Registro::factory()->create([
                'ciclo_id'       => $ciclo->id,
                'compostera_id'  => $ciclo->compostera_id,
                'created_at'     => $fechaActual,
                'updated_at'     => $fechaActual,
            ]);

            // Creamos Antes, Durante, Después con la misma fecha
            Antes::factory()->create([
                'registro_id' => $registro->id,
                'created_at'  => $fechaActual,
                'updated_at'  => $fechaActual,
            ]);
            Durante::factory()->create([
                'registro_id' => $registro->id,
                'created_at'  => $fechaActual,
                'updated_at'  => $fechaActual,
            ]);
            Despues::factory()->create([
                'registro_id' => $registro->id,
                'created_at'  => $fechaActual,
                'updated_at'  => $fechaActual,
            ]);

            // Avanzamos 3 días para el siguiente registro
            $fechaActual->addDays(3);
        }
    }
}
