<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Compostera;

class ComposteraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Compostera::factory()->create(
            [
                'tipo' => 'aporte',
                'centro_id' => '1',
                'ocupada' => '0',
            ]
        );
        Compostera::factory()->create(
            [
                'tipo' => 'degradacion',
                'centro_id' => '1',
                'ocupada' => '0',
            ]
        );
        Compostera::factory()->create(
            [
                'tipo' => 'maduracion',
                'centro_id' => '1',
                'ocupada' => '0',
            ]
        );
    }
}
