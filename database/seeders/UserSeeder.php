<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            "password" => bcrypt('123456789'),
        ]);
        $user->centros()->attach(1, ['admin' => true]);
        $user->centros()->attach(3, ['admin' => true]);
    }
}