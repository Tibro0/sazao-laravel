<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Brand::insert([
            [
                'logo' => 'frontend/images/main-image/brand/apple.png',
                'name' => 'Apple',
                'slug' => Str::slug('Apple'),
                'is_featured' => 1,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'logo' => 'frontend/images/main-image/brand/google.png',
                'name' => 'Google',
                'slug' => Str::slug('Google'),
                'is_featured' => 1,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'logo' => 'frontend/images/main-image/brand/JBL.png',
                'name' => 'JBL',
                'slug' => Str::slug('JBL'),
                'is_featured' => 1,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'logo' => 'frontend/images/main-image/brand/onePlus.png',
                'name' => 'OnePlus',
                'slug' => Str::slug('OnePlus'),
                'is_featured' => 1,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'logo' => 'frontend/images/main-image/brand/oppo.png',
                'name' => 'Oppo',
                'slug' => Str::slug('Oppo'),
                'is_featured' => 1,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'logo' => 'frontend/images/main-image/brand/realme.jpg',
                'name' => 'Realme',
                'slug' => Str::slug('Realme'),
                'is_featured' => 1,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'logo' => 'frontend/images/main-image/brand/samsung.png',
                'name' => 'Samsung',
                'slug' => Str::slug('Samsung'),
                'is_featured' => 1,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
