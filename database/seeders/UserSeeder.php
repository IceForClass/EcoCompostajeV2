<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Centro;

class UserSeeder extends Seeder
{
    public function run(): void
    {

        // Crear 9 usuarios adicionales y asignarles centros aleatorios
        // User::factory(9)->create()->each(function ($user) {
        //     $centrosAleatorios = collect(range(1, 4))->random(rand(1, 3)); // Asigna entre 1 y 3 centros
        //     $user->centros()->attach($centrosAleatorios->mapWithKeys(fn ($id) => [$id => ['admin' => false]]));
        // });
    }
}