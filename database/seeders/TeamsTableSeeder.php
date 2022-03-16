<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TeamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * 
     * create seeder:: php artisan make:seeder TeamsTableSeeder
     * run    seeder:: php artisan db:seed --class=TeamsTableSeeder
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Team::insert(
            [
                [
                    'name' => 'Redentor F.C',
                    'responsible' => 'Cezinha',
                    'cell' => '16999999999',
                    'userId' => 1
                ],
                [
                    'name' => 'Quem Sobrou F.C',
                    'responsible' => 'Não informado',
                    'cell' => '16999999999',
                    'userId' => 1
                ],
                [
                    'name' => 'Zelinda F.C',
                    'responsible' => 'Não informado',
                    'cell' => '16999999999',
                    'userId' => 1
                ],
                [
                    'name' => 'Furacão F.C',
                    'responsible' => 'Não informado',
                    'cell' => '16999999999',
                    'userId' => 1
                ],
                [
                    'name' => 'Porto F.C',
                    'responsible' => 'Não informado',
                    'cell' => '16999999999',
                    'userId' => 1
                ],
                [
                    'name' => 'União F.C',
                    'responsible' => 'Não informado',
                    'cell' => '16999999999',
                    'userId' => 1
                ],
                [
                    'name' => 'Resenha F.C',
                    'responsible' => 'Não informado',
                    'cell' => '16999999999',
                    'userId' => 1
                ],
                [
                    'name' => 'Humildade F.C',
                    'responsible' => 'Não informado',
                    'cell' => '16999999999',
                    'userId' => 1
                ],
                [
                    'name' => 'Borracharia F.C',
                    'responsible' => 'Não informado',
                    'cell' => '16999999999',
                    'userId' => 1
                ],
                [
                    'name' => 'Piratas F.C',
                    'responsible' => 'Não informado',
                    'cell' => '16999999999',
                    'userId' => 1
                ],
                [
                    'name' => 'PSG F.C',
                    'responsible' => 'Não informado',
                    'cell' => '16999999999',
                    'userId' => 1
                ]
            ]
        );
    }
}
