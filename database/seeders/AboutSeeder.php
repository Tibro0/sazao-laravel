<?php

namespace Database\Seeders;

use App\Models\About;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        About::insert([
            [
                'content' => "<h3><strong>About Sazao</strong></h3>
                    <p class='ds-markdown-paragraph'>Welcome to Sazao, where community meets commerce. We&rsquo;re not just another online store; we&rsquo;re a vibrant marketplace connecting passionate, independent creators and curated small businesses with shoppers who value uniqueness, quality, and story.</p>
                    <p class='ds-markdown-paragraph'>Our journey began in 2022 with a simple belief: that the best products aren&rsquo;t always mass-produced. They&rsquo;re the handcrafted necklace from a local artisan, the small-batch hot sauce from a family recipe, the innovative tech gadget dreamed up in a home garage. We wanted to build a digital home for these incredible makers and provide you with a single, trusted destination to discover them all.</p>
                    <p class='ds-markdown-paragraph'><strong>Our Mission is Twofold:</strong></p>
                    <ol start='1'>
                    <li>
                    <p class='ds-markdown-paragraph'><strong>For Shoppers:</strong>&nbsp;To offer an unrivaled, diverse selection of products you can&rsquo;t find anywhere else. Every purchase you make here supports a real person&rsquo;s dream. We empower you to shop with purpose, discover hidden gems, and build a lifestyle that&rsquo;s uniquely yours.</p>
                    </li>
                    <li>
                    <p class='ds-markdown-paragraph'><strong>For Vendors:</strong>&nbsp;To provide the tools, platform, and support to turn passion into a thriving business. We handle the complex tech, security, and marketing infrastructure so our vendors can focus on what they do best: creating amazing products and connecting with their customers.</p>
                    </li>
                    </ol>
                    <p class='ds-markdown-paragraph'><strong>What Makes Us Different?</strong></p>
                    <ul>
                    <li>
                    <p class='ds-markdown-paragraph'><strong>Curated Diversity:</strong>&nbsp;From handmade crafts and vintage finds to gourmet foods and digital services, our marketplace is a celebration of variety, all held to a high standard of quality.</p>
                    </li>
                    <li>
                    <p class='ds-markdown-paragraph'><strong>The Human Touch:</strong>&nbsp;Behind every product is a profile, a story, and a real person. You can communicate directly with sellers, request custom orders, and become part of their journey.</p>
                    </li>
                    <li>
                    <p class='ds-markdown-paragraph'><strong>Seamless &amp; Secure:</strong>&nbsp;We provide a safe, easy-to-navigate shopping experience with buyer protection, secure payments, and reliable customer support, giving you peace of mind with every click.</p>
                    </li>
                    </ul>
                    <p class='ds-markdown-paragraph'>At&nbsp;<strong>Google</strong>, every transaction is a connection. Thank you for being here and helping us build a more personal, empowering, and interesting way to shop online.</p>
                    <p class='ds-markdown-paragraph'><strong>Discover Differently. Support Directly.</strong><br /><strong>The Online Team</strong></p>",
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
