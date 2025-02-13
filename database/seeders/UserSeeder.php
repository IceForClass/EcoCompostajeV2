<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            "password" => bcrypt('123456789'),
            "centro_id" => 1,
            "admin" => true,
        ]);
    }
}