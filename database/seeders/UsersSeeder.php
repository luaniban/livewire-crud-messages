<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('users')->delete();

        \DB::table('users')->insert([
            0 => [
                'id' => 1,
                'name' => 'Leandro Andrade',
                'email' => 'test@example.com',
                'password' => '$2y$10$CYDf53IaWuqWcjeSNfKxWOd7fy/flhk/ABjBzkIBGaPZCIjrqyU.a',
                'ultimo_acesso_at' => '2024-01-31 03:24:50',
                'cpf' => '722.939.970-06',
                'matricula' => 12345,
                'data_nascimento' => '2022-12-22',
                'escola_id' => 1,
                'cargo_id' => 1,
                'created_at' => null,
                'updated_at' => null,
            ],
            1 => [
                'id' => 2,
                'name' => 'Rubia Costa',
                'email' => 'rubia@gmail.com',
                'password' => '$2y$10$CYDf53IaWuqWcjeSNfKxWOd7fy/flhk/ABjBzkIBGaPZCIjrqyU.a',
                'ultimo_acesso_at' => '2024-02-01 18:24:50',
                'cpf' => '570.539.640-60',
                'matricula' => 12346,
                'data_nascimento' => '2022-12-22',
                'escola_id' => 1,
                'cargo_id' => 1,
                'created_at' => null,
                'updated_at' => null,
            ],
            2 => [
                'id' => 3,
                'name' => 'Administrativo Seduc',
                'email' => 'administrativo@administrativo.com',
                'password' => '$2y$10$CYDf53IaWuqWcjeSNfKxWOd7fy/flhk/ABjBzkIBGaPZCIjrqyU.a',
                'ultimo_acesso_at' => '2024-02-20 13:24:50',
                'cpf' => '729.031.900-11',
                'matricula' => 12347,
                'data_nascimento' => '2022-12-22',
                'escola_id' => 1,
                'cargo_id' => 1,
                'created_at' => null,
                'updated_at' => null,
            ],
        ]);
    }
}
