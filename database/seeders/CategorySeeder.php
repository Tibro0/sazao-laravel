<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::insert([
            [
                'icon' => 'fab fa-apple',
                'name' => 'Apple Products',
                'slug' => Str::slug('Apple Products'),
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'icon' => 'fas fa-mobile-alt',
                'name' => 'Phones',
                'slug' => Str::slug('Phones'),
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'icon' => 'fas fa-tablet-alt',
                'name' => 'Tablet',
                'slug' => Str::slug('Tablet'),
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'icon' => 'fas fa-volume-up',
                'name' => 'Sound Equipment',
                'slug' => Str::slug('Sound Equipment'),
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'icon' => 'fas fa-power-off',
                'name' => 'Power & Accessories',
                'slug' => Str::slug('Power & Accessories'),
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'icon' => 'fas fa-hiking',
                'name' => 'Fitness & Wearable',
                'slug' => Str::slug('Fitness & Wearable'),
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'icon' => 'fas fa-mouse',
                'name' => 'Peripherals',
                'slug' => Str::slug('Peripherals'),
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'icon' => 'fab fa-cc-discover',
                'name' => 'Cover & Glass',
                'slug' => Str::slug('Cover & Glass'),
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'icon' => 'fas fa-laptop-medical',
                'name' => 'Smart Electronics',
                'slug' => Str::slug('Smart Electronics'),
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
