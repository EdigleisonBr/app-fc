<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AthleteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * 
     * create seeder:: php artisan make:seeder AthletesTableSeeder
     * run    seeder:: php artisan db:seed --class=AthleteTableSeeder
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Athlete::insert(
            [
                [
                    'name' => 'Rafael Ezequiel',
                    'surname' => 'Rafael',
                    'position' => 'Goleiro',
                    'birthName' => '1987-04-19',
                    'shoeSize' => 39,
                    'cell' => '16994376611',
                    'active' => 1,
                    'userId' => 1,
                ],
                [
                    'name' => 'Rener',
                    'surname' => 'Renin',
                    'position' => 'Goleiro',
                    'birthName' => '1989-07-07',
                    'shoeSize' => 39,
                    'cell' => '16994231391',
                    'active' => 1,
                    'userId' => 1,
                ],
                [ 
                    'name' => 'Everton Teixeira',
                    'surname' => 'Tim',
                    'position' => 'Zagueiro',
                    'birthName' => '1982-12-01',
                    'shoeSize' => 39,
                    'cell' => '16983659915',
                    'active' => 1,
                    'userId' => 1,
                ],
                [
                    'name' => 'Marcelo',
                    'surname' => 'Marcelão',
                    'position' => 'Zagueiro',
                    'birthName' => '1984-04-26',
                    'shoeSize' => 39,
                    'cell' => '16994083502',
                    'active' => 1,
                    'userId' => 1,
                ],
                [
                    'name' => 'Thales',
                    'surname' => 'Thales',
                    'position' => 'Zagueiro',
                    'birthName' => '1994-06-23',
                    'shoeSize' => 39,
                    'cell' => '16994034065',
                    'active' => 1,
                    'userId' => 1,
                ],
                [
                    'name' => 'Edigleison',
                    'surname' => 'Edigleison',
                    'position' => 'Volante',
                    'birthName' => '1985-04-07',
                    'shoeSize' => 39,
                    'cell' => '16991335152',
                    'active' => 1,
                    'userId' => 1,
                ],
                [
                    'name' => 'Denner Alan',
                    'surname' => 'Denner',
                    'position' => 'Volante',
                    'birthName' => '1982-02-27',
                    'shoeSize' => 39,
                    'cell' => '16991520177',
                    'active' => 1,
                    'userId' => 1,
                ],
                [
                    'name' => 'Jean',
                    'surname' => 'Jean',
                    'position' => 'Volante',
                    'birthName' => '1974-11-28',
                    'shoeSize' => 39,
                    'cell' => '16991470782',
                    'active' => 1,
                    'userId' => 1,
                ],
                [
                    'name' => 'Luiz Fernando',
                    'surname' => 'Luiz',
                    'position' => 'Lateral',
                    'birthName' => '1990-10-17',
                    'shoeSize' => 39,
                    'cell' => '16993581511',
                    'active' => 1,
                    'userId' => 1,
                ],
                [
                    'name' => 'Fabio',
                    'surname' => 'Fabin',
                    'position' => 'Lateral',
                    'birthName' => '1990-07-17',
                    'shoeSize' => 39,
                    'cell' => '16984381940',
                    'active' => 1,
                    'userId' => 1,
                ],
                [
                    'name' => 'André',
                    'surname' => 'André',
                    'position' => 'Lateral',
                    'birthName' => '1990-10-12',
                    'shoeSize' => 39,
                    'cell' => '16988453927',
                    'active' => 1,
                    'userId' => 1,
                ],
                [
                    'name' => 'Michael',
                    'surname' => 'Michael',
                    'position' => 'Lateral',
                    'birthName' => '1981-10-27',
                    'shoeSize' => 39,
                    'cell' => '16991601727',
                    'active' => 1,
                    'userId' => 1,
                ],
                [
                    'name' => 'Nilvanio Leifi',
                    'surname' => 'Vanin',
                    'position' => 'Lateral',
                    'birthName' => '1974-08-16',
                    'shoeSize' => 39,
                    'cell' => '16991180769',
                    'active' => 1,
                    'userId' => 1,
                ],
                [
                    'name' => 'Denis Ferreira',
                    'surname' => 'Dênis',
                    'position' => 'Meio Campo',
                    'birthName' => '1993-09-21',
                    'shoeSize' => 39,
                    'cell' => '16991180769',
                    'active' => 1,
                    'userId' => 1,
                ],
                [
                    'name' => 'Jealison Santos',
                    'surname' => 'Jê',
                    'position' => 'Meio Campo',
                    'birthName' => '1993-08-23',
                    'shoeSize' => 39,
                    'cell' => '16994082272',
                    'active' => 1,
                    'userId' => 1,
                ],
                [
                    'name' => 'Cleverson Santos',
                    'surname' => 'Clevin',
                    'position' => 'Meio Campo',
                    'birthName' => '1987-07-02',
                    'shoeSize' => 39,
                    'cell' => '16992238606',
                    'active' => 1,
                    'userId' => 1,
                ],
                [
                    'name' => 'Murilo Guilherme',
                    'surname' => 'Murilo',
                    'position' => 'Atacante',
                    'birthName' => '1990-08-28',
                    'shoeSize' => 39,
                    'cell' => '16992422653',
                    'active' => 1,
                    'userId' => 1,
                ],
                [
                    'name' => 'Denis Maicon',
                    'surname' => 'Manico',
                    'position' => 'Atacante',
                    'birthName' => '1990-12-14',
                    'shoeSize' => 39,
                    'cell' => '16992624141',
                    'active' => 1,
                    'userId' => 1,
                ],
                [
                    'name' => 'Denis Oliver',
                    'surname' => 'Denão',
                    'position' => 'Atacante',
                    'birthName' => '1994-12-09',
                    'shoeSize' => 39,
                    'cell' => '16991909284',
                    'active' => 1,
                    'userId' => 1,
                ],
                [
                    'name' => 'Lucas Lima',
                    'surname' => 'Lucão',
                    'position' => 'Atacante',
                    'birthName' => '1987-09-29',
                    'shoeSize' => 39,
                    'cell' => '16991288811',
                    'active' => 1,
                    'userId' => 1,
                ]
            ]
        );
    }
}


















