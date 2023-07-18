<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class LandlordFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'email' => $this->faker->email(),
            'fname' => $this->faker->firstName(),
            'lname' => $this->faker->lastName(),
            'mobile' => $this->faker->phoneNumber()
        ];
    }
}
