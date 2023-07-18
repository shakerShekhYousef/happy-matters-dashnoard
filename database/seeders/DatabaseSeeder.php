<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Ramsey\Uuid\FeatureSet;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(UserSeeder::class);
        $this->call(AmenitiesSeeder::class);
        $this->call(CountriesSeeder::class);
        $this->call(LandlordSeeder::class);
        $this->call(PropertySeeder::class);
        $this->call(UnitSeeder::class);
        $this->call(AnnounementSeeder::class);
        $this->call(FeatureSeeder::class);
        $this->call(TenantSeeder::class);
    }
}
