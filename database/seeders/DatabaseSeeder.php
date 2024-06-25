<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        \App\Models\Travel::factory(5)->create();
        \App\Models\Car::factory(5)->create();
        \App\Models\Schedule::factory(7)->create();
        \App\Models\Location::factory(10)->create();

        \App\Models\User::factory()->create([
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678'),
            'role' => 'superadmin',
        ]);
    }
}
