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
        Status::create(['id'=>1,'name' => 'Vendido', 'badge_color_id' => 6,'is_active' => false]);
        Status::create(['id'=>2,'name' => 'Muerto', 'badge_color_id' => 7,'is_active' => false]);
        Status::create(['id'=>3,'name' => 'Tronconero', 'badge_color_id' => 3]);
        Status::create(['id'=>4,'name' => 'Medianero' , 'badge_color_id' => 3]);
        Status::create(['id'=>5,'name' => 'Puntero' , 'badge_color_id' => 3]);
        Status::create(['id'=>6,'name' => 'Estabulado', 'badge_color_id' => 1]);
        Status::create(['id'=>7,'name' => 'Crianza', 'badge_color_id' => 2]);
        Status::create(['id'=>8,'name' => 'Cargadas', 'badge_color_id' => 4]);
        Status::create(['id'=>9,'name' => 'General', 'badge_color_id' => 5]);
        Status::create(['id'=>10,'name' => 'Paridas', 'badge_color_id' => 4]);
    }
}
