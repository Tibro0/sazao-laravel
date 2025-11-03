<?php

namespace Database\Seeders;

use App\Models\GeneralSetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GeneralSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        GeneralSetting::insert([
            [
                'site_name' => 'Sazao',
                'layout' => 'LTR',
                'contact_email' => 'contact@sazao.com',
                'contact_phone' => '+69522145000001',
                'contact_address' => 'usa',
                'map' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3650.1435090089785!2d90.42196781465853!3d23.81349539228068!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c62fb95f16c1%3A0xb333248370356dee!2sJamuna%20Future%20Park!5e0!3m2!1sen!2sbd!4v1639724859199!5m2!1sen!2sbd',
                'currency_name' => 'USD',
                'currency_icon' => '$',
                'time_zone' => 'Asia/Dhaka',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
