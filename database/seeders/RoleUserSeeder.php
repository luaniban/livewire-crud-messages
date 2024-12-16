<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('role_user')->delete();

        \DB::table('role_user')->insert([
            0 => [
                'role_id' => 1,
                'user_id' => 1,
            ],
            1 => [
                'role_id' => 2,
                'user_id' => 2,
            ],
            2 => [
                'role_id' => 3,
                'user_id' => 3,
            ],
        ]);
    }
}
