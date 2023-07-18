<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::updateOrCreate(['email' => 'admin@happymatters.ae'], [
            'name' => 'admin',
            'email' => 'admin@happymatters.ae',
            'password' => Hash::make("12345")
        ]);
    }
}
