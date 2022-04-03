<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Role::factory()->create([
            'nombre' => 'Cliente'
        ]);
        \App\Models\Role::factory()->create([
            'nombre' => 'Administrador'
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Usuario',
            'email' => 'i@user.com',
            'password' => bcrypt('password'),
            'role_id' => 1
        ]);
        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'i@admin.com',
            'password' => bcrypt('password'),
            'role_id' => 2
        ]);
    }
}
