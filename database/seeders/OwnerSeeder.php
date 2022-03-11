<?php

namespace Database\Seeders;

use App\Models\Owner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OwnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Owner::create(['name' => 'Armando']);
        Owner::create(['name' => 'Irma']);
        Owner::create(['name' => 'Samuel']);
        Owner::create(['name' => 'Claudia']);
        Owner::create(['name' => 'Georgina']);
        Owner::create(['name' => 'Miriam']);
        Owner::create(['name' => 'Juan Diego']);
        Owner::create(['name' => 'Ana Isabel']);
        Owner::create(['name' => 'Marvin']);
        Owner::create(['name' => 'Doña Cheli']);
        Owner::create(['name' => 'Chango']);
        
    }
}
