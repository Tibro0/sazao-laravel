<?php

namespace Database\Seeders;

use App\Models\FooterSocial;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FooterSocialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FooterSocial::insert([
            [
                'icon' => 'fab fa-behance',
                'name' => 'behance',
                'url' => 'https://www.behance.net/',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'icon' => 'fab fa-pinterest-p',
                'name' => 'pinterest',
                'url' => 'https://www.pinterest.com/',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'icon' => 'fab fa-whatsapp',
                'name' => 'whatsapp',
                'url' => 'https://www.whatsapp.com/',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'icon' => 'fab fa-twitter',
                'name' => 'twitter',
                'url' => 'https://x.com/',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'icon' => 'fab fa-facebook-f',
                'name' => 'facebook',
                'url' => 'https://www.facebook.com/',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
