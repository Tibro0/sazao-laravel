<?php

namespace Database\Seeders;

use App\Models\FooterGridTwo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FooterGridTwoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FooterGridTwo::insert([
            [
                'name' => 'Contact',
                'url' => 'http://127.0.0.1:8000/',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'About',
                'url' => 'http://127.0.0.1:8000/',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Blog',
                'url' => 'http://127.0.0.1:8000/',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Flash Sale',
                'url' => 'http://127.0.0.1:8000/',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Vendors',
                'url' => 'http://127.0.0.1:8000/',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Home',
                'url' => 'http://127.0.0.1:8000/',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
