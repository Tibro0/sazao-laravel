<?php

namespace Database\Seeders;

use App\Models\ShippingRule;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShippingRuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ShippingRule::insert([
            [
                'name' => 'Express Delivery',
                'type' => 'flat_cost',
                'min_cost' => null,
                'cost' => 50,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Free Shipping',
                'type' => 'min_cost',
                'min_cost' => 1000,
                'cost' => 0,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
