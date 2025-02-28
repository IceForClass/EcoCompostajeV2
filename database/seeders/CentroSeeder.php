<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Centro;

class CentroSeeder extends Seeder
{
    public function run(): void
    {
        Centro::factory()->create(
            [
                'tipo' => 'publico',
                'nombre' => 'Ies San Diego de Alcala',
                'direccion' => 'Calle Primero de Mayo, 133, Puerto del Rosario, España'
            ]
        );
        Centro::factory()->create(
            [
                'tipo' => 'publico',
                'nombre' => 'CEIP La Hubara',
                'direccion' => 'Calle Manuel Sánchez González, s/n, Puerto del Rosario, España'
            ]
        );
        Centro::factory()->create(
            [
                'tipo' => 'publico',
                'nombre' => 'Los Pajeros',
                'direccion' => 'Calle Los Pajeros, s/n, Puerto del Rosario, España'
            ]
        );
        Centro::factory()->create(
            [
                'tipo' => 'publico',
                'nombre' => 'CEIP El Tostón',
                'direccion' => 'Calle Lugar Muelle de los Pescadores, s/n, El Cotillo, España'
            ]
        );
        Centro::factory()->create(
            [
                'tipo' => 'privado',
                'nombre' => 'BioCycle',
            ]
        );
        // Centro::factory(9)->create();
    }
}