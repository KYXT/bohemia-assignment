<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'slug'          => $this->faker->slug(),
            'title'         => $this->faker->text(),
            'h1'            => $this->faker->text(),
            'content'       => $this->faker->realText(3000),
            'description'   => $this->faker->text(255),
            'keywords'      => $this->faker->words(10, true),
            'is_in_trash'   => 0,
            'user_id'       => User::factory(),
        ];
    }
}
