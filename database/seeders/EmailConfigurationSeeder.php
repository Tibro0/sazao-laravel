<?php

namespace Database\Seeders;

use App\Models\EmailConfiguration;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmailConfigurationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EmailConfiguration::insert([
            [
                'email' => 'faysaltibro@gmail.com',
                'host' => 'sandbox.smtp.mailtrap.io',
                'username' => '82b060d0bdcdae',
                'password' => 'd68da9c95e3655',
                'port' => '2525',
                'encryption' => 'tls',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
