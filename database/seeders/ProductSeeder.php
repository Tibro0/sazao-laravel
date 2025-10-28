<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::insert([
            [
                'vendor_id' => 1,
                'category_id' => 4,
                'sub_category_id' => 9,
                'child_category_id' => 4,
                'brand_id' => 3,
                'name' => 'JBL CHARGE 5 Portable Waterproof Speaker with Powerbank',
                'slug' => Str::slug('JBL CHARGE 5 Portable Waterproof Speaker with Powerbank'),
                'thumb_image' => 'frontend/images/main-image/product_thumb_image/JBL CHARGE 5 Portable Waterproof Speaker with Powerbank-01.png',
                'qty' => 100,
                'short_description' => 'Waterproof, Smartphone-Charging, Stereo-Pairing, Built-In Microphone | Powerbank Support (5V/2A)',
                'long_description' => '<h2 style="font-weight: 600;"><strong style="font-weight: 800;">JBL CHARGE 5 Portable Waterproof Speaker with Powerbank</strong></h2>
                    <p style="font-weight: 400;">JBL&nbsp;Charge 5 is a portable waterproof speaker that is the latest edition and comes with an elevated dustproof and waterproof design. Furthermore, with improved audio offerings, the speaker takes JBL&rsquo;s range of portable speakers to a new level. Optimizing JBL&rsquo;s Original Pro Sound for music lovers everywhere and experiencing them a completely new world of party music.</p>
                    <ul style="font-weight: 400;">
                    <li>JBL Pro Sound</li>
                    <li>20 Hours Of Playtime</li>
                    <li>IP67 Water Resistant<br /><br /></li>
                    </ul>
                    <h2 style="font-weight: 600;"><strong style="font-weight: 800;">Where to buy JBL Charge 5 in Bangladesh?</strong></h2>
                    <p style="font-weight: 400;">Apple Gadgets is a reliable and popular name for buying all kinds of electronic gadgets in Bangladesh. You can buy your desired JBL Charge 5 at the lowest available price in BD. You can make the deal through Apple Gadgets&nbsp;Website or get it from the outlets. Surely you can get the best deal as well as quality after service.</p>
                    <p style="font-weight: 400;">&nbsp;</p>
                    <p style="font-weight: 400;">So, why are you late? Grab JBL Charge 5 and explore the trend.</p>',
                'video_link' => 'https://www.youtube.com',
                'sku' => 'JBL-100',
                'price' => '100',
                'offer_price' => '80',
                'offer_start_date' => now()->format('Y m d'),
                'offer_end_date' => now()->addDays(10)->format('Y m d'),
                'product_type' => 'new_arrival',
                'is_approved' => 1,
                'status' => 1,
                'seo_title' => '',
                'seo_description' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'vendor_id' => 1,
                'category_id' => 1,
                'sub_category_id' => 1,
                'child_category_id' => '',
                'brand_id' => 1,
                'name' => 'iPhone 17 Pro Max',
                'slug' => Str::slug('iPhone 17 Pro Max'),
                'thumb_image' => 'frontend/images/main-image/product_thumb_image/iPhone-17-Pro-Max-cosmic-orange.png',
                'qty' => 100,
                'short_description' => 'Glass front (Ceramic Shield 2), aluminum alloy frame, aluminum alloy back/ glass back (Ceramic Shield)',
                'long_description' => '<h2 dir="ltr"><strong>iPhone 17 Pro Max Price in Bangladesh</strong></h2>
                    <p dir="ltr">Experience the future of smartphones with the Apple&nbsp;iPhone 17 Pro Max. Packed with the powerful A19 Pro chip, a pro-grade triple camera system, and a stunning 6.9-inch Super Retina XDR display, this device redefines performance, creativity, and elegance. Get yours today with Apple Gadgets&rsquo; exclusive offers, EMI plans, and official warranty support in Bangladesh.<br /><br /></p>
                    <h2 dir="ltr"><strong>Why You&rsquo;ll Love It</strong></h2>
                    <ul>
                    <li dir="ltr" role="presentation">Stunning 6.9" Super Retina XDR display with 3000 nits peak brightness for unmatched clarity.</li>
                    <li dir="ltr" role="presentation">Pro-level triple 48MP camera system with LiDAR for sharp photos and breathtaking 3D video.</li>
                    <li dir="ltr" role="presentation">Apple A19 Pro chip built on 3nm for unbeatable performance in gaming and multitasking.</li>
                    <li dir="ltr" role="presentation">Ultra-fast 5G connectivity and the latest Wi-Fi 7 support.</li>
                    <li dir="ltr" role="presentation">Stronger, lighter design with Ceramic Shield 2 protection and IP68 water resistance.</li>
                    <li dir="ltr" role="presentation">All-day battery life with super-fast wired and MagSafe wireless charging.</li>
                    <li dir="ltr" role="presentation">Next-gen Face ID &amp; satellite connectivity for safety anywhere.<br /><br /></li>
                    </ul>
                    <h2 dir="ltr"><strong>Special Features of iPhone 17 Pro Max</strong></h2>
                    <h3 dir="ltr"><strong>Pro Camera System &ndash; Capture Every Moment Like a Pro</strong></h3>
                    <ul>
                    <li dir="ltr" role="presentation">Triple 48 MP Pro Fusion cameras: The system includes a wide, ultrawide, and periscope telephoto lens &mdash; letting you zoom much more without losing quality. Whether you&rsquo;re snapping landscapes, portraits, or distant subjects, the periscope lens gives sharp detail.</li>
                    <li dir="ltr" role="presentation">Sensor-shift OIS &amp; LiDAR Scanner: For stability and depth, especially in low light. Night shots are substantially better with less noise. LiDAR helps with depth mapping and AR.</li>
                    <li dir="ltr" role="presentation">Pro Video Capabilities: You get 4K up to 120 fps, Dolby Vision HDR, ProRes and ProRes RAW workflows, Apple Log 2. Perfect for creators who want cinematic video. Also, the capability to do dual capture (front + back) and spatial audio adds immersive feel.<br /><br /></li>
                    </ul>
                    <h3 dir="ltr"><strong>Display &amp; Design &ndash; Premium Look &amp; Feel with Durability</strong></h3>
                    <ul>
                    <li dir="ltr" role="presentation">6.9-inch LTPO Super Retina XDR OLED, 120Hz refresh rate: Smooth scroll, dynamic refresh for battery savings, vibrant colors, HDR10, Dolby Vision. Peak brightness up to ~3000 nits makes it viewable even in bright sun.</li>
                    <li dir="ltr" role="presentation">Ceramic Shield 2 &amp; Mohs level protection + IP68 rating: Front glass is much more scratch resistant; entire body built tough. With IP68 you can go into water (up to 6m for 30 mins) &mdash; less worry about spills, rain, etc.</li>
                    <li dir="ltr" role="presentation">Premium Build Materials: Aluminum alloy frame &amp; back (on non-China variants) or glass back with Ceramic Shield, precision machining, elegant colors (Silver, Deep Blue, Cosmic Orange).<br /><br /></li>
                    </ul>
                    <h3 dir="ltr"><strong>Performance &amp; Processing Power<br /></strong></h3>
                    <ul>
                    <li dir="ltr" role="presentation">A19 Pro (3 nm process): Very efficient, very fast. Power savings + less heat generation. High performance in gaming, pro apps (video editing, AR).</li>
                    <li dir="ltr" role="presentation">Generous RAM + Storage Options: Up to 12GB RAM + up to 2TB storage option means you can keep thousands of photos, videos, apps without worry. NVMe storage means read/write is fast.</li>
                    <li dir="ltr" role="presentation">Thermal Management: Aluminum body and design helps dissipate heat; helps maintain high performance under load.<br /><br /></li>
                    </ul>
                    <h3 dir="ltr"><strong>Battery &amp; Charging &ndash; All Day, All Power<br /></strong></h3>
                    <ul>
                    <li dir="ltr" role="presentation">Large battery: ~4832 mAh for the nano-SIM model; ~5088 mAh for eSIM-only model. More capacity for heavier usage.</li>
                    <li dir="ltr" role="presentation">Fast wired charging: 50% in ~20 minutes using PD-compatible charger.</li>
                    <li dir="ltr" role="presentation">Wireless charging with MagSafe / Qi2 (~25W), and reverse wired charging for accessories.</li>
                    <li dir="ltr" role="presentation">Optimizations: OS (iOS 26) + chip improvements mean better power management; longer video playback &amp; more time between charges.<br /><br /></li>
                    </ul>
                    <h3 dir="ltr"><strong>Connectivity &amp; Extra Features &ndash; Modern &amp; Safe</strong></h3>
                    <ul>
                    <li dir="ltr" role="presentation">Advanced connectivity: Full 5G, tri-band Wi-Fi including Wi-Fi 7, Bluetooth 6.0, UWB (Ultra Wideband) for precision spatial detection &amp; accessories.</li>
                    <li dir="ltr" role="presentation">eSIM + Dual SIM capabilities for flexibility.</li>
                    <li dir="ltr" role="presentation">USB-C 3.2 Gen 2 with DisplayPort &mdash; faster data transfer &amp; ability to use as external display.</li>
                    <li dir="ltr" role="presentation">Face ID, SL 3D sensors, TrueDepth front camera with Center Stage features (auto framing, wide-angle video, better group selfie).</li>
                    <li dir="ltr" role="presentation">IP68 water &amp; dust resistance; Apple Pay, safety features like Emergency SOS &amp; satellite-based Messages / Find My.<br /><br /></li>
                    </ul>
                    <h2 dir="ltr"><strong>Exclusive Apple Gadgets Offer</strong></h2>
                    <ul>
                    <li dir="ltr" role="presentation">Official Apple product with 1-year international warranty</li>
                    <li dir="ltr" role="presentation">Exclusive offer with competitive pricing in Bangladesh</li>
                    <li dir="ltr" role="presentation">Easy EMI up to 36 months with partnered banks</li>
                    <li dir="ltr" role="presentation">Cash on delivery, bKash, Nagad, card payments accepted</li>
                    <li dir="ltr" role="presentation">Fast delivery: 24&ndash;48 hrs in Dhaka, 3&ndash;5 days outside<br /><br /></li>
                    </ul>
                    <h2 dir="ltr"><strong>Why Buy iPhone 17 Pro Max from Apple Gadgets?</strong></h2>
                    <p dir="ltr">Apple Gadgets is a trusted Apple products provider in Bangladesh. That means when you buy from us (online/offline), you benefit from:</p>
                    <ul>
                    <li dir="ltr" role="presentation">100% genuine products with official Apple warranty &ndash; Every iPhone comes with a verified Apple warranty, giving you peace of mind and protection against manufacturing defects.</li>
                    <li dir="ltr" role="presentation">Multiple outlets and pickup points &ndash; Convenient locations across Bangladesh let you pick up your iPhone in person or access support whenever needed.</li>
                    <li dir="ltr" role="presentation">Expert after-sales support &ndash; Our trained staff assist with device setup, troubleshooting, and advice on Apple accessories for iPhone, iPad, MacBook, and more. For repairing support we have our own concern Apple Gadgets Care.</li>
                    <li dir="ltr" role="presentation">Flexible payment and EMI facilities &ndash; Choose from flexible EMI plans, bKash, Nagad, cash-on-delivery, and card payments to make owning your iPhone 17 Pro Max easier and more affordable.</li>
                    <li dir="ltr" role="presentation">Reliable and quick service &ndash; Apple Gadgets ensures fast and hassle-free support for any device issues, keeping your experience smooth and worry-free.</li>
                    </ul>',
                'video_link' => 'https://www.youtube.com',
                'sku' => 'APPLE-100',
                'price' => '120',
                'offer_price' => '100',
                'offer_start_date' => now()->format('Y m d'),
                'offer_end_date' => now()->addDays(10)->format('Y m d'),
                'product_type' => 'featured_product',
                'is_approved' => 1,
                'status' => 1,
                'seo_title' => '',
                'seo_description' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'vendor_id' => 1,
                'category_id' => 1,
                'sub_category_id' => 3,
                'child_category_id' => 1,
                'brand_id' => 1,
                'name' => 'MacBook Pro M4 Pro 14-Inch 24GB/512GB 12 Core CPU 16 Core GPU',
                'slug' => Str::slug('MacBook Pro M4 Pro 14-Inch 24GB/512GB 12 Core CPU 16 Core GPU'),
                'thumb_image' => 'frontend/images/main-image/product_thumb_image/MacBook-Pro-M4-16inch---Silver.png',
                'qty' => 100,
                'short_description' => 'Backlit Magic Keyboard, Force Touch Trackpad, Touch ID, Wi-Fi 6E, Bluetooth 5.3 | Apple Intelligence | macOS',
                'long_description' => '<h2 dir="ltr"><strong>MacBook Pro M4 Pro 14-Inch 24GB/512GB 12 Core CPU 16 Core GPU</strong></h2>
                <p dir="ltr">Experience a new level of power and creativity with the MacBook Pro M4 Pro 14-Inch. This device is powered by Apple&rsquo;s M4 Pro chip with a 12-core CPU and 16-core GPU, so you can handle everything from heavy editing to everyday multitasking with ease. The stunning 14.2-inch Liquid Retina XDR Display brings vibrant colors and incredible detail to life and is perfect for creative professionals and tech enthusiasts. With 24GB of unified memory and a superfast 512GB SSD, you&rsquo;ll enjoy smooth performance. This device is lightweight yet powerful and comes with a Magic Keyboard, Touch ID, and a high-fidelity six-speaker system for an overall immersive experience. Wherever your ideas take you, the MacBook Pro M4 Pro is ready to keep up, inspire, and push you beyond limits.</p>
                <p dir="ltr">&nbsp;</p>
                <h2 dir="ltr"><strong>MacBook Pro M4 Pro 14-Inch 24GB/512GB Features</strong></h2>
                <ul>
                <li dir="ltr" role="presentation">Handle heavy projects, apps, and workflows smoothly without slowing down.</li>
                <li dir="ltr" role="presentation">See every detail with stunning brightness and true-to-life colors that bring your work and entertainment to life.</li>
                <li dir="ltr" role="presentation">Open files, launch apps, and switch tasks instantly without any waiting time.</li>
                <li dir="ltr" role="presentation">Lightweight design and long battery life let you work or create anywhere you go.</li>
                <li dir="ltr" role="presentation">Enjoy crystal-clear video calls and rich, room-filling audio for an unbeatable media experience.</li>
                <li dir="ltr" role="presentation">Enjoy easy, secure access with Touch ID and work smarter with the latest macOS and Apple Intelligence features.</li>
                </ul>',
                'video_link' => 'https://www.youtube.com',
                'sku' => 'M4-100',
                'price' => '200',
                'offer_price' => '180',
                'offer_start_date' => now()->format('Y m d'),
                'offer_end_date' => now()->addDays(15)->format('Y m d'),
                'product_type' => 'top_product',
                'is_approved' => 1,
                'status' => 1,
                'seo_title' => '',
                'seo_description' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'vendor_id' => 1,
                'category_id' => 1,
                'sub_category_id' => 3,
                'child_category_id' => 2,
                'brand_id' => 1,
                'name' => 'MacBook Air M3 13-Inch 8GB/512GB 8 Core CPU 10 Core GPU',
                'slug' => Str::slug('MacBook Air M3 13-Inch 8GB/512GB 8 Core CPU 10 Core GPU'),
                'thumb_image' => 'frontend/images/main-image/product_thumb_image/MacBook-Air-M3-Midnight.png',
                'qty' => 100,
                'short_description' => 'Up to 18 hours Apple TV app movie playback | Up to 15 hours wireless web 52.6-watt-hour lithium‑polymer battery | 30W USB-C Power Adapter (included with M2 and M3 with 8‑core GPU) | 35W Dual USB-C Port Compact Power Adapter',
                'long_description' => '<h2 dir="ltr"><strong>MacBook Air M3 13-Inch 8GB/512GB 8 Core CPU 10 Core GPU</strong></h2>
                <p dir="ltr">The Apple MacBook Air with the M3 chip delivers a 60 percent performance increase compared to its predecessors, featuring a remarkably portable design and a dazzling Liquid Retina display.Seamlessly fitting into any workflow, it supports up to two external displays and comes equipped with Wi-Fi 6E connectivity. With its three-mic array, 1080p FaceTime HD camera, and improved voice clarity, it ensures exceptional communication capabilities. Experience immersive audio with Spatial Audio and Dolby Atmos. The backlit Magic Keyboard provides comfort and quiet operation, accompanied by Touch ID for seamless security. Powered by the latest macOS, the M3 chip enhances productivity with its extended battery life. As part of the Apple ecosystem, it offers extensive app support, making it a versatile tool for all users.</p>
                <p><strong>&nbsp;</strong></p>
                <h2 dir="ltr"><strong>MacBook Air M3 13-Inch 8GB/512GB Features</strong></h2>
                <ul>
                <li dir="ltr" role="presentation">M3 delivers blazing-fast performance, outpacing competitors by 60 percent for exceptional speed.</li>
                <li dir="ltr" role="presentation">AI capabilities are significantly enhanced, ensuring optimal functionality and efficient processing.</li>
                <li dir="ltr" role="presentation">The super-portable design facilitates on-the-go usage without compromising on power or performance.</li>
                <li dir="ltr" role="presentation">Liquid Retina display provides a stunning visual experience with vibrant colors and sharp clarity.</li>
                <li dir="ltr" role="presentation">Support for up to two external displays, expanding your workspace for increased productivity.</li>
                <li dir="ltr" role="presentation">Wi-Fi 6E Connectivity ensures seamless and high-speed internet access for enhanced connectivity.</li>
                <li dir="ltr" role="presentation">Equipped with a 3.5mm headphone jack for versatile audio connectivity options.</li>
                <li dir="ltr" role="presentation">1080p FaceTime HD camera delivers crystal-clear video calls for seamless communication.</li>
                <li dir="ltr" role="presentation">Three-mic array and enhanced voice clarity for superior audio quality during calls or recordings.</li>
                <li dir="ltr" role="presentation">Spatial Audio with Dolby Atmos technology creates an immersive and captivating audio experience.</li>
                <li dir="ltr" role="presentation">The backlit Magic Keyboard offers a comfortable and quiet typing experience in any lighting.</li>
                <li dir="ltr" role="presentation">Touch ID feature ensures secure and convenient access to your device and data.</li>
                <li dir="ltr" role="presentation">Latest macOS enhances productivity with advanced features and a user-friendly interface.</li>
                <li dir="ltr" role="presentation">Long battery life ensures extended usage without frequent recharging, enhancing convenience.</li>
                <li dir="ltr" role="presentation">Part of the Apple Ecosystem, providing seamless integration with other Apple devices.</li>
                <li dir="ltr" role="presentation">Wide array of app support ensures access to a diverse range of applications for various needs.<strong><br /></strong></li>
                </ul>
                <p>&nbsp;</p>
                <h2 dir="ltr"><strong>MacBook Air M3 13-Inch 8GB/512GB Price in Bangladesh</strong></h2>
                <p dir="ltr">Know the latest price of MacBook Air M3 13-Inch 8GB/512GB by contacting our customer service. To get this MacBook you have to pre-order it through any of our selling platforms.</p>',
                'video_link' => 'https://www.youtube.com',
                'sku' => 'M4-110',
                'price' => '200',
                'offer_price' => '190',
                'offer_start_date' => now()->format('Y m d'),
                'offer_end_date' => now()->addDays(13)->format('Y m d'),
                'product_type' => 'new_arrival',
                'is_approved' => 1,
                'status' => 1,
                'seo_title' => '',
                'seo_description' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
