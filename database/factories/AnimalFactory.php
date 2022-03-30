<?php

namespace Database\Factories;

use App\Models\Animal;
use App\Models\Color;
use App\Models\Earing_color;
use App\Models\Owner;
use App\Models\Status;
use App\Models\Type;
use DateTime;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Animal>
 */
class AnimalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $is_criollo = $this->faker->randomElement([1,2]);
        $status_id = Status::all()->random()->id;
        return [
            //
            'number' => $this->faker->numerify("###"),
            'gender' => $this->faker->randomElement([1,2]),
            'description' => $this->faker->text(),
            'color_id' => Color::all()->random()->id,
            'type_id' => Type::all()->random()->id,
            'owner_id' => Owner::all()->random()->id,
            'status_id' => $status_id,
            'earing_color_id' => Earing_color::all()->random()->id,
            'cost' => $this->faker->randomFloat(2,0,4000),
            'is_criollo' => $is_criollo,
            'bought_from' => $this->faker->name(),
            'born_date' => $is_criollo==1?$this->faker->date():null,
            'animal_id' => $is_criollo==1?(Animal::where('gender',2)->get()->count()>0?Animal::where('gender',2)->get()->random()->id:null):null,
            'bought_date' => $this->faker->dateTimeBetween('-24 months'),
            'sold_to' => $this->faker->name(),
            'bought_weight' => $this->faker->numberBetween(300,1000),
            'value' => $status_id==1?$this->faker->randomFloat(2,4000,6000):null, //if vendido, add a value
        ];
    }
}
