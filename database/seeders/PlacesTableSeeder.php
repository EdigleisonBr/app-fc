<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PlacesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * 
     * create seeder:: php artisan make:seeder PlacesTableSeeder
     * run    seeder:: php artisan db:seed --class=PlacesTableSeeder
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Place::insert(
            [
                [
                    'name' => 'Arena Nonô',
                    'userId' => 1
                ]
            ]
        );
    }
}
