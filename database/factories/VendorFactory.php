<?php

namespace Database\Factories;

use App\Models\Vendor;
use Illuminate\Database\Eloquent\Factories\Factory;

class VendorFactory extends Factory
{

    protected $model = Vendor::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'company_name' => $this->faker->name(),
            'contact_name' => $this->faker->name(),
            'category' => $this->faker->text(),
            'tax_registration' => $this->faker->randomDigit(),
            'mobile' => $this->faker->phoneNumber(),
            'address1' => $this->faker->address(),
            'address2' => $this->faker->address(),
            'city' => $this->faker->city(),
            'state' => $this->faker->streetAddress(),
            'notes' => $this->faker->text(),

            'country_id' => 1,
        ];
    }
}
