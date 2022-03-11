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
        Status::create(['name' => 'Activo - Tronconero']);
        Status::create(['name' => 'Activo - Medianero']);
        Status::create(['name' => 'Activo - Puntero']);
        Status::create(['name' => 'Activo - Estabulado']);
        Status::create(['name' => 'Vendido']);
        Status::create(['name' => 'Muerto']);
    }
}
