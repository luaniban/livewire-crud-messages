<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('roles')->delete();

        \DB::table('roles')->insert([
            0 => [
                'id' => 1,
                'title' => 'Admin',
                'created_at' => null,
                'updated_at' => null,
            ],
            1 => [
                'id' => 2,
                'name' => 'Diretor',
                'created_at' => null,
                'updated_at' => null,
            ],
            2 => [
                'id' => 3,
                'title' => 'Demanda',
                'created_at' => '2023-11-14 18:53:24',
                'updated_at' => null,
            ],
        ]);
    }
}
