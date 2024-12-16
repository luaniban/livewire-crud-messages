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
        $this->call(EscolasTableSeeder::class);
        $this->call(CargosTableSeeder::class);

        $this->call(PermissionsSeeder::class);
        $this->call(RolesSeeder::class);
        $this->call(PermissionRoleSeeder::class);
        $this->call(UsersSeeder::class);

        $this->call(RoleUserSeeder::class);
    }
}
