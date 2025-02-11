<?php

namespace Database\Seeders;

use App\Models\Ciclo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CicloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */    public function run(): void
    {
            $ciclo1 = Ciclo::factory(1)->create();
            $ciclo2 = Ciclo::factory(2)->create();
            $ciclo3 = Ciclo::factory(3)->create();
            $ciclo4 = Ciclo::factory(4)->create();
            foreach ($ciclo1 as $ciclo) {
                $ciclo->bolo_id = '1';
                $ciclo->save();
            }
            foreach ($ciclo2 as $ciclo) {
                $ciclo->bolo_id = '2';
                $ciclo->save();
            }
            foreach ($ciclo3 as $ciclo) {
                $ciclo->bolo_id = '3';
                $ciclo->save();
            }
            foreach ($ciclo4 as $ciclo) {
                $ciclo->bolo_id = '4';
                $ciclo->save();
            }
        }
}