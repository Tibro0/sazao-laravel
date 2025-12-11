<?php

namespace Database\Seeders;

use App\Models\LogoSetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LogoSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LogoSetting::insert([
            [
                'logo' => 'frontend/images/main-image/logo/logo.png',
                'favicon' => 'frontend/images/main-image/logo/favicon.png',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
