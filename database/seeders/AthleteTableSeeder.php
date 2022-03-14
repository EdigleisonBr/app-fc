<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AthleteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Athlete::create(
            [
                'name' => '',
                'surname' => 'Edigleison',
                'position' => 'Goleiro',
                'birthName' => '07/04/1985',
                'shoeSize' => 11,
                'cell' => '16991335152',
                'active' => 1,
                'userId' => 1,
            ]
        );
    }
}
