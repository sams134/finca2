<?php

namespace Database\Factories;

use App\Models\Comment_type;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
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
            'comment' => $this->faker->sentence(10,true),
            'comment_type_id' => 1,
            'user_id' => User::all()->random()->id,
        ];
    }
}
