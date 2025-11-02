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
                'offer_start_date' => now()->format('Y-m-d'),
                'offer_end_date' => now()->addDays(10)->format('Y-m-d'),
                'product_type' => 'new_arrival',
                'is_approved' => 1,
                'status' => 1,
                'seo_title' => null,
                'seo_description' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'vendor_id' => 1,
                'category_id' => 1,
                'sub_category_id' => 1,
                'child_category_id' => null,
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
                'offer_start_date' => now()->format('Y-m-d'),
                'offer_end_date' => now()->addDays(10)->format('Y-m-d'),
                'product_type' => 'featured_product',
                'is_approved' => 1,
                'status' => 1,
                'seo_title' => null,
                'seo_description' => null,
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
                'offer_start_date' => now()->format('Y-m-d'),
                'offer_end_date' => now()->addDays(15)->format('Y-m-d'),
                'product_type' => 'top_product',
                'is_approved' => 1,
                'status' => 1,
                'seo_title' => null,
                'seo_description' => null,
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
                'offer_start_date' => now()->format('Y-m-d'),
                'offer_end_date' => now()->addDays(13)->format('Y-m-d'),
                'product_type' => 'new_arrival',
                'is_approved' => 1,
                'status' => 1,
                'seo_title' => null,
                'seo_description' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'vendor_id' => 1,
                'category_id' => 3,
                'sub_category_id' => 8,
                'child_category_id' => null,
                'brand_id' => 1,
                'name' => 'iPad mini 7',
                'slug' => Str::slug('iPad mini 7'),
                'thumb_image' => 'frontend/images/main-image/product_thumb_image/iPad-mini-Blue.png',
                'qty' => 100,
                'short_description' => 'USB Type-C 3.1 Gen2, DisplayPort, Apple Intelligence, Apple Pencil Pro support',
                'long_description' => '<h2 dir="ltr"><strong>iPad mini 7</strong></h2>
                <p dir="ltr">Introducing the new&nbsp;Apple iPad mini, it&rsquo;s powered by the A17 Pro chip that delivers outstanding performance along with advanced AI processing. Talking about AI, this device supports Apple Intelligence to make your life a little smarter and easier. It features a big display that makes doing productive and creative tasks convenient. Despite being a large device, it feels nice in the hand and looks dazzling in 4 different color options. It runs on the latest iPadOS 18, accessing you all the newest features. With a big battery and great optimization, this device can last all day long without any worry.</p>
                <p><strong>&nbsp;</strong></p>
                <h2 dir="ltr"><strong>iPad mini 7 Features</strong></h2>
                <ul>
                <li dir="ltr" role="presentation">Comes in a super slim design with improved aesthetics.</li>
                <li dir="ltr" role="presentation">Has a large Liquid Retina display for breathtaking visuals.</li>
                <li dir="ltr" role="presentation">Supports Apple Pencil Pro to let you unleash your creativity.&nbsp;</li>
                <li dir="ltr" role="presentation">Powered by a mighty powerful processor that can handle any task.</li>
                <li dir="ltr" role="presentation">Has Apple Intelligence support for all the advanced AI features.&nbsp;</li>
                <li dir="ltr" role="presentation">Packs a big battery to provide longer productivity.&nbsp;</li>
                </ul>',
                'video_link' => 'https://www.youtube.com',
                'sku' => 'IPAD-100',
                'price' => '500',
                'offer_price' => '450',
                'offer_start_date' => now()->format('Y-m-d'),
                'offer_end_date' => now()->addDays(9)->format('Y-m-d'),
                'product_type' => 'top_product',
                'is_approved' => 1,
                'status' => 1,
                'seo_title' => null,
                'seo_description' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'vendor_id' => 1,
                'category_id' => 8,
                'sub_category_id' => 15,
                'child_category_id' => 10,
                'brand_id' => 3,
                'name' => 'WiWU Pilot Travel Pouch',
                'slug' => Str::slug('WiWU Pilot Travel Pouch'),
                'thumb_image' => 'frontend/images/main-image/product_thumb_image/WiWU Pilot Travel Pouch-black.png',
                'qty' => 100,
                'short_description' => 'Multiple compartments, secure zipper, stylish double deck design',
                'long_description' => "<p dir='ltr'><strong>WiWU Pilot Travel Pouch</strong></p>
                <p dir='ltr'>Meet the WiWU Pilot Travel Pouch, your trusty travel buddy. Made with solid materials and a fantastic double deck design. This pouch keeps your important stuff safe. It has many pockets for your passport, cards, and electronic gadgets, ensuring everything stays neat. It's small and light, so you can easily carry it in your bag or pocket. It is water resistant. Moreover, the durable YKK zipper keeps your things secure, so you don't have to worry.<br /><strong><br /></strong></p>
                <p dir='ltr'><strong>Features Of WiWU Pilot Travel Pouch</strong></p>
                <ul>
                <li dir='ltr' role='presentation'>Compact and portable design</li>
                <li dir='ltr' role='presentation'>Many compartments for organised storage</li>
                <li dir='ltr' role='presentation'>Ideal for tech essentials like cables, chargers, and earphones</li>
                <li dir='ltr' role='presentation'>Durable and lightweight water resistant material</li>
                <li dir='ltr' role='presentation'>Secure storage with a zipper closure</li>
                <li dir='ltr' role='presentation'>Perfect for travel or daily use</li>
                </ul>",
                'video_link' => 'https://www.youtube.com',
                'sku' => 'WiWU-100',
                'price' => '20',
                'offer_price' => '15',
                'offer_start_date' => now()->format('Y-m-d'),
                'offer_end_date' => now()->addDays(6)->format('Y-m-d'),
                'product_type' => 'new_arrival',
                'is_approved' => 1,
                'status' => 1,
                'seo_title' => null,
                'seo_description' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'vendor_id' => 1,
                'category_id' => 5,
                'sub_category_id' => 10,
                'child_category_id' => 8,
                'brand_id' => 1,
                'name' => 'Apple USB-C to Lightning Cable - 1m',
                'slug' => Str::slug('Apple USB-C to Lightning Cable - 1m'),
                'thumb_image' => 'frontend/images/main-image/product_thumb_image/Apple-USB.png',
                'qty' => 100,
                'short_description' => 'Apple USB-C Charge Cable - 1m',
                'long_description' => "<h2 dir='ltr'><strong>Apple USB-C Charge Cable - 1m</strong></h2>
                <p dir='ltr'>This Apple USB-C charging cable designed by Apple made specially for your versatile usage for people who need longer length cables and travel a lot. Designed by Apple, this 'USB-C To C'' cable is a must-have for those on the move. With an extended 2-meter length, it's perfect for distant wall plug usage. Lightweight and easy to carry in your backpack, this cable ensures hassle-free charging wherever you go. Compatible with iPhones, iPads, and MacBooks, it effortlessly handles the latest iPhone 15 series. Not just for charging, but also enables high-speed data transfer. The reversible design adds convenience, making charging in the dark worry-free. Elevate your charging experience with Apple's USB-C Charge Cable!<br /><br /></p>
                <h2 dir='ltr'><strong>Apple USB-C Charge Cable - 1m Features</strong></h2>
                <ul>
                <li dir='ltr' role='presentation'>2 meters longer in length cable for distant wall plug usage;</li>
                <li dir='ltr' role='presentation'>Lightweight material used for easy to carry in your backpack;</li>
                <li dir='ltr' role='presentation'>Due to longer lengthy cable charge devices without any difficulty;</li>
                <li dir='ltr' role='presentation'>Charge multiple Apple devices including your iPhones, iPad &amp; Macbooks;</li>
                <li dir='ltr' role='presentation'>Enable to charge your latest iPhone 15 series and even data transfer;</li>
                <li dir='ltr' role='presentation'>Reversible design makes charging easier to charge in the dark without any worries;</li>
                <li dir='ltr' role='presentation'>Original &ldquo;USB-C To C&rdquo; charging cable designed by Apple.</li>
                </ul>",
                'video_link' => 'https://www.youtube.com',
                'sku' => 'USB-100',
                'price' => '10',
                'offer_price' => '5',
                'offer_start_date' => now()->format('Y-m-d'),
                'offer_end_date' => now()->addDays(8)->format('Y-m-d'),
                'product_type' => 'featured_product',
                'is_approved' => 1,
                'status' => 1,
                'seo_title' => null,
                'seo_description' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'vendor_id' => 2,
                'category_id' => 2,
                'sub_category_id' => null,
                'child_category_id' => null,
                'brand_id' => 2,
                'name' => 'Pixel 9 Pro Fold',
                'slug' => Str::slug('Pixel 9 Pro Fold'),
                'thumb_image' => 'frontend/images/main-image/product_thumb_image/Pixel-9-Pro-Fold-Obsidian.png',
                'qty' => 100,
                'short_description' => 'Fingerprint (side-mounted), accelerometer, gyro, proximity, compass, barometer | Ultra Wideband (UWB) support | Satellite SOS service',
                'long_description' => "<h2 dir='ltr'><strong>Pixel 9 Pro Fold</strong></h2>
                <p dir='ltr'>The Google Pixel 9 Pro Fold has the largest screen among foldable smartphones, offering a truly immersive experience. With exceptional AI capabilities, including seamless Gemini integration, this phone is engineered to excel in the era of Artificial Intelligence. Its slim design ensures a comfortable grip, while the enhanced folding flexibility adds to its convenience, enabling you to stay productive wherever you are. The 'Pro' designation is well-earned, reflecting its robust performance, extraordinary camera capabilities, and cutting-edge AI integration.</p>
                <p><strong>&nbsp;</strong></p>
                <h2 dir='ltr'><strong>Pixel 9 Pro Fold Features</strong></h2>
                <ul>
                <li dir='ltr' role='presentation'>Slim, sophisticated, and super durable fold pro with a scratch-free display and matte finish</li>
                <li dir='ltr' role='presentation'>Largest display on a phone ever with a narrow bezel to immerse into a brighter &amp; stunning visual</li>
                <li dir='ltr' role='presentation'>Redesigned camera bar with a sleek new look makes it a perfect foldable to grip with comfort</li>
                <li dir='ltr' role='presentation'>The durable build quality with Aluminum frame and Victus protection&nbsp; stands up to slips and spills&nbsp;</li>
                <li dir='ltr' role='presentation'>Stunning photos and videos are captured with different lenses at every angle and every lighting&nbsp;</li>
                <li dir='ltr' role='presentation'>Editing is a dream on the larger screen with multiple features color correction and AI edit options</li>
                <li dir='ltr' role='presentation'>Easily foldable on&nbsp; tabletop or other surfaces makes the handsfree viewing more fulfilling than ever</li>
                <li dir='ltr' role='presentation'>Multitasking like watch, chat, and other stuff with the giant screen&nbsp; by using the split screen feature</li>
                <li dir='ltr' role='presentation'>Tensor 4nm processor with great power &amp; optimization ability offers Game-changing performance</li>
                <li dir='ltr' role='presentation'>A large battery and a quick charging method lets the power never go off after an extensive use</li>
                </ul>",
                'video_link' => 'https://www.youtube.com',
                'sku' => 'PIXEL-100',
                'price' => '100',
                'offer_price' => '80',
                'offer_start_date' => now()->format('Y-m-d'),
                'offer_end_date' => now()->addDays(12)->format('Y-m-d'),
                'product_type' => 'top_product',
                'is_approved' => 1,
                'status' => 1,
                'seo_title' => null,
                'seo_description' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'vendor_id' => 2,
                'category_id' => 7,
                'sub_category_id' => 13,
                'child_category_id' => null,
                'brand_id' => 1,
                'name' => 'Apple Pencil 2',
                'slug' => Str::slug('Apple Pencil 2'),
                'thumb_image' => 'frontend/images/main-image/product_thumb_image/Apple Pencil 2.png',
                'qty' => 100,
                'short_description' => 'Double Tapping | Magnetic Storing On Side of iPad | Supports Apple Pencil hover (iPad Pro 12.9-inch (6th generation) and iPad Pro 11-inch (4th generation))',
                'long_description' => '<h2 style="font-weight: 600;"><strong style="font-weight: 800;">Apple Pencil 2</strong></h2>
                <p style="font-weight: 400;">Apple Pencil 2- a more improved pencil to serve you better than ever. This second-generation Apple Pencil is excellent for sketching, coloring, taking notes, annotating PDFs, and more because it offers pixel-perfect accuracy and the lowest latency in the industry. And using it is as simple and natural as using a pencil. The second-generation Apple Pencils intuitive touch interface, which enables double-tapping, also makes it possible to switch tools without putting the device down. It has a flat edge that magnetically attaches for automated charging and pairing and is made specifically for iPad Pro, iPad Air, and iPad mini.</p>',
                'video_link' => 'https://www.youtube.com',
                'sku' => 'PEN-100',
                'price' => '10',
                'offer_price' => '5',
                'offer_start_date' => now()->format('Y-m-d'),
                'offer_end_date' => now()->addDays(10)->format('Y-m-d'),
                'product_type' => 'featured_product',
                'is_approved' => 1,
                'status' => 1,
                'seo_title' => null,
                'seo_description' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'vendor_id' => 2,
                'category_id' => 2,
                'sub_category_id' => 7,
                'child_category_id' => null,
                'brand_id' => 4,
                'name' => 'OnePlus 13 5G',
                'slug' => Str::slug('OnePlus 13 5G'),
                'thumb_image' => 'frontend/images/main-image/product_thumb_image/OnePlus-13-5G-Arctic-Dawn.png',
                'qty' => 100,
                'short_description' => 'Options of 12GB, 16GB, or 24GB LPDDR5X; Storage options of 256GB, 512GB, or 1TB UFS 4.0',
                'long_description' => '<h2 dir="ltr"><strong>OnePlus 13 5G</strong></h2>
                <p dir="ltr">Looking for a smartphone that combines style, power, and great features? The Oneplus13 5G is what you need. This phone has a big 6.82-inch AMOLED display that makes everything look amazing. Inside it is packed with a mighty processor, Snapdragon 8 Elite. So, you don&rsquo;t have to face any lagging issues while playing games or doing something heavy on your phone.</p>
                <p dir="ltr">One of the best things about the OnePlus 13 is its battery life. With a huge 6,000 mAh battery, it can last all day long, and it charges super quickly&mdash;up to 100% in just 36 minutes! The camera setup is also impressive, featuring three 50 MP cameras that take sharp and clear photos, although low-light performance could be better. Overall, the OnePlus 13 is a fantastic choice for anyone looking for a powerful phone at a more affordable price compared to other flagship models. It combines style, speed, and long battery life, making it a solid option for everyday users.</p>
                <p dir="ltr">&nbsp;</p>
                <h2 dir="ltr"><strong>OnePlus 13 5G Features</strong></h2>
                <ul>
                <li dir="ltr" role="presentation">Snapdragon 8 Elite Chipset ensures fast performance for gaming and multitasking.</li>
                <li dir="ltr" role="presentation">Get an amazing viewing experience with a stunning 6.82-inch AMOLED Display.</li>
                <li dir="ltr" role="presentation">120Hz Refresh Rate provides smooth scrolling and quick response times.</li>
                <li dir="ltr" role="presentation">Three 50 MP lenses capture incredible photos in various lighting conditions.</li>
                <li dir="ltr" role="presentation">Long-lasting 6000mAh Battery keeps you powered throughout the day, plus it supports super-fast 100W charging.</li>
                <li dir="ltr" role="presentation">IP68 and IP69 Ratings make it resistant to dust and water, so you can use it worry-free.</li>
                <li dir="ltr" role="presentation">Android 15 Operating System with OxygenOS delivers a user-friendly interface.</li>
                </ul>',
                'video_link' => 'https://www.youtube.com',
                'sku' => 'ONEPLUS-100',
                'price' => '10',
                'offer_price' => '5',
                'offer_start_date' => now()->format('Y-m-d'),
                'offer_end_date' => now()->addDays(5)->format('Y-m-d'),
                'product_type' => 'featured_product',
                'is_approved' => 1,
                'status' => 1,
                'seo_title' => null,
                'seo_description' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
