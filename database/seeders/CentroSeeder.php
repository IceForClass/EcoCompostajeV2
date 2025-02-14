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
                'nombre' => 'CIFP Majada Marcial',
                "direccion" => "Calle Los Camelleros, 162, Puerto del Rosario, España"
            ]
        );
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
                'nombre' => 'Universidad de la Laguna',
                'direccion' => 'Calle Padre Herrera, s/n, La Laguna, España'
            ]
        );
        Centro::factory(9)->create();
    }
}

