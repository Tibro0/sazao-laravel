<?php

namespace Database\Seeders;

use App\Models\SubCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
Use Illuminate\Support\Str;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SubCategory::insert([
            [
                'category_id' => 1,
                'name' => 'iPhone',
                'slug' => Str::slug('iPhone'),
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 1,
                'name' => 'MacBook',
                'slug' => Str::slug('MacBook'),
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 1,
                'name' => 'iMac',
                'slug' => Str::slug('iMac'),
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 1,
                'name' => 'iPad',
                'slug' => Str::slug('iPad'),
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 2,
                'name' => 'SAMSUNG',
                'slug' => Str::slug('SAMSUNG'),
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 2,
                'name' => 'Google',
                'slug' => Str::slug('Google'),
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 2,
                'name' => 'OnePlus',
                'slug' => Str::slug('OnePlus'),
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 3,
                'name' => 'iPad',
                'slug' => Str::slug('iPad'),
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 4,
                'name' => 'Speakers',
                'slug' => Str::slug('Speakers'),
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 5,
                'name' => 'Cables',
                'slug' => Str::slug('Cables'),
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 5,
                'name' => 'Power Adapter',
                'slug' => Str::slug('Power Adapter'),
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 6,
                'name' => 'Watch Accessories',
                'slug' => Str::slug('Watch Accessories'),
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 7,
                'name' => 'Smart Pen',
                'slug' => Str::slug('Smart Pen'),
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 8,
                'name' => 'Phone Cover',
                'slug' => Str::slug('Phone Cover'),
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 8,
                'name' => 'Bag',
                'slug' => Str::slug('Bag'),
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
