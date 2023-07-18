<?php

namespace Database\Factories;

use App\Models\Property;
use Illuminate\Database\Eloquent\Factories\Factory;

class PropertyFactory extends Factory
{

    protected $model = Property::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->userName(),
            'tags' => $this->faker->text(),
            'sale_value' => 500,
            'type' => $this->faker->text(),
            'floors' => 5,
            'area' => $this->faker->numerify(),
            'plot' => '',
            'makani_number' => '',
            'permit_number' => '',
            'community' => $this->faker->text(),
            'sub_community' => $this->faker->text(),
            'notes' => $this->faker->text(),
            'address1' => $this->faker->address(),
            'address2' => $this->faker->address(),
            'city' => $this->faker->city(),
            'state' => $this->faker->streetAddress(),
            'country_id' => 1,
            'landlord_id' => 1,
        ];
    }
}
