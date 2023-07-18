<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class UnitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'unit_number' => $this->faker->randomDigit(),
            'unit_type' => $this->faker->text(),
            'size' => $this->faker->randomDigit(),
            'service_charges_per_sqft' => $this->faker->randomDigit(),
            'rent' => $this->faker->randomDigit(),
            'deposit' => $this->faker->randomDigit(),
            'beds' => $this->faker->randomDigit(),
            'baths' => $this->faker->randomDigit(),
            'electricity_no' => $this->faker->randomDigit(),
            'municipality_no' => $this->faker->randomDigit(),
            'gas_no' => $this->faker->randomDigit(),
            'no_of_parkings' => $this->faker->randomDigit(),
            'parking_no' => $this->faker->randomDigit(),
            'unit_status' => $this->faker->text(),
            'unit_category' => $this->faker->text(),
            'compound_no' => $this->faker->randomDigit(),
            'floor' => $this->faker->randomDigit(),
            'management_fee_type' => $this->faker->text(),
            'management_fee' => $this->faker->randomDigit(),
            'marketing_title'  => $this->faker->text(),
            'marketing_description' => $this->faker->text(),
            'property_photo' => 'properties/property1.png',
            'property_id' => 3
        ];
    }
}
