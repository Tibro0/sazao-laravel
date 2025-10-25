<?php

namespace Database\Seeders;

use App\Models\Vendor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VendorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Vendor::insert([
            [
                'user_id' => 1,
                'shop_name' => 'Admin Shop',
                'banner' => 'frontend/images/main-image/vendor_profile_images/admin_banner.jpg',
                'phone' => '01734449023',
                'email' => 'admin@gmail.com',
                'address' => 'Dhaka',
                'description' => 'Shop Description',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
