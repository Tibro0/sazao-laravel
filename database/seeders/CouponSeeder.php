<?php

namespace Database\Seeders;

use App\Models\Coupon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CouponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Coupon::insert([
            [
                'name' => 'Discount 10',
                'code' => 'DISCOUNT10',
                'quantity' => 100,
                'max_use' => 10,
                'start_date' => now()->format('Y-m-d'),
                'end_date' => now()->addDays(20)->format('Y-m-d'),
                'discount_type' => 'percent',
                'discount' => 10,
                'total_used' => 0,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Amount 10',
                'code' => 'AMOUNT10',
                'quantity' => 100,
                'max_use' => 10,
                'start_date' => now()->format('Y-m-d'),
                'end_date' => now()->addDays(20)->format('Y-m-d'),
                'discount_type' => 'amount',
                'discount' => 10,
                'total_used' => 0,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Discount 50',
                'code' => 'DISCOUNT50',
                'quantity' => 100,
                'max_use' => 10,
                'start_date' => now()->format('Y-m-d'),
                'end_date' => now()->addDays(20)->format('Y-m-d'),
                'discount_type' => 'percent',
                'discount' => 50,
                'total_used' => 0,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Amount 50',
                'code' => 'AMOUNT50',
                'quantity' => 100,
                'max_use' => 10,
                'start_date' => now()->format('Y-m-d'),
                'end_date' => now()->addDays(20)->format('Y-m-d'),
                'discount_type' => 'amount',
                'discount' => 50,
                'total_used' => 0,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
