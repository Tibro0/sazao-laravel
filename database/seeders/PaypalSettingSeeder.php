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
                'client_id' => 'AbQ6YRQ3UWQq7uB0IclY1pkK0P0Qwd8t88HJDoalL_fmQOM2ITE2OQ-QPy6HZ8ymgIM5vTVeXSqw6afQ',
                'secret_key' => 'EH0I4qTfX1MEFVgd40Q3pT-aT-cEI4k1OG2xMfppltYhz2C3rO70GBvPpAM28uq7r1-ZM06AcCKoa36X',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
