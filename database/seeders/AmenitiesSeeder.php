<?php

namespace Database\Seeders;

use App\Models\Amenity;
use Illuminate\Database\Seeder;

class AmenitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Amenity::updateOrCreate([
            'name' => 'Balcony'
        ]);
        Amenity::updateOrCreate([
            'name' => 'Built in Kitchen Appliances'
        ]);
        Amenity::updateOrCreate([
            'name' => 'Built in Wardrobes'
        ]);
        Amenity::updateOrCreate([
            'name' => 'Central A/C & Heating'
        ]);
        Amenity::updateOrCreate([
            'name' => 'Chiller'
        ]);
        Amenity::updateOrCreate([
            'name' => 'Concierge Service'
        ]);
        Amenity::updateOrCreate([
            'name' => 'Covered Parking'
        ]);
        Amenity::updateOrCreate([
            'name' => 'Maid Service'
        ]);
        Amenity::updateOrCreate([
            'name' => 'Maids Room'
        ]);
        Amenity::updateOrCreate([
            'name' => 'Pets Allowed'
        ]);
        Amenity::updateOrCreate([
            'name' => 'Private Garden'
        ]);
        Amenity::updateOrCreate([
            'name' => 'Private Gym'
        ]);
        Amenity::updateOrCreate([
            'name' => 'Private Jacuzzi'
        ]);
        Amenity::updateOrCreate([
            'name' => 'Private Pool'
        ]);
        Amenity::updateOrCreate([
            'name' => 'Security'
        ]);
        Amenity::updateOrCreate([
            'name' => 'Shared Gym'
        ]);
        Amenity::updateOrCreate([
            'name' => 'Shared Pool'
        ]);
        Amenity::updateOrCreate([
            'name' => 'Shared Spa'
        ]);
        Amenity::updateOrCreate([
            'name' => 'Study'
        ]);
        Amenity::updateOrCreate([
            'name' => 'View of Landmark'
        ]);
        Amenity::updateOrCreate([
            'name' => 'View of Water'
        ]);
        Amenity::updateOrCreate([
            'name' => 'Walk-in Closet'
        ]);
    }
}
