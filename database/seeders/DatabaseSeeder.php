<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
    */
    public function run(): void
    {
        // User::factory(10)->create();
        /*
        $this->call([
            CentroSeeder::class,
            UserSeeder::class,
            BoloSeeder::class,
            ComposteraSeeder::class,
            CicloSeeder::class,
            RegistroSeeder::class,
            AntesSeeder::class,
            DuranteSeeder::class,
            DespuesSeeder::class
        ]);
        */
        
        $this->call(RealistaSeeder::class);
        $this->call(UserSeeder::class);
        
    }
}