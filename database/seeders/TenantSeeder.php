<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tenant;

class TenantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Tenant::updateOrCreate([
          'email' => 'test1@gmail.com',
          'password'=>'123',
          'fname'=>'tenant1',
          'lname'=>'fdd',
          'mname'=>'fdd',

          'is_company'=>1,
          'company_name'=>'fd',
          'trade_license'=>'1',
          'tax_registration'=>'11',
          'trade_license_expiry'=>'2022-02-16',
          'dob'=>'2000-02-16',
          'phone'=>'66',
          'additional_phone1'=>'66',
          'additional_phone2'=>'66',
          'gender'=>'ff',
          'marital_status'=>'gg',
          'national_id'=>'hh',
          'national_id_expiry'=>'2022-02-16',
          'passport'=>'66',
          'passport_expiry'=>'2022-02-16',
          'visa_state'=>1,
          'home_country_id'=>1,
          'country_id'=>1,
          'address1'=>'jj',
          'address2'=>'jj',
          'city'=>'jj',
          'state'=>'jj',
          'postcode'=>'kk',
          'notes'=>'ll',
        

         
         ]); 
         Tenant::updateOrCreate([
          'email' => 'test2@gmail.com',
          'password'=>'123',
          'fname'=>'tenant2',
          'lname'=>'fdd',
          'mname'=>'fdd',

          'is_company'=>1,
          'company_name'=>'fd',
          'trade_license'=>'1',
          'tax_registration'=>'11',
          'trade_license_expiry'=>'2022-02-16',
          'dob'=>'2000-02-16',
          'phone'=>'66',
          'additional_phone1'=>'66',
          'additional_phone2'=>'66',
          'gender'=>'ff',
          'marital_status'=>'gg',
          'national_id'=>'hh',
          'national_id_expiry'=>'2022-02-16',
          'passport'=>'66',
          'passport_expiry'=>'2022-02-16',
          'visa_state'=>1,
          'home_country_id'=>1,
          'country_id'=>1,
          'address1'=>'jj',
          'address2'=>'jj',
          'city'=>'jj',
          'state'=>'jj',
          'postcode'=>'kk',
          'notes'=>'ll',
        

          ]); 
          Tenant::updateOrCreate([
          'email' => 'test3@gmail.com',
          'password'=>'123',
          'fname'=>'tenant3',
          'lname'=>'fdd',
          'mname'=>'fdd',

          'is_company'=>1,
          'company_name'=>'fd',
          'trade_license'=>'1',
          'tax_registration'=>'11',
          'trade_license_expiry'=>'2022-02-16',
          'dob'=>'2000-02-16',
          'phone'=>'66',
          'additional_phone1'=>'66',
          'additional_phone2'=>'66',
          'gender'=>'ff',
          'marital_status'=>'gg',
          'national_id'=>'hh',
          'national_id_expiry'=>'2022-02-16',
          'passport'=>'66',
          'passport_expiry'=>'2022-02-16',
          'visa_state'=>1,
          'home_country_id'=>1,
          'country_id'=>1,
          'address1'=>'jj',
          'address2'=>'jj',
          'city'=>'jj',
          'state'=>'jj',
          'postcode'=>'kk',
          'notes'=>'ll',
        
          ]);

          Tenant::updateOrCreate([
            'email' => 'test4@gmail.com',
            'password'=>'123',
            'fname'=>'tenant4',
            'lname'=>'fdd',
            'mname'=>'fdd',
  
            'is_company'=>1,
            'company_name'=>'fd',
            'trade_license'=>'1',
            'tax_registration'=>'11',
            'trade_license_expiry'=>'2022-02-16',
            'dob'=>'2000-02-16',
            'phone'=>'66',
            'additional_phone1'=>'66',
            'additional_phone2'=>'66',
            'gender'=>'ff',
            'marital_status'=>'gg',
            'national_id'=>'hh',
            'national_id_expiry'=>'2022-02-16',
            'passport'=>'66',
            'passport_expiry'=>'2022-02-16',
            'visa_state'=>1,
            'home_country_id'=>1,
            'country_id'=>1,
            'address1'=>'jj',
            'address2'=>'jj',
            'city'=>'jj',
            'state'=>'jj',
            'postcode'=>'kk',
            'notes'=>'ll',
          
          
          ]); 
        }
    
}
