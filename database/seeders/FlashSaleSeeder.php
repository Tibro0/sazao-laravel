<?php

namespace Database\Seeders;

use App\Models\FlashSale;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FlashSaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FlashSale::insert([
            [
                'end_date' => now()->addDays(15)->format('Y-m-d'),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
