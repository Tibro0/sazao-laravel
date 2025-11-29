<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            UserSeeder::class,
            SliderSeeder::class,
            CategorySeeder::class,
            SubCategorySeeder::class,
            ChildCategorySeeder::class,
            BrandSeeder::class,
            VendorSeeder::class,
            ProductSeeder::class,
            ProductImageGallerySeeder::class,
            ProductVariantSeeder::class,
            ProductVariantItemSeeder::class,
            FlashSaleSeeder::class,
            FlashSaleItemSeeder::class,
            GeneralSettingSeeder::class,
            CouponSeeder::class,
            ShippingRuleSeeder::class,
            UserAddressSeeder::class,
            PaypalSettingSeeder::class,
            StripeSettingSeeder::class,
            RazorPaySettingSeeder::class,
            HomePageSettingSeeder::class,
            WishlistSeeder::class,
            FooterInfoSeeder::class,
            FooterSocialSeeder::class,
            FooterGridTwoSeeder::class,
            FooterTitleSeeder::class,
            FooterGridThreeSeeder::class,
            EmailConfigurationSeeder::class,
            NewsletterSubscribeSeeder::class,
            AdvertisementSeeder::class,
        ]);
    }
}
