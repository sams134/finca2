<?php

namespace Database\Seeders;

use App\Models\Animal;
use App\Models\Comment;
use App\Models\Weight;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AnimalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        Animal::factory(100)->create()->each(function ($animal){
            Comment::factory(rand(0,5))->create([
                'animal_id' => $animal->id,
            ]);
            Weight::create([
                'weight' => $animal->bought_weight,
                'date' => $animal->bought_date,
                'animal_id' => $animal->id
            ]);
            Weight::factory(rand(0,10))->create([
                'animal_id' => $animal->id,
            ]);
        });
        Animal::where('type_id',7)->get()->each(function ($vaca){
            Animal::factory(rand(1,3))->create()->each(function ($animal){
                Comment::factory(rand(0,5))->create([
                    'animal_id' => $animal->id,
                ]);
                Weight::create([
                    'weight' => $animal->bought_weight,
                    'date' => $animal->bought_date,
                    'animal_id' => $animal->id
                ]);
                Weight::factory(rand(0,10))->create([
                    'animal_id' => $animal->id,
                ]);
            });
        });
    }
}
