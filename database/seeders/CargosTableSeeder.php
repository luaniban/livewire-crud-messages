<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CargosTableSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        \DB::table('cargos')->delete();

        \DB::table('cargos')->insert([
            0 => [
                'created_at' => null,
                'deleted_at' => null,
                'id' => 1,
                'name' => 'Professor PEB I',
                'updated_at' => null,
            ],
            1 => [
                'created_at' => null,
                'deleted_at' => null,
                'id' => 2,
                'name' => 'Professor PEB II',
                'updated_at' => null,
            ],
            2 => [
                'created_at' => null,
                'deleted_at' => null,
                'id' => 3,
                'name' => 'Coordenador',
                'updated_at' => null,
            ],
            3 => [
                'created_at' => null,
                'deleted_at' => null,
                'id' => 4,
                'name' => 'Vice-Diretor',
                'updated_at' => null,
            ],
            4 => [
                'created_at' => null,
                'deleted_at' => null,
                'id' => 5,
                'name' => 'Diretor',
                'updated_at' => null,
            ],
            5 => [
                'created_at' => null,
                'deleted_at' => null,
                'id' => 6,
                'name' => 'Apoio',
                'updated_at' => null,
            ],
            6 => [
                'created_at' => null,
                'deleted_at' => null,
                'id' => 7,
                'name' => 'Supervisor',
                'updated_at' => null,
            ],
            7 => [
                'created_at' => null,
                'deleted_at' => null,
                'id' => 8,
                'name' => 'ADI',
                'updated_at' => null,
            ],
            8 => [
                'created_at' => null,
                'deleted_at' => null,
                'id' => 9,
                'name' => 'Inspetor',
                'updated_at' => null,
            ],
            9 => [
                'created_at' => null,
                'deleted_at' => null,
                'id' => 10,
                'name' => 'AEE',
                'updated_at' => null,
            ],
            10 => [
                'created_at' => null,
                'deleted_at' => null,
                'id' => 11,
                'name' => 'Professor Adjunto',
                'updated_at' => null,
            ],
            11 => [
                'created_at' => null,
                'deleted_at' => null,
                'id' => 12,
                'name' => 'Agente Administrativo',
                'updated_at' => null,
            ],
            12 => [
                'created_at' => null,
                'deleted_at' => null,
                'id' => 13,
                'name' => 'Professor Adjunto I',
                'updated_at' => null,
            ],
            13 => [
                'created_at' => null,
                'deleted_at' => null,
                'id' => 14,
                'name' => 'Professor Adjunto II',
                'updated_at' => null,
            ],
            14 => [
                'created_at' => null,
                'deleted_at' => null,
                'id' => 15,
                'name' => 'Outro',
                'updated_at' => null,
            ],
            15 => [
                'created_at' => null,
                'deleted_at' => null,
                'id' => 16,
                'name' => 'Educação Infantil',
                'updated_at' => null,
            ],
            16 => [
                'created_at' => null,
                'deleted_at' => null,
                'id' => 17,
                'name' => 'Secretario(a)',
                'updated_at' => null,
            ],
            17 => [
                'created_at' => null,
                'deleted_at' => null,
                'id' => 18,
                'name' => 'Precisa alterar',
                'updated_at' => null,
            ],
            18 => [
                'created_at' => null,
                'deleted_at' => null,
                'id' => 19,
                'name' => 'Super Admin',
                'updated_at' => null,
            ],
        ]);

    }
}
