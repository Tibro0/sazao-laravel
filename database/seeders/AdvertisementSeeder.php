<?php

namespace Database\Seeders;

use App\Models\Advertisement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdvertisementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Advertisement::insert([
            [
                'key' => 'homepage_section_banner_one',
                'value' => '{"banner_one":{"banner_url":"http:\/\/127.0.0.1:8000\/one","status":1,"banner_image":"uploads\/advertisement\/homepage_banner_section_one_image\/media_6928a83674f29.jpg"}}',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'homepage_section_banner_two',
                'value' => '{"banner_one":{"banner_url":"http:\/\/127.0.0.1:8000\/one","status":1,"banner_image":"uploads\/advertisement\/homepage_banner_section_two_image\/part_one\/media_6928a91b8632c.jpg"},"banner_two":{"banner_url":"http:\/\/127.0.0.1:8000\/two","status":1,"banner_image":"uploads\/advertisement\/homepage_banner_section_two_image\/part_two\/media_6928a91b86ba7.jpg"}}',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'homepage_section_banner_three',
                'value' => '{"banner_one":{"banner_url":"http:\/\/127.0.0.1:8000\/one","status":1,"banner_image":"uploads\/advertisement\/homepage_banner_section_three_image\/part_one\/media_6929b2bf5a273.jpg"},"banner_two":{"banner_url":"http:\/\/127.0.0.1:8000\/two","status":1,"banner_image":"uploads\/advertisement\/homepage_banner_section_three_image\/part_two\/media_6929b2bf5a832.jpg"},"banner_three":{"banner_url":"http:\/\/127.0.0.1:8000\/three","status":1,"banner_image":"uploads\/advertisement\/homepage_banner_section_three_image\/part_three\/media_6929b2bf5abc1.jpg"}}',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'homepage_section_banner_four',
                'value' => '{"banner_one":{"banner_url":"http:\/\/127.0.0.1:8000\/","status":1,"banner_image":"uploads\/advertisement\/homepage_banner_section_four_image\/media_6929e76bea1f5.jpg"}}',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'productpage_banner_section',
                'value' => '{"banner_one":{"banner_url":"http:\/\/127.0.0.1:8000\/","status":1,"banner_image":"uploads\/advertisement\/product_page_banner_section_image\/media_6929e6e8d00cb.jpg"}}',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'cartpage_banner_section',
                'value' => '{"banner_one":{"banner_url":"http:\/\/127.0.0.1:8000\/one","status":1,"banner_image":"uploads\/advertisement\/cart_page_banner_section\/part_one\/media_6929eec5b47a5.jpg"},"banner_two":{"banner_url":"http:\/\/127.0.0.1:8000\/two","status":1,"banner_image":"uploads\/advertisement\/cart_page_banner_section\/part_two\/media_6929eebbce86d.jpg"}}',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
