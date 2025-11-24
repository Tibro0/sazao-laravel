<?php

namespace Database\Seeders;

use App\Models\FooterTitle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FooterTitleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FooterTitle::insert([
            [
                'footer_grid_two_title' => 'Quick Links',
                'footer_grid_three_title' => 'Other Links',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
