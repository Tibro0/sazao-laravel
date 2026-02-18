<?php

namespace Database\Seeders;

use App\Models\GoogleSetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GoogleSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        GoogleSetting::insert([
            [
                'google_client_id' => 'Google Client ID',
                'google_client_secret' => 'Google Client Secret',
                'google_redirect_url' => 'http://127.0.0.1:8000/auth/google-callback',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
