<?php

namespace Database\Seeders;

use App\Models\RazorPaySetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RazorPaySettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        RazorPaySetting::insert([
            [
                'status' => 1,
                'country_name' => 'India',
                'currency_name' => 'INR',
                'currency_rate' => 88,
                'razorpay_key' => 'RazorPay Client Id',
                'razorpay_secret_key' => 'RazorPay Secret Key',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
