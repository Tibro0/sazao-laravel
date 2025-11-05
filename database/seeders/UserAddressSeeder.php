<?php

namespace Database\Seeders;

use App\Models\UserAddress;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserAddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserAddress::insert([
            [
                'user_id' => 3,
                'name' => 'MD. Faysal Hossain Tibro',
                'email' => 'faysaltibro@gmail.com',
                'phone' => '01734449023',
                'country' => 'Bangladesh',
                'state' => 'Dhaka',
                'city' => 'Dhaka',
                'zip' => '1207',
                'address' => 'Monsurabad, Adabor.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
