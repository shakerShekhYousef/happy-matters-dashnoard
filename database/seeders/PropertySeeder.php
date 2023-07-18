<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Property;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Property::updateOrCreate([
            'name' => 'property1',
            'tags'=>'gff',
            'sale_value'=>123,
            'type'=>'fgf',
            'floors'=>2,
            'area'=>1,
            'plot'=>'plot',
            'makani_number'=>'1',
            'permit_number'=>'2',
            'community'=>'fff',
            'sub_community'=>'fd',
            'notes'=>'gfd',
            'address1'=>'gfdd',
            'address2'=>'gffd',
            'city'=>'fds',
            'state'=>'hg',
            'country_id'=>1,
            'postcode'=>'dff',
            'maintenance_active'=>0,
            'alert_message'=>'alert_message',
            'landlord_id'=>1
         ]); 
         Property::updateOrCreate([
            'name' => 'property2',
            'tags'=>'gff',
            'sale_value'=>123,
            'type'=>'fgf',
            'floors'=>2,
            'area'=>1,
            'plot'=>'plot',
            'makani_number'=>'1',
            'permit_number'=>'2',
            'community'=>'fff',
            'sub_community'=>'fd',
            'notes'=>'gfd',
            'address1'=>'gfdd',
            'address2'=>'gffd',
            'city'=>'fds',
            'state'=>'hg',
            'country_id'=>1,
            'postcode'=>'dff',
            'maintenance_active'=>0,
            'alert_message'=>'alert_message',
            'landlord_id'=>1
         ]); 
         Property::updateOrCreate([
            'name' => 'property3',
            'tags'=>'gff',
            'sale_value'=>123,
            'type'=>'fgf',
            'floors'=>2,
            'area'=>1,
            'plot'=>'plot',
            'makani_number'=>'1',
            'permit_number'=>'2',
            'community'=>'fff',
            'sub_community'=>'fd',
            'notes'=>'gfd',
            'address1'=>'gfdd',
            'address2'=>'gffd',
            'city'=>'fds',
            'state'=>'hg',
            'country_id'=>1,
            'postcode'=>'dff',
            'maintenance_active'=>0,
            'alert_message'=>'alert_message',
            'landlord_id'=>1
         ]); 
         Property::updateOrCreate([
            'name' => 'property4',
            'tags'=>'gff',
            'sale_value'=>123,
            'type'=>'fgf',
            'floors'=>2,
            'area'=>1,
            'plot'=>'plot',
            'makani_number'=>'1',
            'permit_number'=>'2',
            'community'=>'fff',
            'sub_community'=>'fd',
            'notes'=>'gfd',
            'address1'=>'gfdd',
            'address2'=>'gffd',
            'city'=>'fds',
            'state'=>'hg',
            'country_id'=>1,
            'postcode'=>'dff',
            'maintenance_active'=>0,
            'alert_message'=>'alert_message',
            'landlord_id'=>1
         ]); 
         Property::updateOrCreate([
            'name' => 'property5',
            'tags'=>'gff',
            'sale_value'=>123,
            'type'=>'fgf',
            'floors'=>2,
            'area'=>1,
            'plot'=>'plot',
            'makani_number'=>'1',
            'permit_number'=>'2',
            'community'=>'fff',
            'sub_community'=>'fd',
            'notes'=>'gfd',
            'address1'=>'gfdd',
            'address2'=>'gffd',
            'city'=>'fds',
            'state'=>'hg',
            'country_id'=>1,
            'postcode'=>'dff',
            'maintenance_active'=>0,
            'alert_message'=>'alert_message',
            'landlord_id'=>1
         ]); 
         Property::updateOrCreate([
            'name' => 'property6',
            'tags'=>'gff',
            'sale_value'=>123,
            'type'=>'fgf',
            'floors'=>2,
            'area'=>1,
            'plot'=>'plot',
            'makani_number'=>'1',
            'permit_number'=>'2',
            'community'=>'fff',
            'sub_community'=>'fd',
            'notes'=>'gfd',
            'address1'=>'gfdd',
            'address2'=>'gffd',
            'city'=>'fds',
            'state'=>'hg',
            'country_id'=>1,
            'postcode'=>'dff',
            'maintenance_active'=>0,
            'alert_message'=>'alert_message',
            'landlord_id'=>1
         ]); 
    }
}
