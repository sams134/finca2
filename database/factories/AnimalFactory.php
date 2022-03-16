<?php

namespace Database\Factories;

use App\Models\Color;
use App\Models\Earing_color;
use App\Models\Owner;
use App\Models\Status;
use App\Models\Type;
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
        return [
            //
            'number' => $this->faker->numerify("###"),
            'gender' => $this->faker->randomElement([1,2]),
            'description' => $this->faker->text(),
            'color_id' => Color::all()->random()->id,
            'type_id' => Type::all()->random()->id,
            'owner_id' => Owner::all()->random()->id,
            'status_id' => Status::all()->random()->id,
            'earing_color_id' => Earing_color::all()->random()->id,
            'cost' => $this->faker->randomFloat(2,0,4000),
        ];
    }
}
