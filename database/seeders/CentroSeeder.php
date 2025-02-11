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
                'direccion' => 'Camelleros, s/n',
            ]
        );
        Centro::factory(9)->create();
    }
}

