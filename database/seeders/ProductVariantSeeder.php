<?php

namespace Database\Seeders;

use App\Models\ProductVariant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductVariantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductVariant::insert([
            [
                'product_id' => 7,
                'name' => 'Apple Authorized',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 7,
                'name' => 'Apple Non Authorized',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 6,
                'name' => 'Color',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 5,
                'name' => 'Color',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 5,
                'name' => 'Storage',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 4,
                'name' => 'Color',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 3,
                'name' => 'Color',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 2,
                'name' => 'Color',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 2,
                'name' => 'Storage',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 1,
                'name' => 'Color',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 10,
                'name' => 'Color',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 10,
                'name' => 'Storage',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 8,
                'name' => 'Color',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 8,
                'name' => 'Storage',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
