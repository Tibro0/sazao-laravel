<?php

namespace Database\Seeders;

use App\Models\ProductImageGallery;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductImageGallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductImageGallery::insert([
            [
                'image' => 'frontend/images/main-image/product-image-gallery/WiWU Pilot Travel Pouch-grey.png',
                'product_id' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'image' => 'frontend/images/main-image/product-image-gallery/iPad-7-mini-Purple.png',
                'product_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'image' => 'frontend/images/main-image/product-image-gallery/iPad-7-mini-Space-Gray.png',
                'product_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'image' => 'frontend/images/main-image/product-image-gallery/MacBook-Air-M3-13-Inch-SIlver.png',
                'product_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'image' => 'frontend/images/main-image/product-image-gallery/MacBook-Air-M3-13-Inch-Space-Gray.png',
                'product_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'image' => 'frontend/images/main-image/product-image-gallery/MacBook-Pro-M3-16inch-Space-Black.png',
                'product_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'image' => 'frontend/images/main-image/product-image-gallery/iPhone-17-Pro-Max-deep-blue.png',
                'product_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'image' => 'frontend/images/main-image/product-image-gallery/iPhone-17-Pro-Max-silver.png',
                'product_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'image' => 'frontend/images/main-image/product-image-gallery/JBL CHARGE 5 Portable Waterproof Speaker with Powerbank-02.png',
                'product_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'image' => 'frontend/images/main-image/product-image-gallery/JBL CHARGE 5 Portable Waterproof Speaker with Powerbank-03.png',
                'product_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'image' => 'frontend/images/main-image/product-image-gallery/OnePlus-13-5G-Black-Eclipse.png',
                'product_id' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'image' => 'frontend/images/main-image/product-image-gallery/OnePlus-13-5G-Midnight-Ocean.png',
                'product_id' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'image' => 'frontend/images/main-image/product-image-gallery/Pixel-9-Pro-Fold-Porcelain.png',
                'product_id' => 8,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
