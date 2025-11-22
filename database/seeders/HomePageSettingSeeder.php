<?php

namespace Database\Seeders;

use App\Models\HomePageSetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use function Symfony\Component\Clock\now;

class HomePageSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        HomePageSetting::insert([
            [
                'key' => 'popular_category_section',
                'value' => '[{"category":"1","sub_category":null,"child_category":null},{"category":"4","sub_category":null,"child_category":null},{"category":"2","sub_category":null,"child_category":null},{"category":"8","sub_category":null,"child_category":null}]',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'product_slider_section_one',
                'value' => '{"category":"5","sub_category":null,"child_category":null}',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'product_slider_section_two',
                'value' => '{"category":"6","sub_category":null,"child_category":null}',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'product_slider_section_three',
                'value' => '[{"category":"7","sub_category":null,"child_category":null},{"category":"8","sub_category":null,"child_category":null}]',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
