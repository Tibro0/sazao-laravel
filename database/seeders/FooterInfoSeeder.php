<?php

namespace Database\Seeders;

use App\Models\FooterInfo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FooterInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FooterInfo::insert([
            [
                'logo' => 'frontend/images/main-image/footer_logo_image/logo.png',
                'phone' => '+8896254857456',
                'email' => 'example@gmail.com',
                'address' => 'San Francisco City Hall, San Francisco, CA',
                'copyright' => 'Copyright © 2025 Sazao Shop. All Rights Reserved.',
            ]
        ]);
    }
}
