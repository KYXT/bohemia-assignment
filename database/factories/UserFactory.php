<?php

namespace Database\Factories;

use App\Http\Helpers\EmailHelper;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'              => $this->faker->firstName(),
            'surname'           => $this->faker->lastName(),
            'nickname'          => $this->faker->userName(),
            'phone'             => $this->faker->phoneNumber(),
            'email'             => EmailHelper::createEmail($this->faker->unique()->email()),
            'address'           => $this->faker->address(),
            'city'              => $this->faker->city(),
            'state'             => $this->faker->locale(),
            'zip'               => $this->faker->postcode(),
            'login'             => 'testLogin',
            'password'          => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'role'              => $this->faker->randomElement([1, 2, 3]),
            'email_verified_at' => null,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
