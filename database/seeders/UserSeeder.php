<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Centro;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Crear usuario admin
        $admin = User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            "password" => bcrypt('123456789'),
            "admin" => true,
        ]);
        $Federico = User::factory()->create([
            'name' => 'Federico',
            'email' => 'federico@gmail.com',
            "password" => bcrypt('Federico1234'),
            "admin" => true,
        ]);
        $Lidia = User::factory()->create([
            'name' => 'Lidia',
            'email' => 'lidia@gmail.com',
            "password" => bcrypt('Lidia1234'),
            "admin" => true,
        ]);
        $admin->centros()->attach([5 => ['admin' => true]]);
        $Federico->centros()->attach([1 => ['admin' => true]]);
        $Lidia->centros()->attach([2 => ['admin' => true], 3 => ['admin' => true], 4 => ['admin' => true]]);

        // Crear 9 usuarios adicionales y asignarles centros aleatorios
        // User::factory(9)->create()->each(function ($user) {
        //     $centrosAleatorios = collect(range(1, 4))->random(rand(1, 3)); // Asigna entre 1 y 3 centros
        //     $user->centros()->attach($centrosAleatorios->mapWithKeys(fn ($id) => [$id => ['admin' => false]]));
        // });
    }
}