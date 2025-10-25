<?php

namespace Database\Seeders;

use App\Models\Slider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Slider::insert([
            [
                'banner' => 'frontend/images/main-image/slider/slider_1.jpg',
                'type' => 'new arrivals',
                'title' => "men's fashion",
                'starting_price' => '99',
                'btn_url' => 'http://127.0.0.1:8000/',
                'serial' => 1,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'banner' => 'frontend/images/main-image/slider/slider_2.jpg',
                'type' => 'new arrivals',
                'title' => "kid's fashion",
                'starting_price' => '99',
                'btn_url' => 'http://127.0.0.1:8000/',
                'serial' => 1,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'banner' => 'frontend/images/main-image/slider/slider_3.jpg',
                'type' => 'new arrivals',
                'title' => "winter collection",
                'starting_price' => '99',
                'btn_url' => 'http://127.0.0.1:8000/',
                'serial' => 1,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
