<?php

namespace Database\Seeders;

use App\Models\ChildCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ChildCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ChildCategory::insert([
            [
                'category_id' => 1,
                'sub_category_id' => 3,
                'name' => 'M4 Series Chip',
                'slug' => Str::slug('M4 Series Chip'),
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 1,
                'sub_category_id' => 3,
                'name' => 'M3 Series Chip',
                'slug' => Str::slug('M3 Series Chip'),
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 1,
                'sub_category_id' => 3,
                'name' => 'M1 Series Chip',
                'slug' => Str::slug('M1 Series Chip'),
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 4,
                'sub_category_id' => 9,
                'name' => 'Bluetooth Speaker',
                'slug' => Str::slug('Bluetooth Speaker'),
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 4,
                'sub_category_id' => 9,
                'name' => 'Smart Speaker',
                'slug' => Str::slug('Smart Speaker'),
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 4,
                'sub_category_id' => 9,
                'name' => 'Sound Bar',
                'slug' => Str::slug('Sound Bar'),
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 5,
                'sub_category_id' => 10,
                'name' => 'Lightning Cable',
                'slug' => Str::slug('Lightning Cable'),
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 5,
                'sub_category_id' => 10,
                'name' => 'Type-C Cable',
                'slug' => Str::slug('Type-C Cable'),
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 8,
                'sub_category_id' => 15,
                'name' => 'Backpacks',
                'slug' => Str::slug('Backpacks'),
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 8,
                'sub_category_id' => 15,
                'name' => 'Travel Bag',
                'slug' => Str::slug('Travel Bag'),
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
