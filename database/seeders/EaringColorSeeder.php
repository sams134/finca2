<?php

namespace Database\Seeders;

use App\Models\Earing_color;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class EaringColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Earing_color::create(['name' => 'Azul']);
        Earing_color::create(['name' => 'Verde']);
        Earing_color::create(['name' => 'Amarillo']);
        Earing_color::create(['name' => 'Rojo']);
        Earing_color::create(['name' => 'Negro']);
        Earing_color::create(['name' => 'Blanco']);
        Earing_color::create(['name' => 'Naranja']);
        Earing_color::create(['name' => 'Cafe']);
        Earing_color::create(['name' => 'Celeste']);
    }
}
