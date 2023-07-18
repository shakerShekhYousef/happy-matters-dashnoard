<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Announcement;

class AnnounementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Announcement::updateOrCreate([
            'property_id'=>1,
            'unit_id'=>1,
            'subject'=>'fdshjk',
            'details'=>'fdsajkl'
         
         ]); 
         Announcement::updateOrCreate([
            'property_id'=>2,
            'unit_id'=>2,
            'subject'=>'fdshjk',
            'details'=>'fdsajkl'
         
         ]); 
         Announcement::updateOrCreate([
            'property_id'=>3,
            'unit_id'=>3,
            'subject'=>'fdshjk',
            'details'=>'fdsajkl'
         
         ]); 
         Announcement::updateOrCreate([
            'property_id'=>4,
            'unit_id'=>4,
            'subject'=>'fdshjk',
            'details'=>'fdsajkl'
         
         ]); 
    }
}
