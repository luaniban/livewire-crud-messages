<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('permissions')->delete();

        \DB::table('permissions')->insert([
            0 => [
                'id' => 1,
                'title' => 'admin_access',
                'created_at' => null,
                'updated_at' => null,
            ],
            1 => [
                'id' => 2,
                'title' => 'diretor_access',
                'created_at' => null,
                'updated_at' => null,
            ],
            2 => [
                'id' => 3,
                'title' => 'user_access',
                'created_at' => null,
                'updated_at' => null,
            ],
        ]);
    }
}
