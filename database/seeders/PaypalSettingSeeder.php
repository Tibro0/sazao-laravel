<?php

namespace Database\Seeders;

use App\Models\PaypalSetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaypalSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PaypalSetting::insert([
            [
                'status' => 1,
                'mode' => 0,
                'country_name' => 'United States',
                'currency_name' => 'USD',
                'currency_rate' => 1,
                'client_id' => 'client_id',
                'secret_key' => 'secret_key',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
