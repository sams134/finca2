<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Status::create(['name' => 'Tronconero', 'badge_color_id' => 3]);
        Status::create(['name' => 'Medianero' , 'badge_color_id' => 3]);
        Status::create(['name' => 'Puntero' , 'badge_color_id' => 3]);
        Status::create(['name' => 'Estabulado', 'badge_color_id' => 1]);
        Status::create(['name' => 'Vendido', 'badge_color_id' => 6,'is_active' => false]);
        Status::create(['name' => 'Muerto', 'badge_color_id' => 7,'is_active' => false]);
    }
}
