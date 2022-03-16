<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RefereesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * 
     * create seeder:: php artisan make:seeder RefereesTableSeeder
     * run    seeder:: php artisan db:seed --class=RefereesTableSeeder
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Referee::insert(
            [
                [
                    'name' => 'Não informado',
                    'surname' => 'Não informado',
                    'cell' => '16999999999',
                    'userId' => 1
                ]
            ]
        );
    }
}
