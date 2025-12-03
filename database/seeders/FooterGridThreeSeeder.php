<?php

namespace Database\Seeders;

use App\Models\FooterGridThree;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FooterGridThreeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FooterGridThree::insert([
            [
                'name' => 'Terms and Condition',
                'url' => 'http://127.0.0.1:8000/terms-and-conditions',
                'status'  => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Privacy Policy',
                'url' => 'http://127.0.0.1:8000/privacy-policy',
                'status'  => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
