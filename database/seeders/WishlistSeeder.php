<?php

namespace Database\Seeders;

use App\Models\Wishlist;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WishlistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Wishlist::insert([
            [
                'product_id' => 2,
                'user_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 5,
                'user_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 3,
                'user_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
