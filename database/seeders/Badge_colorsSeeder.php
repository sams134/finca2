<?php

namespace Database\Seeders;

use App\Models\Badge_color;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Badge_colorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Badge_color::create(['id'=>1,'color' => 'badge-soft-primary', 'name' => 'Celeste']);
        Badge_color::create(['id'=>2,'color' => 'badge-soft-secondary', 'name' => 'Gris']);
        Badge_color::create(['id'=>3,'color' => 'badge-soft-success', 'name' => 'Verde']);
        Badge_color::create(['id'=>4,'color' => 'badge-soft-info', 'name' => 'Aqua']);
        Badge_color::create(['id'=>5,'color' => 'badge-soft-warning', 'name' => 'Naranja']);
        Badge_color::create(['id'=>6,'color' => 'badge-soft-danger', 'name' => 'Rojo']);
        Badge_color::create(['id'=>7,'color' => 'badge-soft-dark', 'name' => 'Negro']);
    }
}
