<?php

namespace Database\Seeders;

use App\Models\Feature;
use Illuminate\Database\Seeder;

class FeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $feature = Feature::where('name', 'Cable')->first();
        if ($feature == null) {
            Feature::insert([
                ['name' => 'Cable'],
                ['name' => 'Electricity'],
                ['name' => 'Garbage'],
                ['name' => 'Gas'],
                ['name' => 'Internet'],
                ['name' => 'Phone'],
                ['name' => 'Sewer'],
                ['name' => 'Water'],
                ['name' => 'Air conditioning'],
                ['name' => 'Balcony, deck, patio'],
                ['name' => 'Cable ready'],
                ['name' => 'Carpet'],
                ['name' => 'Ceiling fans'],
                ['name' => 'Central heating'],
                ['name' => 'Dishwasher'],
                ['name' => 'Fenced yard'],
                ['name' => 'Fireplace'],
                ['name' => 'Free standing dryer'],
                ['name' => 'Garbage disposal'],
                ['name' => 'Hardwood floors'],
                ['name' => 'Maid room'],
                ['name' => 'Microwave'],
                ['name' => 'Oven/range'],
                ['name' => 'Refrigerator'],
                ['name' => 'Shampoo bowl'],
                ['name' => 'Shampoo chair'],
                ['name' => 'Shampoo overhead cabinet'],
                ['name' => 'Stainless steel appliance'],
                ['name' => 'Storage'],
                ['name' => 'Storage cabinet'],
                ['name' => 'Stove'],
                ['name' => 'Styling chair'],
                ['name' => 'Styling station'],
                ['name' => 'Telephone'],
                ['name' => 'Tile'],
                ['name' => 'Towels'],
                ['name' => 'Vacuum cleaner'],
                ['name' => 'Walk-in-closets'],
                ['name' => 'Washer/dryer'],
                ['name' => 'Window coverings'],
                ['name' => 'Yard']
            ]);
        }
    }
}
