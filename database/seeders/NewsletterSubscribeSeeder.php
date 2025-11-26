<?php

namespace Database\Seeders;

use App\Models\NewsletterSubscribe;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NewsletterSubscribeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        NewsletterSubscribe::insert([
            [
                'email' => 'admin@gmail.com',
                'verified_token' => 'verified',
                'is_verified' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'email' => 'vendor@gmail.com',
                'verified_token' => 'verified',
                'is_verified' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'email' => 'user@gmail.com',
                'verified_token' => 'verified',
                'is_verified' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
